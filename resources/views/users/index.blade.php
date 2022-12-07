@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1>CRUD Example</h1>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{$title}}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('users.index')}}" method="GET" class="w-100">
                            <div class="row">
                                <div class="col-md-2">
                                    <select name="per_page" class="form-select" aria-label="Default select example" onchange="this.form.submit()">
                                        <option value="5" {{$resources->perPage() == 5 ? 'selected' : ''}}>5</option>
                                        <option value="10" {{$resources->perPage() == 10 ? 'selected' : ''}}>10</option>
                                        <option value="15" {{$resources->perPage() == 15 ? 'selected' : ''}}>15</option>
                                        <option value="20" {{$resources->perPage() == 20 ? 'selected' : ''}}>20</option>
                                    </select>
                                </div>
                                <div class="col-md-10">
                                    <div class="d-flex justify-content-end">
                                        <div class="input-group mb-3 w-100">
                                            <input type="text" class="form-control" placeholder="Search by name, email, phone" name="search" value="{{request()->search}}">
                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                                        </div>
                                        <div>
                                            <a href="{{route('users.create')}}" class="btn btn-primary ms-2">Create</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resources as $index => $user)
                                    <tr>
                                        <td>
                                            <a href="{{route('users.show', $user->id)}}" class="text-decoration-none text-dark">
                                                {{ $resources->firstItem() + $index }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('users.show', $user->id)}}" class="text-decoration-none text-dark">
                                                @if ($user->avatar)
                                                    <img src="{{asset('storage/' . $user->avatar)}}" alt="{{$user->name}}" width="100">
                                                @else
                                                    <img src="{{asset('/images/profile.png')}}" alt="{{$user->name}}" width="100">
                                                @endif
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('users.show', $user->id)}}" class="text-decoration-none text-dark">
                                                {{$user->name}}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('users.show', $user->id)}}" class="text-decoration-none text-dark">
                                                {{$user->email}}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('users.show', $user->id)}}" class="text-decoration-none text-dark">
                                                {{$user->phone ?? '-'}}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('users.show', $user->id)}}" class="text-decoration-none text-dark">
                                                {{$user->gender}}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('users.show', $user->id)}}" class="text-decoration-none text-dark">
                                                {{$user->address ?? '-'}}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="{{route('users.show', $user->id)}}" class="text-secondary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{route('users.edit', $user->id)}}" class="text-secondary mx-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{route('users.destroy', $user->id)}}" method="post" class="d-inline">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <i class="fas fa-trash text-secondary" style="cursor: pointer" onclick="confirm('Are you sure?') ? this.parentElement.submit() : ''"></i>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{$resources->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection