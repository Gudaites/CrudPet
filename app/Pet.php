<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pet extends Model
{
    protected $fillable = [
        'nome', 'especie',
    ];

    public function atendimentos()
    {
        return $this->hasMany('App\Atendimento');
    }
}
