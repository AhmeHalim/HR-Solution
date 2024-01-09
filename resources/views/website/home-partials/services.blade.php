@if(count($services))
    <!-- Services -->
    <section class="feature-style-three centred">
        <div class="container">
            <div class="sec-title">
                <h2>{{trans('home.Our Services')}}</h2>
            </div>
            <div class="row clearfix">
                @foreach($services as $service)
                    <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-two wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <img src="{{Helper::uploadedImagesPath('services',$service->img)}}" alt="service icon"/> 
                                </div>
                                <h4>{!! (app()->getLocale() == 'en') ? $service->name_en:$service->name_ar !!}</h4>
                                {!! (app()->getLocale() == 'en') ? strip_tags(mb_strimwidth($service->text_en, 0, 150, "...")): strip_tags(mb_strimwidth($service->text_ar, 0, 150, "...")) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Services end -->
@endif