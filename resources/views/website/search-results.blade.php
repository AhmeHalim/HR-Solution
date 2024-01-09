@extends('layouts.app')
@section('meta')
    <title>{{trans('home.search_results')}}</title>
@endsection

@section('content')

<!--Page Title-->
<section class="page-title centred jarallax" data-jarallax data-speed="0.2" data-imgPosition="0% 0%" style="background-image: url({{Helper::imageFilesPath('banner/banner-4.webp')}});">
    <div class="container">
        <div class="content-box clearfix">
            <h1>{{trans('home.search_results')}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                <li>{{trans('home.search_results')}}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Project-page-section -->
<section class="property-page-section property-grid">
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                @if(count($projects) > 0)
                    <div class="property-content-side">
                        <div class="item-shorting clearfix">
                            <div class="left-column pull-left">
                                <h5>{{trans('home.Search Reasults')}} : <span>{{trans('home.Showing')}} {{ $projects->count() }} {{trans('home.of')}} {{ $projects->total() }} </span></h5>
                            </div>
                            <div class="right-column pull-right clearfix">
                                <div class="short-menu clearfix">
                                    <button class="list-view"><i class="icon-35"></i></button>
                                    <button class="grid-view on"><i class="icon-36"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="wrapper grid">
                            <div class="deals-list-content list-item">
                                @foreach($projects as $key=>$project)
                                    <div class="deals-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image">
                                                    <div class="img-div lazy-div">
                                                        <img class="lazy" data-src="{{Helper::uploadedImagesPath('projects',$project->image)}}" data-srcset="{{Helper::uploadedImagesPath('projects',$project->image)}}"alt="{{$project->alt_img}}">
                                                        <div class="next-lazy-img"></div>
                                                    </div>
                                                </figure>
                                                <a href="javascript:;">
                                                    <span class="category">{{(app()->getLocale() == 'en')?$project->category->name_en:$project->category->name_ar}}</span>
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
                                                <div class="other-info-box clearfix">
                                                    <div class="btn-box pull-left">
                                                        <a href="{{(app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('project/'.$project->link_en) : LaravelLocalization::localizeUrl('project/'.$project->link_ar)}}" class="theme-btn btn-two">{{trans('home.more_details')}}</a>
                                                    </div>
                                                    <ul class="other-option pull-right clearfix">
                                                        <li>
                                                            <a href="{{(app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('project/'.$project->link_en) : LaravelLocalization::localizeUrl('project/'.$project->link_ar)}}"><i class="icon-12"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="deals-grid-content grid-item">
                                <div class="row clearfix">
                                    @foreach($projects as $key=>$project)
                                        <div class="col-lg-4 col-md-4 col-sm-12 feature-block">
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
                                                            <span class="category">{{(app()->getLocale() == 'en')?$project->category->name_en:$project->category->name_ar}}</span>
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
                                                        <div class="btn-box"><a href="{{(app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('project/'.$project->link_en) : LaravelLocalization::localizeUrl('project/'.$project->link_ar)}}" class="theme-btn btn-two">See Details</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="pagination-wrapper">
                            {{$projects->links()}}
                        </div>
                    </div>
                @else
                    <div class="text-center">
                        <div class="img-div lazy-div">
                            <img class="lazy" data-src="{{Helper::imageFilesPath('no_results.png')}}" data-srcset="{{Helper::imageFilesPath('no_results.png')}}"alt="No result image" style="mix-blend-mode: multiply;">
                            <div class="next-lazy-img"></div>
                        </div>
                        <h4 >{{trans('home.no_data_found_with_this_search_inputs')}}</h4 >
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Project-page-section end -->
@endsection 