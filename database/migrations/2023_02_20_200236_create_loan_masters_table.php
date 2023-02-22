<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_masters', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('loan_name');
            $table->string('loan_code');
            $table->string('interest_type')->default('monthly');
            $table->string('interest_type_value')->nullable('12');
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
        Schema::dropIfExists('loan_masters');
    }
}
