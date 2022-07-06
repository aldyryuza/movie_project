<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movieModel extends Model
{
    use HasFactory;

    protected $table = 'movie';
    protected $guarded = ['id'];
}
