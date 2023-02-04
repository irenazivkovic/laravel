<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rezervacija;

class Klijent extends Model
{
    use HasFactory;
    public function rezervacije()
    {
        return $this->hasMany(Rezervacija::class);
    }
}
