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
            // Add username column if it doesn't exist
            if (!Schema::hasColumn('user_accounts', 'username')) {
                $table->string('username')->unique()->after('id');
            }

            // Change defaultpassword column to string (varchar)
            $table->string('defaultpassword')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('user_accounts', function (Blueprint $table) {
            // Drop username column if rolling back
            if (Schema::hasColumn('user_accounts', 'username')) {
                $table->dropColumn('username');
            }

            // Optionally: revert defaultpassword to nullable string or just leave it as is
            // If you want, you can skip changing it back.
        });
    }
};
