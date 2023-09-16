<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    protected $table = 'ekskul';
    use HasFactory;

    protected $fillable = ['siswa_id', 'nama', 'tahun'];

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
