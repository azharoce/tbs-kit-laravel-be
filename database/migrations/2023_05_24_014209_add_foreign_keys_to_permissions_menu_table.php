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
        Schema::table('permissions_menu', function (Blueprint $table) {
            $table->foreign(['id_permissions'], 'permissions_menu_ibfk_1')->references(['id'])->on('permissions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_menu'], 'permissions_menu_ibfk_2')->references(['id'])->on('menu')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions_menu', function (Blueprint $table) {
            $table->dropForeign('permissions_menu_ibfk_1');
            $table->dropForeign('permissions_menu_ibfk_2');
        });
    }
};
