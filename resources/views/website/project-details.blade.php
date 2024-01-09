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
                <h1>{{ (app()->getLocale() == 'en') ? strip_tags(mb_strimwidth($project->name_en, 0, 60, "...")): strip_tags(mb_strimwidth($project->name_ar, 0, 60, "...")) }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                    <li>{{ (app()->getLocale() == 'en') ? strip_tags(mb_strimwidth($project->name_en, 0, 60, "...")): strip_tags(mb_strimwidth($project->name_ar, 0, 60, "...")) }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- property-details -->
    <section class="property-details property-details-one">
        <div class="auto-container">
            <div class="top-details clearfix">
                <div class="left-column pull-left clearfix">
                    <h3>{{ (app()->getLocale() == 'en') ? $project->name_en:$project->name_ar }}</h3>
                </div>
                <div class="right-column pull-right clearfix">
                    <div class="price-inner clearfix">
                        <ul class="category clearfix pull-left">
                            <li><a href="javascript:;">{{trans('home.For Sell')}}</a></li>
                        </ul>
                        <div class="price-box pull-right">
                            <h3>{{$project->price}} {{trans('home.LE')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="property-details-content">
                        <div class="carousel-inner">
                            <div class="single-item-carousel2 owl-carousel owl-theme owl-dots-none">
                                <figure class="image-box">
                                    <img src="{{Helper::uploadedImagesPath('projects',$project->image)}}" alt="{{$project->alt_img}}">
                                </figure>
                                @foreach($project->images() as $key=>$image)
                                    <figure class="image-box">
                                        <img src="{{Helper::uploadedImagesPath('projects',$image->image)}}" alt="project image {{$key+2}}">
                                    </figure>
                                @endforeach
                            </div>
                        </div>
                        <div class="discription-box content-widget">
                            <div class="title-box">
                                <h4>{{trans('home.project_informations')}}</h4>
                            </div>
                            <div class="text">
                                {!! (app()->getLocale() == 'en') ? $project->text_en : $project->text_ar !!}
                            </div>
                        </div>
                        <div class="details-box content-widget">
                            <div class="title-box">
                                <h4>{{trans('home.project_specifications')}}</h4>
                            </div>
                            <ul class="list clearfix">
                                <li><span>{{trans('home.project_area')}}:</span> {{$project->project_area}}</li>
                                @if(count($project->attributes()) > 0)
                                    @foreach($project->attributes() as $key=>$attribute)
                                        <li>
                                            {{($lang == 'en')?$attribute->name_en:$attribute->name_ar}} :
                                            <span>
                                            @foreach($attribute->projectAttributeValues($project->id) as $key=> $value)
                                                {{($lang == 'en')?$value->value_en:$value->value_ar}}
                                            @endforeach
                                            </span>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="location-box content-widget">
                            <div class="title-box">
                                <h4>{{trans('home.project_location')}}</h4>
                            </div>
                            <ul class="info clearfix">
                                <li><span>{{trans('home.region')}}:</span> {{($project->region)?(($lang == 'en')?$project->region->name_en:$project->region->name_ar) : ''}}</li>
                                <li><span>{{trans('home.address')}}:</span> {{($project->region)?(($lang == 'en')?$project->address_en:$project->address_ar) : ''}}</li>
                            </ul>
                            <div class="google-map-area">
                                <div class="google-map" id="contact-google-map">
                                    <iframe src="{{$project->map_url}}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
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
                </div>
            </div>
            <div class="similar-content">
                <div class="title">
                    <h4>{{trans('home.related_projects')}}</h4>
                </div>
                <div class="row clearfix">
                     @foreach($relatedProjects as $key=>$relatedProject)
                        <div class="col-lg-4 col-md-4 col-sm-12 feature-block">
                            <div class="feature-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <div class="img-div lazy-div">
                                                <img class="lazy" data-src="{{Helper::uploadedImagesPath('projects',$relatedProject->image)}}" data-srcset="{{Helper::uploadedImagesPath('projects',$relatedProject->image)}}"alt="{{$project->alt_img}}">
                                                <div class="next-lazy-img"></div>
                                            </div>
                                        </figure>
                                        <a href="javascript:;">
                                            <span class="category">{{ (app()->getLocale() == 'en') ? strip_tags(mb_strimwidth($relatedProject->name_en, 0, 60, "...")): strip_tags(mb_strimwidth($relatedProject->name_ar, 0, 60, "...")) }}</span>
                                        </a>
                                    </div>
                                    <div class="lower-content">
                                        <div class="title-text">
                                            <h4>
                                                <a href="{{(app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('project/'.$relatedProject->link_en) : LaravelLocalization::localizeUrl('project/'.$relatedProject->link_ar)}}">
                                                    {{(app()->getLocale() == 'en')?$relatedProject->name_en:$relatedProject->name_en}}
                                                </a>
                                            </h4>
                                        </div>
                                        <div class="price-box clearfix">
                                            <div class="price-info pull-left">
                                                <h6>{{trans('home.price_range')}}</h6>
                                                <h4>{{$relatedProject->price}} {{trans('home.LE')}}</h4>
                                            </div>
                                            <ul class="other-option pull-right clearfix">
                                                <li><a href="{{(app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('project/'.$relatedProject->link_en) : LaravelLocalization::localizeUrl('project/'.$relatedProject->link_ar)}}"><i class="icon-12"></i></a></li>
                                            </ul>
                                        </div>
                                        <p class="">{{ (app()->getLocale() == 'en') ? strip_tags(mb_strimwidth($relatedProject->text_en, 0, 130, "...")): strip_tags(mb_strimwidth($relatedProject->name_ar, 0, 130, "...")) }}</p>
                                        <ul class="more-details clearfix">
                                            @if(count($relatedProject->attributes()) > 0)
                                                @foreach($relatedProject->attributes() as $key=>$attribute)
                                                    <li>
                                                        <img src="{{Helper::uploadedImagesPath('attribute',$attribute->icon)}}" alt ="icon image"/>
                                                        @foreach($attribute->projectAttributeValues($relatedProject->id) as $key=> $value)
                                                            {{($lang == 'en')?$value->value_en:$value->value_ar}}
                                                        @endforeach
                                                        {{($lang =='en')?$attribute->name_en:$attribute->name_ar}}
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                        <div class="btn-box"><a href="{{(app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('project/'.$relatedProject->link_en) : LaravelLocalization::localizeUrl('project/'.$project->link_ar)}}" class="theme-btn btn-two">See Details</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </section>
    <!-- property-details end -->
@endsection