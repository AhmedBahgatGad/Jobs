<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_requirements', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->string('requirement');
            $table->primary(['job_id','requirement']);
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_requirements', function (Blueprint $table){
            $table->dropForeign(['job_id']);
            $table->dropPrimary(['job_id','requirement']);
        });
        Schema::dropIfExists('job_requirements');
    }
};
