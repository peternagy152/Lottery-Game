<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxitems', function (Blueprint $table) {
            $table->id();
            $table->integer('box_ID');
            $table -> string('item_name');
            $table -> integer('item_ID');
            $table -> float('item_price' , 10 ,8);
            $table->foreign('box_ID')->references('id')->on('boxes');
            $table->foreign('item_ID')->references('id')->on('items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boxitems');
    }
}
