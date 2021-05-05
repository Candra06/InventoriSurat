@extends('dashboard.templates.master')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
            </div>
            <div class="card-body">
                <form action="/dashboard/users/index/{{$user->id}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12 mb-3">
                            <input type="text" name="email" disabled value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                                    <option value="">-- Select Role --</option>
                                    @foreach ($role as $m)
                                        <option value="{{$m->id}}" {{$m->id == $user->role_id ? 'selected' : ''}}>{{$m->role}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex text-right">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection