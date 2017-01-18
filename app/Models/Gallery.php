<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
     protected $table = 'gallery';

    protected $fillable = ['id','title','caption','images','slug','created_at', 'updated_at'];

}
