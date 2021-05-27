<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    protected $table = 'sejarah';
    use HasFactory;

    protected $fillable = [
        'nama','image','body','tentang','detail'
    ];
}
