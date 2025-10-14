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
        Schema::create('tham_gias', function (Blueprint $table) {
            $table->id();

            // Khai báo các cột khóa ngoại
            $table->unsignedBigInteger('doanvien_id')->nullable();
            $table->unsignedBigInteger('hoatdong_id')->nullable();

            // Định nghĩa các ràng buộc khóa ngoại
            $table->foreign('doanvien_id')
                    ->references('id')
                    ->on('doan_viens')
                    ->onDelete('cascade');
            $table->foreign('hoatdong_id')
                    ->references('id')
                    ->on('hoat_dongs')
                    ->onDelete('cascade');

            $table->boolean('da_tham_gia')->default(false);
            $table->integer('diem_rieng')->default(0);
            $table->timestamps();

            // Gợi ý thêm: Đảm bảo một đoàn viên không thể tham gia 1 hoạt động nhiều lần
            // $table->unique(['doan_vien_id', 'hoat_dong_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tham_gias');
    }
};
