<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_milestones', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('project_id')->references('id')->on('projects');
            $table->string('title');
            $table->float('cost', 12, 2)->default(0.0);
            $table->boolean('cost_to_bugdet')->default(false)->comment('Add Cost To Project Budget');
            $table->text('summary');

            $table->date('start_date');
            $table->date('end_date')->nullable();

            $table->enum('status', ['incomplete', 'completed'])->default('incomplete');

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
        Schema::dropIfExists('project_milestones');
    }
};
