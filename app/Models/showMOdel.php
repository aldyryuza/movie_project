<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class showMOdel extends Model
{
    use HasFactory;

    protected $table = 'show';
    protected $guarded = ['id'];

    public function studio()
    {
        return $this->belongsTo(studioModel::class, 'id');
    }
    public function movie()
    {
        return $this->belongsTo(movieModel::class, 'id');
    }
}
