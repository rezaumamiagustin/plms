<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTugas extends Model
{
    use HasFactory;
    protected $table = "nilai_tugas";
    protected $fillable = ['file','url','nilai','pengumpulan', 'jamPengumpulan'];

}
