<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccomodationOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_order', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger("accomodation_id");
            $table->unsignedInteger("order_id");
            $table->integer('quantity');

            // items fk
            $table->foreign("accomodation_id")
            ->references("id")
            ->on("accomodations")
            ->onDelete("restrict")
            ->onUpdate("cascade");
 
            // orders fk
            $table->foreign("order_id")
            ->references("id")
            ->on("orders")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accomodation_order');
    }
}
