<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    use HasFactory;

    protected $fillable = [
        "first_name",
        "last_name",
        "no_telp",
        "nis",
        "alamat",
        "gender",
        "foto"
    ];

    public function ekskul(){
        return $this->hasMany(Ekskul::class, "siswa_id");
    }
}
