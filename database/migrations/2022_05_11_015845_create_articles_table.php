<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('short_description');
            $table->longText('description');
            $table->string('slug');
            $table->integer('category_id');
            $table->integer('created_by');
            $table->string('main_image');
            $table->string('thumb_image');
            $table->string('list_image');
            $table->integer('view_count');
            $table->integer ('hot_news');
            $table->integer('status');
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
        Schema::dropIfExists('articles');
    }
};
