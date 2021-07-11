<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('factur');
            $table->string('operator');
            $table->string('location');
            $table->enum('type',['revenue','cost','sales','purchase']);
            $table->timestamps();
            $table->text('description')->nullable();
            //$table->timestamp('begin');
            $table->double('amount', 8, 2);
            $table->enum('status',['OK','CANCEL']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
