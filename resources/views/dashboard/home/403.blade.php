@extends('dashboard.templates.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="text-center mt-n5">
                <img class="img-fluid p-4" src="{{asset('assets/img/freepik/403-error-forbidden-pana.svg')}}" alt />
                <p class="lead">Your client does not have permission to get this page from the server.
                </p>
                <a class="text-arrow-icon" href="/dashboard/admin/index">
                    <i class="ml-0 mr-1" data-feather="arrow-left"></i>
                    Return to Dashboard
                </a>
            </div>
        </div>
    </div>
@endsection
