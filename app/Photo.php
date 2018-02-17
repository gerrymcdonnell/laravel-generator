<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //allow these fields to be mass-aligned
    //https://laracasts.com/discuss/channels/general-discussion/model-mass-assignment
    protected $fillable = [
        'title',
        'photo',
        'size',
        'description'
    ];

    //upload folder
    public $dir="/storage/photos/";

    //save photos to users own folder
    public function getPathAttribute(){
        $user_id=auth()->user()->id;
        return $this->dir.$user_id."/{$this->photo}";
    }

    //belongs to user
    public function user(){
        return $this->belongsTo('App\User');
    }
}
