<?php

namespace App\Http\Controllers;

use App\Http\Requests\Siswa\StoreSiswaRequest;
use App\Http\Requests\Siswa\UpdateSiswaRequest;
use App\Models\Siswa;
use App\Service\ImageService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request)
    {
        try{
            $foto = $request->file('profileImage');

            $upload = ImageService::upload($foto, "profile", "profile_");

            $data = [
                "first_name" => $request->firstName,
                "last_name" => $request->lastName,
                "no_telp" => $request->noTelp,
                "nis" => $request->nis,
                "alamat" =>$request->alamat,
                "gender" => $request->jenisKelamin,
                "foto" => $upload['filename']
            ];

            $siswa = Siswa::create($data);

            return redirect()->back()->with(
                'status',
                [
                    "status" =>  "success",
                    "message" => "Data Berhasil Ditambah"
                ]
            );
        }
        catch(Exception $e){
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Siswa::with('ekskul')->where('id', $id)->first();

        return view("siswa.detail", [ "data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, string $id)
    {
        $siswa = Siswa::find($id);

        $siswa->first_name = $request->firstName;
        $siswa->last_name = $request->lastName;
        $siswa->no_telp = $request->noTelp;
        $siswa->nis = $request->nis;
        $siswa->gender = $request->jenisKelamin;
        $siswa->alamat = $request->alamat;

        if($request->hasFile('profileImage')){
            $foto = $request->file('profileImage');
            $upload = ImageService::upload($foto, "profile", "profile_");

            if($siswa->foto){
                ImageService::delete(join("/", ['profile', $siswa->foto]));
            }

            $siswa->foto = $upload['filename'];
        }

        $siswa->save();

        if(!$siswa){
            return redirect()->back()->with(
                'status',
                [
                    "status" =>  "danger",
                    "message" => "Data Gagal Diubah"
                ]
            );
        }

        return redirect()->back()->with(
            'status',
            [
                "status" =>  "success",
                "message" => "Data Berhasil Diubah"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Siswa::destroy($id);

        return redirect()->back()->with(
            'status',
            [
                "status" =>  "success",
                "message" => "Data Berhasil Dihapus"
            ]
        );
    }
    /**
     * Get List of Siswa Via API
     */
    function getApiSiswa(){
        $data = Siswa::all();

        return response()->json(['data' => $data]);
    }
}
