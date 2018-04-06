<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
    /**
     * Mass Assing protection
     * @var array
     */
    protected $fillable = [
        'grade_id', 'name', 'last', 'has_bros', 'bros', 'parent_name', 'parent_last',
        'phone', 'phone_aditional', 'email', 'question'
    ];

    /**
     * @var array
     */
    protected $casts = ['field' => 'boolean'];

    /**
     * Grade Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

}
