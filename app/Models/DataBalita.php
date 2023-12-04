<?php

namespace App\Models;

use App\Enum\DataBalita\JKEnum;
use Illuminate\Contracts\Eloquent\Cast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PHPUnit\Framework\Test;

class DataBalita extends Model
{
    use HasFactory;
    protected $table = 'data_balita';
    //protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nama', 'jk', 'umur', 'berat_badan', 'tinggi_badan', 'status'
    ];

    public function getjkAttribute($value)
    {
        return $value == 'L' ? 'Laki-Laki' : 'Perempuan';
    }

    public function tester(): HasMany
    {
        return $this->hasMany(Tester::class, 'id_data_balita');
    }
}
