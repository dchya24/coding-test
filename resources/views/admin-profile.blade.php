@extends('template.app')
@section('title', 'Profile')
@section('content')
  <div class="row">
    <div class="col-md-4">
        <h6 class="mt-2 font-weight-bold">Profile</h6>
    </div>
  </div>
  @if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@if (session('status'))
  <div class="alert alert-{{session('status')['status']}} alert-dismissible fade show" role="alert">
      {{session('status')['message']}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
<hr>

<form action="{{route('admin.update')}}" method="POST" class="row" enctype="multipart/form-data">
    <div class="col-sm-6">
    <div class="form-group row">
        <label for="firstName" class="col-sm-3 col-form-label">Nama Depan</label>
        <div class="col-sm-9">
            <input type="text" name="firstName" id="firstName" class="form-control" value="{{$user->first_name}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="lastName" class="col-sm-3 col-form-label">Nama Belakang</label>
        <div class="col-sm-9">
            <input type="text" name="lastName" id="lastName" class="form-control" value="{{$user->last_name}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">Email </label>
        <div class="col-sm-9">
            <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-9">
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{$user->birth_date}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="jenisKelamin" class="col-sm-3 col-form-label">Jenis Kelamin </label>
        <div class="col-sm-9">
            <div class="form-check form-check-inline align-middle">
                <input
                    type="radio" name="jenisKelamin"
                    id="jenisKelaminLaki"
                    class="form-check-input"
                    value="0"
                    @if($user->gender == 0) checked @endif
                >
                <label for="jenisKelaminLaki" class="form-check-label">Laki - Laki</label>
            </div>
            <div class="form-check form-check-inline align-middle">
                <input
                    type="radio"
                    name="jenisKelamin"
                    id="jenisKelaminPerempuan"
                    class="form-check-input"
                    value="1"
                    @if($user->gender == 1) checked @endif
                >
                <label for="jenisKelaminPerempuan" class="form-check-label">Perempuan</label>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-9 offset-sm-3">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <button type="submit" class="btn btn-primary mr-2">Update Profile</button>
        </div>
    </div>
    </div>
</form>

<div class="row mb-3">
    <div class="col-md-4">
        <h6 class="mt-2 font-weight-bold">Change password</h6>
    </div>
  </div>
<hr>
<form action="{{route('admin.password')}}" method="POST" class="row" enctype="multipart/form-data">
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
            <div class="col-sm-9">
                <input type="password" name="password" id="password" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-3 col-form-label">Konfirmasi Password</label>
            <div class="col-sm-9">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-9 offset-sm-3">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger mr-2">Change Password</button>
            </div>
        </div>
    </div>
</form>

@endsection
