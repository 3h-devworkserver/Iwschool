<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $table = 'sliders';

    protected $fillable = ['sliderid','title','caption','link','image','videolink','created_at', 'updated_at'];

}
