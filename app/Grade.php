<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    /**
     * Mass Assaing
     * @var array
     */
    protected $fillable = ['name', 'price'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customs()
    {
        return $this->hasMany(Custom::class, 'grade_id', 'id');
    }

    /**
     * @return mixed
     */
    public function t_value()
    {
        return $this->price;
    }

}
