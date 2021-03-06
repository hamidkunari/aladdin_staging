<?php

namespace Corals\Modules\Payment\Stripe\Job;


use Carbon\Carbon;
use Corals\Modules\Payment\Common\Models\Invoice;
use Corals\Modules\Payment\Common\Models\WebhookCall;
use Corals\Modules\Payment\Stripe\Exception\StripeWebhookFailed;
use Corals\Modules\Subscriptions\Facades\SubscriptionsManager;
use Corals\Modules\Subscriptions\Models\Plan;
use Corals\Modules\Subscriptions\Models\Subscription;
use Corals\User\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class HandleInvoiceCreated implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var WebhookCall
     */
    public $webhookCall;

    /**
     * HandleInvoiceCreated constructor.
     * @param WebhookCall $webhookCall
     */
    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }


    public function handle()
    {
        logger('Invoice Created job, webhook_call: ' . $this->webhookCall->id);

        try {
            if ($this->webhookCall->processed) {
                throw StripeWebhookFailed::processedCall($this->webhookCall);
            }

            $payload = $this->webhookCall->payload;

            if (is_array($payload) && isset($payload['data']['object'])) {
                $invoiceObject = $payload['data']['object'];

                $user = User::where('integration_id', $invoiceObject['customer'])->first();

                if (!$user) {
                    throw StripeWebhookFailed::invalidStripeCustomer($this->webhookCall);
                }
                if (isset($invoiceObject['subscription']) && $invoiceObject['subscription']) {
                    $subscription = Subscription::where('subscription_reference',
                        $invoiceObject['subscription'])->first();

                    if (!$subscription) {
                        throw StripeWebhookFailed::invalidStripeSubscription($this->webhookCall);
                    }

                    SubscriptionsManager::generateCycle($subscription);

                    $invoiceCode = $invoiceObject['id'];
                    $invoice = Invoice::whereCode($invoiceCode)->first();

                    if (!$invoice) {
                        $invoice = Invoice::create([
                            'code' => $invoiceObject['id'],
                            'currency' => $invoiceObject['currency'],
                            'description' => $invoiceObject['description'],
                            'sub_total' => ($invoiceObject['subtotal'] / 100),
                            'total' => ($invoiceObject['total'] / 100),
                            'user_id' => $user->id,
                            'invoicable_id' => $subscription->id,
                            'invoicable_type' => Subscription::class,
                            'due_date' => isset($invoiceObject['due_date']) ? Carbon::createFromTimestamp($invoiceObject['due_date']) : Carbon::now(),
                            'invoice_date' => isset($invoiceObject['created']) ? Carbon::createFromTimestamp($invoiceObject['created']) : Carbon::now(),
                        ]);

                        $invoiceObjectLines = $invoiceObject['lines']['data'];

                        $invoiceItems = [];
                        foreach ($invoiceObjectLines as $line) {
                            $plan = Plan::where('code', $line['plan']['id'])->first();

                            $invoiceItems[] = [
                                'code' => $line['id'],
                                'amount' => ($line['amount'] / 100),
                                'description' => $line['description'],
                                'itemable_id' => $plan ? $plan->id : null,
                                'itemable_type' => $plan ? Plan::class : null,
                            ];
                        }

                        $invoice->items()->createMany($invoiceItems);
                    }
                }
                $this->webhookCall->markAsProcessed();
            } else {
                throw StripeWebhookFailed::invalidStripePayload($this->webhookCall);
            }
        } catch (\Exception $exception) {
            log_exception($exception);
            $this->webhookCall->saveException($exception);
            throw $exception;
        }
    }
}
