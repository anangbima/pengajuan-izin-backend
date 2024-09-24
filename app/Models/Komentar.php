<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'izin_id',
        'isi',
    ];

    public function izin () {
        return $this->belongsTo(Izin::class);
    }
}
