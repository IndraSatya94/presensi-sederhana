<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekda extends Model
{
    protected $table='sekda';
    use HasFactory;

    protected $fillable = [
        'nama','body','image'
    ];
}
