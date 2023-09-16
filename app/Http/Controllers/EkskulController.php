<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ekskul\StoreEkskulRequest;
use App\Http\Requests\Ekskul\UpdateEkskulRequest;
use App\Models\Ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function store(StoreEkskulRequest $request){
        $data = $request->except(['_token', '_siswaId']);
        $data['siswa_id'] = $request->_siswaId;

        $ekskul = Ekskul::create($data);

        return redirect()->back()->with(
            'status',
            [
                "status" =>  "success",
                "message" => "Data Berhasil Ditambah"
            ]
        );
    }

    public function update(UpdateEkskulRequest $request){
        $data = $request->except(['token', 'method']);

        $ekskul = Ekskul::find($data['_ekskulId']);

        $ekskul->nama = $data['nama'];
        $ekskul->tahun = $data['tahun'];

        $ekskul->save();

        return redirect()->back()->with(
            'status',
            [
                "status" =>  "success",
                "message" => "Data Berhasil Diubah"
            ]
        );
    }

    public function destroy($id){
        $deleted = Ekskul::destroy($id);

        return redirect()->back()->with(
            'status',
            [
                "status" =>  "success",
                "message" => "Data Berhasil Dihapus"
            ]
        );
    }
}
