<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorControllers extends Controller
{
    public function dashboard(){
        return 'This is the Dashboard!';
    }

    public function contact(){
        return 'This is the Contact!';
    }

    public function profile(){
        return 'This is the Profile!';
    }

    public function manageStudent(){
        return view ('manage-student.index');
    }

    public function index(){
        return 'This is Administrator Page!';
    }

}
