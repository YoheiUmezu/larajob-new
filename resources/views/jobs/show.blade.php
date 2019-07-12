@extends('layouts.main')
@section('content')
<link href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet">
    <div class="album text-muted" >
            
        <div class="container" id="app">
            
                
            <div class="row" >
                <div class="title" style="margin-top: 150px;">
                    <h2>{{$job->title}}</h2>
                </div>
                <img src="{{asset('hero-job-image.jpg')}}" alt="" style="width: 100%;">
                <div class="col-lg-8">
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Description<a href="" data-toggle="modal" data-target="#exampleModal1">
                        <i class="far fa-envelope" 
                        style="font-size: 34px; float:right; color: green;"></i></a></h3>
                        @if(Session::has('message'))
                            <div class="alert alert-success" >{{ Session::get('message') }}</div>
                        @endif
                        @if(Session::has('err_message'))
                            <div class="alert alert-danger" >{{ Session::get('err_message') }}</div>
                        @endif
                        @if(isset($errors)&&count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <p>{{$job->description}}</p>
                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Roles and Responsibilities</h3>
                        <p>{{$job->roles}}</p>
                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Number of vacancies</h3>
                        <p>{{$job->number_of_vacancy}}</p>
                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Experience</h3>
                        <p>{{$job->experience}}</p>
                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Gender</h3>
                        <p>{{$job->gender}}</p>
                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Salary</h3>
                        <p>{{$job->salary}}</p>
                    </div>
                </div>
                <div class="col-md-4 p-4 site-section bg-light">
                    <h3 class="h5 text-black mb-3 text-center">Short Info</h3>
                    <p>Company Name:{{ $job->company->cname }}</p>
                    <p>Address:{{$job->address}}</p>
                    <p>Employment Type:{{$job->type}}</p>
                    <p>Position:{{$job->position}}</p>
                    <p>Posted:{{$job->created_at->diffForHumans()}}</p>
                    <p>Last Date to apply:{{date('F d, Y', strtotime($job->last_date))}}</p>
                    <p><a href="{{route('company.index',[$job->company->id, $job->company->slug])}}" class="btn btn-warning" style="width: 100%;">
                        Visit Company Page</a></p>
                    <p>
                            @if(Auth::check()&&Auth::user()->user_type=='seeker')


                            @if(!$job->checkApplication())
                            <apply-component :jobid={{$job->id}}></apply-component>
                            @endif
                            <br>
                            <favourite-component :jobid={{$job->id}} :favourited={{$job->checkSaved()?'true':'false'}}></favourite-component>
                            @endif
                    </p>
                   
                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send job to your friend</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>

                            <form action="{{ route('mail') }}" method="POST">@csrf

                            <div class="modal-body">
                                <input type="hidden" name="job_id" value="{{$job->id}}">
                                <input type="hidden" name="job_slug" value="{{$job->slug}}">

                                <div class="form-group">
                                    <label for="">Your name *</label>
                                    <input type="text" name="your_name" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Your email *</label>
                                    <input type="email" name="your_email" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Person name *</label>
                                    <input type="text" name="friend_name" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Person email *</label>
                                    <input type="email" name="friend_email" class="form-control" required="">
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary"  name="submit" value="Mail this job">
                            
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<script src="https://kit.fontawesome.com/589145cac4.js"></script>--->
    @foreach($jobRecommendations as $jobRecommendation)
        <div class="card" style="width: 18rem; display: inline-block; margin-left: 6em; margin-bottom: 3em;">
            <div class="card-body">
                <p class="badge badge-success">{{ $jobRecommendation->type }}</p>
                <h5 class="card-title">{{ $jobRecommendation->position }}</h5>
                <p class="card-text">{{ str_limit($jobRecommendation->description,90) }}</p>
                <center><a href="{{ route('jobs.show', [$jobRecommendation->id,$jobRecommendation->slug]) }}" class="btn btn-success">Apply</a></center>
            </div>
        </div>
    @endforeach
    @endsection
