<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triggers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('script_id')->unsigned();
            $table->foreign('script_id')
                ->references('id')
                ->on('scripts')
                ->onDelete('cascade');
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('condition')->default(0);
            $table->text('c_param', 1000)->default(null);
            $table->tinyInteger('action')->default(null);
            $table->text('a_param', 1000)->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('triggers');
    }
}
