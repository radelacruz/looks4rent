<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccomodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longtext('description');
            $table->integer('quantity');
            $table->integer('available');
            $table->string('image_path');
            $table->decimal('price', 10, 2);
            // $table->unsignedInteger('category_id');
            $table->softDeletes();
            $table->timestamps();

            //relate categories table with items
            // $table->foreign('category_id')
            //       ->references('id')
            //       ->on('categories')
            //       ->onDelete('restrict')
            //       ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accomodations');
        $table->dropSoftDeletes();
    }
}
