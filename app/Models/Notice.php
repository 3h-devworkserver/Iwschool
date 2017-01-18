<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //
     protected $table = 'notices';

    protected $fillable = ['title','excerpt','content','n_date','notice_order','image','slug','created_at', 'updated_at'];

}
