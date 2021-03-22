<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('theme');
            $table->string('orientation');
            $table->string('title')->nullable();
            $table->string('logo')->nullable();
            $table->string('serial_key')->nullable();
            $table->string('seeder')->nullable();
            $table->string('module_photoalbums')->nullable();
            $table->string('module_videoalbums')->nullable();
            $table->string('module_news')->nullable();
            $table->string('module_routes')->nullable();
            $table->string('module_reviews')->nullable();
            $table->string('module_banner_one')->nullable();
            $table->string('module_banner_two')->nullable();
            $table->string('module_banner_three')->nullable();
            $table->string('module_vtour')->nullable();
            $table->string('module_vi')->nullable();
            $table->string('module_email')->nullable();
            $table->string('module_printer')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
