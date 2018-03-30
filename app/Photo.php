<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    // Find public function photos() in both Post.php and User.php models
    public function imageable()
    {
        return $this->morphTo();
    }
}
