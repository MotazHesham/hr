<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBranchesTable extends Migration
{
    public function up()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id', 'city_fk_4743977')->references('id')->on('cities');
            $table->unsignedBigInteger('facility_id')->nullable();
            $table->foreign('facility_id', 'facility_fk_4743978')->references('id')->on('facilities');
            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id', 'manager_fk_4743979')->references('id')->on('users');
        });
    }
}
