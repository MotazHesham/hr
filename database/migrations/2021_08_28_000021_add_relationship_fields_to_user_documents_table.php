<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('user_documents', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4743839')->references('id')->on('users');
        });
    }
}
