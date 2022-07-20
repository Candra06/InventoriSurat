@extends('dashboard.templates.master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Input Surat Masuk</h6>
            </div>
            <div class="card-body">
                <form action="/dashboard/surat/suratMasuk" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="nomor_surat" value="{{old('nomor_surat')}}" class="form-control @error('nomor_surat') is-invalid @enderror" placeholder="Nomor Surat">
                                @error('nomor_surat')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="asal" value="{{old('asal')}}" class="form-control @error('asal') is-invalid @enderror" placeholder="Pengirim">
                                @error('asal')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="tujuan" value="{{old('tujuan')}}" class="form-control @error('tujuan') is-invalid @enderror" placeholder="Tujuan">
                                @error('tujuan')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="perihal" value="{{old('perihal')}}" class="form-control @error('perihal') is-invalid @enderror" placeholder="Perihal">
                                @error('perihal')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control @error('tipe') is-invalid @enderror" name="tipe">
                                    <option value="">-- Jenis Surat --</option>
                                        <option value="Online">Surat Online</option>
                                        <option value="Offline">Surat Offline</option>
                                    
                                </select>
                                @error('tipe')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="file" name="file_surat" value="{{old('file_surat')}}" class="form-control @error('file_surat') is-invalid @enderror" placeholder="File Surat">
                                @error('file_surat')
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