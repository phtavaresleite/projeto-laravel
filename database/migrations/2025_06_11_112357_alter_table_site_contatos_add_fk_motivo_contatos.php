<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato_id')->after('email');
        });

        DB::statement('UPDATE site_contatos SET motivo_contato_id = motivo_contato');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contato_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->interger('motivo_contato');
            $table->dropForeign('motivo_contato_id_foreign');
        });

        DB::statement('UPDATE site_contatos SET motivo_contato = motivo_contato_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contato_id');
        });
    }
};
