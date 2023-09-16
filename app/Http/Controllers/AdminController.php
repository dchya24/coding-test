<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index() {
        $siswa = Siswa::count();
        $siswaLaki = Siswa::where('gender', 0)->count();
        $siswaPerempuan = Siswa::where('gender', 1)->count();

        return view('dashboard', [
            "siswa" => $siswa,
            "siswa_laki" => $siswaLaki,
            "siswa_perempuan" => $siswaPerempuan,
        ]);
    }

    public function show(){
        $user = Auth::user();

        return view('admin-profile',['user' => $user]);
    }

    public function edit(UpdateAdminRequest $request){
        $user = User::find(Auth::user()->id);

        $birthDate = date('Y-m-d', strtotime($request->tgl_lahir));
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->birth_date = $birthDate;
        $user->gender = $request->jenisKelamin;

        $user->save();

        return redirect()->back()->with(
            'status',
            [
                "status" =>  "success",
                "message" => "Data Berhasil Diubah"
            ]
        );
    }

    public function changePassword(ChangePasswordRequest $request){
        $auth = Auth::user();
        $user = User::find($auth->id);

        $password = $request->password;
        $hashPassword = bcrypt($password);

        $user->password = $hashPassword;
        $user->save();

        return redirect()->back()->with(
            'status',
            [
                "status" =>  "success",
                "message" => "Password Berhasil Diubah"
            ]
        );
    }
}
