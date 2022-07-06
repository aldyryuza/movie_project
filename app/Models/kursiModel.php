<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kursiModel extends Model
{
    use HasFactory;
    protected $table = 'audi_seat';
    protected $guarded = ['id'];

    public function studioModel()
    {
        return $this->belongsToMany(studioModel::class, 'id');
    }

    public function showModel()
    {
        return $this->hasMany(showMOdel::class, 'id_audi');
    }
}
