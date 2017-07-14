<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = ['name','city','state','logo','description','active','website','email_domain'];
}
