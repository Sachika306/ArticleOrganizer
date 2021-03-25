<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutlineAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outline_assignments', function (Blueprint $table) {
            $table->id();
            $table->integer('article_id');
            $table->integer('outline_user_id');
            $table->string('outline_url')->default('DEFAULT');
            $table->date('outline_deadline');
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
        Schema::dropIfExists('outline_assignments');
    }
}


