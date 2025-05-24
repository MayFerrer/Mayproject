<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    protected $fillable = ['username', 'password', 'defaultpassword', 'status'];

    protected $hidden = ['password', 'defaultpassword'];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'defaultpassword' => 'string',
    ];
    
    /**
     * Get the student that owns the user account.
     */
    public function student()
    {
        return $this->hasOne(Student::class, 'user_account_id');
    }
}
