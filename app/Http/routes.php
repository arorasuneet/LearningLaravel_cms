<?php

use Carbon\Carbon;
use App\Country;
use App\Photo;
use App\Post;
use App\Tag;
use App\User; // importing app/posts.php model
use App\Role;
use App\Video;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//
//
//Route::get('/about', function () {
//    return "Hi! I will tell about myself.";
//});
//
//
//Route::get('/contact', function () {
//    return "Hi!  I am your contact.";
//});
//
//Route::get('/post/{id}/{name}', function($id, $name){
//    return "This is post number " . $id . " " . $name;
//});
//

//Route::get('/admin/posts/example', array('as' => 'admineg', function(){
//
//    $url = route('admineg');
//
//    return $url;
//
//}));

//Route::get('/post/{id}', 'PostsController@index');

//Route::resource('posts', 'PostsController');

//Route::get('/contact', 'PostsController@contact');

//Route::Get('/post/{id}/{topic}/{location}', 'PostsController@show_post');

//|--------------------------------------------------------------------------
//| Database Raw SQL Queries
//|--------------------------------------------------------------------------


//Route::get('/insert', function(){
//
//    DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel', 'Laravel is the best thing that has happened to PHP!']);
//
//});

//Route::get('/read', function() {
//
//    $result = DB::select('select * from posts where id = ?', [1]);
//
//    //return var_dump($result);
//    return $result;
//
////    foreach ($result as $field)
////        return $field->title;
//
//});

//Route::get('/update', function(){
//
//    $updated = DB::update('update posts set title = "Updated Title" where id = ?', [1]);
//
//    return $updated;
//});

//Route::get('/delete', function(){
//
//    $deleted = DB::delete('delete from posts where id = ?', [1]);
//
//    return $deleted;
//
//});

/*
|--------------------------------------------------------------------------
| ELOQUENT - ORM (OBJECT RELATIONAL MODEL)
|--------------------------------------------------------------------------
*/

//Route::get('/read', function(){
//   $result = Post::all();
//
//   foreach ($result as $record)
//   {
//       return $record->title;
//   }
//
//   return NULL;
//});

//Route::get('/find', function(){
//
//    $result = Post::find(2);
//
//    return $result->title;
//
//});

//Route::get('/findwhere', function(){
//   $result = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();
//   return $result;
//});

//Route::get('/findmore', function(){
//
////    $result = Post::findOrFail(21);
//
//    $result = Post::where('id', '>', 1)->firstOrFail();
//
//    return $result;
//
//});

//// Insert using Model.
//Route::get('/basicinsert', function(){
//
//    $post = new Post;
//
//    $post->title = "Basic Insert using Model";
//    $post->content = "This record has been inserted using Model instaed of raw SQL.  Eloquent is cool!";
//
//    $post->save(); // Automatically inserts values to created_at and updated_at columns.
//
//});

// Update using Model.
//Route::get('/update', function(){
//
//    $post = Post::find(4); //Find the record with ID = 4.
//
//    $post->title = "Basic Insert using Model 2";
//    $post->content = "Now, this record has been updated using Model instaed of raw SQL.  Eloquent is cool!";
//
//    $post->save(); // Automatically inserts values to created_at and updated_at columns.
//
//});

// The following function considers this as mass insert (insert in multiple fields),
// which is not allowed otherwise! So, we need to write $fillable in our Post model (Post.php).
// Ref: https://laravel.com/docs/5.2/eloquent#mass-assignment
//Route::get('/insert', function(){
//    Post::create(['title'=>'The Create method', 'content'=>'Wow!  I\'m learning a lot with Edwin Diaz.']);
//    });

//Route::get('/update', function(){
//   Post::where('id', 5)->where('is_admin', 0)->update(['title'=>'Title Updated', 'content'=>'The new content that replaced the old one.']);
//});

//Route::get('/delete', function(){
//   $post = Post::find(6);
//
//   $post->delete();
//});

//Route::get('/delete2', function(){
//    // Post::destroy(2); // Deletes one record.
//    // Post::where('id', 6)->where('is_admin', 0)->delete(); // Deletes using where condition(s).
//
//    Post::destroy([3,5]); // Deleted multiple records.
//});


// For soft delete, we just need to add in Post.php - use SoftDeletes;
// The normal delete method will just mark the row as deleted (using deleted_at column),
// but not delete physically.
//Route::get('/softdelete', function(){
//
//    Post::find(2)->delete();
//
//});

//Route::get('/readsoftdelete', function(){
//   // $post = Post::onlyTrashed()->where('id', 1)->get(); //fetches deleted records with condition
//   // $post = Post::onlyTrashed()->get(); //fetched only deleted records
//    $post = Post::withTrashed()->get(); //fetches all records.
//
//   return $post;
//});

//Route::get('/restore', function(){
//   Post::onlyTrashed()->restore();
//});

//Route::get('/deleteforever', function(){
//    Post::onlyTrashed()->forcedelete();
//});

/*
|--------------------------------------------------------------------------
| ELOQUENT Relationships (1-1, 1-many, many-1, many-many, etc.)
|--------------------------------------------------------------------------
*/


//1-1 relationship
//Route::get('/user/{id}/post', function($id){
////    return User::find($id)->post->title;
//    return User::find($id)->post;
//});

//The inverse relation: Get the User from the Post, instead of Posts of a User
//Route::get('post/{id}/user', function($id){
//    return Post::find(1)->user->name;
////    return Post::find(1)->user;
//});

//1-Many relationship
//Route::get('/posts', function(){
//    $user = User::find(1);
//
//    foreach($user->posts as $post)
//    {
//        echo $post->title . "<br>";
//    }
//});

//Route::get('/user/{id}/role', function($id){
//
//    // Get full row
//    $user = User::find($id)->roles()->orderBy('name', 'desc')->get();
//    echo $user . "<br><br>";
//
//
//    // Get only role name
//    $user = User::find($id);
//
//    foreach($user->roles as $role)
//    {
//        return $role->name;
//    }
//
//});

// Accessing the intermediate table or Pivot
//Route::get('/user/pivot', function(){
//
//    $user = User::find(1);
//
//    foreach($user->roles as $role)
//    {
//        // To access any column other than user_id and role_id, we have to
//        // specify it in the Model (User.php), using the withPivot method.
//        echo $role->pivot->created_at;
//
//        //echo $role->pivot;
//    }
//
//});
//
//// Fetch the post of the user from a specific country.
//Route::get('/user/country', function(){
//
//    // find() finds the country_id in countries table by default.
//    $country = Country::find(4); //4 is India, for Suneet Arora.
//
//    echo "<ul>";
//    foreach ($country->posts as $post)
//    {
//        echo "<li>" . $post->title . "</li>";
//    }
//    echo "<ul>";
//
//});

// Checking if find works without writing anything in the Model (Country.php). It works.
//Route::get('/countries', function()
//{
//   $country = Country::find(4);
//
//   return $country;
//});
//
//Route::get('/user/photos', function(){
//
//    $user = User::find(1);
//
//    foreach($user->photos as $photo)
//    {
//        return $photo;
//    }
//
//});

//Route::get('/post/photos', function(){
//
//    $post = Post::find(1);
//
//    foreach($post->photos as $photo)
//    {
//        return $photo;
//    }
//
//});

//Route::get('/photo/{id}/post', function($id){
//
//    $photo = Photo::findOrFail($id);
//
//    // Returns the record of either User or Post, depending on who owns the Photo record,
//    // or whose Model is mentioned in the imageable_type field in the 'photos' table.
//    return $photo->imageable;
//
//});

// Polymorphic Many-Many
//Route::get('/get_tag', function(){
//
////   $post = Post::find(1);
////
////   foreach($post->tags as $tag)
////   {
////       echo $tag->name;
////   }
//    $video = Video::find(1);
//
//    foreach($video->tags as $video)
//    {
//        echo $video->name;
//    }
//
//});

//Route::get('/tag/post', function(){
//
//    $tag = Tag::find(1);
//
//    foreach($tag->videos as $video)
//    {
//        echo $video->name;
//    }
//
//    echo "<br>";
//
//    $tag = Tag::find(2);
//
//    foreach($tag->posts as $post)
//    {
//        echo $post->title;
//    }
//
//});

/*
|--------------------------------------------------------------------------
| CRUD Application
|--------------------------------------------------------------------------
*/


// NO NEED TO CREATE GROUPS IN this version of Laravel, I think!
//Route::group(['middleware'=>'web'], function()
//{
//    // Enclosing Routes in the middleward, web group makes $errors array available
//
//    Route::resource('/posts', 'PostsController');
//});

Route::resource('/posts', 'PostsController');

// working with dates using Carbon
Route::get('/dates', function()
{
    $date = new DateTime();

    echo $date->format('d-m-Y');

    echo "<br><br>";
    echo Carbon::now();

    echo "<br><br>";
    echo Carbon::now()->diffForHumans();

    echo "<br><br>";
    echo Carbon::now()->addDays(3.8)->diffForHumans();

    echo "<br><br>";
    echo Carbon::now()->subHours(3)->diffForHumans();
});


// using Accessors - Used to pull data from the database
// created the Accessor method 'getNameAttribute' in the User.php model.
Route::get('/getname', function(){

    $user = User::findOrFail(1);

    echo $user->name;

});


// using Mutators, used to manipulate data before saving into the database.
// created the Accessor method 'setNameAttribute' in the User.php model.
Route::get('/setname', function(){

    $user = User::findOrFail(1);

    $user->name = 'william'; // will be converted to uppercase using the setNameAttribute in routes.php

    $user->save();

});

