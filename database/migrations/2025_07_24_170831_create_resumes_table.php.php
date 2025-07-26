<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
    $table->bigIncrements('resume_id');
    $table->unsignedBigInteger('user_id');
    $table->string('title', 45);
    $table->unsignedBigInteger('templet_id');
    $table->string('status', 45)->nullable();
    $table->string('resumecol', 45)->nullable();
    $table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('templet_id')->references('id')->on('templete')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('resumes');
    }
}
