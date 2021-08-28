<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('salery', 15, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->longText('job_tasks');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
