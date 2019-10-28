@extends('master')
@section('content')
    <div class="container-fluid" style="background:#EAEEF2 ">
        <div class="container" style="min-height: 850px;background: white">
           <div class="row">
               <div class="col-md-12" style="margin-top: 20px;">
                   <center><h1>Notice</h1></center>
                   <hr>
               </div>
           </div>
            <div class="row">
                <div class="col-md-12">
                   <center> <h4><b>{{$notice->notice_title}}</b></h4></center>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-md-12">
                    <center class="text-danger">{{$notice->date}}</center>
                    <br>
                    <center> {{$notice->notice_body}}</center>
                </div>
            </div>
        </div>
    </div>
@stop