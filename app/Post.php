<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    public $directory = '/images/';

    //Commented to fix the error:
    //ErrorException in Builder.php line 1185:
    //count(): Parameter must be an array or an object that implements Countable
    //use SoftDeletes;

    protected $dates = ['deleted_at']; //Modified Property of Model extended above.

    // In Laravel, it is assumed that there is a table with the name
    // posts (class name in small letters with 's'), and it has a field
    // by the name 'id'.  So, all the operations take place on the 'posts'
    // table by default.
    // We can, however, change the defaults as below:

//    protected $table = 'posts';
//    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
        'path'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // The following method also exists in User.php model.
    // Find public function imageable() in Photo.php
    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    // declaring accessor to be used while fetching images from the database
    // in index.blade.php
    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }

}