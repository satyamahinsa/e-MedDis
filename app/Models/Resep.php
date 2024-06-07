<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_antrian',
        'tanggal_lahir_pasien',
    ];

    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'obat_resep');
    }
}
