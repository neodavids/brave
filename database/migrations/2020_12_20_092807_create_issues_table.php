<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('issues', function (Blueprint $table) {
          $table->increments('id');
          $table->string('item_name');
					$table->string('description');
					$table->string('date');
					$table->string('location');
					$table->string('raised_by');
					$table->string('department');
					$table->string('status');
					$table->string('solved_by');
					$table->string('action_taken');
					$table->string('cause_of_breakdown',255);
					$table->string('engineers_comment');
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
        Schema::dropIfExists('issues');
    }
}
