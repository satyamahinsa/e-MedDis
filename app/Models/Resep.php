<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_antrian',
        'nik',
    ];

    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'obat_reseps')->withPivot('jumlah')->withTimestamps();
    }
}
