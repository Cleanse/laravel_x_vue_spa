<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\FileUpload;

class FileUploadsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
}
