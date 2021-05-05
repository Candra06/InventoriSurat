@extends('dashboard.templates.master')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Menu</h6>
            </div>
            <div class="card-body">
                <form action="/dashboard/managements/menu/{{$menu->id}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <input type="text" name="menu" value="{{ $menu->menu }}" class="form-control @error('menu') is-invalid @enderror" placeholder="Menu">
                            @error('menu')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12 mb-3">
                            <input type="text" name="icon" value="{{ $menu->icon }}" class="form-control @error('icon') is-invalid @enderror" placeholder="Icon">
                            @error('icon')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12 mb-3">
                            <input type="text" name="url" value="{{ $menu->url }}" class="form-control @error('url') is-invalid @enderror" placeholder="Url">
                            @error('url')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
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