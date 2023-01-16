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
        Schema::table('products', function (Blueprint $table) {
            $table->text('image_use')->nullable()->after('image');
            $table->text('image_content')->nullable()->after('image_use');
            $table->text('image_ingredient')->nullable()->after('image_use');
            $table->text('price_new')->nullable()->after('image_ingredient');
            $table->text('sell_number')->nullable()->after('price_new');
            $table->text('content_using')->nullable()->after('content');
            $table->text('ingredient')->nullable()->after('content_using');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
