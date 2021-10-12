<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); //auto-incrementing primary key will be created.
//          $table->integer('user_id')->unsigned()->index(); // index - for speed inside the database
            $table->foreignId('user_id')->constrained()->onDelete('cascade');//foreign key constrained to here
            $table->text('body');
            $table->timestamps(); //created_at and updated_at

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
