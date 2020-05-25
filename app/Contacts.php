<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    public function emails()
    {
        return $this->hasMany('App\ContactEmails');
    }
    public function phones()
    {
        return $this->hasMany('App\ContactPhones');
    }
    public function addresses()
    {
        return $this->hasMany('App\ContactAddresses');
    }
    //
}
