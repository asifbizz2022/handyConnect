<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignJobSubcontractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_job_subcontractors', function (Blueprint $table) {
            $table->id();
            $table->string('job_unique_id');
            $table->string('sub_contractor_id');
            $table->string('customer_id');
            $table->string('service_id');
            $table->string('order_id');
            $table->string('status');
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
        Schema::dropIfExists('assign_job_subcontractors');
    }
}
