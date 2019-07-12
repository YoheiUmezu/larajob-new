@extends('layouts.app')

@section('content')

<div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif
    <div class="row">
        <div class="col-md-4">
            @include('admin.left-menu')
        </div>
        <div class="col-md-8">
            <div class="card">

            
            <div class="card-header">
                Add Post
            </div>
            <div class="card-body">
                
                
                <form action="{{ route('tesimonial.store') }}" method="POST">
                    <!---写真をアップロードするときに使う--->
                    @csrf
                    
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea name="content" class="form-control{{ $errors->has('content') ? 
                                ' is-invalid': ''}}" value="{{ old('content') }}"></textarea>
                        @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? 
                        ' is-invalid': ''}}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Profession</label>
                        <input type="text" name="profession" class="form-control{{ $errors->has('profession') ? 
                        ' is-invalid': ''}}">
                        @if ($errors->has('profession'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('profession') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Viemo Video id</label>
                        <input type="text" name="video_id" class="form-control{{ $errors->has('video_id') ? 
                        ' is-invalid': ''}}">
                        @if ($errors->has('video_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('video_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    
                </form>
            
            </div>
        </div>
        </div>
        
    </div>
</div>


@endsection