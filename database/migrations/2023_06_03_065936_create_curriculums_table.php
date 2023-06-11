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
        Schema::table('curriculums', function (Blueprint $table) {
            $table->text('course_description')->nullable();
            $table->string('information_level')->nullable();
            $table->string('img_path')->nullable();
            $table->string('file_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curriculums', function (Blueprint $table) {
            $table->dropColumn('course_description');
            $table->dropColumn('information_level');
            $table->dropColumn('img_path');
            $table->dropColumn('file_path');
        });
    }
};
