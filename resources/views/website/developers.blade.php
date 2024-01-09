@extends('layouts.app')
@section('meta')
    <title>{{trans('home.brands')}}</title>
@endsection

@section('content')
    <!--Page Title-->
    <section class="page-title centred jarallax" data-jarallax data-speed="0.2" data-imgPosition="0% 0%" style="background-image: url({{Helper::imageFilesPath('banner/banner-4.webp')}});">
        <div class="container">
            <div class="content-box clearfix">
                <h1>{{trans('home.brands')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                    <li>{{trans('home.brands')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- testimonial-section end -->
    <section class="testimonial-section centred">
        <div class="container inner-container">
            <div class="sec-title">

            </div>
            <div class="region row">
                @foreach($brands as $brand)
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <a href="{{LaravelLocalization::localizeUrl('developer/'.$brand->link_en.'/projects')}}">
                            <div class="card">
                                <div class="card-img">
                                    <div class="img-div lazy-div">
                                        <img class="lazy" data-src="{{Helper::uploadedImagesPath('brands',$brand->logo)}}" data-srcset="{{Helper::uploadedImagesPath('brands',$brand->logo)}}"alt="Developer Logo">
                                        <div class="next-lazy-img"></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5>{{(app()->getLocale() == 'en')?$brand->name_en:$brand->name_ar}}</h5>
                                    <span>{{$brand->projectsCount()}}</span>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach
            </div>
        </div> 
    </section>
    <!-- testimonial-section end -->

@endsection