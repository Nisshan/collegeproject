@extends('adminlte::page')
@section('title',  'view '.$page->name )

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
                    <h3 class="box-title">{{$page->name}}</h3>
                </div>
                <div class="box-body">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <td>{{__('lang.Name')}}</td>
                            <td>{{$page->name}}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.Description')}}</td>
                            <td>{!! $page->description !!}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.Slug')}}</td>
                            <td>{{ $page->slug }}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.page_Image')}}</td>
                            <td>
                                    @foreach($page->photo as $image)
                                        <img src="{{Helper::getthumbs($image->url)}} " class="img" style="height: 100px; width: 60px; ">
                                    @endforeach

                            </td>
                        </tr>

                    </table>
                    <div class="box-footer clearfix" style="">
                        @can('edit page')
                            <a href="{{route('pages.edit',[$pages->id])}}" class="btn btn-sm btn-info btn-flat pull-left">
                                {{__('Edit ' .$pages->name)}}</a>
                        @endcan
                        <a href="{{route('pages.index')}}" class="btn btn-sm btn-default btn-flat pull-right">{{__('Back')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
