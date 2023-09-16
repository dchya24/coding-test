@extends('template.app')
@section('title', 'Dashboard')
@section('content')
  <div class="row">
    <div class="col-md-4">
        <h6 class="mt-2 font-weight-bold">Dashboard</h6>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-lg-4 col-sm-4">
        <div class="card-box bg-primary">
            <div class="inner">
                <h3> {{$siswa}} </h3>
                <p> Jumlah Seluruh Siswa </p>
            </div>
            <div class="icon">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-4">
        <div class="card-box bg-success">
            <div class="inner">
                <h3> {{$siswa_laki}} </h3>
                <p> Jumlah Siswa Laki - Laki </p>
            </div>
            <div class="icon">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-4">
        <div class="card-box bg-warning">
            <div class="inner">
                <h3> {{$siswa_perempuan}} </h3>
                <p> Jumlah Siswa Perempuan</p>
            </div>
            <div class="icon">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            </div>
        </div>
    </div>

  </div>
@endsection
