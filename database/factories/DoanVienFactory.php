<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoanVien>
 */
class DoanVienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'ho_ten' => $this->faker->name(),
            'ngay_sinh' => $this->faker->date(),
            'gioi_tinh' => $this->faker->randomElement(['Nam', 'Nữ', 'Khác']),
            'lop_id' => null, // Giả sử không có lớp nào được gán mặc định
            'chidoan_id' => null, // Giả sử không có chi đoàn nào được gán mặc định
            'khoa' => $this->faker->numberBetween(1, 10),
            'email' => $this->faker->unique()->safeEmail(),
            'sdt' => $this->faker->phoneNumber(),
            'chuc_vu' => $this->faker->randomElement(['doanvien', 'canbodoan', 'admin']),
            'nien_khoa' => $this->faker->numberBetween(2015, 2024),
            'password' => bcrypt('password'), // Mật khẩu mặc định cho tất cả các DoanVien
        ];
        return array_filter($data, fn ($value) => !is_null($value));
    }
}
