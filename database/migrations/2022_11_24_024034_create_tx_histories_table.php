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
        Schema::create('tx_histories', function (Blueprint $table) {
            $table->id();
            $table->string('cn_no', 30)->unique();
            $table->timestamp('cn_processdatetime');
            $table->string('cn_processno', 10);
            $table->string('cn_processcode', 10);
            $table->string('cn_processdesc', 120);
            $table->string('created_by')->default('ADMIN');
            $table->string('updated_by')->default('ADMIN');
            $table->boolean('is_active')->default(true); 
            $table->timestamps();

            $table->foreign('cn_no')->references('cn_no')->on('tx_connotes');
            $table->foreign('cn_processcode')->references('code_code')->on('md_codes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tx_histories');
    }
};
