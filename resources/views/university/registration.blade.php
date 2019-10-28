@extends('master_admin')
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                <form class="login100-form validate-form" action="{{route('university.signup')}}" method="POST">
                    {{@csrf_field()}}
					<span class="login100-form-title p-b-33">
						University Registration
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="University Email" value="{{old('email')}}">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="name" placeholder="University Name" value="{{old('name')}}">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>

                    <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>
                    <div class="wrap-input100 rs1 validate-input">
                        <select class="form-control" id="sel1" name="status">
                            <option value="public" >Public</option>
                            <option value="private">Private</option>
                            <option value="privateMedical">Private Medical</option>
                        </select>
                    </div>

                    <div class="container-login100-form-btn m-t-20">
                        <button type="submit" class="login100-form-btn">
                            Sign Up
                        </button>
                    </div>

                    @if(!empty($errors))
                        <div class="error-log" style="margin-top:5px;">
                            @foreach($errors->all() as $error)
                                <small class="text-danger">* {{$error}}</small><br>
                            @endforeach
                        </div>
                    @endif
                    <div class="text-center mt-5">
						<span class="txt1">
							Allready have an account?
						</span>

                        <a href="{{URL::to(route('university.signin.show'))}}" class="txt2 hov1">
                            Sign In
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

