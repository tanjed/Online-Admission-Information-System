@extends('master')
@section('content')
    <div class="container" style="min-height: 850px;">
        <div class="row" style="padding: 50px;">
            <div class="col-md-12">
                <form class="form-inline" action="">
                   Select Program:  <input style="margin-right: 10px;margin-left: 10px" type="email" class="form-control" id="email" placeholder="Program Name">
                   Budget:<input style="margin-right: 10px;margin-left: 10px" type="email" class="form-control" id="email" placeholder="Budget">
                    <button style="" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="row" style="margin-bottom: 20px;">
           <div class="col-md-12">
               <ul class="list-group">
                   <li class="list-group-item">
                       <span>Bsc In CSE</span><br>
                       <span>Green University of Bangladesh</span><br>
                       <span>Cost: 50000/-</span><br>
                   </li>
                   <li class="list-group-item">
                       <span>Bsc In CSE</span><br>
                       <span>City University</span><br>
                       <span>Cost: 40000/-</span><br>
                   </li>
                   <li class="list-group-item">
                       <span>Bsc In CSE</span><br>
                       <span>North South University</span><br>
                       <span>Cost: 900000/-</span><br>
                   </li>
               </ul>
           </div>
        </div>
    </div>
@stop