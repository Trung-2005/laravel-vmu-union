<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDoanVienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cho phép tất cả người dùng thực hiện yêu cầu này
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $doanVienId = $this->route('id'); // Lấy ID từ route
        return [
            'ho_ten' => ['required', 'string', 'max:100'],
            'ngay_sinh' => ['nullable', 'date'],
            'gioi_tinh' => ['required', Rule::in(['Nam', 'Nữ', 'Khác'])],
            'lop_id' => ['nullable', 'exists:lops,id'], // Giả sử bảng 'lops' có khóa chính là 'id'
            'chidoan_id' => ['nullable', 'exists:chi_doans,id'], // Giả sử bảng 'chi_doans' có khóa chính là 'id'
            'khoa' => ['required', 'integer'],
            'email' => ['nullable', 'email', 'max:100', Rule::unique('doan_viens', 'email')->ignore($doanVienId)],
            'sdt' => ['nullable', 'string', 'max:15'],
            'chuc_vu' => ['required', Rule::in(['doanvien', 'canbodoan', 'admin'])],
            'nien_khoa' => ['nullable', 'integer'],
            'password' => ['nullable', 'string', 'min:6'], // Thêm các rule khác nếu cần, ví dụ: 'confirmed'
        ];
    }

     public function messages(): array
    {
        return [
            'ho_ten.required' => 'Họ tên là bắt buộc.',
            'email.unique' => 'Email đã tồn tại.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            // Thêm các message khác nếu cần
        ];
    }
}
