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
        Schema::create('curriculums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->string('title')->nullable();
            $table->string('category')->nullable();
            $table->unsignedBigInteger('assumed_learner_id')->nullable();
            $table->unsignedBigInteger('curriculum_creation_id')->nullable();
            $table->unsignedBigInteger('course_introduction_id')->nullable();
            $table->timestamps();
            
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculums');
    }
};
