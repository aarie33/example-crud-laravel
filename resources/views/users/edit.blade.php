@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <form action="{{route('users.update', $resource->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{$resource->id ?? ''}}">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{$title}}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$resource->name ?? old('name')}}">
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$resource->email ?? old('email')}}">
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$resource->phone ?? old('phone')}}">
                                @error('phone')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Password (Leave blank if you don't want to change it)</label>
                                <div class="input-group">
                                    <input type="password" id="password_confirmation" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}">
                                    <div class="input-group-text">
                                        <a href="#" id="show_password_confirmation" onclick="showPassword('password_confirmation')">
                                            <i class="fa fa-eye text-secondary" id="eye_password_confirmation"></i>
                                        </a>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                                    <div class="input-group-text">
                                        <a href="#" id="show_password_confirmation" id="show_password" onclick="showPassword('password')">
                                            <i class="fa fa-eye text-secondary" id="eye_password"></i>
                                        </a>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" class="form-select" aria-label="Default select example">
                                    <option value="MALE" {{ $resource->gender == 'MALE' || (old('gender') && old('gender') == 'MALE') ? 'selected' : ''}}>Male</option>
                                    <option value="FEMALE" {{ $resource->gender == 'FEMALE' || (old('gender') && old('gender') == 'FEMALE') ? 'selected' : ''}}>Female</option>
                                </select>
                                @error('gender')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="5">{{ $resource->address ?? old('address')}}</textarea>
                                @error('address')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Avatar (Leave blank if you don't want to change it)</label>
                                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" value="{{$resource->avatar ?? old('avatar')}}">
                                <div class="d-flex justify-content-center">
                                    <img id="imgPreview" src="{{asset('storage/' . $resource->avatar)}}" alt="Preview image" class="img-thumbnail mt-2" style="max-width: 20rem;">
                                </div>
                                @error('avatar')
                                    <div class="alert alert-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('users.index')}}" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@include('users.functions')
