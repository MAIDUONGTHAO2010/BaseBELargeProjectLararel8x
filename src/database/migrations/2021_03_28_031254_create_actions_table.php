<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->nullable(false)->default(-1);
            $table->bigInteger('script_id')->unsigned();
            $table->foreign('script_id')
                ->references('id')
                ->on('scripts')
                ->onDelete('cascade');
            $table->integer('x')->nullable(false)->default(0);
            $table->integer('y')->nullable(false)->default(0);
            $table->integer('r')->nullable(false)->default(50);
            $table->integer('x2')->nullable()->default(null);
            $table->integer('y2')->nullable()->default(null);
            $table->integer('r2')->nullable()->default(null);
            $table->integer('rect_left')->default(0);
            $table->integer('rect_top')->default(0);
            $table->integer('rect_bottom')->default(0);
            $table->integer('rect_right')->default(0);
            $table->integer('click_type')->default(0);
            $table->integer('duration')->default(0);
            $table->integer('delay_time')->default(0);
            $table->string('keyword')->nullable()->default(null);
            $table->boolean('from_clipboard')->default(0);
            $table->boolean('to_clipboard')->default(0);
            $table->text('package_name', 1000)->nullable()->default(null);
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
        Schema::dropIfExists('actions');
    }
}
