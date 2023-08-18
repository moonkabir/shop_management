<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('idNo');
            $table->string('name');
            $table->string('Personal_Contact_No')->unique();
            $table->string('email')->unique();
            $table->string('Father_Name');
            $table->string('Mother_Name');
            $table->string('Marital_Status');
            $table->string('NID');
            $table->string('Religion');
            $table->string('Present_Address');
            $table->string('Gender');
            $table->string('Punch_Card_No');
            $table->string('Date_Of_Birth');
            $table->string('Blood_Group');
            $table->string('Permanent_Address');
            $table->string('Join_Date');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
