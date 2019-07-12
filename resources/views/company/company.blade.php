@extends('layouts.main')
@section('content')

<div class="container" >
    <h2>Companies</h2 >
    <div class="row" style="margin-top: 10em;">
        @foreach($companies as $company)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                
                @if(empty($company->company_logo))
                <img src="{{asset('cover')}}" style=" border-radius: 100px; width: 190px;"  alt="" class="card-img-top">
                @else
                    <img src="{{asset('uploads/logo/')}}/{{$company->company_logo}}"  
                     style=" margin-left: 60px; margin-top: 5px; border-radius: 100px; width: 160px;" class="card-img-top">
                @endif
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $company->cname }}</h5>
                    
                    <center><a href="{{route('company.index',[$company->id, $company->slug])}}" class="btn btn-primary">View Company</a></center>
                </div>
            </div>
        </div>
        @endforeach
        
    </div><br>
    <br>
    <br>
    {{ $companies->links() }}
</div>
@endsection