@extends('layouts.app')
@section('meta')
   <title>{{trans('home.apply_training')}}</title>
@endsection

@section('content')
    <!--Page Title-->
    <section class="page-title centred jarallax" data-jarallax data-speed="0.2" data-imgPosition="0% 0%" style="background-image: url({{Helper::imageFilesPath('banner/banner-4.webp')}});">
        <div class="container">
            <div class="content-box clearfix">
                <h1>{{trans('home.apply_training')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                    <li>{{trans('home.apply_training')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <section class="contact-section">
        <div class="container">
            <div class="inner-container">
                <div class="row align-items-center clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title">
                            <h5>{{$configration->app_name}}</h5>
                            <h2>{{trans('home.apply for our trainings list')}}</h2>
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
                                <form id="contact-form" method="POST" action="{{LaravelLocalization::localizeUrl('save/training-applications')}}"> 
                                    @csrf

                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <input type="text" name="name" placeholder="{{trans('home.name')}}" required value="{{old('name')}}">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <input type="email" name="email" placeholder="{{trans('home.email')}}" required value="{{old('email')}}">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <input type="text" name="phone" placeholder="{{trans('home.phone')}}" required value="{{old('phone')}}">
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <label>{{trans('home.trainings')}}</label>
                                                <div class="select-box">
                                                    <select class="wide" name="training">
                                                        <option></option>
                                                        <option value="training 1">{{trans('home.training 1')}}</option>
                                                        <option value="training 2">{{trans('home.training 2')}}</option>
                                                        <option value="training 3">{{trans('home.training 3')}}</option>
                                                        <option value="training 4">{{trans('home.training 4')}}</option>
                                                        <option value="training 5">{{trans('home.training 5')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea name="notes" placeholder="{{trans('home.notes')}}">{{old('notes')}}</textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button class="theme-btn btn-one" type="submit" name="submit-form">{{trans('home.send')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection