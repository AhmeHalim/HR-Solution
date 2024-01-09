@if(count($blogs) > 0)
    <!-- news-section -->
    <section class="news-section sec-pad">
        <div class="container">
            <div class="sec-title centred">
                <h5>{{$configration->app_name}}</h5>
                <h2>{{trans('home.blogs')}}</h2>
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