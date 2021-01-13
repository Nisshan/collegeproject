@extends('adminlte::page')

@section('title', 'Create District')

@section('content_header')

@endsection
@section('content')
    @include('flash::message')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 class="box-title">{{__('lang.Create_District_Details')}}</h1>
                    </div>
                    <div class="box-header with-border">
                        <form action="{{ route('districts.store')}}" method="POST" id="formid">
                            @csrf

                            <div class="form-group">
                                <label for="country">{{__('lang.Select_Country')}}</label><br>
                                <select id="country" name="country_id" class="form-control" style="width:350px">
                                    <option>Select</option>
                                    @foreach($countries as $key => $country)
                                        <option value="{{$key}}"> {{$country}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" id="stateDiv" style="display: none">
                                <label for="state">{{__('lang.Select_State')}}</label><br>
                                <select name="state" id="state" class="form-control" style="width:350px">
                                </select>
                            </div>
                            <div class="form-group" style="display: none" id="districtDiv">
                                <label for="title">{{__('lang.District_Name')}}</label>
                                <input type="text" class="form-control" required="required"
                                       placeholder="Enter district name.." id="title" name="name"
                                       value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">{{__('lang.Description')}}</label>
                                <textarea id="summernote" placeholder="Description..." class="form-control"
                                          name="description" required="required">{{ old('description') }} </textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">{{__('lang.Submit')}}</button>
                            </div>
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
    <script type="text/javascript">
        $('#country').change(function () {
            var x = document.getElementById("stateDiv");
            x.style.display = "block";
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('get-state-list')}}?country_id=" + countryID,
                    success: function (res) {
                        if (res) {
                            $("#state").empty();
                            $("#state").append('<option>Select</option>');
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
        });
    </script>

@endsection


