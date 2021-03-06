@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('admin.left-menu')
        </div>
        <div class="col-md-8">
            <div class="card">

            
            <div class="card-header">
                Edit Post
            </div>
            <div class="card-body">
                
                
                <form action="" method="POST" enctype="multipart/form-data">
                    <!---写真をアップロードするときに使う--->
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control{{ $errors->has('title') ? 
                        ' is-invalid': ''}}" value="{{ ($post->title) }}">
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea name="content" class="form-control{{ $errors->has('content') ? 
                                ' is-invalid': ''}}" value="">{{ ($post->content) }}</textarea>
                        @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control{{ $errors->has('image') ? 
                        ' is-invalid': ''}}" value="{{ old('image') }}">
                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="0" {{$post->status=='0' ? 'selected':'' }}>Draft</option>
                            <option value="1" {{$post->status=='1' ? 'selected':'' }}>Live</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                    
                </form>
            
            </div>
        </div>
        </div>
        
    </div>
</div>


@endsection