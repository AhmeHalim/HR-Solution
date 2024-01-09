@extends('layouts.admin')
@section('meta')
    <title>{{trans('home.add_departement')}}</title>
@endsection
@section('content')

<div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.departements')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/departements')}}">{{trans('home.departements')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.add_departement')}}</li>
                </ol>
            </div>
        </div>
        <!-- End Page Header -->
        {!! Form::open(['route' => 'departements.store', 'data-toggle'=>'validator', 'files'=>'true']) !!}

            <!-- Row-->
            <div class="row">
                <div class="col-sm-12 col-xl-12 col-lg-12">
                    <div class="card custom-card overflow-hidden">
                        
                        <div class="card-body">
                            <div>
                                <h6 class="card-title mb-1">{{trans('home.departement_informations')}}</h6>
                                <hr>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-5">
                                    <label class="">{{trans('home.name_en')}}</label>
                                    <input class="form-control" name="name_en" type="text" placeholder="{{trans('home.name_en')}}" required>
                                </div>

                                <div class="form-group col-md-5">
                                    <label class="">{{trans('home.name_ar')}}</label>
                                    <input class="form-control" name="name_ar" type="text" placeholder="{{trans('home.name_ar')}}" required>
                                </div>


                                <div class="form-group col-md-2">
                                    <label class="">{{trans('home.code')}}</label>
                                    <input class="form-control" name="code" type="text" placeholder="{{trans('home.code')}}">
                                </div>

                                <div class="form-group col-md-6"> 

                                    <p class="mb-2">{{trans('home.Select Color')}}</p>
                                    <div class="d-flex">
                                        <div class="">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="azure" class="colorinput-input" checked />
                                                <span class="colorinput-color bg-primary"></span>
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="indigo" class="colorinput-input"  />
                                                <span class="colorinput-color bg-indigo"></span>
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="purple" class="colorinput-input" />
                                                <span class="colorinput-color bg-purple"></span>
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="pink" class="colorinput-input" />
                                                <span class="colorinput-color bg-pink"></span>
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="red" class="colorinput-input" />
                                                <span class="colorinput-color bg-danger"></span>
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="orange" class="colorinput-input" />
                                                <span class="colorinput-color bg-orange"></span>
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="yellow" class="colorinput-input" />
                                                <span class="colorinput-color bg-warning"></span>
                                            </label>
                                        </div>
                                        <div class="d-none d-sm-block">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="lime" class="colorinput-input" />
                                                <span class="colorinput-color bg-info"></span>
                                            </label>
                                        </div>
                                        <div class="d-none d-sm-block">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="green" class="colorinput-input" />
                                                <span class="colorinput-color bg-success"></span>
                                            </label>
                                        </div>
                                        <div class="d-none d-sm-block">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="teal" class="colorinput-input" />
                                                <span class="colorinput-color bg-teal"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>{{trans('home.logo')}}</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="logo">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_logo')}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <p class="mt-4 mb-2">{{trans('home.publish')}}</p>
                                    <label class="custom-switch">
                                        <input type="checkbox" name="status" value="1" class="custom-switch-input" checked>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">{{trans('home.click_to_publish_content')}}</span>
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
                                <h6 class="card-title mb-1">{{trans('home.departement_daily_tasks')}}</h6>
                                <hr>
                            </div>

                            <div class="field_wrapper">
                                <div class="row">
                                    <div class="form-group col-md-7"> 
                                        <label for="task">{{trans('home.task')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.task')}}" name="task[]">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="parent">{{trans('home.task_type')}}</label>
                                        <select class="form-control select2" name="task_type[]">
                                            <option value="notes">{{trans('home.notes')}}</option>
                                            <option value="question">{{trans('home.question')}}</option>
                                            <option value="file">{{trans('home.file')}}</option>
                                            <option value="link">{{trans('home.link')}}</option>
                                        </select>
                                    </div>
                                </div>  
                            </div>       
                            <a href="javascript:void(0);" class="add_button btn" title="Add field"><i class="fas fa-plus-square"></i></a>								
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
                                <h6 class="card-title mb-1">{{trans('home.departement_kpi_evaluation')}}   </h6> <span class="badge badge-warning">{{trans('home.please make sure the total kpis value 100%')}}</span>
                                <hr>
                            </div>

                            <div class="kpis_wrapper">
                                <div class="row">
                                    <div class="form-group col-md-7"> 
                                        <label for="kpi">{{trans('home.kpi')}}</label>
                                        <input type="text"  class="form-control" placeholder="{{trans('home.kpi')}}" name="kpi[]">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="parent">{{trans('home.kpi_value')}}</label>
                                        <input class="rangeslider1" name="kpi_value[]" type="text" value="">
                                    </div>
                                </div>  
                            </div>       
                            <a href="javascript:void(0);" class="add_kpi btn" title="Add field"><i class="fas fa-plus-square"></i></a>								
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
                                    <a href="{{url('/admin/departements')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
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

@section('script')
    <script>
        $('.rangeslider1').ionRangeSlider();

        $(document).ready(function(){
            var maxField = 100; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML ='<div class="row"><hr><div class="form-group col-md-7"><label for="task">{{trans('home.task')}}</label><input type="text"  class="form-control" placeholder="{{trans('home.task')}}" name="task[]"></div>';
            fieldHTML +='<div class="form-group col-md-4"> <label for="parent">{{trans('home.task_type')}}</label> <select class="form-control select2" name="task_type[]"> <option value="notes">{{trans('home.notes')}}</option> <option value="question">{{trans('home.question')}}</option> <option value="file">{{trans('home.file')}}</option> <option value="link">{{trans('home.link')}}</option> </select> </div>';
            fieldHTML +='<div class="form-group col-md-1"><a href="javascript:void(0);" style="margin-top: 30px;" class="remove_button btn"><i class="fas fa-trash-alt"></i></a></div></div>';

            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
                $('.select2').select2({
                    'placeholder' : 'choose',
                });
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent().parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });


        $(document).ready(function(){
            var maxField = 100; //Input fields increment limitation
            var addButton = $('.add_kpi'); //Add button selector
            var wrapper = $('.kpis_wrapper'); //Input field wrapper
            var fieldHTML ='<div class="row"><hr><div class="form-group col-md-7"> <label for="kpi">{{trans('home.kpi')}}</label> <input type="text"  class="form-control" placeholder="{{trans('home.kpi')}}" name="kpi[]"> </div>';
            fieldHTML +='<div class="form-group col-md-4"> <label for="parent">{{trans('home.kpi_value')}}</label> <input class="rangeslider1" name="kpi_value[]" type="text" value=""> </div>';
            fieldHTML +='<div class="form-group col-md-1"><a href="javascript:void(0);" style="margin-top: 30px;" class="remove_button btn"><i class="fas fa-trash-alt"></i></a></div></div>';

            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
                $('.rangeslider1').ionRangeSlider();
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent().parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>
@endsection

