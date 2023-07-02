<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tatuador extends Model
{
    use HasFactory;

    protected $table = 'tatuadores';
    protected $fillable = ['nombres', 'dni', 'estado'];
}
