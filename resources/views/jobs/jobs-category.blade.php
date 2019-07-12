@extends('layouts.main')
@section('content')

<div class="container">
        <div class="row" >
                
            <table class="table" style="margin-top: 10em;">
                    <h2 style="margin-top: 4em;">{{ $categoryName->name }}</h2>
                <tbody >
                    @foreach($jobs as $job)
                    <tr>
                        <td><img src="{{asset('avatar/man.jpg')}}" width="80"></td>
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
            {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
        </div>
    </div>
    @endsection
    <style>
    .fa{
        color: #4183D7;
    }
    </style>
    