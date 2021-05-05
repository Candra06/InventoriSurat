@extends('dashboard.templates.master')
@section('content')
@php
  date_default_timezone_set('Asia/Jakarta');
  $time = date('H:i');
@endphp

<div class="card card-waves mb-4 mt-5">
  <div class="card-body p-5">
      <div class="row align-items-center justify-content-between">
          <div class="col">
              <h2 class="text-primary">

                @if ($time > '05:30' && $time < '10:00')
                  Selamat Pagi,
                @elseif($time >= '10:00' && $time < '15:00')
                  Selamat Siang,
                @elseif($time < '18:00' && $time >= '15:00')
                  Selamat Sore,
                @else
                  Selamat Malam,
                @endif

                {{Auth::user()->name}}

              </h2>
          </div>
          <div class="col d-none d-lg-block mt-xxl-n4"><img class="img-fluid px-xl-4 mt-xxl-n5"
                  src="{{asset('assets/img/freepik/statistics-pana.svg')}}" /></div>
      </div>
  </div>
</div>

@endsection
