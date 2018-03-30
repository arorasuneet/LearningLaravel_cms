<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function post(){
        return $this->hasOne('App\Post');
        // will look for User_id column in the Posts table by default.
        // if you want ot change the default column name, do it as follows:

        // Here 'the_user_id' is the column name that replaced the default column user_id.
        // return $this->hasOne('App\Post', 'the_user_id');

        // return $this->hasOne('App\Post', 'the_user_id' ,'user_table_id');
        // The third parameter above ('user_table_id') is to override the default ID column.
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role')->withPivot('created_at', 'updated_at');
        // It would look for roles table

        // We can specify table name and column names, if they are different
        // from the convention, as follows:
        // return $this->belongsToMany('App\Role', 'users_roles', 'user_id', 'role_id');
    }

    // The following method also exists in Post.php model.
    // Find public function imageable() in Photo.php
    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }


    // working with Accessors to pull data from the database.
    // check the getname route URI in routes.php
    // the name of this method should have get<fieldname>Attribute in camel case.
    // where <fieldname> is the name that is being fetched (echo $user->name) in the getname.
    public function getNameAttribute($value)
    {
        // can try any string manipulation on the $value
        //return ucfirst($value);
        return strtoupper($value);
    }


    // This function is a Mutator: used to manipulate data before saving to the database.
    // check the setname in routes.php
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

}
