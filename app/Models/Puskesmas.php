<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    protected $table = 'puskesmas';
    use HasFactory;

    protected $fillable = [
        'nama', 'alamat',
    ];
}
