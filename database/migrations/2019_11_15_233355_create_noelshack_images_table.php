<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoelshackImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noelshack_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->bigInteger('risibank_id')->nullable(); // If imported from the RisiBank
            $table->string('risibank_cache_url')->nullable(); // If imported from the RisiBank
            $table->bigInteger('image_id')->nullable();
            $table->timestamp('uploaded_at')->nullable();
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
        Schema::dropIfExists('noelshack_images');
    }
}
