<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactEmails extends Model
{
    public function contact()
    {
        return $this->belongsTo('App\Contacts');
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email','contacts_id'
    ];
    //
}
