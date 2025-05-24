<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentid', 'fname', 'mname', 'lname', 'email', 'address', 'contact', 'image_path', 'user_account_id'
    ];

    /**
     * Get the user account associated with the student.
     */
    public function userAccount()
    {
        return $this->belongsTo(UserAccount::class, 'user_account_id');
    }
}
