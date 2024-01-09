@extends('layouts.app')
@section('meta')
    <title>{{trans('home.careers')}}</title>
@endsection

@section('content')
    <!--Page Title-->
    <section class="page-title centred jarallax" data-jarallax data-speed="0.2" data-imgPosition="0% 0%" style="background-image: url({{Helper::imageFilesPath('banner/banner-4.webp')}});">
        <div class="container">
            <div class="content-box clearfix">
                <h1>{{trans('home.careers')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                    <li>{{trans('home.careers')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

   <!-- career-page-section -->
   <section class="career-page-section sec-pad">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 left-side">
                    <div class="sec-title">
                        <h5>{{trans('home.Career Opportunity')}}</h5>
                        <h2>{{trans('home.Build Your Career With')}} <br />{{$configration->app_name}}</h2>
                        <p>{{trans('home.we believe that our greatest asset is our talented team of professionals. We are a dynamic and innovative company that values creativity, collaboration, and a passion for excellence')}}</p>
                    </div>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 right-side">
                    <ul class="accordion-box">
                        @foreach($careers as $key=>$career)
                            <li class="accordion block @if($key == 0) active-block @endif">
                                <div class="acc-btn @if($key == 0) active @endif">
                                    <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                    <h5>{{(app()->getLocale() == 'en')? $career->title_en : $career->title_ar}}</h5>
                                </div>
                                <div class="acc-content @if($key == 0) current @endif   ">
                                    <div class="content-box">
                                        <p>{!! (app()->getLocale() == 'en')? $career->desc_en : $career->desc_ar !!}</p>
                                        <h4>{{trans('home.responsibilities')}}:</h4>
                                        {!! (app()->getLocale() == 'en')? $career->responsibilities_en : $career->responsibilities_ar !!}
                                        <button type="button" class="theme-btn btn-one" data-toggle="modal" data-target="#careerModal-{{$key+1}}"> {{trans('home.Apply Now')}} </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- career-page-section end -->
    @foreach($careers as $key=>$career)
        <!-- Modal -->
        <div class="modal fade" id="careerModal-{{$key+1}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">{{trans('home.apply_for')}} ({{(app()->getLocale() == 'en')? $career->title_en : $career->title_ar}})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="contact-form" method="POST" action="{{url('save-career-application')}}" enctype="multipart/form-data"> 
                        @csrf
                        <div class="modal-body">
                            <div class="form-inner">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="name" placeholder="{{trans('home.name')}}" required value="{{old('name')}}"/>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="{{trans('home.email')}}" required value="{{old('email')}}"/>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="phone" placeholder="{{trans('home.phone')}}" required value="{{old('phone')}}"/>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="position" placeholder="{{trans('home.position')}}" value="{{old('position')}}" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="notes" placeholder="{{trans('home.notes')}}"></textarea>
                                    </div>
                                    <div class="col-12 pb-30">
                                        <label for="exampleFormControlFile1">{{trans('home.Upload your resume')}}</label>
                                        <input type="file" class="form-control-file" name="cv_file" id="exampleFormControlFile1">
                                    </div>
                                    
                                    <div class="col-lg-12 pt-10 form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                                            <label class="form-check-label" for="inlineRadio1">{{trans('home.male')}}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                                            <label class="form-check-label" for="inlineRadio2">{{trans('home.female')}}</label>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="career_id"  value="{{$career->id}}" />
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="theme-btn btn-one" type="submit" name="submit-form">{{trans('home.Apply Now')}}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endforeach
@endsection