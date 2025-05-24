<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Hash;

class FixStudentUserAccounts extends Command
{
    protected $signature = 'students:fix-accounts';
    protected $description = 'Fix student user accounts by creating missing accounts and updating relationships';

    public function handle()
    {
        $this->info('Starting to fix student accounts...');
        
        // Get all students without user accounts
        $studentsWithoutAccounts = Student::whereNull('user_account_id')->get();
        
        $this->info("Found {$studentsWithoutAccounts->count()} students without user accounts.");
        
        $fixed = 0;
        
        foreach ($studentsWithoutAccounts as $student) {
            // Skip if no email (needed for username)
            if (!$student->email) {
                $this->warn("Student ID {$student->studentid} has no email. Skipping.");
                continue;
            }
            
            // Generate default password
            $defaultPassword = $student->studentid . $student->fname;
            
            // Check if a user account with this email already exists
            $existingAccount = UserAccount::where('username', $student->email)->first();
            
            if ($existingAccount) {
                $this->line("User account for {$student->email} already exists. Linking to student.");
                
                // Link the existing account to the student
                $student->update(['user_account_id' => $existingAccount->id]);
            } else {
                // Create a new user account
                $userAccount = UserAccount::create([
                    'username' => $student->email,
                    'password' => Hash::make($defaultPassword),
                    'defaultpassword' => (string)$defaultPassword,
                    'status' => 'active',
                ]);
                
                // Link the new account to the student
                $student->update(['user_account_id' => $userAccount->id]);
                
                $this->line("Created new user account for student {$student->studentid}.");
            }
            
            $fixed++;
        }
        
        $this->info("Fixed {$fixed} student accounts.");
        
        return Command::SUCCESS;
    }
} 