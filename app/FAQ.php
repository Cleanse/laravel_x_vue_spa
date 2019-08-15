<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subj',
        'answer',
        'active'
    ];
}
