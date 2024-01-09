<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('meta')
        
        @include('layouts.partials.hreflang')
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
        <link rel="icon" type="image/x-icon" href="{{Helper::uploadedImagesPath('settings',$configration->fav_icon)}}" />

        <!-- Stylesheets -->
        <link href="{{ Helper::cssFilesPath('font-awesome-all.css')}}" rel="stylesheet">
        <link href="{{ Helper::cssFilesPath('flaticon.css')}}" rel="stylesheet">
        <link href="{{ Helper::cssFilesPath('owl.css')}}" rel="stylesheet">
        <link href="{{ Helper::cssFilesPath('bootstrap.css')}}" rel="stylesheet">
        <link href="{{ Helper::cssFilesPath('jquery.fancybox.min.css')}}" rel="stylesheet">
        <link href="{{ Helper::cssFilesPath('animate.css')}}" rel="stylesheet">
        <link href="{{ Helper::cssFilesPath('animate.min.css')}}" rel="stylesheet">
        <link href="{{ Helper::cssFilesPath('jquery-ui.css')}}" rel="stylesheet">
        <link href="{{ Helper::cssFilesPath('nice-select.css')}}" rel="stylesheet">
        <link href="{{ Helper::cssFilesPath('color/theme-color.css')}}" id="jssDefault" rel="stylesheet">
        <link href="{{ Helper::cssFilesPath('switcher-style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ Helper::cssFilesPath('easy-autocomplete.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link href="{{ Helper::cssFilesPath('style.css')}}" rel="stylesheet">
        <link href="{{ Helper::cssFilesPath('responsive.css')}}" rel="stylesheet">
        
        @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
            <link href="{{ Helper::cssFilesPath('rtl.css ')}}" rel="stylesheet">
        @endif
        
        
        @yield('style')

        <!-- Google Tag Manager -->
        {!!($setting->publish_gtm_script)?html_entity_decode($setting->gtm_script):''!!}
        <!-- End Google Tag Manager -->

    </head>
    <body @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl') class="rtl" @endif>

        <div class="boxed_wrapper">
            <!-- preloader -->
            <div class="loader-wrap">
                <div class="preloader">
                    <div class="preloader-close"><i class="far fa-times"></i></div>
                    <div id="handle-preloader" class="handle-preloader">
                        <div class="animate__animated animate__zoomInDown">
                            <img src="{{Helper::uploadedImagesPath('settings',$configration->footer_logo)}}">
                        </div>  
                    </div>
                </div>
            </div>
            <!-- preloader end -->

            @include('layouts.partials.header')

            @include('layouts.partials.mobileMenu')

            @yield('content')
            
            @include('layouts.partials.footer')

            <!--Scroll to top-->
            <button class="scroll-top scroll-to-target" data-target="html">
                <span class="fal fa-angle-up"></span>
            </button>
        </div>


        <!------------ Wrapper Social -------------->
        <ul id="" class="social-sec " style="transform: translate(15%, 100%); ">
            @if($setting->mobile)
                <li class="Icon call ">
                    <a href="tel:{{$setting->mobile}}" target="_blank "><i class="fa fa-phone "></i></a>
                </li>
            @endif
            @if($setting->whatsapp)
                <li class="Icon whatsapp ">
                    <a href="https://wa.me/{{$setting->whatsapp}}" target="_blank "><i class="fab fa-whatsapp"></i></a>
                </li>
            @endif
        </ul>
        <!-------------------------------- End Social  --------------------------------->

        <!-- jequery plugins -->
        <script src="{{ Helper::jsFilesPath('jquery.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('popper.min.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('bootstrap.min.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('owl.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('wow.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('validation.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('jquery.fancybox.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('appear.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('scrollbar.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('jarallax.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('isotope.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('jquery.nice-select.min.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('jQuery.style.switcher.min.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('jquery-ui.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('jquery.paroller.min.js')}}"></script>
        <script src="{{ Helper::jsFilesPath('nav-tool.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('product-filter.js') }}"></script>
        <!-- main-js -->
        <script src="{{ Helper::jsFilesPath('script.js') }}"></script>
        <script src="{{ Helper::jsFilesPath('lazy-load.js')}}"></script>
        <script src="{{ Helper::jsFilesPath('jquery.easy-autocomplete.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

        <script>
            /////// autocomplete search////////
            auto();
            function auto() {
            
                var options2 = {
                    url: function(phrase) {
                        return "{{url('searchAutoComplete')}}";
                    },
                    ajaxSettings: {
                        dataType: "json",
                        method: "GET",
                        data: {
                            dataType: "json"
                        }
                    },
                    getValue: function(element) {
                        return element.name;
                    },
                    preparePostData: function(data) {
                        data.phrase = $('.autoCompleteProject').val();
                        return data;
                    }
                };
        
                $('.autoCompleteProject').easyAutocomplete(options2);
            }
        </script>

        @if(Session::has('success'))
            <script>
                $.alert({
                    title: "{{trans('home.thank_you')}}",
                    content: "{{Session::get('success')}}",
                    buttons: {
                        ok: {
                            text: "{{trans('home.OK')}}",
                            btnClass: 'btn main-btn',
                        },
                    },
                    columnClass: 'col-md-6'
                });
            </script>
        @endif
        @php
            Session::forget('success')
        @endphp
        
        
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/6547750df2439e1631ebe783/1hefi2fc4';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>

        @yield('script')

        <!-- Google Tag Manager (noscript) -->
        {!!($setting->GTM_noscript)?html_entity_decode($setting->GTM_noscript):''!!}
        <!-- End Google Tag Manager (noscript) -->
    </body>
</html>