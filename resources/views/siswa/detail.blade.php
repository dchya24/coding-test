@extends('template.app')
@section('title', 'Detail Siswa')
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

<form action="{{route('siswa.update', $data['id'])}}" method="POST" class="row" enctype="multipart/form-data">
    <div class="col-sm-6">
        <div class="form-group row">
            <label for="firstName" class="col-sm-3 col-form-label">Nama Depan</label>
            <div class="col-sm-9">
                <input type="text" name="firstName" id="firstName" class="form-control" value="{{$data['first_name']}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="lastName" class="col-sm-3 col-form-label">Nama Belakang</label>
            <div class="col-sm-9">
                <input type="text" name="lastName" id="lastName" class="form-control" value="{{$data['last_name']}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="noTelp" class="col-sm-3 col-form-label">Nomor HP </label>
            <div class="col-sm-9">
                <input type="text" name="noTelp" id="noTelp" class="form-control" value="{{$data['no_telp']}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="nis" class="col-sm-3 col-form-label">Nomor Induk Siswa </label>
            <div class="col-sm-9">
                <input type="number" name="nis" id="nis" class="form-control" value="{{$data['nis']}}">
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
                        @if($data['gender'] == 0) checked @endif
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
                        @if($data['gender'] == 1) checked @endif
                    >
                    <label for="jenisKelaminPerempuan" class="form-check-label">Perempuan</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
                <textarea name="alamat" id="alamat" class="form-control">{{$data['alamat']}}</textarea>
            </div>
        </div>
    </div>

    <div class="col-sm-4 offset-sm-1">
        <label for="imageUpload">
            <img src="@if($data['foto']) {{ url('profile', $data['foto']) }} @else {{asset('img/profile.jpg')}} @endif"
                alt="Profile" class="img-fluid"
                style="width: 160px" id="image"
            >
        </label>
        <div class="form-group mt-2">
            <input type="file" class="form-control-file" id="imageUpload" name="profileImage" accept="image/*" onchange="showPreview(event)">
        </div>
    </div>
    <div class="col-sm-6">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <button type="submit" class="btn btn-primary mr-2">Update Siswa</button>
    </div>
</form>

<div class="row mt-5">
    <div class="col-md-4">
        <h6 class="font-weight-bold">Daftar Ekstrakulikuler Siswa</h6>
    </div>
  </div>
<hr>
<div class="w-75">
    <button class="btn btn-success" data-toggle="modal" data-target="#ekskul">Tambah Ekskul Baru</button>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tahun Masuk</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data->ekskul as $ekskul)
                <tr>
                    <td>{{$ekskul->nama}}</td>
                    <td>{{$ekskul->tahun}}</td>
                    <td>
                        <button
                            class="btn btn-sm btn-outline-warning"
                            onclick="showModaledit(event)"
                            data-id="{{$ekskul->id}}"
                            data-nama="{{$ekskul->nama}}"
                            data-tahun="{{$ekskul->tahun}}"
                            >Edit</button>
                        <a class="btn btn-sm btn-outline-danger" href="{{route('ekskul.delete', $ekskul['id'])}}">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No Data!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Modal --}}
<!-- Vertically centered modal -->
<div class="modal fade" id="ekskul" tabindex="-1" aria-labelledby="ekskulLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{route('ekskul.add')}}" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="ekskulLabel">Tambah Data Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 offset-sm-1 col-form-label">Nama Ekstrakulikuler</label>
                    <div class="col-sm-6">
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tahun" class="col-sm-4 offset-sm-1  col-form-label">Tahun Masuk</label>
                    <div class="col-sm-6">
                        <input type="year" name="tahun" id="tahun" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{ csrf_field() }}
                <input type="hidden" name="_siswaId" value="{{$data['id']}}">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Ekstrakulikuler Baru</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- update modal --}}
<div class="modal fade" id="updateEkskul" tabindex="-1" aria-labelledby="updateEkskulLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{route('ekskul.update')}}" method="POST" id="update-ekskul">
            <div class="modal-header">
                <h5 class="modal-title" id="ekskulLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 offset-sm-1 col-form-label">Nama Ekstrakulikuler</label>
                    <div class="col-sm-6">
                        <input type="text" name="nama" id="updateNama" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tahun" class="col-sm-4 offset-sm-1  col-form-label">Tahun Masuk</label>
                    <div class="col-sm-6">
                        <input type="year" name="tahun" id="updateTahun" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{ csrf_field() }}
                <input type="hidden" name="_ekskulId" id="_ekskulId">
                <input type="hidden" name="_method" value="put">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Ekskul</button>
            </div>
        </form>
      </div>
    </div>
</div>

@endsection

@section('script')
<script>
    function showPreview(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("image");
            preview.src = src;
            preview.style.display = "block";
        }
    }

    function showModaledit(event){
        const tahun = document.getElementById('updateTahun');
        const nama = document.getElementById('updateNama');
        const _ekskulId = document.getElementById('_ekskulId');
        let data = event.target.attributes;

        tahun.setAttribute('value', data['data-tahun'].value);
        nama.setAttribute('value', data['data-nama'].value);
        _ekskulId.setAttribute('value', data['data-id'].value);

        $('#updateEkskul').modal('toggle')
    }
</script>
@endsection
