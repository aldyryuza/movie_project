<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class showSeatModel extends Model
{
    use HasFactory;
    protected $table = 'show_seat';
    protected $guarded = [];

    public function seatAudi()
    {
        return $this->belongsTo(kursiModel::class, 'id');
    }
    // public function show()
    // {
    //     return $this->hasMany(showMOdel::class, 'id_show');
    // }
}
