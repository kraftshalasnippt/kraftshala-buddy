<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    protected $fillable = ['name','college','year_of_graduation','mobile','mobile_verified','email','email_verfied','password','verified','verification_timestamp','student','alumni','id_card','description'];
}
