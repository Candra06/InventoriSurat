@extends('dashboard.templates.master')

@section('content')

<div class="row">
    <div class="col-lg-6">
        @if (session('password'))
            <div class="alert alert-danger" role="alert">
                {{ session('password') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">Ganti Password</div>
            <div class="card-body">
                <form action="/dashboard/settings/password/{{Auth::user()->id}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="small mb-1">Password Lama</label>
                        <input type="text" name="old_password" value="{{old('old_password')}}" class="form-control @error('old_password') is-invalid @enderror" placeholder="Masukkan Password Lama">
                        @error('old_password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1">Password Baru</label>
                        <input type="text" name="new_password" value="{{old('new_password')}}" class="form-control @error('new_password') is-invalid @enderror" placeholder="Masukkan Password Baru">
                        @error('new_password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary float-right" type="submit">Simpan</button>
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