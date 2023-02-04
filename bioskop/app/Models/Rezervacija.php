<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Film;
use App\Models\Klijent;

class Rezervacija extends Model
{
    use HasFactory;
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function klijent()
    {
        return $this->belongsTo(Klijent::class);
    }
}
