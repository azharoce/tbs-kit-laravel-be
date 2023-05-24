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
        Schema::table('role_menu', function (Blueprint $table) {
            $table->foreign(['id_role'], 'role_menu_ibfk_1')->references(['id'])->on('role')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_menu'], 'role_menu_ibfk_2')->references(['id'])->on('menu')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_menu', function (Blueprint $table) {
            $table->dropForeign('role_menu_ibfk_1');
            $table->dropForeign('role_menu_ibfk_2');
        });
    }
};
