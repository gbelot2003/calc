<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuraciones extends Model
{
    /**
     * Mass Assing protection
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
