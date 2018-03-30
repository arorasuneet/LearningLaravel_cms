<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('imageable_id'); //User_Id for example
            $table->string('imageable_type'); //App\User for example
            $table->timestamps();
            //user_id in the posts table (2018_03_04_142237_create_posts_table.php)
            // has been commented / removed, for the purpose of having / learning
            // Polymorphic relationships.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photos');
    }
}
