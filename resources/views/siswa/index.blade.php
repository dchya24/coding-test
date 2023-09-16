@extends('template.app')
@section('title', 'Siswa')
@section('content')
  <div class="row">
    <div class="col-md-4">
        <h6 class="mt-2 font-weight-bold">Daftar Siswa</h6>
    </div>
  </div>
  @if (session('status'))
        <div class="alert alert-{{session('status')['status']}} alert-dismissible fade show" role="alert">
            {{session('status')['message']}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
  <hr>
  <div class="row">
    <div class="col-sm-12">
        <a href="{{route('siswa.add')}}" class="btn btn-success mb-3">
            <i class="fas fa-plus"></i>
            Tambah Data Siswa
        </a>
        <table id="siswa" class="table table-stripped">
            <thead>
                <tr>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Nomor Induk Siswa</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
  </div>
@endsection

@section('script')
<script>
    new DataTable('#siswa', {
        ajax: 'api/siswa',
        dataSrc: 'data',
        columns: [
            {data: 'first_name'},
            {data: 'last_name'},
            {data: 'nis'},
            {
                data_name: "gender",
                data: null,
                render: function ( data, type, row, meta ) {
                    let gender = ["Laki-Laki", "Perempuan"]
                    return gender[data['gender']]
                }
            },
            {data: 'alamat'},
            {
                data: null,
                orderable: false,
                data_name: "name",
                render: function ( data, type, row, meta ) {
                    return `<a
                                class='btn btn-sm btn-outline-success'
                                href='{{url('siswa/detail')}}/${data["id"]}'
                            >
                                <i class="fas fa-address-card"></i>
                            </a>
                            <a
                                class='btn btn-sm btn-outline-danger'
                                href='{{url('siswa/delete')}}/${data["id"]}'
                            >
                                <i class="fas fa-trash"></i>
                            </a>
                        `
                }
            }
    ]
    });
</script>
@endsection
