<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit', 5); //cm, kg...
            $table->string('description', 30);
            $table->timestamps();
        });

        //Relacionamento com a tabela Products
        Schema::table('products', function (Blueprint $table) { 
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
        });

        //Relacionamento com a tabela Products Details
        Schema::table('product_details', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Remover relacionamento com a tabela Products
        Schema::table('products', function (Blueprint $table) {
            //Remover FK
            $table->dropForeign('products_unit_id_foreign');
            //Remover Coluna
            $table->dropColumn('unit_id');
        });

        //Remover relacionamento com a tabela Products Details
        Schema::table('product_details', function (Blueprint $table) {
            //Remover FK
            $table->dropForeign('product_details_unit_id_foreign');
            //Remover Coluna
            $table->dropColumn('unit_id');
        });

        Schema::dropIfExists('units');
    }
}
