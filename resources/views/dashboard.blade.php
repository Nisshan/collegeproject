@extends('adminlte::page')
@section('content')
    <div class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-pencil-square-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{__('Today Posts')}}</span>
                        <span class="info-box-number small"><small>{{$posts->count()}}</small></span>
                        @can('view post')
                            <span class="info-box-number"><small><a
                                        href="{{route('posts.index')}} ">{{__('View')}}</a></small></span>
                        @endcan
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-pencil-square-o "></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text small">{{__('Today Posts')}}</span>
                        <span class="info-box-number"><small>{{$tpost->count()}}</small></span>
                        @can('view post')
                            <span class="info-box-number small"><small><a
                                        href="{{route('todayposts')}} ">{{__('View')}}</a></small></span>
                        @endcan
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red">
                        <i class="fa fa-newspaper-o"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text small"><small>{{__('All Breaking News')}}</small></span>
                        <span class="info-box-number"><small>{{$bnews->count()}}</small></span>

                        @can('view post')
                            <span class="info-box-number small"><small><a
                                        href="{{route('breakingnews')}} ">{{__('View')}}</a></small></span>
                        @endcan

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->  

            <!-- fix for small devices only -->
            <div class="col-md-3 col-sm-6 col-xs-12 ">
                <!-- Start of nepali patro badge -->
                <script type="text/javascript"> <!--
                    var nc_cb_width = 240;
                    var nc_cb_height = 90;
                    var nc_cb_shadow = 'true';
                    var nc_cb_api_id = 47920190526347; //-->
                </script>
                <script type="text/javascript"
                        src="https://www.ashesh.com.np/nepali-calendar/widget/cb.js"></script>

                <!-- End of nepali patro badge -->

                <!-- /.info-box-content -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="box box-info ">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest posts</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class=" box-body" style="">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($last as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-info btn-flat pull-left"
                                            href="{{route('posts.show',[$post->id])}} ">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix" style="">
                        @can('create post')
                            <a href="{{route('posts.create')}}" class="btn btn-sm btn-info btn-flat pull-left">Create
                                New Post</a>
                        @endcan
                        <a href="{{route('posts.index')}}" class="btn btn-sm btn-default btn-flat pull-right">View All
                            Posts</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
            <div class="col-md-5">
                <div class="box box-primary ">
                    <div class="box-header with-border">
                        <h3 class="box-title">Breaking News </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class=" box-body" style="">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>{{__('Title')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($breakingNews as $news)
                                        <tr>
                                            <td>{{$news->title}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-flat pull-left" href="{{route('posts.show',[$news->id])}} ">{{__('View')}}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <div class="box-footer text-center">
                        @can('view post')
                            <a href="{{route('breakingnews')}}" class="btn btn-sm btn-info btn-flat ">{{__('View All Breaking')}}
                                News</a>
                        @endcan
                    </div>
            </div> 
        </div>
    </div> 
@endsection
                {{-- 
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- @foreach($status as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info btn-flat pull-left"
                                           href="{{route('posts.show',[$post->id])}} ">View</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> --}}

                    {{-- <div class="box-footer text-center">
                        @can('view post')
                        <a  href="{{route('breakingnews')}}" class="btn btn-sm btn-info btn-flat ">View All Breaking News</a>
                        @endcan
                    </div> --}}
                    <!-- /.box-footer -->
             
