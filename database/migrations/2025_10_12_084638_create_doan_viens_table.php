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
        Schema::create('doan_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten', 100);
            $table->date('ngay_sinh')->nullable();
            $table->enum('gioi_tinh', ['Nam', 'Nữ', 'Khác']);

            // Khai báo các cột khóa ngoại
            $table->unsignedBigInteger('lop_id')->nullable();
            $table->unsignedBigInteger('chidoan_id')->nullable();

            // Định nghĩa các ràng buộc khóa ngoại
            $table->foreign('lop_id')
                    ->references('id')
                    ->on('lops')
                    ->onDelete('cascade');
            $table->foreign('chidoan_id')
                    ->references('id')
                    ->on('chi_doans')
                    ->onDelete('cascade');

            $table->integer('khoa');
            $table->string('email', 100)->nullable()->unique();
            $table->string('sdt', 15)->nullable();
            $table->enum('chuc_vu', ['doanvien', 'canbodoan', 'admin'])->default('doanvien');
            $table->integer('nien_khoa')->nullable();
            $table->string('password')->nullable();
            $table->string('reset_token')->nullable();
            $table->timestamp('reset_token_expiry')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doan_viens');
    }
};
