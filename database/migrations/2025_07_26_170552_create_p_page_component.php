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
        Schema::create('p_page_component', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->unsignedBigInteger('component_id');
            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('page')->onDelete('cascade');
            $table->foreign('component_id')->references('id')->on('component')->onDelete('cascade'); // give alert to delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_page_component');
    }
};
