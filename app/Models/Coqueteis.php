<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coqueteis extends Model
{
    // use HasFactory;
    protected $table        = "coqueteis";
    protected $fillable     = ["coquetel"];
}
