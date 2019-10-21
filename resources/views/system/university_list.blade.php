@extends('master')
@section('content')


   <div class="container-fluid" style="background: #E8EAED">
       <div class="container bg-light" style="min-height: 850px;">
           <div class="row">
               <div class="col-md-12">
                   <center><h1 class="mt-5">ALL UNIVERSITY LIST</h1></center>
                   <div class="list-group mt-5" style="">

                           @foreach($universities as $university)
                                 <a href="{{URL::to('/university/'.$university->id.'/details')}}" class="list-group-item list-group-item-action">{{$university->name}}</a>
                           @endforeach

                   </div>
               </div>
           </div>
       </div>
   </div>
@stop