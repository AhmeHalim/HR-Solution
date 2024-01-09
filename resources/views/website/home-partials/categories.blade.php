@if(count($categories) > 0)
    <!-- category-section -->
    <section class="place-style-two sec-pad">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_2">
                        <div class="content-box">
                            <div class="sec-title">
                                <h2>{{trans('home.browse_other_categories')}}</h2>
                                <p>{{trans('home.Browse available projects and modules by category')}}</p>
                            </div>
                            <ul class="place-list clearfix">
                                @foreach($categories as $key=>$category)
                                    <li><a href="{{ (app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('category/'.$category->link_en.'/projects'):LaravelLocalization::localizeUrl('category/'.$category->link_en.'/projects') }}"><h5>{{(app()->getLocale() == 'en')?$category->name_en:$category->name_ar}}</h5><span>({{$category->projectsCount()}})</span></a></li>
                                @endforeach 
                            </ul>
                            <div class="btn-box">
                                <a href="{{LaravelLocalization::localizeUrl('categories')}}" class="theme-btn btn-one">{{trans('home.View All Categories')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image_block_1">
                        <div class="image-box">
                            <figure class="image image-1 paroller"><img src="{{Helper::imageFilesPath('place-5.jpg')}} " alt="category image 1"></figure>
                            <figure class="image image-2 paroller-2"><img src="{{Helper::imageFilesPath('place-6.jpg')}} " alt="category image 2"></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- category-section end -->
@endif