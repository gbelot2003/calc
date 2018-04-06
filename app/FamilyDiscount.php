<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyDiscount extends Model
{
    /**
     * Mass Assaing
     * @var array
     */
    protected $fillable = ['name', 'price'];

}
