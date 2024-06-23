<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    // Specify the fillable fields
    protected $fillable = [
        'JenisObat',
        'NamaObat',
    ];

    public function mesins()
    {
        return $this->belongsToMany(Mesin::class, 'mesin_obat');
    }

    // Define the many-to-many relationship with Resep
    public function reseps()
    {
        return $this->belongsToMany(Resep::class, 'obat_reseps')->withPivot('jumlah')->withTimestamps();
    }
}
