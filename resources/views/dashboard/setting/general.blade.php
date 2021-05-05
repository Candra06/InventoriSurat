@extends('dashboard.templates.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
@endpush
@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Setting General</h6>
            </div>
            <div class="card-body">
                <form action="/dashboard/settings/general/{{$general->id}}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">Logo</label>
                        <label class="col-sm-6 col-form-label">Favicon</label>
                        <div class="col-lg-6">
                            <input type="file" id="input-file-now" name="logo" class="dropify" @if ($general->logo) data-default-file="{{asset($general->logo)}}" @endif/>
                            @error('logo')
                                <span class="text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <input type="file" id="input-file-now" name="favicon" class="dropify" @if ($general->favicon) data-default-file="{{asset($general->favicon)}}" @endif/>
                            @error('favicon')
                                <span class="text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Title Website</label>
                        <div class="col-lg-10">
                            <input type="text" name="title" value="{{$general->title}}" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tagline / Slogan</label>
                        <div class="col-lg-10">
                            <input type="text" name="tagline" value="{{$general->tagline}}" class="form-control @error('tagline') is-invalid @enderror">
                            @error('tagline')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-lg-10">
                            <input type="text" name="email" value="{{$general->email}}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Instagram Url</label>
                        <div class="col-lg-10">
                            <input type="text" name="ig" value="{{$general->ig}}" class="form-control @error('ig') is-invalid @enderror">
                            @error('ig')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Facebook Url</label>
                        <div class="col-lg-10">
                            <input type="text" name="fb" value="{{$general->fb}}" class="form-control @error('fb') is-invalid @enderror">
                            @error('fb')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Youtube Url</label>
                        <div class="col-lg-10">
                            <input type="text" name="yt" value="{{$general->yt}}" class="form-control @error('yt') is-invalid @enderror">
                            @error('yt')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Twitter Url</label>
                        <div class="col-lg-10">
                            <input type="text" name="tw" value="{{$general->tw}}" class="form-control @error('tw') is-invalid @enderror">
                            @error('tw')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-lg-10">
                            <input type="text" name="phone" value="{{$general->phone}}" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-lg-10">
                            <input type="text" name="address" value="{{$general->address}}" class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 text-right">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
  <script src="{{ asset('assets/js/dropify.min.js') }}"></script>
  <script src="{{ asset('assets/js/dropify.js') }}"></script>
@endpush