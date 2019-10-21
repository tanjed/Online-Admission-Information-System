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
            @include('system._university_info')

            @include('system._program_info')
        </div>
    </div>
@stop

@section('custom_script')
    @stack('page_scripts')
@endsection