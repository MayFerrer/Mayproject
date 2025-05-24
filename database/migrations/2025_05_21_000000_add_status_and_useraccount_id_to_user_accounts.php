<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('user_accounts', function (Blueprint $table) {
            // Add status column after password if it doesn't exist
            if (!Schema::hasColumn('user_accounts', 'status')) {
                $table->string('status')->default('active')->after('password');
            }
            
            // Add useraccount_id column (to link with student id) if it doesn't exist
            if (!Schema::hasColumn('user_accounts', 'useraccount_id')) {
                $table->unsignedBigInteger('useraccount_id')->nullable()->after('id');
                $table->index('useraccount_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('user_accounts', function (Blueprint $table) {
            // Check if columns exist before trying to drop them
            if (Schema::hasColumn('user_accounts', 'status')) {
                $table->dropColumn('status');
            }
            
            // Drop index first to avoid errors
            if (Schema::hasColumn('user_accounts', 'useraccount_id')) {
                $table->dropIndex(['useraccount_id']);
                $table->dropColumn('useraccount_id');
            }
        });
    }
}; 