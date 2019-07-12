@extends('layouts.main')
@section('content')
<link href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet">
    <div class="album text-muted" >
            
        <div class="container" id="app">
            
                
            <div class="row" >
                <div class="title" style="margin-top: 150px;">
                    <h2>{{$post->title}}</h2>
                </div>
                <img src="{{asset('storage/'.$post->image)}}" alt="" style="width: 100%;">
                <div class="col-lg-8">
                    <div class="p-4 mb-8 bg-white">
                        <h5 class="h5 text-black mb-3">Created By:Admin &nbsp;{{date('d-m-Y',strtotime($post->created_at))}}</h5>
                        <p>{{$post->content}}</p>
                    </div>
                    
                    
                </div>
               
            
        </div>
    </div>
   
  
    @endsection
