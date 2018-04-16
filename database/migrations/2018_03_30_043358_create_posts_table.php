<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->char('title',150)->nullable();
            $table->text('content')->nullable();
            $table->mediumtext('description')->nullable();
            $table->mediumtext('feture')->nullable();
            $table->char('slug',255)->nullable();
            $table->char('post_type',255)->nullable();
            $table->integer('view')->default(0);
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->smallInteger('status')->nullable();
            $table->smallInteger('hot')->nullable();
            $table->timestamps();
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
