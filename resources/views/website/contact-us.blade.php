@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp

    @php echo $schema @endphp
@endsection

@section('content')
    <!--Page Title-->
    <section class="page-title centred jarallax" data-jarallax data-speed="0.2" data-imgPosition="0% 0%" style="background-image: url({{Helper::imageFilesPath('banner/banner-4.webp')}});">
        <div class="container">
            <div class="content-box clearfix">
                <h1>{{trans('home.contact_us')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                    <li>{{trans('home.contact_us')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- contact-info-section -->
    <section class="contact-info-section pt-80 centred">
        <div class="container inner-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                    <div class="info-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-32"></i></div>
                            <h4>{{trans('home.email')}}</h4>
                            <p>
                                <a href="mailto:{{$setting->email}}">{{$setting->email}}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                    <div class="info-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-33"></i></div>
                            <h4>{{trans('home.phone')}}</h4>
                            <p>
                                <a href="tel:{{$setting->mobile}}">{{$setting->mobile}}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                    <div class="info-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-34"></i></div>
                            <h4>{{trans('home.address1')}}</h4>
                            <p>
                                <a href="javascript:;">
                                    {{$configration->address1}}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-info-section end -->
        

    @include('website.home-partials.contact_form')


@endsection
