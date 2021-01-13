@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')

@endsection

@section('content')
    @include('flash::message')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header with-border"> 
                        <h1 class="box-title">{{__('lang.Create_Posts')}}</h1>
                    </div>
                    <div class="box-header with-border">
                        <form action="{{ route('posts.store')}}" method="POST" id="formid">
                            @csrf
                            <div class="form-group">
                                <label for="title">{{__('lang.Title')}}</label>
                                <input type="text" class="form-control" placeholder="Enter name of Title..."
                                       name="title" id="title" required>
                            </div>

                            <div class="form-group">
                                <label for="summernote">{{__('lang.Description')}}</label>
                                <textarea class="form-control " placeholder="Description...." name="description"
                                          id="summernote" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="country">{{__('lang.Select_Country')}}</label><br>
                                <select id="country" name="country_id" class="form-control" style="width:350px"
                                        required>
                                    <option selected hidden>Select</option>
                                    @foreach($countries as $key => $country)
                                        <option value="{{$key}}"> {{$country}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" id="stateDiv" style="display: none">
                                <label for="state">{{__('lang.Select_State')}}</label><br>
                                <select id="state" name="state" class="form-control " style="width:350px;" required>
                                </select>
                            </div>

                            <div class="form-group" style="display: none" id="districtDiv">
                                <label for="district">{{__('lang.Select_District')}}</label><br>
                                <select id="district" name="district_id[]" class="form control myselect"
                                        style="width:500px;" multiple required>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category">{{__('lang.Categories')}}</label><br>
                                <select id="category" name="category_id[]" class="form control myselect"
                                        style="width:500px;" multiple required>
                                    @foreach($categories as $key => $category)
                                        <option value="{{$key}}"> {{$category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lfm">{{__('lang.Select_images')}}</label>
                                <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                       <i class="fa fa-picture-o"></i> {{__('lang.Choose_Images')}}
                                    </a>
                                </span>
                                    <input id="thumbnail" readonly="readonly" class="form-control" type="text"
                                           name="images">
                                </div>
                                <div id="holder"></div>
                            </div>
                            <div class="form-group">
                                <label for="lfm1">{{__('lang.Select_Cover')}}</label>
                                <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                                       <i class="fa fa-picture-o"></i> {{__('lang.Choose_Cover_Image')}}
                                    </a>
                                </span>
                                    <input id="thumbnail1" class="form-control" type="text" name="cover"
                                           readonly="readonly">
                                </div>

                                <div id="holder1"></div>
                            </div>
                            <div class="form-group">
                                <b>{{__('lang.Status')}}</b> <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="0" name="status[]" checked>{{__('Active')}}
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="status[]">{{__('Inactive')}}
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="2" name="status[]">{{__('Breaking News')}}
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="3" name="status[]">{{__('Feature News')}}
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="4" name="status[]">{{__('Main News')}}
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="5" name="status[]">{{__('Pin Post')}}
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="6" name="status[]">{{__('Promoted Post')}}
                                    </label>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="tags">{{'Tags'}}</label>
                                <input type="text" class="form-control" placeholder="Tags.."
                                       name="tags" id="tags">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">{{__('lang.Submit')}}</button>
                            </div>
                            {{--<div class="form-group">--}}
                            {{--<button type="reset" id="reset" class="btn btn-success" onclick="reset()">{{__('lang.Reset')}}</button>--}}
                            {{--</div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($errors))
        <div class="form-group">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endsection
@section('js')
  
    <script>
        $(function () {
            $('#lfm').filemanager('image');
            $('#lfm1').filemanager('image');
            $('#tags').tagator();
        })

        // window.onload = function () {
        //     document.getElementById("formid").reset();
        // }

        $('#country').change(function () {
            var x = document.getElementById("stateDiv");
            x.style.display = "block";
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('admin/get-state-list')}}?country_id=" + countryID,
                    success: function (res) {
                        if (res) {
                            $("#state").empty();
                            $("#state").append('<option  selected disabled hidden>Select</option>');
                            $.each(res, function (key, value) {
                                $("#state").append('<option value="' + key + '">' + value + '</option>');
                            });
                        } else {
                            $("#state").empty();
                        }
                    }
                });
            } else {
                $("#state").empty();
            }
        });
        $('#state').change(function () {
            var x = document.getElementById("districtDiv");
            x.style.display = "block";
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('admin/getDistrictList')}}?state=" + countryID,
                    success: function (res) {
                        if (res) {
                            $("#district").empty();
                            $("#district").append('<option disabled>Select</option>');
                            $.each(res, function (key, value) {
                                $("#district").append('<option value="' + key + '">' + value + '</option>');
                            });
                        } else {
                            $("#district").empty();
                        }
                    }
                });
            } else {
                $("#district").empty();
            }
        });
    </script>
@stop





