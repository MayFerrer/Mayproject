<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    protected $fillable = ['username', 'password', 'defaultpassword', 'status', 'useraccount_id'];

    protected $hidden = ['password', 'defaultpassword'];
    
    /**
     * Get the student that owns the user account.
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'useraccount_id');
    }
}
