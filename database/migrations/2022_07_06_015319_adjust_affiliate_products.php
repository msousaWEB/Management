<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdjustAffiliateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filials', function(Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        Schema::create('filial_products', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('price', 8,2);
            $table->integer('min_stock');
            $table->integer('max_stock');
            $table->timestamps();

            //FKs
            $table->foreign('filial_id')->references('id')->on('filials');
            $table->foreign('product_id')->references('id')->on('products');
        });

        //Removendo colunas da table produtos
        Schema::table('products', function (Blueprint $table){
            $table->dropColumn(['price','min_stock','max_stock']);
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Add colunas da tabelas produtos
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 8,2);
            $table->integer('min_stock');
            $table->integer('max_stock');
        });

        Schema::dropIfExists('filial_products');
        Schema::dropIfExists('filials');
    }
}
