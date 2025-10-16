{{-- Giả sử bạn có một file layout chính tên là app.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    
    {{-- HEADER --}}
    <h1 class="text-2xl font-bold text-gray-700 mb-6">HỒ SƠ ĐOÀN TRƯỜNG</h1>

    {{-- Phần Thân (Card) --}}
    <div class="bg-white p-6 rounded-lg shadow-md" x-data="{ openModal: false }">
        
        {{-- Tiêu đề và các nút chức năng --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800">DANH SÁCH TÀI KHOẢN</h2>
            <div class="flex space-x-2">
                <button @click="openModal = true" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                    + Thêm thành viên
                </button>
                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded transition duration-300">
                    Reset
                </button>
                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded transition duration-300">
                    Filter
                </button>
            </div>
        </div>
        
        {{-- Bảng hiển thị danh sách --}}
        <table class="min-w-full bg-white">
            <thead class="bg-gray-50">
                <tr>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">MSV</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Họ tên</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày sinh</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lớp</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Chi đoàn</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Số điện thoại</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($dsDoanVien as $dv)
                <tr>
                    <td class="py-3 px-4 whitespace-nowrap">{{ $dv->MSV }}</td>
                    <td class="py-3 px-4 whitespace-nowrap">{{ $dv->HoTen }}</td>
                    <td class="py-3 px-4 whitespace-nowrap">{{ date('d-m-Y', strtotime($dv->NgaySinh)) }}</td>
                    <td class="py-3 px-4 whitespace-nowrap">{{ optional($dv->lop)->TenLop }}</td>
                    <td class="py-3 px-4 whitespace-nowrap">{{ optional(optional($dv->lop)->chiDoan)->TenChiDoan }}</td>
                    <td class="py-3 px-4 whitespace-nowrap">{{ $dv->SoDienThoai }}</td>
                    <td class="py-3 px-4 whitespace-nowrap">{{ $dv->Email }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4">Không có dữ liệu</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- MODAL THÊM THÀNH VIÊN --}}
        <div x-show="openModal" 
             class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center" 
             @click.away="openModal = false" x-cloak>
            <div class="bg-white rounded-lg shadow-xl p-8 w-full max-w-4xl" @click.stop>
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-semibold text-gray-800">THÊM TÀI KHOẢN</h3>
                    <button @click="openModal = false" class="text-gray-500 hover:text-gray-800 text-3xl">&times;</button>
                </div>
                
                {{-- Form thêm mới --}}
                <form action="{{ route('doanvien.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {{-- Cột 1 --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mã sinh viên:</label>
                            <input type="text" name="MSV" placeholder="Nhập mã sinh viên" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Khoa/Viện:</label>
                            <select name="MaChiDoan" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Chọn khoa/viện</option>
                                @foreach ($dsChiDoan as $cd)
                                    <option value="{{ $cd->MaChiDoan }}">{{ $cd->TenChiDoan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
                            <input type="email" name="Email" placeholder="Nhập email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- Cột 2 --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Họ và tên:</label>
                            <input type="text" name="HoTen" placeholder="Nhập tên đoàn viên" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                         <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Lớp:</label>
                            <select name="MaLop" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Chọn lớp</option>
                                 @foreach ($dsLop as $lop)
                                    <option value="{{ $lop->MaLop }}">{{ $lop->TenLop }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại:</label>
                            <input type="text" name="SoDienThoai" placeholder="Nhập số điện thoại" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- Cột 3 --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Ngày sinh:</label>
                            <input type="date" name="NgaySinh" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Niên khóa:</label>
                            <input type="text" name="NienKhoa" placeholder="VD: 2022-2026" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu:</label>
                            <input type="password" name="password" placeholder="Nhập mật khẩu" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        {{-- Cột 4 (trên layout mới) --}}
                         <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Giới tính:</label>
                            <select name="GioiTinh" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Chức vụ:</label>
                             <select name="ChucVu" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="Đoàn viên">Đoàn viên</option>
                                <option value="Bí thư">Bí thư</option>
                                <option value="Phó bí thư">Phó bí thư</option>
                            </select>
                        </div>
                         <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Xác nhận mật khẩu:</label>
                            <input type="password" name="password_confirmation" placeholder="Xác nhận lại mật khẩu" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    
                    {{-- Nút Thêm --}}
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded transition duration-300">
                            Thêm
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Thêm link CDN của Alpine.js vào layout chính của bạn --}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endpush