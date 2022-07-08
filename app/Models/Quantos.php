<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantos extends Model
{
    // use HasFactory;
    protected $table        = "quantos";
    protected $fillable     = ["quantidade", "id_quantos_coqueteis"];
}
