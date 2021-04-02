<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlines', function (Blueprint $table) {
            $table->id();
            $table->integer('article_id');
            $table->text('persona')->nullable();
            $table->string('lead_title')->nullable();
            $table->integer('lead_chars')->nullable();
            $table->string('lead')->nullable();
            $table->string('part1_title')->nullable();
            $table->integer('part1_chars')->nullable();
            $table->text('part1_summary')->nullable();
            $table->string('part2_title')->nullable();
            $table->integer('part2_chars')->nullable();
            $table->text('part2_summary')->nullable();
            $table->string('part3_title')->nullable();
            $table->integer('part3_chars')->nullable();
            $table->text('part3_summary')->nullable();
            $table->string('part4_title')->nullable();
            $table->integer('part4_chars')->nullable();
            $table->text('part4_summary')->nullable();
            $table->string('part5_title')->nullable();
            $table->integer('part5_chars')->nullable();
            $table->text('part5_summary')->nullable();
            $table->string('part6_title')->nullable();
            $table->integer('part6_chars')->nullable();
            $table->text('part6_summary')->nullable();
            $table->string('conclusion_title')->nullable();
            $table->integer('conclusion_chars')->nullable();
            $table->string('conclusion')->nullable();
            $table->integer('total_chars')->nullable();
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
        Schema::dropIfExists('outlines');
    }
}
