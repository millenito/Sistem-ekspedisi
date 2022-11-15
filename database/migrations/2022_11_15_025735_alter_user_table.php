<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_code', 10)->unique();
            $table->string('user_branch_code', 10)->default('JKT001');
            $table->foreign('user_branch_code')->references('branch_code')->on('md_branches');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_branch_code');
            $table->dropColumn('user_code');
            $table->dropForeign('users_user_branch_code_foreign');
        });    
    }
};
