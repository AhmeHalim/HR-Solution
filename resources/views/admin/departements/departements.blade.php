@extends('layouts.admin')
@section('meta')
    <title>{{trans('home.departements')}}</title>
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.departements')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.departements')}}</li>
                </ol>
            </div>

            <div class="btn btn-list">
                <a href="{{url('admin/departements/create')}}"><button class="btn ripple btn-primary"><i class="fas fa-plus-circle"></i> {{trans('home.add')}}</button></a>
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
                            <h6 class="card-title mb-1">{{trans('home.departements')}}</h6>
                            <p class="text-muted card-sub-title">{{trans('home.table_contain_all_data_shortly_you_can_view_more_details')}}</p>
                        </div>

                        <div class="table-responsive">
                        <table class="table" id="exportexample">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll"/></th>
                                    <th>{{trans('home.id')}}</th>
                                    <th>{{trans('home.name_en')}}</th>
                                    <th>{{trans('home.name_ar')}}</th>
                                    <th>{{trans('home.logo')}}</th>
                                    <th>{{trans('home.code')}}</th>
                                    <th>{{trans('home.status')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departements as $departement)
                                    <tr id="{{$departement->id}}">
                                        <td> <input type="checkbox" name="checkbox"  class="tableChecked" value="{{$departement->id}}" /> </td>
                                        <td><a href="{{ route('departements.edit', $departement->id) }}">{{$departement->id}}</a></td>
                                        <td><a href="{{ route('departements.edit', $departement->id) }}">{{$departement->name_en}}</a></td>
                                        <td><a href="{{ route('departements.edit', $departement->id) }}">{{$departement->name_ar}}</a></td>
                                        <td>
                                            <a href="{{ route('departements.edit', $departement->id) }}">
                                                @if($departement->image)
                                                    <img style="border-radius:50%" src="{{url('/uploads/departements/'.$departement->logo)}}" width="50" height="50">
                                                @else
                                                    <img style="border-radius:50%" src="{{url('resources/assets/back/img/noimage.png')}}" width="50" height="50">
                                                @endif
                                            </a>
                                        </td>

                                        <td><a href="{{ route('departements.edit', $departement->id) }}">{{$departement->code}}</a></td>

                                        <td>
                                            <a href="{{ route('departements.edit', $departement->id) }}">
                                                @if($departement->status == 1)
                                                    <span class="badge badge-success">{{trans('home.yes')}}</span>
                                                @else
                                                    <span class="badge badge-danger">{{trans('home.no')}}</span>
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
