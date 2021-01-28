<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $fillable = ['firstname', 'lastname', 'email', 'phoneno', 'address', 'image'];
}
