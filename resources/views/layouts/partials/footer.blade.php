<!-- main-footer -->
<footer class="main-footer">
    <div class="footer-top bg-color-2">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-12 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="widget-title">
                            <h3>{!! $configration->app_name !!}</h3>
                        </div>
                        <div class="text">
                          {!! $configration->about_app !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-70">
                        <div class="widget-title">
                            <h3>{{trans('home.quick_links')}}</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list class">
                                <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                                <li><a href="{{LaravelLocalization::localizeUrl('/about-us')}}">{{trans('home.about_us')}}</a></li>
                                <li><a href="{{LaravelLocalization::localizeUrl('/blogs')}}">{{trans('home.news')}}</a></li>
                                <li><a href="{{LaravelLocalization::localizeUrl('/careers')}}">{{trans('home.careers')}}</a></li>
                                <li><a href="{{LaravelLocalization::localizeUrl('/training')}}">{{trans('home.trainings')}}</a></li>
                                <li><a href="{{LaravelLocalization::localizeUrl('/contact-us')}}">{{trans('home.contact_us')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-70">
                        <div class="widget-title">
                            <h3>{{trans('home.customer_service')}}</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list class">
                                @foreach($pages as $page)
                                    <li><a href="{{ (app()->getLocale() == 'en') ? LaravelLocalization::localizeUrl('page/'.$page->link_en) : LaravelLocalization::localizeUrl('page/'.$page->link_ar) }}">{{(app()->getLocale() == 'en')?$page->title_en:$page->title_ar}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title">
                            <h3>{{trans('home.contact_us')}}</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="info-list clearfix">
                                @if($configration->address1)<li><i class="fas fa-map-marker-alt"></i>{{$configration->address1}}</li>@endif
                                @if($configration->address2)<li><i class="fas fa-map-marker-alt"></i>{{$configration->address2}}</li>@endif
                                @if($setting->mobile)<li><i class="fas fa-phone"></i><a href="tel:{{$setting->mobile}}">{{$setting->mobile}}</a></li>@endif
                                @if($setting->email)<li><i class="fas fa-envelope"></i><a href="mailto:{{$setting->email}}">{{$setting->email}}</a></li>@endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="inner-box clearfix">
                <figure class="footer-logo">
                    <a href="{{LaravelLocalization::localizeUrl('/')}}"><img src="{{Helper::uploadedImagesPath('settings',$configration->footer_logo)}}" alt="App logo"></a>
                </figure>
                <div class="copyright pull-left">
                    <p> {!! $configration->copy_rights_text !!} </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->