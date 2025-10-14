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
        Schema::create('hoat_dongs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_hoat_dong', 150);
            $table->date('ngay_to_chuc')->nullable();
            $table->text('noi_dung')->nullable();
            $table->integer('diem')->default(0);
            $table->string('dia_diem')->nullable();
            $table->string('loai_hoat_dong', 100)->nullable();
            $table->integer('so_luong_tham_gia')->default(0);
            //$table->dateTime('ngay_tao')->nullable(); // Laravel tự động quản lý created_at
            $table->integer('nguoi_tao')->nullable(); // ->references('id')->on('users')->onDelete('cascade');
            $table->enum('trang_thai', ['chờ duyệt', 'đã duyệt', 'đã kết thúc'])->default('chờ duyệt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoat_dongs');
    }
};
