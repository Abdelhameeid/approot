<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
     public $timestamps = false;
    protected $fillable = ['name','desc'];
}
