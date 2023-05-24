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
        Schema::create('permissions_menu', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_menu')->nullable()->index('id_menu');
            $table->integer('id_permissions')->nullable()->index('id_permissions');
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
        Schema::dropIfExists('permissions_menu');
    }
};
