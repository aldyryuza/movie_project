<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studioModel extends Model
{
    use HasFactory;
    protected $table = 'audi';
    protected $guarded = ['id'];

    public function kursiModel()
    {
        return $this->belongsToMany(kursiModel::class, 'id_audi');
    }

    public function showModel()
    {
        return $this->hasMany(showMOdel::class, 'id_audi');
    }
}
