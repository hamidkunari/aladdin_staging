<?php

namespace Corals\Modules\Messaging\Providers;

use Corals\Foundation\Providers\BaseUpdateModuleServiceProvider;

class UpdateModuleServiceProvider extends BaseUpdateModuleServiceProvider
{
    protected $module_code = 'corals-messaging';
    protected $batches_path = __DIR__ . '/../update-batches/*.php';
    protected $module_public_path = __DIR__ . '/../public';
}
