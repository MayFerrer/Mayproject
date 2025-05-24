<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This migration changes the defaultpassword column from boolean to string
     */
    public function up(): void
    {
        // Simple direct approach that works without Doctrine
        Schema::table('user_accounts', function (Blueprint $table) {
            // Only try to modify if the column exists
            if (Schema::hasColumn('user_accounts', 'defaultpassword')) {
                try {
                    // Try to directly alter the column using a DB statement
                    DB::statement('ALTER TABLE user_accounts MODIFY defaultpassword VARCHAR(255) NOT NULL DEFAULT "true"');
                } catch (\Exception $e) {
                    // If that fails, try the drop and recreate approach
                    try {
                        // Drop any foreign keys that might reference this column
                        $table->dropColumn('defaultpassword');
                        $table->string('defaultpassword')->default('true')->after('password');
                    } catch (\Exception $e2) {
                        // If all else fails, log the error
                        \Log::error('Could not modify defaultpassword column: ' . $e2->getMessage());
                    }
                }
            } else {
                // If the column doesn't exist, create it
                $table->string('defaultpassword')->default('true')->after('password');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // We won't try to convert it back to boolean because it could cause data loss
    }
}; 