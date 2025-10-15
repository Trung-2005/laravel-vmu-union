<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoanVien extends Model
{
    /** @use HasFactory<\Database\Factories\DoanVienFactory> */
    use HasFactory;

    protected $fillable = [
        'ho_ten',
        'ngay_sinh',
        'gioi_tinh',
        'lop_id',
        'chidoan_id',
        'khoa',
        'email',
        'sdt',
        'chuc_vu',
        'nien_khoa',
        'password',
    ];

    /**
     * Các thuộc tính nên được ẩn khi chuyển đổi thành mảng hoặc JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'reset_token',
    ];

    /**
     * Định nghĩa mối quan hệ "belongsTo" với model Lop.
     * Mỗi đoàn viên thuộc về một lớp.
     */
    public function lop()
    {
        return $this->belongsTo(Lop::class, 'lop_id');
    }

    /**
     * Định nghĩa mối quan hệ "belongsTo" với model ChiDoan.
     * Mỗi đoàn viên thuộc về một chi đoàn.
     */
    public function chiDoan()
    {
        return $this->belongsTo(ChiDoan::class, 'chidoan_id');
    }

    /**
     * Giới hạn một truy vấn để tìm kiếm đoàn viên theo từ khóa.
     * Từ khóa sẽ được tìm kiếm trên nhiều trường dữ liệu.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, string $keyword)
    {
        return $query->where(function ($q) use ($keyword) {
            $q->where('ho_ten', 'like', "%{$keyword}%")
              ->orWhere('email', 'like', "%{$keyword}%")
              ->orWhere('sdt', 'like', "%{$keyword}%")
              ->orWhere('khoa', 'like', "%{$keyword}%")
              ->orWhere('nien_khoa', 'like', "%{$keyword}%")
              ->orWhere('chuc_vu', 'like', "%{$keyword}%");
        });
    }
}
