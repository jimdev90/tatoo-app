<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cita extends Model
{
    use HasFactory;
    protected $table = 'citas';

    protected $fillable = [
        'id_user',
        'dni',
        'fecha',
        'celular',
        'hora',
        'horatermina',
        'tatuador_id',
        'estado',
    ];

    public function tatuador(): BelongsTo
    {
        return $this->belongsTo(Tatuador::class, 'tatuador_id', 'id')->withDefault([
            'nombres', 'dni'
        ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
