<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShootsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('shoots', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
					$table->string('start_date');
					$table->string('end_date');
					$table->string('status');
					$table->string('producer_1');
					$table->string('producer_2');
					$table->string('producer_3');
					$table->string('producer_4');
					$table->string('description');
					$table->softDeletes();
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
        Schema::dropIfExists('shoots');
    }
}
