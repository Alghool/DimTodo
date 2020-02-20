<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->dateTime('due');
            $table->enum('priority', ['low', 'normal', 'high', 'urgent']);
            $table->integer('estimated');
            $table->text('attachments');
            $table->dateTime('reminder');
            $table->boolean('done');
            $table->bigInteger('user');
            $table->bigInteger('folder');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('folder')->references('id')->on('folder');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
