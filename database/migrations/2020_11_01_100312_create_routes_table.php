<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('scheme_id');
            $table->string('scheme2_id')->nullable();
            $table->string('t_1_begin')->nullable();
            $table->string('t_1_end')->nullable();
            $table->string('t_2_begin')->nullable();
            $table->string('t_2_end')->nullable();
            $table->string('x_01', 4)->nullable();
            $table->string('y_01', 4)->nullable();
            $table->string('p_x_01', 4)->nullable();
            $table->string('p_y_01', 4)->nullable();
            $table->string('x_02', 4)->nullable();
            $table->string('y_02', 4)->nullable();
            $table->string('p_x_02', 4)->nullable();
            $table->string('p_y_02', 4)->nullable();
            $table->string('x_03', 4)->nullable();
            $table->string('y_03', 4)->nullable();
            $table->string('p_x_03', 4)->nullable();
            $table->string('p_y_03', 4)->nullable();
            $table->string('x_04', 4)->nullable();
            $table->string('y_04', 4)->nullable();
            $table->string('p_x_04', 4)->nullable();
            $table->string('p_y_04', 4)->nullable();
            $table->string('x_05', 4)->nullable();
            $table->string('y_05', 4)->nullable();
            $table->string('p_x_05', 4)->nullable();
            $table->string('p_y_05', 4)->nullable();
            $table->string('x_06', 4)->nullable();
            $table->string('y_06', 4)->nullable();
            $table->string('p_x_06', 4)->nullable();
            $table->string('p_y_06', 4)->nullable();
            $table->string('x_07', 4)->nullable();
            $table->string('y_07', 4)->nullable();
            $table->string('p_x_07', 4)->nullable();
            $table->string('p_y_07', 4)->nullable();
            $table->string('x_08', 4)->nullable();
            $table->string('y_08', 4)->nullable();
            $table->string('p_x_08', 4)->nullable();
            $table->string('p_y_08', 4)->nullable();
            $table->string('x_09', 4)->nullable();
            $table->string('y_09', 4)->nullable();
            $table->string('p_x_09', 4)->nullable();
            $table->string('p_y_09', 4)->nullable();
            $table->string('x_10', 4)->nullable();
            $table->string('y_10', 4)->nullable();
            $table->string('p_x_10', 4)->nullable();
            $table->string('p_y_10', 4)->nullable();
            $table->string('x_11', 4)->nullable();
            $table->string('y_11', 4)->nullable();
            $table->string('p_x_11', 4)->nullable();
            $table->string('p_y_11', 4)->nullable();
            $table->string('x_12', 4)->nullable();
            $table->string('y_12', 4)->nullable();
            $table->string('p_x_12', 4)->nullable();
            $table->string('p_y_12', 4)->nullable();
            $table->string('x_101', 4)->nullable();
            $table->string('y_101', 4)->nullable();
            $table->string('p_x_101', 4)->nullable();
            $table->string('p_y_101', 4)->nullable();
            $table->string('x_102', 4)->nullable();
            $table->string('y_102', 4)->nullable();
            $table->string('p_x_102', 4)->nullable();
            $table->string('p_y_102', 4)->nullable();
            $table->string('x_103', 4)->nullable();
            $table->string('y_103', 4)->nullable();
            $table->string('p_x_103', 4)->nullable();
            $table->string('p_y_103', 4)->nullable();
            $table->string('x_104', 4)->nullable();
            $table->string('y_104', 4)->nullable();
            $table->string('p_x_104', 4)->nullable();
            $table->string('p_y_104', 4)->nullable();
            $table->string('x_105', 4)->nullable();
            $table->string('y_105', 4)->nullable();
            $table->string('p_x_105', 4)->nullable();
            $table->string('p_y_105', 4)->nullable();
            $table->string('x_106', 4)->nullable();
            $table->string('y_106', 4)->nullable();
            $table->string('p_x_106', 4)->nullable();
            $table->string('p_y_106', 4)->nullable();
            $table->string('x_107', 4)->nullable();
            $table->string('y_107', 4)->nullable();
            $table->string('p_x_107', 4)->nullable();
            $table->string('p_y_107', 4)->nullable();
            $table->string('x_108', 4)->nullable();
            $table->string('y_108', 4)->nullable();
            $table->string('p_x_108', 4)->nullable();
            $table->string('p_y_108', 4)->nullable();
            $table->string('x_109', 4)->nullable();
            $table->string('y_109', 4)->nullable();
            $table->string('p_x_109', 4)->nullable();
            $table->string('p_y_109', 4)->nullable();
            $table->string('x_110', 4)->nullable();
            $table->string('y_110', 4)->nullable();
            $table->string('p_x_110', 4)->nullable();
            $table->string('p_y_110', 4)->nullable();
            $table->string('x_111', 4)->nullable();
            $table->string('y_111', 4)->nullable();
            $table->string('p_x_111', 4)->nullable();
            $table->string('p_y_111', 4)->nullable();
            $table->string('x_112', 4)->nullable();
            $table->string('y_112', 4)->nullable();
            $table->string('p_x_112', 4)->nullable();
            $table->string('p_y_112', 4)->nullable();
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
        Schema::dropIfExists('routes');
    }
}
