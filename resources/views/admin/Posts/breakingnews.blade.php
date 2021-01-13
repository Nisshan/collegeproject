@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h1 class="box-title">Posts</h1>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                            <tr>
                                <th>{{__('lang.ID')}}</th>
                                <th>{{__('lang.Name')}}</th>
                                <th>{{__('lang.cover')}}</th>
                                <th>{{__('lang.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->cover}}</td>

                                    <td>
                                        <div class="btn-group">
                                                <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><label>Action</label><span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a type="button" href={{route('posts.show',[$post->id])}}>View</a></li>
                                                <li><a href={{route('posts.edit',[$post->id])}}>Edit</a></li>
                                                <li class="divider"></li>
                                                <li><a class="delete" href={{route('posts.destroy',[$post->id])}}>Delete</a></li>
                                            </ul>
                                        </div>
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
@stop
