@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{route('alljobs')}}" method="GET">
        <div class="form-inline">
            <div class="form-group">
                <label>Keyword&nbsp;</label>
                <input type="text" name="title" class="form-control">&nbsp;&nbsp;&nbsp;
            </div>
            <div class="form-group">
                <label>Employment Type&nbsp;</label>
                    <select name="type" class="form-control" id="">
                        <option value="">-select-</option>
                        <option value="fulltime">fulltime</option>
                        <option value="parttime">parttime</option>
                        <option value="casual">casual</option>
                    </select>
                    &nbsp;&nbsp;
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" id="" class="form-control">
                        <option value="">-select-</option>
                    @foreach(App\Category::all() as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
                &nbsp;&nbsp;
            </div>
            <div class="form-group">
                <label>Address</Address></label>
                <input type="text" name="address" class="form-control">&nbsp;&nbsp;
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-outline-success">Search</button>
            </div>
        </div>
    </form>
        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
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
