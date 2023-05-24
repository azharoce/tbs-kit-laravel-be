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
        Schema::table('special_role', function (Blueprint $table) {
            $table->foreign(['id_permissions'], 'special_role_ibfk_1')->references(['id'])->on('permissions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_user'], 'special_role_user__fk')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('special_role', function (Blueprint $table) {
            $table->dropForeign('special_role_ibfk_1');
            $table->dropForeign('special_role_user__fk');
        });
    }
};
