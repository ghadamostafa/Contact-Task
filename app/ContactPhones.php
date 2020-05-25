<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPhones extends Model
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
        'phone', 'contacts_id'
    ];
    //
}
