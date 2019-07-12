@extends('layouts.main')
@section('content')
    <div class="album text-muted" >
        <div class="container" id="app">
                
            <div class="row" >
                <div class="title" style="margin-top: 150px;">
                    <h2></h2>
                </div>
                @if(empty($company->cover_photo))
                <img src="{{asset('cover/gtalent.png')}}" alt="" style="width: 400px; height: 300px;">
                @else
                <img src="{{asset('uploads/coverphoto/')}}/{{$company->cover_photo}}" style="width: 600px; height: 400px;" alt="">
                @endif
            <div class="col-lg-8">
                <div class="p-4 mb-8 bg-white">
                    <div class="company-desc">
                        @if(empty($company->company_logo))
                            <img src="{{asset('avatar/man.jpg')}}" width="100"  alt="">
                        @else
                            <img src="{{asset('uploads/logo/')}}/{{$company->company_logo}}"  width="100" style="margin-top: -30px; border-radius: 100px;">
                        @endif
                        <p>{{$company->description}}</p>
                        <h1>{{$company->cname}}</h1>
                            <p>Slogan-{{$company->slogan}}&nbsp;Address-{{$company->address}}
                            &nbsp; Phone-{{$company->phone}}&nbsp; Website-{{$company->website}}</p>
                    </div>
                </div>
                </div>
                <table class="table">
                    <tbody>
                        @foreach($company->jobs as $job)
                        <tr>
                            <td><img src="{{asset('avatar/man.jpg')}}" width="80" style="border-radius: 100px;"></td>
                            <td>Position:{{$job->position}}
                                <br>
                                <i class="fa fa-clock" aria-hidden="true"></i>&nbsp;{{$job->type}}
                            </td>
                            <td><i class="fa fa-map-marker" aria-hidden="true"></i>Address:{{$job->address}}</td>
                            <td>
                                <i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Date:{{$job->created_at->diffForHumans()}}
                            </td>
                            <td><a href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class="btn btn-success">Apply</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    
    @endsection