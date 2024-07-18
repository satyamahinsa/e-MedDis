<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatResep extends Model
{
    use HasFactory;

    protected $table = 'obat_reseps';
    protected $fillable = [
        'obat_id',
        'resep_id',
        'jumlah',
    ];


}
