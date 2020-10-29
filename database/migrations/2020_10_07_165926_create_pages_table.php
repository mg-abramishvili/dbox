<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_type');
            $table->string('title');
            $table->text('text')->nullable();
            $table->text('text_second')->nullable();
            $table->string('image');
            $table->string('image_color')->default('#F76325');
            $table->string('image_second')->nullable();
            $table->string('image_third')->nullable();
            $table->string('video')->nullable();
            $table->longtext('gallery')->nullable();
            $table->string('parent_id')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
