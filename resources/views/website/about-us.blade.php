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
                <h1>{{trans('home.about_us')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                    <li>{{trans('home.about_us')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- about-section -->
    <section class="about-section about-page pb-0">
        <div class="container">
            <div class="inner-container">
                <div class="row align-items-center clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_2">
                            <div class="image-box">
                                <figure class="image">
                                    <img src="{{Helper::uploadedImagesPath('aboutStrucs',$about->image)}}" alt="{{$about->alt_img}}">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_3">
                            <div class="content-box">
                                <div class="sec-title">
                                    <h5>{{trans('home.about_us')}}</h5>
                                    <h2>{{(app()->getLocale() == 'en')?$about->title_en:$about->title_ar}}</h2>
                                </div>
                                {!! (app()->getLocale() == 'en')?$about->text_en:$about->text_ar !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->

    <!-- chooseus-section -->
    <section class="chooseus-section alternate-2">
        <div class="pattern-layer" style="background-image: url({{Helper::imageFilesPath('shape/shape-1.png')}});"></div>
        <div class="container">
            <div class="upper-box clearfix">
                <div class="sec-title">
                    <h5>{{trans('home.Why Choose Us?')}}</h5>
                    <h2>{{trans('home.Reasons To Choose Us')}}</h2>
                </div>
            </div>
            <div class="lower-box">
                <div class="row clearfix">
                    @foreach($aboutStrucs as $aboutStruc)
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <img src="{{Helper::uploadedImagesPath('aboutStrucs',$aboutStruc->image)}}" alt="{{$aboutStruc->alt_img}}">
                                    </div>
                                    <h4>{{$aboutStruc->title}}</h4>
                                    <p>{!! $aboutStruc->text !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- chooseus-section end -->



@endsection