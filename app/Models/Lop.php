<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    /** @use HasFactory<\Database\Factories\LopFactory> */
    use HasFactory;


     /**
     * Các thuộc tính có thể được gán hàng loạt.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ten_lop',
        'chidoan_id',
    ];

    /**
     * Định nghĩa mối quan hệ "belongsTo" với model ChiDoan.
     * Mỗi Lớp thuộc về một Chi Đoàn (Khoa/Viện).
     */
    public function chiDoan()
    {
        return $this->belongsTo(ChiDoan::class, 'chidoan_id');
    }

    /**
     * Định nghĩa mối quan hệ "hasMany" với model DoanVien.
     * Mỗi Lớp có nhiều Đoàn Viên.
     */
    public function doanViens()
    {
        return $this->hasMany(DoanVien::class, 'lop_id');
    }

    /**
     * Giới hạn một truy vấn để tìm kiếm Lớp theo từ khóa.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, string $keyword)
    {
        return $query->where('ten_lop', 'like', "%{$keyword}%");
    }
}
