<!-- main header -->
<header class="main-header header-style-two">
    <!-- header-top -->
    <div class="header-top">
        <div class="top-inner inner-container clearfix">
            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-map-marker-alt"></i><a href="javascript::void(0)">{{$configration->address1}}</a></li>
                    <li><i class="far fa-phone"></i><a href="tel:{{$setting->mobile}}">{{$setting->mobile}}</a></li>
                </ul>
            </div>
            <div class="right-column pull-right">
                <ul class="social-links clearfix">
                    @if($setting->facebook)<li><a href="{{$setting->facebook}}"><i class="fab fa-facebook-f"></i></a></li>@endif
                    @if($setting->twitter)<li><a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a></li>@endif
                    @if($setting->instgram)<li><a href="{{$setting->instgram}}"><i class="fab fa-instagram"></i></a></li>@endif
                    @if($setting->youtube)<li><a href="{{$setting->youtube}}"><i class="fab fa-youtube"></i></a></li>@endif
                    @if($setting->tiktok)<li><a href="{{$setting->tiktok}}"><i class="fab fa-tiktok"></i></a></li>@endif
                </ul>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo">
                        <a href="{{LaravelLocalization::localizeUrl('/')}}"><img src="{{Helper::uploadedImagesPath('settings',$configration->footer_logo)}}" alt="App logo"></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                @foreach($menus as $menu)
                                    @if($menu->type == 'link')
                                        <li  @if(Request::segment(2) == $menu->type_value) class="current" @endif><a href="{{$menu->type_value}}">{{(app()->getLocale() == 'en')?$menu->name_en:$menu->name_ar}}</a></li> 
                                    @elseif($menu->type == 'home')
                                        <li @if(Request::segment(2) == '') class="current" @endif><a href="{{LaravelLocalization::localizeUrl('/')}}">{{(app()->getLocale() == 'en')?$menu->name_en:$menu->name_ar}}</a></li> 
                                    @elseif($menu->type == 'services')
                                        @foreach($menuServices as $menuService)
                                            <li class="dropdown">
                                                <a href="{{ (app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('service/'.$menuService->link_en):LaravelLocalization::localizeUrl('service/'.$menuService->link_ar) }}">{{(app()->getLocale() == 'en')?$menuService->name_en:$menuService->name_ar}}</a>
                                                @if(count($menuService->childs()) > 0)
                                                    <ul>
                                                        @foreach($menuService->childs() as $childService)
                                                            <li>
                                                                <a href="{{ (app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('service/'.$childService->link_en):LaravelLocalization::localizeUrl('service/'.$childService->link_ar) }}">{{(app()->getLocale() == 'en')?$childService->name_en:$childService->name_ar}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    @elseif($menu->type == 'categories')
                                        @foreach($menuCategories as $menuCategory)
                                            <li>
                                                <a href="{{ (app()->getLocale() == 'en')? LaravelLocalization::localizeUrl('category/'.$menuCategory->link_en.'/projects'):LaravelLocalization::localizeUrl('category/'.$menuCategory->link_en.'/projects') }}">{{(app()->getLocale() == 'en')?$menuCategory->name_en:$menuCategory->name_ar}}</a>
                                            </li>
                                        @endforeach    
                                    @elseif(count($menu->subMenu()) > 0)
                                        <li class="dropdown"><a href="{{LaravelLocalization::localizeUrl($menu->type)}}">{{(app()->getLocale() == 'en')?$menu->name_en:$menu->name_ar}}</a>
                                            <ul>
                                                @foreach($menu->subMenu() as $subMenu)
                                                    @if(count($subMenu->subMenu() ) > 0)
                                                        <li class="dropdown">
                                                            <a href="{{ LaravelLocalization::localizeUrl($subMenu->type) }}">{{(app()->getLocale() == 'en')?$subMenu->name_en:$subMenu->name_ar}}</a>
                                                            <ul>
                                                                @foreach($subMenu->subMenu() as $subMenuL2)
                                                                    <li>
                                                                        <a href="{{ LaravelLocalization::localizeUrl($subMenuL2->type) }}">{{(app()->getLocale() == 'en')?$subMenuL2->name_en:$subMenuL2->name_ar}}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ LaravelLocalization::localizeUrl($subMenu->type) }}">{{(app()->getLocale() == 'en')?$subMenu->name_en:$subMenu->name_ar}}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li @if(Request::segment(2) == $menu->type) class="current" @endif><a href="{{ LaravelLocalization::localizeUrl($menu->type) }}">{{(app()->getLocale() == 'en')?$menu->name_en:$menu->name_ar}}</a></li> 
                                    @endif
                                @endforeach
                                
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if($localeCode == 'ar' && LaravelLocalization::getCurrentLocale() == 'en')
                                    <li><a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><i class="fas fa-language" style="color: #216ec0;"></i> {{trans("home.$localeCode")}}</a></li> 
                                @elseif($localeCode == 'en' && LaravelLocalization::getCurrentLocale() == 'ar')
                                   <li><a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><i class="fas fa-language" style="color: #216ec0;"></i> {{trans("home.$localeCode")}}</a></li> 
                                @endif    
                            @endforeach
                                

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo">
                        <a href="{{LaravelLocalization::localizeUrl('/')}}"><img src="{{Helper::uploadedImagesPath('settings',$configration->app_logo)}}" alt="App logo"></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->