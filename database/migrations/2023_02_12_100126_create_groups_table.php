<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id');
            $table->string('company_id');
            $table->string('group_name');
            $table->string('group_code');
            $table->string('group_opening_date');
            $table->string('group_opening_fund');
            $table->string('group_email');
            $table->string('group_contact_number');
            $table->string('state');
            $table->string('city');
            $table->string('area');
            $table->string('pincode');
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
        Schema::dropIfExists('groups');
    }
}
