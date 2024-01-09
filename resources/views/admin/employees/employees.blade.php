@extends('layouts.admin')
@section('meta')
    <title>{{trans('home.employees')}}</title>
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.employees')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.employees')}}</li>
                </ol>
            </div>

            <div class="btn btn-list">
                <a href="{{url('admin/employees/create')}}"><button class="btn ripple btn-primary"><i class="fas fa-plus-circle"></i> {{trans('home.add')}}</button></a>
                <a id="btn_active"><button class="btn ripple btn-dark"><i class="fas fa-eye"></i> {{trans('home.publish/unpublish')}}</button></a>
                <a id="btn_delete" ><button class="btn ripple btn-danger"><i class="fas fa-trash"></i> {{trans('home.delete')}}</button></a>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Row-->
        <div class="row">
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div>
                            <h6 class="card-title mb-1">{{trans('home.employees')}}</h6>
                            <p class="text-muted card-sub-title">{{trans('home.table_contain_all_data_shortly_you_can_view_more_details')}}</p>
                        </div>

                        <div class="table-responsive">
                        <table class="table" id="exportexample">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll"/></th>
                                    <th>{{trans('home.id')}}</th>
                                    <th>{{trans('home.name')}}</th>
                                    <th>{{trans('home.email')}}</th>
                                    <th>{{trans('home.image')}}</th>
                                    <th>{{trans('home.postition')}}</th>
                                    <th>{{trans('home.join_date')}}</th>
                                    <th>{{trans('home.status')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $employee)
                                    <tr id="{{$employee->id}}">
                                        <td> <input type="checkbox" name="checkbox"  class="tableChecked" value="{{$employee->id}}" /> </td>
                                        <td><a href="{{ route('employees.edit', $employee->id) }}">{{$employee->id}}</a></td>
                                        <td><a href="{{ route('employees.edit', $employee->id) }}">{{$employee->user->name()}}</a></td>
                                        <td><a href="{{ route('employees.edit', $employee->id) }}">{{$employee->user->email}}</a></td>
                                        <td>
                                            <a href="{{ route('employees.edit', $employee->id) }}">
                                                @if($employee->image)
                                                    <img style="border-radius:50%" src="{{url('/uploads/employees/'.$employee->image)}}" width="50" height="50">
                                                @else
                                                    <img style="border-radius:50%" src="{{url('resources/assets/back/img/noimage.png')}}" width="50" height="50">
                                                @endif
                                            </a>
                                        </td>

                                        <td><a href="{{ route('employees.edit', $employee->id) }}">{{$employee->position}}</a></td>
                                        <td><a href="{{ route('employees.edit', $employee->id) }}">{{$employee->join_date}}</a></td>
                                        
                                        <td>
                                            <a href="{{ route('employees.edit', $employee->id) }}">
                                                @if($employee->user->status == 'active')
                                                    <span class="badge badge-success">{{trans('home.active')}}</span>
                                                @else
                                                    <span class="badge badge-danger">{{trans('home.inactive')}}</span>
                                                @endif
                                            </a>
                                        </td>  
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
					</div>
                    </div>



                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
@endsection
