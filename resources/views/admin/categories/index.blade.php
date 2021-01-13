@extends('adminlte::page')

@section('title', 'Categories List')

@section('content_header')

@stop

@section('content')
    @include('flash::message')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h1 class="box-title">{{__('lang.Categories')}}</h1>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>{{__('lang.ID')}}</th>
                                <th>{{__('lang.Title')}}</th>
                                <th>{{__('lang.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody id="sortable">
                            @foreach($categories as $category)
                                <tr class="row1" data-id="{{ $category->id }}">
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>

                                    <td>
                                        <div class="btn-group">
                                                <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><label>Action</label><span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a type="button" href={{route('categories.show',[$category->id])}}>View</a></li>
                                                <li><a href={{route('categories.edit',[$category->id])}}>Edit</a></li>
                                                <li class="divider"></li>
                                                <li><a class="delete" href={{route('categories.destroy',[$category->id])}}>Delete</a></li>
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
@section('js')
    <script>
        $(function () {
            // this is to sort using the position in the table index ui-method
            $("#sortable").sortable({
                items: "tr",
                opacity: 0.6,
                cursor: 'move',
                update: function () {
                    sendOrdertoServer();
                }
            });
            var position = [];

            function sendOrdertoServer() {
                // position = [];
                $('tr.row1').each(function (index, element) {
                    position.push({
                        id: $(this).attr('data-id'),
                        order: index + 1
                    });
                });
                console.log(position)
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('orderupdate') }}",
                    data: {
                        position: position,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status == 200) {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>
@stop


