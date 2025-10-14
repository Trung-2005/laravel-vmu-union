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
        Schema::create('doan_phis', function (Blueprint $table) {
            $table->id();
            // Khai báo cột khóa ngoại
            $table->unsignedBigInteger('doanvien_id')->nullable();

            // Định nghĩa ràng buộc khóa ngoại
            $table->foreign('doanvien_id')
                    ->references('id') 
                    ->on('doan_viens')
                    ->onDelete('cascade');

            $table->integer('nam')->nullable();
            $table->date('ngay_dong')->nullable();
            $table->boolean('da_dong')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doan_phis');
    }
};
