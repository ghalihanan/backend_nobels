<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    protected $table = 'projects';

    protected $fillable = ['title_projects', 'desc_projects', 'image_projects'];
}
