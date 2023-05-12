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
        Schema::create('streets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->integer('km');
            $table->timestamps();
        });
        
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('street_id')->constrained('streets')->cascadeOnDelete();
            $table->integer('house_number');
            $table->string('house_type');
            $table->integer('number_of_floors');
            $table->date('active_from');
            $table->date('active_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
        Schema::dropIfExists('streets');
    }
};
