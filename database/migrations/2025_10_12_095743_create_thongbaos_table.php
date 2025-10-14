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
        Schema::create('thongbaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_actor')->nullable();
            $table->string('loai', 50)->nullable();
            $table->string('noidung', 200)->nullable();
            $table->unsignedBigInteger('id_affected')->nullable()->index();
            $table->dateTime('thoigian')->useCurrent()->nullable(); // thời gian tạo thông báo hay cập nhật
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thongbaos');
    }
};
