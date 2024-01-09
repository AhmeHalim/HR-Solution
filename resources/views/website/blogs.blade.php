@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp
@endsection

@section('content')
    <!--Page Title-->
    <section class="page-title centred jarallax" data-jarallax data-speed="0.2" data-imgPosition="0% 0%" style="background-image: url({{Helper::imageFilesPath('banner/banner-4.webp')}});">
        <div class="container">
            <div class="content-box clearfix">
                <h1>{{trans('home.blogs')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                    <li>{{trans('home.blogs')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    @if(count($blogs) > 0)
    <!-- news-section -->
    <section class="news-section sec-pad">
        <div class="container">
            <div class="sec-title centred">
            </div>
            <div class="row clearfix">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ (app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('blog/'.$blog->link_en):LaravelLocalization::localizeUrl('blog/'.$blog->link_ar) }}">
                                            @if($blog->image)
                                                <img src="{{url('uploads/blogitems/source/'.$blog->image)}}" alt="{{$blog->alt_img}}">
                                            @else
                                                <img src="{{url('resources/assets/front/images/noimage.png')}}" alt="{{$blog->alt_img}}"/>
                                            @endif
                                        </a>
                                    </figure>
                                </div>
                                <div class="lower-content">
                                    <h4><a href="{{ (app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('blog/'.$blog->link_en):LaravelLocalization::localizeUrl('blog/'.$blog->link_ar) }}">{!!(app()->getLocale() == 'en')?$blog->title_en:$blog->title_ar!!}</a></h4>
                                    <div class="text">
                                        {!! (app()->getLocale() == 'en') ? strip_tags(mb_strimwidth($blog->text_en, 0, 100, "...")): strip_tags(mb_strimwidth($blog->text_ar, 0, 100, "...")) !!}
                                    </div>
                                    <div class="btn-box">
                                        <a href="{{ (app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('blog/'.$blog->link_en):LaravelLocalization::localizeUrl('blog/'.$blog->link_ar) }}" class="theme-btn btn-two">{{trans('home.read_more')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- news-section end -->
@endif

@endsection