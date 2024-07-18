<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;
    protected $fillable = [
        'Lokasi',
    ];

    // Define the many-to-many relationship with Obat
    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'mesin_obat');
    }
}
