<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('user_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('number');
            $table->string('end_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
