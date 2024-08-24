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
        Schema::create('notifications', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('candidate_id');
            $table->primary(['job_id','candidate_id']);
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table){
            $table->dropForeign(['job_id']);
            $table->dropForeign(['candidate_id']);
            $table->dropPrimary(['job_id','candidate_id']);
        });
        Schema::dropIfExists('notifications');
    }
};
