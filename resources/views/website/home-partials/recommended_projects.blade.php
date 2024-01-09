@if(count($recommendedProjects) > 0)
    <!-- feature-style-two -->
    <section class="feature-style-two pt-50 pb-50">
        <div class="container">
            <div class="sec-title">
                <h5>{{trans('home.recommended')}}</h5>
                <h2>{{trans('home.recommended_projects')}}</h2>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                @foreach($recommendedProjects as $project)
                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <div class="img-div lazy-div">
                                        <img class="lazy" data-src="{{Helper::uploadedImagesPath('projects',$project->image)}}" data-srcset="{{Helper::uploadedImagesPath('projects',$project->image)}}"alt="{{$project->alt_img}}">
                                        <div class="next-lazy-img"></div>
                                    </div>
                                </figure>
                                <a href="javascript:;">
                                    <span class="category">{{(app()->getLocale() == 'en')?$project->category->name_en:$project->category->name_en}}</span>
                                </a>
                            </div>
                            <div class="lower-content">
                                <div class="title-text">
                                    <h4>
                                        <a href="{{(app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('project/'.$project->link_en) : LaravelLocalization::localizeUrl('project/'.$project->link_ar)}}">
                                            {{ (app()->getLocale() == 'en') ? strip_tags(mb_strimwidth($project->name_en, 0, 30, "...")): strip_tags(mb_strimwidth($project->name_ar, 0, 30, "...")) }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="price-box clearfix">
                                    <div class="price-info pull-left">
                                        <h6>{{trans('home.price_range')}}</h6>
                                        <h4>{{$project->price}} {{trans('home.LE')}}</h4>
                                    </div>
                                    <ul class="other-option pull-right clearfix">
                                        <li><a href="{{(app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('project/'.$project->link_en) : LaravelLocalization::localizeUrl('project/'.$project->link_ar)}}"><i class="icon-12"></i></a></li>
                                    </ul>
                                </div>
                                <p class="">{!! (app()->getLocale() == 'en') ? strip_tags(mb_strimwidth($project->text_en, 0, 100, "...")): strip_tags(mb_strimwidth($project->text_ar, 0, 100, "..."))!!}</p>
                                <ul class="more-details clearfix">
                                    @if(count($project->attributes()) > 0)
                                        @foreach($project->attributes() as $key=>$attribute)
                                            <li>
                                                <img src="{{Helper::uploadedImagesPath('attribute',$attribute->icon)}}" alt ="icon image"/>
                                                @foreach($attribute->projectAttributeValues($project->id) as $key=> $value)
                                                    {{($lang == 'en')?$value->value_en:$value->value_ar}}
                                                @endforeach
                                                {{($lang =='en')?$attribute->name_en:$attribute->name_ar}}
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <!--<div class="btn-box"><a href="{{(app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('project/'.$project->link_en) : LaravelLocalization::localizeUrl('project/'.$project->link_ar)}}" class="theme-btn btn-two">See Details</a></div>-->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="more-btn centred"><a href="{{LaravelLocalization::localizeUrl('recommended/projects')}}" class="theme-btn btn-one">{{trans('home.View All Listing')}}</a></div>
        </div>
    </section>
    <!-- feature-style-two end -->
@endif

