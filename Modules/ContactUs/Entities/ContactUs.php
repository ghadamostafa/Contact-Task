<?php

namespace Modules\ContactUs\Entities;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = ['name','email','message'];
}
