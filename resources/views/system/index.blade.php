@extends('master')
@section('content')
    <div class="container-fluid" style="min-height: 850px;background: #EAEEF2">
        <div class="container bg-light" style="min-height: 850px;">
            <div class="row">
                <div class="col-md-6" style="margin-top: 20%;">
                    <a href="{{URL::to('/universityList/public')}}">
                        <div class="jumbotron" style="margin: 10px;cursor: pointer;background: none;border:1px solid green">
                            <h1 class="text-center">Public</h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-6" style="margin-top: 20%;">
                    <a href="{{URL::to('/universityList/private')}}">
                        <div class="jumbotron" style="margin: 10px;cursor: pointer;background: none;border:1px solid green">
                            <h1 class="text-center">Private</h1>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{URL::to('/universityList/privateMedical')}}">
                        <div class="jumbotron" style="margin: 10px;cursor: pointer;background: none;border:1px solid green">
                            <h1 class="text-center">Private Medical</h1>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <small style="margin: 10px;color: red">* select one to continue</small>
                </div>
            </div>
        </div>
    </div>
@stop