<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->string('parent_email')->nullable()->change();
            $table->date('child_dob')->nullable()->change();
            $table->enum('child_gender', ['male', 'female', 'other'])->nullable()->change();
            $table->text('address')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->string('parent_email')->nullable(false)->change();
            $table->date('child_dob')->nullable(false)->change();
            $table->enum('child_gender', ['male', 'female', 'other'])->nullable(false)->change();
            $table->text('address')->nullable(false)->change();
        });
    }
};
