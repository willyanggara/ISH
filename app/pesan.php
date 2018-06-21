<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesan extends Model
{
    protected $fillable = ['name','email','messages'];
    protected $table = 'pesans';
}
