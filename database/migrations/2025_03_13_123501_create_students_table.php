<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('studentid')->unique();
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->string('address');
            $table->string('contact');
            $table->string('image_path')->nullable(); // <-- Added image path column
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
