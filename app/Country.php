<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts()
    {
        // 'App\User' is the intermediate table that has both User ID and Country ID
        return $this->hasManyThrough('App\Post', 'App\User');


        //return $this->hasManyThrough('App\User', 'App\Post');
        // The above statement resulted in error and showed the following SQL:
        //(SQL: select `users`.*, `posts`.`country_id` from `users`
        // inner join `posts` on `posts`.`id` = `users`.`post_id`
        // where `posts`.`deleted_at` is null and `posts`.`country_id` = 4)
        // It tells that, Laravel is trying to find country_id in 2nd table (posts).

        // In case the names of the ID columns are diff. than the default, those must be
        // mentioned as well, as follows:
        //return $this->hasManyThrough('App\Post', 'App\User', 'the_country_id', 'the_user_id');
    }
}
