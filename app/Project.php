<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use \Astrotomic\Translatable\Translatable;
    public $translatedAttributes = ['name'];
    protected $fillable = ['image','order','url'];
}
