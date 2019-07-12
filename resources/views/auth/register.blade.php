@extends('layouts.main')

@section('content')

<div class="album text-muted">
    <div class="container">
        <div class="row">
            <h1>Seeker Registration</h1>
            <div class="site-section bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-8 mb-5">
                        <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <input type="hidden" value="seeker" name="user_type">
                                <div class="form-group row">
                                <label for="name" class="col-md-12">{{ __('Name') }}</label>
    
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-12">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-12">Date Of Birth</label>
        
                                    <div class="col-md-12">
                                        <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required>
        
                                        @if ($errors->has('dob'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

        
                                <div class="form-group row">
                                    <label for="password" class="col-md-12">{{ __('Password') }}</label>
        
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-12">{{ __('Confirm Password') }}</label>
        
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label for="type" class="col-md-12">Gender</label>
                                <div class="col-md-12">
                                        <input type="radio" name="gender" value="male">Male
                                        <input type="radio" name="gender" value="female">Female
                                        @if ($errors->has('gender'))
                                        <span class="invalid-ffedback"><strong>{{ $errors->first('gender') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
        
                                
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <input type="submit" value="Register as Seeker"
                                        class="btn btn-primary py-2 px-3">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-white">
                                <h3 class="h5 text-black mb-3">More Info</h3>
                                <p>Once you create an account verification link will be sent to your email</p>
                                <p><a href="#" class="btn btn-primary py-2 px-4">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        









@endsection
