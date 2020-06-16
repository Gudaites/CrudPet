<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Atendimento extends Model
{
    protected $fillable = [
        'descricao', 'data_atendimento'
    ];

    public function Pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
