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
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('code_number', 6)->comment('use minimal 3 and max 6 chars');
            $table->string('name');
            $table->text('description')->comment('Project Summary');

            $table->date('start_date');
            $table->date('end_date')->nullable();

            $table->foreignUuid('category_id')->references('id')->on('sysparams')->comment('Category Project');
            $table->foreignUuid('organization_id')->references('id')->on('organizations')->comment('Client company');
            $table->foreignUuid('client_id')->references('id')->on('contacts')->comment('Client PIC');


            $table->float('value_project', 12, 2);
            $table->char('base_currency', 3)->default('USD')->comment('USD, JPY, EUR, IDR');
            $table->char('exchange_currency', 3)->default('USD')->comment('USD, JPY, EUR, IDR');
            $table->float('exchange_value', 12, 2)->default(0);
            $table->float('hours_estimate', 12, 2)->default(0);

            $table->text('note')->nullable();
            $table->enum('status', ['draft', 'in-progress', 'not-started', 'on-hold', 'canceled', 'finished'])->default('draft');
            $table->json('data')->nullable();

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
        Schema::dropIfExists('projects');
    }
};
