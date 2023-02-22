<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('business_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable()  ;
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('password');
            $table->string('company_id')->nullable();
            $table->string('branch_id')->nullable();
            $table->string('group_id')->nullable();
            $table->string('department')->nullable();
            $table->string('sanction_date')->nullable();
            $table->string('opening_fund')->nullable();
            $table->string('principle')->nullable();
            $table->string('interest')->nullable();
            $table->string('interest_amount')->nullable();
            $table->string('loan_amount')->nullable();
            $table->string('loan_type')->nullable();
            $table->string('installment_type')->nullable();
            $table->string('number_of_installment')->nullable();
            $table->string('installment_amount')->nullable();
            $table->string('start_date_of_installment')->nullable();
            $table->string('end_date_of_installment')->nullable();
            $table->string('percentage_fine_on_due')->nullable();
            $table->string('extra_charge')->nullable();
            $table->string('final_sanctioned_amount')->nullable();
            $table->string('role')->default('Member')->nullable();
            $table->integer('status')->default(0);
            $table->integer('deleted')->default(0);
            $table->string('company_label')->nullable();
            $table->string('branch_label')->default('Branch');
            $table->string('group_label')->default('Group');
            $table->integer('system_setting')->default(0);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
