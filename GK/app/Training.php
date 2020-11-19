<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $guarded = array('id');
    //
    public static $rules = array(
        'title' => 'required',
        'genre' => 'required',
        'number' => 'required',
        'difficulty' => 'required',
        'step' => 'required',
        'author' => 'required',
    );
    
     public function histories()
    {
      return $this->hasMany('App\History');

    }
}
