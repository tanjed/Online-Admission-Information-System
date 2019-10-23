@extends('master')
@section('content')
    <div class="container" style="min-height: 850px;">
        <div class="row" style="padding: 50px;">
            <div class="col-md-12">
                <form class="form-inline" action="{{URL::to('/search/result')}}" method="get">
                   Select Program:  <input style="margin-right: 10px;margin-left: 10px" type="text" class="form-control" name="search" placeholder="Program Name" required>
                   Budget:<input style="margin-right: 10px;margin-left: 10px" type="text" class="form-control" name="budget" placeholder="Budget" required>
                    <button style="" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="row" style="margin-bottom: 20px;">
           <div class="col-md-12">
               @if(!empty($searchResult))
               <ul class="list-group">
                   @foreach($searchResult as $result)

                   <a href="{{URL::to('/university/'.$result->department->university->id.'/details')}}" class="list-group-item list-group-item-action">
                       <span>{{$result->name}}</span><br>
                       <span>{{$result->department->university->name}}</span><br>
                       <span>Cost: {{$result->cost}}/-</span><br>
                   </a>

                   @endforeach
               </ul>
               @endif
           </div>
        </div>

    </div>
@stop