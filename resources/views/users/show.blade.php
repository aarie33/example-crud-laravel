@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{$title}}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        @if ($resource->avatar)
                            <img src="{{asset('storage/'.$resource->avatar)}}" alt="" class="img-fluid">
                        @else
                            <img src="{{asset('images/profile.png')}}" alt="" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-9">
                        <div class="row mb-3">
                            <div class="col-2 text-secondary">Name</div>
                            <div class="col-10">{{$resource->name}}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2 text-secondary">Email</div>
                            <div class="col-10">{{$resource->email}}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2 text-secondary">Phone</div>
                            <div class="col-10">{{$resource->phone}}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2 text-secondary">Gender</div>
                            <div class="col-10">{{$resource->gender}}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2 text-secondary">Address</div>
                            <div class="col-10">{{$resource->address ?? '-'}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{route('users.index')}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection