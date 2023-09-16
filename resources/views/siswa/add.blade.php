@extends('template.app')
@section('title', 'Tambah Siswa')
@section('content')
  <div class="row">
    <div class="col-md-4">
        <h6 class="mt-2 font-weight-bold">Tambah Data Siswa</h6>
    </div>
  </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
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

<form action="{{route('siswa.store')}}" method="POST" class="row" enctype="multipart/form-data">
    <div class="col-sm-6">
            <div class="form-group row">
                <label for="firstName" class="col-sm-3 col-form-label">Nama Depan</label>
                <div class="col-sm-9">
                    <input type="text" name="firstName" id="firstName" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="lastName" class="col-sm-3 col-form-label">Nama Belakang</label>
                <div class="col-sm-9">
                    <input type="text" name="lastName" id="lastName" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="noTelp" class="col-sm-3 col-form-label">Nomor HP </label>
                <div class="col-sm-9">
                    <input type="number" name="noTelp" id="noTelp" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="nis" class="col-sm-3 col-form-label">Nomor Induk Siswa </label>
                <div class="col-sm-9">
                    <input type="number" name="nis" id="nis" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="jenisKelamin" class="col-sm-3 col-form-label">Jenis Kelamin </label>
                <div class="col-sm-9">
                    <div class="form-check form-check-inline align-middle">
                        <input type="radio" name="jenisKelamin" id="jenisKelaminLaki" class="form-check-input" value="0">
                        <label for="jenisKelaminLaki" class="form-check-label">Laki - Laki</label>
                    </div>
                    <div class="form-check form-check-inline align-middle">
                        <input type="radio" name="jenisKelamin" id="jenisKelaminPerempuan" class="form-check-input" value="1">
                        <label for="jenisKelaminPerempuan" class="form-check-label">Perempuan</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                </div>
            </div>


    </div>

    <div class="col-sm-4 offset-sm-1">
        <label for="imageUpload">
            <img src="{{asset('img/profile.jpg')}}" alt="Profile" class="img-fluid" style="width: 160px" id="image">
        </label>
        <div class="form-group mt-2">
            <input type="file" class="form-control-file" id="imageUpload" name="profileImage" accept="image/*" onchange="showPreview(event)">
        </div>
    </div>
    <div class="col-sm-6">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary mr-2">Tambah Siswa Baru</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div>
</form>

@endsection

@section('script')
<script>
    // const image = document.getElementById('image');
    // const cropper = new Cropper(image, {
    // aspectRatio: 1 / 1,
    // crop(event) {
    //     console.log(event.detail.x);
    //     console.log(event.detail.y);
    //     console.log(event.detail.width);
    //     console.log(event.detail.height);
    //     console.log(event.detail.rotate);
    //     console.log(event.detail.scaleX);
    //     console.log(event.detail.scaleY);
    // },
    // });
    function showPreview(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("image");
            preview.src = src;
            preview.style.display = "block";
        }
    }
</script>
@endsection
