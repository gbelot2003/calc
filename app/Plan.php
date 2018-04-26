<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * Mass Assaing
     * @var array
     */
    protected $fillable = ['title', 'discounttext', 'porcent', 'porcentext', 'context', 'show'];

}
