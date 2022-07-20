@extends('dashboard.templates.master')

@section('content')
    @if (session('status'))
        <div class="alert alert-danger" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Surat</h6>
                    <label for="">{{ $data->nomor_surat }}</label>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Nomor surat</label>
                            <h6>{{ $data->nomor_surat }}</h6>
                        </div>
                        <div class="col-md-4">
                            <label for="">Pengirim</label>
                            <h6>{{ $data->asal }}</h6>
                        </div>
                        <div class="col-md-4">
                            <label for="">Kepada</label>
                            <h6>{{ $data->tujuan }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Perihal</label>
                            <h6>{{ $data->perihal }}</h6>
                        </div>
                        <div class="col-md-4">
                            <label for="">Tanggal Masuk</label>
                            <h6>{{ $data->created_at }}</h6>
                        </div>
                        <div class="col-md-4">
                            <label for="">Status</label>
                            <h6>{{ $data->title_status }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">File Surat</label>
                            <br>
                            <img style="width: 100%" src="{{ url('/' . $data->file_surat) }}" alt="" srcset="">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form method="POST" action="/dashboard/surat/suratKeluar/{{ $data->id }}">
                        @csrf
                        @method('PUT')
                        <div class="col-lg-12 d-flex justify-content-between">
                            <div class="">
                            </div>
                            @if ($data->id_status == 8 && Auth::user()->role_id == 4)
                                <input type="hidden" name="tipe" value="1">
                                <button class="btn btn-primary" type="submit">Teruskan Surat ke Tujuan</button>
                           @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
