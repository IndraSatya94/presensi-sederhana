<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pimpinan extends Model
{
    protected $table = 'pimpinan';
    use HasFactory;

    protected $fillable = [
        'nama','jabatan','image','linkedin','twitter','facebook','instagram'
    ];
}
