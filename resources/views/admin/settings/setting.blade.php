@extends('layouts.admin')
@section('meta')
    <title>{{trans('home.edit_setting')}}</title>
@endsection
@section('content')

<div class="container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.edit_setting')}}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_setting')}}</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->

    {!! Form::open(['method'=>'PATCH','url' => 'admin/settings/'.$settings->id, 'data-toggle'=>'validator', 'files'=>'true']) !!}
        <!-- Row-->
        <div class="row">
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <div class="card custom-card overflow-hidden">

                    <div class="card-body">
                        <div>
                            <h6 class="card-title mb-1">{{trans('home.edit_setting')}}</h6>
                            <hr>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-2">
                                <label for="helperText">{{trans('home.default_lang')}}</label>
                                <select class="form-control select2" name="default_lang" required>
                                    <option value="en" {{ ($settings->default_lang=="en")?'selected':'' }}>{{trans('home.english')}}</option>
                                    <option value="ar" {{ ($settings->default_lang=="ar")?'selected':'' }}>{{trans('home.arabic')}}</option>
                                </select>
                            </div>

                            <div class="form-group col-md-5">
                                <label class="">{{trans('home.contact_email')}}</label>
                                <input type="text" class="form-control" placeholder="{{trans('home.contact_email')}}" name="contact_email" value="{{ $settings->contact_email }}">
                            </div>

                            <div class="form-group col-md-5">
                                <label class="">{{trans('home.email')}}</label>
                                <input type="text" class="form-control" placeholder="{{trans('home.email')}}" name="email" value="{{ $settings->email }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="">{{trans('home.telphone')}}</label>
                                <input type="number"  min="0" class="form-control" placeholder="{{trans('home.telphone')}}" name="telphone" value="{{ $settings->telphone }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="">{{trans('home.mobile')}}</label>
                                <input type="mobile"  min="0" class="form-control" placeholder="{{trans('home.mobile')}}" name="mobile" value="{{ $settings->mobile }}">
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label class="">{{trans('home.mobile2')}}</label>
                                <input type="mobile"  min="0" class="form-control" placeholder="{{trans('home.mobile2')}}" name="mobile2" value="{{ $settings->mobile2 }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="">{{trans('home.fax')}}</label>
                                <input type="fax"  min="0" class="form-control" placeholder="{{trans('home.fax')}}" name="fax" value="{{ $settings->fax }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="">{{trans('home.whatsapp')}}</label>
                                <input type="whatsapp"  min="0" class="form-control" placeholder="{{trans('home.whatsapp')}}" name="whatsapp" value="{{ $settings->whatsapp }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="facebook">{{trans('home.facebook')}}</label>
                                <input type="text"  class="form-control" placeholder="{{trans('home.facebook')}}" name="facebook" value="{{ $settings->facebook }}">
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label for="twitter">{{trans('home.twitter')}}</label>
                                <input type="text" class="form-control" placeholder="{{trans('home.twitter')}}" name="twitter" value="{{ $settings->twitter }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="instgram">{{trans('home.instagram')}}</label>
                                <input type="text"  class="form-control" placeholder="{{trans('home.instagram')}}" name="instgram" value="{{ $settings->instgram }}">
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label for="linkedin">{{trans('home.linkedin')}}</label>
                                <input type="text" class="form-control" placeholder="{{trans('home.linkedin')}}" name="linkedin" value="{{ $settings->linkedin }}">
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label class="">{{trans('home.snapchat')}}</label>
                                <input type="text"  min="0" class="form-control" placeholder="{{trans('home.snapchat')}}" name="snapchat" value="{{ $settings->snapchat }}">
                            </div>

                            
                            <div class="form-group col-md-3">
                                <label for="tiktok">{{trans('home.tiktok')}}</label>
                                <input type="text"  class="form-control" placeholder="{{trans('home.tiktok')}}" name="tiktok" value="{{ $settings->tiktok }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="youtube">{{trans('home.youtube')}}</label>
                                <input type="text" class="form-control" placeholder="{{trans('home.youtube')}}" name="youtube" value="{{ $settings->youtube }}">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>{{trans('home.map_url')}}</label>
                                <textarea class="form-control" name="map_url" type="text" placeholder="{{trans('home.map_url')}}">{{$settings->map_url}}</textarea>
                            </div>
                            
                            <div class="form-group col-md-12 ">
                                <iframe src="{{$settings->map_url}}" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->

        <!-- Row-->
        <div class="row">
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                            <a href="{{url('/admin')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    {!! Form::close() !!}

    </div>

@endsection
