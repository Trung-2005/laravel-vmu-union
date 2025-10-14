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
        Schema::create('ho_sos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('doan_vien_id')->nullable();
            $table->foreign('doan_vien_id')
                    ->references('id')
                    ->on('doan_viens')
                    ->onDelete('cascade');
                    
            $table->date('ngay_vao_doan')->nullable();
            $table->string('noi_ket_nap', 150)->nullable();
            $table->string('file_scan')->nullable();
            $table->enum('trang_thai', ['Đầy đủ', 'Thiếu', 'Đang bổ sung'])->default('Thiếu');
            $table->string('noi_sinh_hoat_thanh_pho', 100)->nullable();
            $table->string('noi_sinh_hoat_quan_huyen', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ho_sos');
    }
};
