<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id()->index();
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('plant_category_id')->index();
            $table->foreign('plant_category_id')->references('id')->on('plant_categories');

            $table->string('name');
            $table->string('scientific_name');
            $table->string('habitat');
            $table->string('benefits');
            $table->string('nutritional_value');
            $table->longText('pests_and_diseases');
            $table->longText('cultivation_techniques');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
