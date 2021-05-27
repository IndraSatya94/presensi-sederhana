<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wakilbupati extends Model
{
    protected $table='wakilbupati';
    use HasFactory;

    protected $fillable = [
        'nama','body','image'
    ];
}
