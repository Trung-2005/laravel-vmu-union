<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiDoan extends Model
{
    /** @use HasFactory<\Database\Factories\ChiDoanFactory> */
    use HasFactory;

        /**
        * Các thuộc tính có thể được gán hàng loạt.
        *
        * @var array<int, string>
        */
    protected $fillable = [
        'ten_chidoan',
    ];

    public function lops()
    {
        return $this->hasMany(Lop::class, 'chidoan_id');
    }

    public function doanViens()
    {
        return $this->hasMany(DoanVien::class, 'chidoan_id');
    }

    public function scopeSearch($query, string $keyword)
    {
        return $query->where('ten_chi_doan', 'like', "%{$keyword}%");
    }

}
