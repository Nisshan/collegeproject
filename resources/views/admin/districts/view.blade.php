@extends('adminlte::page')
@section('title',  'view '.$district->name )

@section('content_header')
    <h1>
        {{__('lang.District_Details')}}
    </h1>
    <ol class="breadcrumb">
        <li >{{__('lang.District_Details')}}</li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header bg-blue">
                    <h3 class="box-title">{{$district->name}}</h3>
                </div>
                <div class="box-body">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <td>{{__('lang.Name')}}</td>
                            <td>{{$district->name}}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.Description')}}</td>
                            <td>{!! $district->description !!}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.State_Name')}}</td>
                            <td>{{$district->states->name}}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.Slug')}}</td>
                            <td>{{$district->slug}}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.keywords')}}</td>
                            <td>{{$district->keywords}}</td>
                        </tr>
                        {{--<tr>--}}
                            {{--<td>{{__('user id')}}</td>--}}
                            {{--<td>{{$district->user_id}}</td>--}}
                        {{--</tr>--}}
                        <tr>
                            <td>{{__('lang.Meta_Description')}}</td>
                            <td>{!! $district->meta_description !!}</td>
                        </tr>


                    </table>
                    <div class="box-footer clearfix" style="">
                        @can('edit district')
                            <a href="{{route('districts.edit',[$district->id])}}" class="btn btn-sm btn-info btn-flat pull-left">
                                Edit</a>
                        @endcan
                        <a href="{{route('districts.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
