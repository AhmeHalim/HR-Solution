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
                <h1>{{ (app()->getLocale() == 'en') ? strip_tags(mb_strimwidth($blog->title_en, 0, 60, "...")): strip_tags(mb_strimwidth($blog->title_ar, 0, 60, "...")) }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                    <li>{{ (app()->getLocale() == 'en') ? strip_tags(mb_strimwidth($blog->title_en, 0, 60, "...")): strip_tags(mb_strimwidth($blog->title_ar, 0, 60, "...")) }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- property-details -->
    <section class="property-details property-details-one">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="property-details-content">
                        <div class="carousel-inner">
                            <div class="single-item-carousel2 owl-carousel owl-theme owl-dots-none">
                                <figure class="image-box">
                                    <img src="{{Helper::uploadedImagesPath('blogitems',$blog->image)}}" alt="{{$blog->alt_img}}">
                                </figure>
                            </div>
                        </div>
                        <div class="discription-box content-widget">
                            <div class="title-box">
                                <h1>{{ (app()->getLocale() == 'en') ? $blog->title_en:$blog->title_ar }}</h1>
                            </div>
                            <div class="text">
                                {!! (app()->getLocale() == 'en') ? $blog->text_en : $blog->text_ar !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="property-sidebar default-sidebar">
                        <div class="author-widget sidebar-widget">
                            <div class="widget-title">
                                <h4>{{trans('home.contact_us')}}</h4>
                            </div>
                            <div class="form-inner">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{LaravelLocalization::localizeUrl('save/contact-us')}}" class="default-form">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="{{trans('home.name')}}" required value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="{{trans('home.email')}}" required value="{{old('email')}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" placeholder="{{trans('home.phone')}}" required value="{{old('phone')}}">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="{{trans('home.message')}}">{{old('message')}}</textarea>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">{{trans('home.send')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="property-sidebar default-sidebar">
                        <div class="author-widget sidebar-widget">
                            <div class="google-map" id="contact-google-map">
                                <iframe src="{{$setting->map_url}}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- property-details end -->
@endsection