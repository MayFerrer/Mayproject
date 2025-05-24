<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This migration adds a user_account_id foreign key to the students table
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Check if the column doesn't exist to avoid errors
            if (!Schema::hasColumn('students', 'user_account_id')) {
                $table->unsignedBigInteger('user_account_id')->nullable()->after('image_path');
                
                // Add foreign key constraint if the referenced table exists
                if (Schema::hasTable('user_accounts')) {
                    $table->foreign('user_account_id')
                          ->references('id')
                          ->on('user_accounts')
                          ->onDelete('set null');
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // First drop the foreign key if it exists
            if (Schema::hasColumn('students', 'user_account_id')) {
                // Get the constraint name
                $foreignKeys = $this->listTableForeignKeys('students');
                $fkName = null;
                
                foreach ($foreignKeys as $key) {
                    if (in_array('user_account_id', $key['columns'])) {
                        $fkName = $key['name'];
                        break;
                    }
                }
                
                if ($fkName) {
                    $table->dropForeign($fkName);
                }
                
                $table->dropColumn('user_account_id');
            }
        });
    }
    
    /**
     * Helper method to list foreign keys
     */
    private function listTableForeignKeys($table)
    {
        $conn = Schema::getConnection()->getDoctrineSchemaManager();
        
        return array_map(function($key) {
            return [
                'name' => $key->getName(),
                'columns' => $key->getLocalColumns(),
                'foreign_table' => $key->getForeignTableName(),
                'foreign_columns' => $key->getForeignColumns(),
            ];
        }, $conn->listTableForeignKeys($table));
    }
};
