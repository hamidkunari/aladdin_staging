@extends('layouts.public')

@section('content')
    <div class="container" id="contact">
        <h1 class="text-center title-page">Contact Us</h1>
        <div class="row-inhert">
            <div class="header-contact">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="item d-flex">
                            <div class="item-left">
                                <div class="icon">
                                    <i class="zmdi zmdi-email"></i>
                                </div>
                            </div>
                            <div class="item-right d-flex">
                                <div class="title">Email:</div>
                                <div class="contact-content">
                                    <a href="mailto:support@domain.com">support@domain.com</a>
                                    <br>
                                    <a href="mailto:contact@domain.com">contact@domain.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="item d-flex">
                            <div class="item-left">
                                <div class="icon">
                                    <i class="zmdi zmdi-home"></i>
                                </div>
                            </div>
                            <div class="item-right d-flex">
                                <div class="title">Address:</div>
                                <div class="contact-content">
                                    Powerhouse, Lot 16.02, Level 16, 1, No. 1, Persiaran Bandar Utama, Bandar Utama, 47800 Petaling Jaya, Selangor
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="item d-flex justify-content-end  last">
                            <div class="item-left">
                                <div class="icon">
                                    <i class="zmdi zmdi-phone"></i>
                                </div>
                            </div>
                            <div class="item-right d-flex">
                                <div class="title">Hotline:</div>
                                <div class="contact-content">
                                    0123-456-78910
                                    <br>0987-654-32100
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="input-contact">
                <p class="text-intro text-center">{!! $item->rendered !!}
                </p>
                <div class="d-flex justify-content-center">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="contact-form">
                            <form id="main-contact-form" class="contact-form ajax-form" name="contact-form"
                                  method="post" data-page_action="clearContactForm"
                                  action="{{ url('contact/email') }}">
                                {{ csrf_field() }}
                                <div class="form-fields">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="name"
                                                   placeholder="@lang('corals-marketplace-pro::labels.template.contact.name')">
                                        </div>
                                        <div class="col-md-6 margin-bottom-mobie">
                                            <input class="form-control" type="email" name="email"
                                                   placeholder="@lang('corals-marketplace-pro::labels.template.contact.email')">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 margin-bottom-mobie">
                                            <input class="form-control" type="text" name="phone"
                                                   placeholder="@lang('corals-marketplace-pro::labels.template.contact.phone')">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 margin-bottom-mobie">
                                            <input class="form-control" type="text" name="company"
                                                   placeholder="@lang('corals-marketplace-pro::labels.template.contact.company_name')">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 margin-bottom-mobie">
                                            <input class="form-control" type="text" name="subject"
                                                   placeholder="@lang('corals-marketplace-pro::labels.template.contact.subject')">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <textarea  class="form-control" name="message" id="message"
                                                      placeholder="@lang('corals-marketplace-pro::labels.template.contact.message')"
                                                      rows="8"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">

                                            {!! NoCaptcha::display() !!}

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-block" style="border-radius: .25rem; background-color: #086E38;k" type="submit"
                                            name="submit" required="required">
                                        @lang('corals-marketplace-pro::labels.template.contact.submit_message')
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('js')

    {!! NoCaptcha::renderJs() !!}

@endsection

<style>
textarea:hover{
    border:solid 1px #086E38
}

    </style>