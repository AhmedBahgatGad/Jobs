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
        Schema::table('jobs', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('emp_id');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('cat_id');
            $table->foreign('emp_id')
            ->references('id')
            ->on('employers')
            ->onDelete('cascade');
            $table->foreign('admin_id')
            ->references('id')
            ->on('admins')
            ->onDelete('cascade');
            $table->foreign('cat_id')
            ->references('id')
            ->on('category')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
            $table->dropForeign(['emp_id']);
            $table->dropColumn('emp_id');
            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');
            $table->dropForeign(['candidate_id']);
            $table->dropColumn('candidate_id');
        });
    }
};
