@extends('layouts.app')
@section('meta')
    <title>{{ (app()->getLocale() == 'en') ? $page->title_en : $page->title_ar }}</title>
@endsection

@section('content')

    <!--Page Title-->
    <section class="page-title centred jarallax" data-jarallax data-speed="0.2" data-imgPosition="0% 0%" style="background-image: url({{Helper::imageFilesPath('banner/banner-4.webp')}});">
        <div class="container">
            <div class="content-box clearfix">
                <h1>{{ (app()->getLocale() == 'en') ? $page->title_en : $page->title_ar}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                    <li>{{ (app()->getLocale() == 'en') ? $page->title_en : $page->title_ar }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
    <!-- feature-style-two -->
    <section class="feature-style-two pt-50 pb-50">
        <div class="container">
            <!--<div class="sec-title">-->
            <!--    <h1>{{ (app()->getLocale() == 'en') ? $page->title_en : $page->title_ar }}</h1>-->
            <!--</div>-->
            {!! (app()->getLocale() == 'en') ? $page->text_en : $page->text_ar  !!}
        </div>
    </section>
    <!-- feature-style-two end -->

@endsection