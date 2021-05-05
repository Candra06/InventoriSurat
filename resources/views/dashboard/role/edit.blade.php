@extends('dashboard.templates.master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <form action="/dashboard/managements/role/{{$role->id}}" method="POST">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Role Management</h6>
                        </div>
                        <div class="card-body">
                            <input type="text" name="role" value="{{$role->role}}" class="form-control @error('role') is-invalid @enderror" placeholder="Role">
                            @error('role')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Menu Access Management</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table" width="100%" cellspacing="0">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>Menu</th>
                                            <th>Access</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($menu as $m)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><i class="{{$m->icon}}"></i> {{$m->menu}}</td>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <div class="form-check">
                                                        @foreach ($menuold as $mo)
                                                        <input type="hidden" name="hide_menu[]" value="{{$mo}}">
                                                        @endforeach
                                                        <input name="menu_id[]" value="{{$m->id}}" {{in_array($m->id, $menuold) ? 'checked' : ""}} class="form-check-input" type="checkbox" >
                                                    </div>
                                                </div>  
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-3">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Submenu Access Management</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table" width="100%" cellspacing="0">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>Menu</th>
                                            <th>Submenu</th>
                                            <th>Access</th>
                                            <th>Create</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                        $i = 0;
                                        @endphp
                                        @foreach ($submenu as $sm)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><i class="{{$sm->menu->icon}}"></i> {{$sm->menu->menu}}</td>
                                            <td>{{$sm->submenu}}</td>
                                            @foreach ($submenuold as $so)
                                                <input type="hidden" name="hide_submenu[]" value="{{($so == $sm['id'] ? $so : "")}}">
                                            @endforeach
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <div class="form-check">
                                                        <input name="submenu_id[]" value="{{$sm->id}}" {{in_array($sm->id, $submenuold) ? 'checked' : ""}} class="form-check-input" type="checkbox" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <div class="form-check">
                                                        <input name="create[]" value="{{$sm->id}}" {{in_array($sm->id, $create) ? 'checked' : ""}} class="form-check-input" type="checkbox" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <div class="form-check">
                                                        <input name="edit[]" value="{{$sm->id}}" {{in_array($sm->id, $edit) ? 'checked' : ""}} class="form-check-input" type="checkbox" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <div class="form-check">
                                                        <input name="delete[]" value="{{$sm->id}}" {{in_array($sm->id, $delete) ? 'checked' : ""}} class="form-check-input" type="checkbox" >
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12 text-right border-top mt-2 pt-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection