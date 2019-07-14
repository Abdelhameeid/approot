<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     use \Astrotomic\Translatable\Translatable;
    public $translatedAttributes = ['name','desc'];
    protected $fillable = ['image','order'];
    
}

