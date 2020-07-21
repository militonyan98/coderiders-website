<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('page_title');
            $table->string('page_description');
            $table->string('banner_title');
            $table->string('banner_text');
            $table->string('banner_slug');
            $table->string('banner_slug_text');
            $table->string('title');
            $table->string('slug');
            $table->string('content');
            $table->boolean('publish_status')->default(0);
            $table->boolean('trending_status')->default(0);
            $table->boolean('main_status')->default(0);
            $table->string('image');
            $table->string('image_title');
            $table->string('image_alt');
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
        Schema::dropIfExists('blogs');
    }
}
