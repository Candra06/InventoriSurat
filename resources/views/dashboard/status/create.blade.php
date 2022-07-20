@extends('dashboard.templates.master')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Data Status</h6>
            </div>
            <div class="card-body">
                <form action="/dashboard/status/index" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="title_status" value="{{old('title_status')}}" class="form-control @error('title_status') is-invalid @enderror" placeholder="Judul Status">
                                @error('title_status')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select class="form-control @error('jenis') is-invalid @enderror" name="jenis">
                                    <option value="">-- Select Jenis --</option>
                                        <option value="in">Surat Masuk</option>
                                        <option value="out">Surat Keluar</option>
                                    
                                </select>
                                @error('url')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-12 d-flex justify-content-between">
                            <div class="">
                               
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection