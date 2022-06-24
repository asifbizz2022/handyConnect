<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_contractors', function (Blueprint $table) {
            $table->id();
            $table->string('sub_contractors_unique_id');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('sub_contractors_image');
            $table->string('past_jobs')->nullable();
            $table->string('past_job_cost')->nullable();
            // $table->integer('status')->nullable();
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
        Schema::dropIfExists('sub_contractors');
    }
}
