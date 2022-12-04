<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_product')->constrained();
            $table->string('buyers_name');
            $table->string('cpf');
            $table->string('phone');
            $table->string('email');
            $table->string('uf');
            $table->string('city');
            $table->string('address');
            $table->integer('home_number');
            $table->string('card_numbers');
            $table->integer('cvv');
            $table->date('due_date');
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
