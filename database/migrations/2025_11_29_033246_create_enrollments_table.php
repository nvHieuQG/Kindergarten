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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('parent_name');
            $table->string('parent_email');
            $table->string('parent_phone');
            $table->string('child_name');
            $table->date('child_dob');
            $table->enum('child_gender', ['male', 'female', 'other']);
            $table->text('address');
            $table->string('program')->nullable();
            $table->date('preferred_start_date')->nullable();
            $table->text('message')->nullable();
            $table->json('documents')->nullable();
            $table->enum('status', ['pending', 'reviewing', 'approved', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
