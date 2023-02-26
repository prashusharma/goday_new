<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberLoanDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_loan_datas', function (Blueprint $table) {
            $table->id();
            $table->string('member_id')->nullable();
            $table->string('number_of_emi')->nullable();
            $table->string('staff_id')->nullable();
            $table->date('emi_dates')->nullable();
            $table->string('emi')->nullable();
            $table->string('opening')->nullable();
            $table->string('interest_per_unit')->nullable();
            $table->string('principle')->nullable();
            $table->string('outstanding')->nullable();
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
        Schema::dropIfExists('member_loan_datas');
    }
}
