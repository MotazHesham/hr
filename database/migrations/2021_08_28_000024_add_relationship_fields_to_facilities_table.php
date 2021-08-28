<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFacilitiesTable extends Migration
{
    public function up()
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id', 'city_fk_4743952')->references('id')->on('cities');
        });
    }
}
