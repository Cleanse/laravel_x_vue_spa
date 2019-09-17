<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintableTemplate extends Model
{
    protected $table = 'templates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'active'
    ];

    public function image()
    {
        return $this->morphOne('App\FileUpload', 'fileable');
    }
}
