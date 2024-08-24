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
        Schema::create('job_responsibilties', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->string('responsibilty');
            $table->primary(['job_id','responsibilty']);
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_responsibilties', function (Blueprint $table){
            $table->dropForeign(['job_id']);
            $table->dropPrimary(['job_id','responsibilty']);
        });
        Schema::dropIfExists('job_responsibilties');
    }
};
