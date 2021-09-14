<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('mailbox');
            $table->string('post_code');
            $table->string('building_number');
            $table->string('unit_number');
            $table->string('neighborhood');
            $table->string('street_number');
            $table->string('comrl_reg_num');
            $table->date('comrl_reg_expiry');
            $table->string('chamber_commerce_num');
            $table->date('chamber_commerce_expiry');
            $table->string('municipal_license_num');
            $table->date('municcipal_license_expiry');
            $table->string('civil_defense_license');
            $table->date('civil_defense_license_expiry');
            $table->string('facility_num_in_work_office');
            $table->string('facility_num_in_insurance');
            $table->string('tax_num');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
