<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $fillable = [
        'filename',
        'mime',
        'path',
        'size',
        'fileable_id',
        'fileable_type'
    ];

    /**
     * Get the owning fileable model.
     */
    public function fileable()
    {
        return $this->morphTo();
    }
}
