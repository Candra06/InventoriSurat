@extends('dashboard.templates.master')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Menu</h6>
            </div>
            <div class="card-body">
                <form action="/dashboard/status/index/{{$data->id}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <input type="text" name="title_status" value="{{ $data->title_status }}" class="form-control @error('title_status') is-invalid @enderror" placeholder="title_status">
                            @error('title_status')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select class="form-control @error('jenis') is-invalid @enderror" name="jenis">
                                    <option value="">-- Select Jenis --</option>
                                        <option value="in" {{$data->jenis == 'in' ? 'selected' : ''}}>Surat Masuk</option>
                                        <option value="out" {{$data->jenis == 'out' ? 'selected' : ''}}>Surat Keluar</option>
                                    
                                </select>
                                @error('jenis')
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