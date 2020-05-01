<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = [ 'file' ];

    public $directory = "/images/";

    //accessor to modify file path
    public function getFileAttribute($photo){
      return $this->directory . $photo;
    }

}
