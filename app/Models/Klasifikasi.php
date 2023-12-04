<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;
    protected $table = 'data_testing';
    protected $fillable = [
        'nama', 'jk', 'umur', 'berat_badan', 'tinggi_badan', 'status'
    ];

    public function getjkAttribute($value)
    {
        return $value == 'L' ? 'Laki-Laki' : 'Perempuan';
    }
}
