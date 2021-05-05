@extends('dashboard.templates.master')

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
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Role</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table text-center table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Role</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($role as $m)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$m->role}}</td>
                              <td class="d-flex justify-content-center">
                                @if (Helper::permission()->edit == 1)
                                  <a href="{{Helper::permission()->url . '/' . $m->id . '/edit'}}" class="btn btn-sm btn-primary btn-circle mr-2">
                                    <i data-feather="edit-2"></i>
                                  </a>
                                @endif
                                @if (Helper::permission()->delete)
                                    @php
                                      $linkdelete = Helper::permission()->url . '/' . $m->id
                                    @endphp
                                    <a onclick='modal_konfir("{{ $linkdelete }}")' class="btn btn-sm btn-danger btn-circle mr-2" href="#">
                                      <i data-feather="trash"></i>
                                    </a>
                                @endif
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection