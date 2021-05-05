@extends('dashboard.templates.master')

@section('content')

<div class="row">
    <div class="col-lg-4">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profil Anda</h6>
            </div>
            <div class="card-body">
                <form action="/dashboard/settings/profile/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                    <input type="file" id="input-file-now" name="avatar" class="dropify" data-default-file="{{asset($user->avatar)}}"/>
                    @error('avatar')
                        <span class="text-danger mt-2">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-4">
                        <label class="small mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Lengkap">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1">Email</label>
                        <input type="text" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
@endpush