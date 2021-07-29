{!! Form::open( ['url' => url($urlPrefix.'checkout/step/billing-shipping-address'),'method'=>'POST', 'class'=>'ajax-form','id'=>'checkoutForm']) !!}
<div class="row">
    <div class="col-md-8">
        <h4 style="border-bottom:solid 3px #145A32; width: 200px; margin-bottom: -17px">@lang('Marketplace::labels.checkout.title')</h4>
        <hr style="height: 3px;">
        <div class="row" style="color:black; font-family: poppins">
            <div class="col-md-3">
                {!! CoralsForm::text('billing_address[first_name]','Corals::labels.address_label.first_name',true, $billing_address['first_name'] ?? '') !!}
            </div>
            <div class="col-md-3">
                {!! CoralsForm::text('billing_address[last_name]','Corals::labels.address_label.last_name',true, $billing_address['last_name'] ?? '') !!}
            </div>
            <div class="col-md-3">
                {!! CoralsForm::text('billing_address[email]','Corals::labels.address_label.email',true, $billing_address['email'] ?? '') !!}
            </div>
            <div class="col-md-3">
                {!! CoralsForm::text('billing_address[phone_number]','Corals::labels.address_label.phone_number',true, $billing_address['phone_number'] ?? '') !!}
            </div>
        </div>
        <div style="color:black; font-family: poppins">
        @include('components.address',['key'=>'billing_address', 'object'=> $billing_address,'type'=>'billing','container'=>'col-md-12'])
        @auth
            {!! CoralsForm::checkbox('save_billing', 'Marketplace::labels.checkout.save_shipping',true) !!}
        @endauth
        </div>
    </div>
    <div class="col-md-4">
    <h4 style="color:black; font-family: poppins">Easy Parcel</h4>
    @if (count(ShoppingCart::getAllInstanceItems()) > 0)
        @foreach (\ShoppingCart::getAllInstanceItems() as $item)
            <select style="margin-top: 10px" class="form-control" name="ship-v{!! $item->id->created_by !!}" class="ship-v{!! $item->id->created_by !!} vendor-ship" vendor-no="{!! $item->id->created_by !!}">
                <option>No shipping yet</option>
            </select>
        @endforeach
    @endif
    
    
        
    <div class="shipping-method">
    </div>
       
    </div>
</div>

<input type="hidden" name="shipping-price" value="">

@if($enable_shipping)
    <div class="row" style="color:black; font-family: poppins">
        
        <div class="col-md-8">
            <h4>@lang('Marketplace::labels.checkout.shipping_title')</h4>
            <hr>
            {!! CoralsForm::checkbox('copy_billing', 'Marketplace::labels.checkout.copy_billing') !!}
            <div class="row">
                <div class="col-md-3">
                    {!! CoralsForm::text('shipping_address[first_name]','Corals::labels.address_label.first_name',true, $shipping_address['first_name'] ?? '') !!}
                </div>
                <div class="col-md-3">
                    {!! CoralsForm::text('shipping_address[last_name]','Corals::labels.address_label.last_name',true, $shipping_address['last_name'] ?? '') !!}
                </div>
                <div class="col-md-3">
                    {!! CoralsForm::text('shipping_address[phone_number]','Corals::labels.address_label.phone_number',true, $shipping_address['phone_number'] ?? '') !!}
                </div>
                <div class="col-md-3">
                    {!! CoralsForm::text('shipping_address[company]','Corals::labels.address_label.company',false, $shipping_address['company'] ?? '') !!}

                </div>

            </div>
            @include('components.address',['key'=>'shipping_address', 'object'=> $shipping_address,'type'=>'shipping','container'=>'col-md-12'])
            @auth
                {!! CoralsForm::checkbox('save_shipping', 'Marketplace::labels.checkout.save_shipping',true) !!}
            @endauth
        </div>
    </div>
@endif
{!! Form::close() !!}


<script>

    $(document).ready(function () {
        $('#copy_billing').change(function (event) {
            if ($(this).prop('checked')) {
                $('input[name="shipping_address[first_name]"]').val($('input[name="billing_address[first_name]"]').val());
                $('input[name="shipping_address[last_name]"]').val($('input[name="billing_address[last_name]"]').val());
                $('input[name="shipping_address[phone_number]"]').val($('input[name="billing_address[phone_number]"]').val());
                $('input[name="shipping_address[address_1]"]').val($('input[name="billing_address[address_1]"]').val());
                $('input[name="shipping_address[address_2]"]').val($('input[name="billing_address[address_2]"]').val());
                $('input[name="shipping_address[city]"]').val($('input[name="billing_address[city]"]').val());
                $('input[name="shipping_address[state]"]').val($('input[name="billing_address[state]"]').val());
                $('input[name="shipping_address[zip]"]').val($('input[name="billing_address[zip]"]').val());
                $('select[name="shipping_address[country]"]').val($('select[name="billing_address[country]"]').val());
                $('select[name="shipping_address[country]"]').trigger('change');
            }
        });
        
        var seen = {};
        $('select.vendor-ship').each(function() {
            var txt = $(this).attr('vendor-no');
            if (seen[txt])
                $(this).remove();
            else
                seen[txt] = true;
        });
        
        $('input[name="billing_address[zip]"],input[name="billing_address[state]"],select[name="billing_address[country]"]').change(function (e){
            var send_zip     = $('input[name="billing_address[zip]"]').val();
            var send_state   = $('input[name="billing_address[state]"]').val();
            var send_country = $('select[name="billing_address[country]"]').val();
            
            console.log(seen);
            
            $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "/aladin1/easyparcel/",
                    data: {
                        vzip:'43900',
                        vstate:'SGR',
                        vcountry:'MY',
                        czip:send_zip,
                        cstate:send_state,
                        ccountry:send_country,
                        weight:1,
                        width:1,
                        length:1,
                        height:1
                    },
                    success: function (data) {
                        $('.shipping-method').html(data);
                        console.log("SUCCESS : ", data);    
                    },
                    error: function (e) {
                        console.log("ERROR : ", e);
                    }
                });
            
        });
        
        if($('input[name="billing_address[zip]"],input[name="billing_address[state]"],select[name="billing_address[country]"]').val()!=''){
            var send_zip     = $('input[name="billing_address[zip]"]').val();
            var send_state   = $('input[name="billing_address[state]"]').val();
            var send_country = $('select[name="billing_address[country]"]').val();
            
            $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "/aladin1/easyparcel/",
                    data: {
                        vzip:'43900',
                        vstate:'SGR',
                        vcountry:'MY',
                        czip:send_zip,
                        cstate:send_state,
                        ccountry:send_country,
                        weight:1,
                        width:1,
                        length:1,
                        height:1
                    },
                    success: function (data) {
                        $('.shipping-method').html(data);
                        console.log("SUCCESS : ", data);    
                    },
                    error: function (e) {
                        console.log("ERROR : ", e);
                    }
                });
        }
        
        $('.ep-ship').on('checked', function(e) {
    
            var price = $(this).attr('ep-price');
                
            $('.shipping-ep tr').css('background','red');
                
            $('input[name="shipping-price"]').val(price);
        
        });
        
        
    });
    
    
</script>