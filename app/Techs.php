<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class techs extends Model
{
    protected $table = 'techs';

    protected $fillable = ['title_techs', 'image_techs'];
}
