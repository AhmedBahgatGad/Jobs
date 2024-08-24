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
        Schema::create('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('emp_id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('candidate_id');
            $table->primary(['emp_id','job_id','candidate_id']);
            $table->foreign('emp_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->decimal('ex_salary',10,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table){
            $table->dropForeign(['emp_id']);
            $table->dropForeign(['job_id']);
            $table->dropForeign(['candidate_id']);
            $table->dropPrimary(['emp_id','job_id','candidate_id']);
        });
        Schema::dropIfExists('applications');
    }
};
