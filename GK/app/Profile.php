<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'age' => 'required',
        'attribute' => 'required',
        'address' => 'required',
    );
    //
}
