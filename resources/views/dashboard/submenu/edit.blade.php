@extends('dashboard.templates.master')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Submenu</h6>
            </div>
            <div class="card-body">
                <form action="/dashboard/managements/submenu/{{$submenu->id}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="submenu" value="{{$submenu->submenu}}" class="form-control @error('submenu') is-invalid @enderror" placeholder="Submenu">
                                @error('submenu')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select class="form-control @error('menu_id') is-invalid @enderror" name="menu_id">
                                    <option value="">-- Select Menu --</option>
                                    @foreach ($menu as $m)
                                        <option value="{{$m->id}}" {{$m->id == $submenu->menu_id ? 'selected' : ''}}>{{$m->menu}}</option>
                                    @endforeach
                                </select>
                                @error('url')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="url" value="{{$submenu->url}}" class="form-control @error('url') is-invalid @enderror" placeholder="Url">
                                @error('url')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="is_active" class="custom-control-input" value="1" id="is_active">
                                <label class="custom-control-label" for="is_active">Active?</label>
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