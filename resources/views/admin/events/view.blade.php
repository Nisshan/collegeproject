@extends('adminlte::page')
@section('title',  'view '.$event->name )

@section('content_header')
    <h1>
        {{__('lang.Events_Details')}}
    </h1>
    <ol class="breadcrumb">
        <li >{{__('lang.Events_Details')}}</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header bg-blue">
                    <h3 class="box-title">{{$event->name}}</h3>
                </div>
                <div class="box-body">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <td>{{__('lang.Name')}}</td>
                            <td>{{$event->name}}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.Description')}}</td>
                            <td>{!! $event->description !!}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.Event_Date')}}</td>
                            <td>{{ \Carbon\Carbon::parse($event->eventdate)->format('Y-M-D')}}</td>
                        </tr>
                    </table>
                    <div class="box-footer clearfix" style="">
                        @can('edit events')
                            <a href="{{route('events.edit',[$event->id])}}" class="btn btn-sm btn-info btn-flat pull-left">
                                {{__('Edit ' .$event->name)}}</a>
                        @endcan
                        <a href="{{route('events.index')}}" class="btn btn-sm btn-default btn-flat pull-right">{{__('Back')}}</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
