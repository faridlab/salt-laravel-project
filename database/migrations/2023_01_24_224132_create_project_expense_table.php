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
        Schema::create('project_expense', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('project_id')->references('id')->on('projects');
            $table->foreignUuid('category_id')->nullable()->references('id')->on('sysparams')->comment('Category Expense');
            $table->string('item_name');

            $table->float('price', 12, 2);
            $table->char('base_currency', 3)->default('USD')->comment('USD, JPY, EUR, IDR');
            $table->char('exchange_currency', 3)->default('USD')->comment('USD, JPY, EUR, IDR');
            $table->float('exchange_value', 12, 2)->default(0);

            $table->date('purchased_date');
            $table->foreignUuid('employee_id')->references('id')->on('employees');
            $table->string('purchased_from');

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
        Schema::dropIfExists('project_expense');
    }
};
