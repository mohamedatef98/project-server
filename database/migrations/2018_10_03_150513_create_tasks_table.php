<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('done')->default(0);
            $table->string('title');
            $table->string('description');
            $table->string('due_to');
            $table->string('img')->default("http://pluspng.com/img-png/task-png-image-puffle-tasks-icon-png-club-penguin-wiki-fandom-powered-by-wikia-1400.png");
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
        Schema::dropIfExists('tasks');
    }
}
