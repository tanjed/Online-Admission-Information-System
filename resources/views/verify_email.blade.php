@extends('master_dashboard')
@section('content')
    <div class="container" style="min-height: 800px;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="margin-top: 20%;">
                <small class="text-danger">* Verify your email to proceed.</small>
                <div class="jumbotron" style="margin-bottom: 0">
                    <form action="{{URL::to(route('process.verification'))}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-10">
                                <input class="form-control" name="token" type="text" placeholder="Verification Token">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success" type="submit">Verify</button>
                            </div>
                        </div>
                    </form>
                </div>
                @if(!empty($errors))
                    <div class="error-log" style="margin-top:5px;">
                        @foreach($errors->all() as $error)
                            <small class="text-danger">* {{$error}}</small><br>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@stop