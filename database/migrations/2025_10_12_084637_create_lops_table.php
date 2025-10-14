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
        Schema::create('lops', function (Blueprint $table) {
            $table->id();
            $table->string('ten_lop', 50);
            
            $table->unsignedBigInteger('chidoan_id')->nullable();
            $table->foreign('chidoan_id')
                    ->references('id')
                    ->on('chi_doans')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lops');
    }
};
