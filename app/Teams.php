<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teams extends Model
{
    protected $table = 'teams';

    protected $fillable = ['name_teams', 'email_teams', 'position_teams', 'image_teams'];
}
