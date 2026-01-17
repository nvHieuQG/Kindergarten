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
        // Posts table - indexes for frequently queried columns
        // Using try-catch to handle existing indexes gracefully
        try {
            Schema::table('posts', function (Blueprint $table) {
                $table->index('status'); // For published scope
            });
        } catch (\Exception $e) {
            // Index may already exist, continue
        }
        
        try {
            Schema::table('posts', function (Blueprint $table) {
                $table->index('published_at'); // For latest ordering with published posts
            });
        } catch (\Exception $e) {
            // Index may already exist, continue
        }
        
        try {
            Schema::table('posts', function (Blueprint $table) {
                $table->index(['status', 'published_at']); // Composite index for published()->latest()
            });
        } catch (\Exception $e) {
            // Index may already exist, continue
        }

        // Contacts table - indexes for status filtering
        try {
            Schema::table('contacts', function (Blueprint $table) {
                $table->index('status'); // For unread/read scopes
            });
        } catch (\Exception $e) {}
        
        try {
            Schema::table('contacts', function (Blueprint $table) {
                $table->index('created_at'); // For latest ordering
            });
        } catch (\Exception $e) {}

        // Enrollments table - indexes for status filtering
        try {
            Schema::table('enrollments', function (Blueprint $table) {
                $table->index('status'); // For pending/reviewing/approved scopes
            });
        } catch (\Exception $e) {}
        
        try {
            Schema::table('enrollments', function (Blueprint $table) {
                $table->index('created_at'); // For latest ordering
            });
        } catch (\Exception $e) {}

        // Users table - indexes for role and active status
        try {
            Schema::table('users', function (Blueprint $table) {
                $table->index('role'); // For admin checks
            });
        } catch (\Exception $e) {}
        
        try {
            Schema::table('users', function (Blueprint $table) {
                $table->index('is_active'); // For active user filtering
            });
        } catch (\Exception $e) {}
        
        try {
            Schema::table('users', function (Blueprint $table) {
                $table->index(['role', 'is_active']); // Composite index for admin + active queries
            });
        } catch (\Exception $e) {}

        // Teachers table - check if exists and add indexes
        if (Schema::hasTable('teachers')) {
            try {
                Schema::table('teachers', function (Blueprint $table) {
                    $table->index('is_active'); // For active scope
                });
            } catch (\Exception $e) {}
            
            try {
                Schema::table('teachers', function (Blueprint $table) {
                    $table->index('order'); // For ordered scope
                });
            } catch (\Exception $e) {}
        }

        // Branches table - check if exists and add indexes
        if (Schema::hasTable('branches')) {
            try {
                Schema::table('branches', function (Blueprint $table) {
                    $table->index('status'); // For active scope
                });
            } catch (\Exception $e) {}
            
            try {
                Schema::table('branches', function (Blueprint $table) {
                    $table->index('order'); // For ordered scope
                });
            } catch (\Exception $e) {}
        }

        // Categories table - slug already has unique index from migration
        // No need to add index as unique constraint creates an index automatically
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop indexes in reverse order
        // Note: categories.slug index is from unique constraint, should not be dropped
        
        if (Schema::hasTable('branches')) {
            Schema::table('branches', function (Blueprint $table) {
                $table->dropIndex(['status']);
                $table->dropIndex(['order']);
            });
        }

        if (Schema::hasTable('teachers')) {
            Schema::table('teachers', function (Blueprint $table) {
                $table->dropIndex(['is_active']);
                $table->dropIndex(['order']);
            });
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role']);
            $table->dropIndex(['is_active']);
            $table->dropIndex(['role', 'is_active']);
        });

        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['published_at']);
            $table->dropIndex(['status', 'published_at']);
        });
    }
};
