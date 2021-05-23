<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
    protected $table = 'visimisi';
    use HasFactory;
  
    protected $fillable = [
        'nama', 'body', 'image'
    ];
}
