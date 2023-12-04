<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tester extends Model
{
    use HasFactory;
    protected $table = 'hasil_klasifikasi';
    protected $primaryKey = 'id';
    protected $fillable = ['id_data_balita', 'hasil'];

    public function dataBalita(): BelongsTo
    {
        return $this->belongsTo(DataBalita::class, 'id_data_balita');
    }
}
