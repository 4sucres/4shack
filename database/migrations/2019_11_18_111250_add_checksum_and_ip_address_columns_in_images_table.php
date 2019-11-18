<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChecksumAndIpAddressColumnsInImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->string('user_agent')
                ->after('size')
                ->nullable();

            $table->string('ip_address')
                ->after('size')
                ->nullable();

            $table->string('checksum', 32)
                ->after('size')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('checksum');
            $table->dropColumn('ip_address');
            $table->dropColumn('user_agent');
        });
    }
}
