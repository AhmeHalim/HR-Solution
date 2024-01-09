@if(count($brands) > 0)
    <!-- testimonial-section end -->
    <section class="testimonial-section centred">
        <div class="container inner-container">
            <div class="sec-title">
                <h5>{{$configration->app_name}}</h5>
                <h2>{{trans('home.Our developers')}}</h2>
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
            <div class="more-btn centred"><a href="{{LaravelLocalization::localizeUrl('developers')}}" class="theme-btn btn-one">{{trans('home.View All Listing')}}</a></div>
        </div> 
    </section>
    <!-- testimonial-section end -->
@endif