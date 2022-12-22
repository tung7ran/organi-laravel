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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('slug')->nullable();
            $table->text('desc')->nullable();
            $table->text('content')->nullable();
            $table->text('image')->nullable();
            $table->text('type')->nullable();
            $table->integer('hot')->nullable();
            $table->integer('status')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
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
};
