<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandyConnectQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handy_connect_quotations', function (Blueprint $table) {
            $table->id(); 
            $table->string('quotation_unique_no');
            $table->integer('customer_id');
            $table->integer('hc_cat_id')->nullable();
            $table->string('logo')->nullable();
            $table->string('address')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('company_registration_no')->nullable();
            $table->string('work_description')->nullable();
            $table->string('price_per_unit')->nullable();;
            $table->decimal('total_price', 20, 2)->nullable();;
            $table->integer('unit_quantity')->nullable();;
            $table->string('tax')->nullable();;
            $table->decimal('tax_price', 20, 2)->nullable();;
            $table->decimal('final_price_with_tax', 20, 2)->nullable();;
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
        Schema::dropIfExists('handy_connect_quotations');
    }
}
