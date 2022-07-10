<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReasonContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reason_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('reason_contact', 20);
            $table->timestamps();
        });

        // ReasonContact::create(['Dúvida']);
        // ReasonContact::create(['Elogio']);
        // ReasonContact::create(['Reclamação']);
        // ReasonContact::create(['Suporte']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reason_contacts');
    }
}
