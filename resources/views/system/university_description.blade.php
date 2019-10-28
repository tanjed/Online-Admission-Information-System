@extends('master')
@section('content')
    <div class="container-fluid" style="background: #E8EAED">
        <div class="container bg-light" style="min-height: 850px;">
            <div class="row">
                <div class="col-md-12">
                    <center><h1 class="mt-5">{{$university->name}}</h1></center>
                    <hr>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{URL::to($university->image_path)}}" alt="" style="height:500px;width: 1100px;">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" style="margin-top: 20px;">
                    <center><h3>Notice Board</h3></center>
                    <hr>
                    <div class="list-group" style="border: 1px solid gray;margin-bottom: 10px;min-height: 120px;">
                        @foreach($university_notices as $notice)
                            <a href="{{URL::to('/university/notice/'.$notice->id)}}" class="list-group-item list-group-item-action" > * {{$notice->notice_title}} <span class="text-danger" style="margin-left: 20px">{{$notice->date}}</span> </a>
                        @endforeach
                    </div>
                    {{$university_notices->links("pagination::bootstrap-4")}}
                </div>
            </div>

            @include('system._university_info')

            @include('system._program_info')
        </div>
    </div>
@stop

@section('custom_script')
    @stack('page_scripts')
@endsection