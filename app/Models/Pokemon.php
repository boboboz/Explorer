<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = [
        'no_id', 'name', 'name_en','type1',
    ];

    public function type1()
    {
        return $this->hasOne('App\Models\PokemonType', 'id', 'type1');
        // return '1111';
    }
}
