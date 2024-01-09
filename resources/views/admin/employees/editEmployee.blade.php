@extends('layouts.admin')
@section('meta')
    <title>{{trans('home.edit_employee')}}</title>
@endsection
@section('content')

<div class="container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.employees')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/employees')}}">{{trans('home.employees')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_employee')}}</li>
                </ol>
            </div>
        </div>
        <!-- End Page Header -->


        {!! Form::open(['method'=>'PATCH','url' => 'admin/employees/'.$employee->id, 'data-toggle'=>'validator', 'files'=>'true']) !!}

        
            <!-- Row-->
            <div class="row">
                <div class="col-sm-12 col-xl-12 col-lg-12">
                    <div class="card custom-card overflow-hidden">
                        
                        <div class="card-body">
                            <div>
                                <h6 class="card-title mb-1">{{trans('home.user_informations')}}</h6>
                                <hr>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.f_name')}}</label>
                                    <input type="text" class="form-control" placeholder="{{trans('home.f_name')}}"  name="f_name"  value="{{$employee->user->f_name}}" required>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.l_name')}}</label>
                                    <input type="text" class="form-control" placeholder="{{trans('home.l_name')}}"  name="l_name"  value="{{$employee->user->l_name}}" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.email')}}</label>
                                    <input type="email" class="form-control email" placeholder="{{trans('home.email')}}"  value="{{$employee->user->email}}" readonly>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.password')}}</label>
                                    <input type="password" class="form-control" placeholder="{{trans('home.password')}}" name="password" data-minlength="8">
                                    <p><code>{{trans('home.Your Password Must Be at Least 8 Characters')}}</code></p>
                                </div>

                                <div class="form-group col-md-12">
                                    <p class="mt-4 mb-2">{{trans('home.active')}}</p>
                                    <label class="custom-switch">
                                        <input type="checkbox" name="status" value="active" class="custom-switch-input" @if($employee->user->status) checked @endif>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">{{trans('home.click_to_activate_account')}}</span>
                                    </label>
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
                            <div>
                                <h6 class="card-title mb-1">{{trans('home.employee_informations')}}</h6>
                                <hr>
                            </div>
                            <div class="row">
                            
                                <div class="form-group col-md-12 text-center">
                                    @if($employee->image)
                                        <img style="border-radius:50%" src="{{url('/uploads/employees/'.$employee->image)}}" width="120" height="120">
                                    @else
                                        <img style="border-radius:50%" src="{{url('resources/assets/back/img/noimage.png')}}" width="120" height="120">
                                    @endif
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="parent">{{trans('home.geneder')}}</label>
                                    <select class="form-control select2" name="gender">
                                        <option value="male" {{($employee->gender == 'male')?'selected':''}}>{{trans('home.male')}}</option>
                                        <option value="female" {{($employee->gender == 'female')?'selected':''}}>{{trans('home.female')}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="">{{trans('home.ssn')}}</label>
                                    <input class="form-control" name="ssn" type="text" placeholder="{{trans('home.ssn')}}" value="{{$employee->ssn}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="parent">{{trans('home.position')}}</label>
                                    <select class="form-control select2" name="position">
                                        <option value="trainee" {{($employee->position == 'trainee')?'selected':''}} >{{trans('home.trainee')}}</option>
                                        <option value="fresh_graduate" {{($employee->position == 'fresh_graduate')?'selected':''}} >{{trans('home.fresh_graduate')}}</option>
                                        <option value="junior" {{($employee->position == 'junior')?'selected':''}} >{{trans('home.junior')}}</option>
                                        <option value="mid_senior" {{($employee->position == 'mid_senior')?'selected':''}} >{{trans('home.mid_senior')}}</option>
                                        <option value="senior" {{($employee->gender == 'senior')?'selected':''}} >{{trans('home.senior')}}</option>
                                        <option value="team_leader" {{($employee->position == 'team_leader')?'selected':''}} >{{trans('home.team_leader')}}</option>
                                        <option value="departement_manager" {{($employee->position == 'departement_manager')?'selected':''}} >{{trans('home.departement_manager')}}</option>
                                        <option value="branche_manager" {{($employee->position == 'branche_manager')?'selected':''}} >{{trans('home.branche_manager')}}</option>
                                        <option value="general_manager" {{($employee->position == 'general_manager')?'selected':''}} >{{trans('home.general_manager')}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <label class="">{{trans('home.finger_print_id')}}</label>
                                    <input class="form-control" name="finger_print_id" type="text" placeholder="{{trans('home.finger_print_id')}}" value="{{$employee->finger_print_id}}">
                                </div>

                                <div class="col-md-4">
                                    <label>{{trans('home.image')}}</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>{{trans('home.contract_file')}}</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="contract_file">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_file')}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="code">{{trans('home.join_date')}}</label>
                                    <div class="input-group">
                                        <input type='text' class="form-control datepicker" name="join_date" placeholder="{{trans('home.join_date')}}" value="{{$employee->join_date}}" readonly/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="code">{{trans('home.termination_date')}}</label>
                                    <div class="input-group">
                                        <input type='text' class="form-control datepicker" name="termination_date" placeholder="{{trans('home.termination_date')}}" value="{{$employee->termination_date}}" readonly/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="helperText">{{trans('home.departements')}}</label>
                                    <select class="form-control role select2" name="departement_id[]" multiple>
                                        @foreach($departements as $departement)
                                            <option value="{{$departement->id}}" {{(in_array($departement->id,$departementIds))?'selected':''}}>{{(app()->getLocale() == 'en')?$departement->name_en:$departement->name_ar }}</option>
                                        @endforeach
                                    </select>
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
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                    <a href="{{url('/admin/employees')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->    
        {!! Form::close() !!}
 
    </div>

@endsection
