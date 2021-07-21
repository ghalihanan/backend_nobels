<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class connects extends Model
{
    protected $table = 'connects';
    protected $fillable = ['user_name', 'user_email', 'message'];
}
