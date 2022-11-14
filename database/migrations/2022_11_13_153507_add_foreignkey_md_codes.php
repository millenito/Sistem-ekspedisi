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
        Schema::table('md_codes', function (Blueprint $table) {
            $table->foreign('code_codegroup')->references('code_code')->on('md_group_codes');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('md_codes', function (Blueprint $table) {
            $table->dropForeign('md_codes_code_codegroup_foreign');
        });    
    }
};
