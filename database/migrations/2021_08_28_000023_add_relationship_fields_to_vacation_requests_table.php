<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVacationRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('vacation_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('vacation_type_id');
            $table->foreign('vacation_type_id', 'vacation_type_fk_4744130')->references('id')->on('vacations_types');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4744255')->references('id')->on('users');
        });
    }
}
