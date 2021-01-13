@extends('adminlte::page')
@section('title', 'View ' . $gallery->title)

@section('content_header')
    <h1>
        {{__('Gallery')}}

    </h1>
    <ol class="breadcrumb">
        <li class="active">{{__('Gallery Detail')}}</li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header bg-blue">
                    <h3 class="box-title">{{$gallery->title}}</h3>
                </div>
                <div class="box-body">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <td>{{__('lang.Title')}}</td>
                            <td>{{$gallery->title}}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.Description')}}</td>
                            <td>{!! $gallery->description !!}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.Slug')}}</td>
                            <td>{{$gallery->slug}}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.keywords')}}</td>
                            <td>{{$gallery->keywords}}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.Meta_Description')}}</td>
                            <td>{!! $gallery->meta_description !!}</td>
                        </tr>
                        <tr>
                            <td>{{__('lang.Gallery_cover')}}</td>
                            <td>
                                @if (strlen($gallery->cover)>5)

                                    <img src="{{Helper::getthumbs($gallery->cover)}}" class="img img-responsive"
                                         height="100px" width="100px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{__('lang.Gallery_images')}}</td>
                            <td>
                                @if ((strlen($images)>5))
                                    @foreach($gallery->images as $image)
                                        <img src="{{$image->url}}" class="img" style="height: 100px; width: 60px; ">
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    </table>
                    <div class="box-footer clearfix" style="">
                        @can('edit categories')
                            <a href="{{route('galleries.edit',[$gallery->id])}}" class="btn btn-sm btn-info btn-flat pull-left">
                                {{__('Edit ' .$gallery->name)}}</a>
                        @endcan
                        <a href="{{route('galleries.index')}}" class="btn btn-sm btn-default btn-flat pull-right">{{__('Back')}}</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@stop
