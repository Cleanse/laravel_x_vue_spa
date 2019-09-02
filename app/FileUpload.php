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
        'attachment_id',
        'attachment_type'
    ];
}
