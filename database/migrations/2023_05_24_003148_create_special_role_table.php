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
        Schema::create('special_role', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->unsignedBigInteger('id_user')->nullable()->index('id_user');
            $table->integer('id_permissions')->nullable()->index('id_permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('special_role');
    }
};
