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
     * Get the ProductType's featured image.
     */
    public function featured()
    {
        return $this->morphOne('App\FileUpload', 'fileable');
    }

    public function products()
    {
        return $this->hasMany('App\Product')->where('active', 1);
    }

    public function variants()
    {
        return $this->hasMany('App\Variant')->where('active', 1);
    }
}
