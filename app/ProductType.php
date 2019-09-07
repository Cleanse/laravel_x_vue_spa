<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'notes',
        'active'
    ];

    /**
     * Get the pType's image.
     */
    public function images()
    {
        return $this->morphMany('App\FileUpload', 'fileable');
    }
}
