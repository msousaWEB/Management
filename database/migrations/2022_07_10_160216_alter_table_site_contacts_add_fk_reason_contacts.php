<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContactsAddFkReasonContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ADICIONADO A NOVA COLUNA
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('reason_contacts_id');
        });

        //ATRIBUINDO OS MOVITOS PARA A NOVA COLUNA
        DB::statement('UPDATE site_contacts SET reason_contacts_id = reason_contact');

        //FOREIGN KEY E REMOVER A COLUNA ANTIGA
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->foreign('reason_contacts_id')->references('id')->on('reason_contacts');
            $table->dropColumn('reason_contact');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //CRIAR A COLUNA ANTIGA
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->integer('reason_contact');
            $table->dropForeign('site_contacts_reason_contacts_id_foreign');

        });

        //ATRIBUINDO OS MOVITOS PARA A ANTIGA COLUNA
        DB::statement('UPDATE site_contacts SET reason_contact = reason_contacts_id');

        //REMOVENDO A NOVA COLUNA
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->dropColumn('reason_contacts_id');
        });

    }
}
