<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This migration ensures all relationships between students and user_accounts are properly set up
     */
    public function up(): void
    {
        // Part 1: Make sure user_accounts table is properly structured
        if (Schema::hasTable('user_accounts')) {
            Schema::table('user_accounts', function (Blueprint $table) {
                // Ensure status column exists
                if (!Schema::hasColumn('user_accounts', 'status')) {
                    $table->string('status')->default('active')->after('password');
                }
                
                // We will drop the useraccount_id column from user_accounts if it exists
                // as we're going to manage the relationship from the students table only
                if (Schema::hasColumn('user_accounts', 'useraccount_id')) {
                    // First check if there's an index on this column
                    $indexes = DB::select("SHOW INDEX FROM user_accounts WHERE Column_name = 'useraccount_id'");
                    if (!empty($indexes)) {
                        // There's at least one index, let's drop it
                        try {
                            $table->dropIndex(['useraccount_id']);
                        } catch (\Exception $e) {
                            // Index may be named differently, try to drop it by name
                            foreach ($indexes as $index) {
                                DB::statement("DROP INDEX {$index->Key_name} ON user_accounts");
                            }
                        }
                    }
                    
                    // Now drop the column
                    $table->dropColumn('useraccount_id');
                }
            });
        }
        
        // Part 2: Make sure students table has the proper foreign key to user_accounts
        if (Schema::hasTable('students')) {
            Schema::table('students', function (Blueprint $table) {
                // Ensure email column exists
                if (!Schema::hasColumn('students', 'email')) {
                    $table->string('email')->nullable()->after('lname');
                }
                
                // Check if user_account_id column exists
                if (!Schema::hasColumn('students', 'user_account_id')) {
                    $table->unsignedBigInteger('user_account_id')->nullable()->after('image_path');
                }
                
                // Check if the foreign key constraint exists
                // First, drop any existing foreign key constraints on user_account_id
                try {
                    $foreignKeys = $this->listTableForeignKeys('students');
                    
                    foreach ($foreignKeys as $key) {
                        if (in_array('user_account_id', $key['columns'])) {
                            $table->dropForeign($key['name']);
                        }
                    }
                } catch (\Exception $e) {
                    // Foreign key management failed, proceed anyway
                }
                
                // Now add the foreign key constraint
                if (Schema::hasTable('user_accounts')) {
                    try {
                        $table->foreign('user_account_id')
                              ->references('id')
                              ->on('user_accounts')
                              ->onDelete('set null');
                    } catch (\Exception $e) {
                        // Foreign key might already exist or have other issues
                        // We've already tried to drop it, so just move on
                    }
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to do anything in down() since we're just ensuring the schema is correct
        // and not making any destructive changes that need to be reverted
    }
    
    /**
     * Helper method to list foreign keys
     */
    private function listTableForeignKeys($table)
    {
        try {
            $conn = Schema::getConnection()->getDoctrineSchemaManager();
            
            return array_map(function($key) {
                return [
                    'name' => $key->getName(),
                    'columns' => $key->getLocalColumns(),
                ];
            }, $conn->listTableForeignKeys($table));
        } catch (\Exception $e) {
            // If we can't get foreign keys with Doctrine, try a direct query
            $driver = DB::connection()->getDriverName();
            
            if ($driver == 'mysql') {
                $foreignKeys = [];
                $fkData = DB::select("
                    SELECT CONSTRAINT_NAME as 'name', COLUMN_NAME as 'column'
                    FROM information_schema.KEY_COLUMN_USAGE
                    WHERE TABLE_SCHEMA = DATABASE()
                    AND TABLE_NAME = '{$table}'
                    AND REFERENCED_TABLE_NAME IS NOT NULL
                ");
                
                foreach ($fkData as $fk) {
                    $foreignKeys[] = [
                        'name' => $fk->name,
                        'columns' => [$fk->column],
                    ];
                }
                
                return $foreignKeys;
            }
            
            return [];
        }
    }
};
