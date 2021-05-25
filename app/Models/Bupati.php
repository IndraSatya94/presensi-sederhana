<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bupati extends Model
{
    protected $table='bupati';
    use HasFactory;

    protected $fillable = [
        'nama','body','image'
    ];
}
