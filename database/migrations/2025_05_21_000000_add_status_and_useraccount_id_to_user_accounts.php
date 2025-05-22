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
            // Add status column after password
            $table->string('status')->default('active')->after('password');
            
            // Add useraccount_id column (to link with student id)
            $table->unsignedBigInteger('useraccount_id')->nullable()->after('id');
            $table->index('useraccount_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('user_accounts', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('useraccount_id');
        });
    }
}; 

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
            // Add status column after password
            $table->string('status')->default('active')->after('password');
            
            // Add useraccount_id column (to link with student id)
            $table->unsignedBigInteger('useraccount_id')->nullable()->after('id');
            $table->index('useraccount_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('user_accounts', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('useraccount_id');
        });
    }
}; 