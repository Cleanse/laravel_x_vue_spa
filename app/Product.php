<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_type_id',
        'name',
        'side_one_max',
        'side_two_max',
        'description',
        'notes',
        'active'
    ];

    /**
     * Get the Product's featured image.
     */
    public function featured()
    {
        return $this->morphOne('App\FileUpload', 'fileable');
    }

    //Look to toggling active or not, might need to make two belongsTo methods.
    public function category()
    {
        return $this->belongsTo('App\ProductType', 'product_type_id');
    }
}
