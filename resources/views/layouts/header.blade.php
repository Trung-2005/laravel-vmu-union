<!DOCTYPE html>
<html lang="en">
<header class="flex justify-between items-center p-5 bg-slate-200">
    <div class="flex ml-[5px] gap-5 items-center">
        <h1>Hồ sơ đoàn trường</h1>
        <a href="">Dashboard</a>
        <div class="">
            <label for="">Quản lí</label>
            <select name="" id="">
            Quản lí
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
            </select>
        </div>
        <a href="">Hoạt động</a>
        <a href="">Thông báo</a>
    </div>
    <div>
        <input type="text" placeholder="Search" />
        <a href="">Tài Khoản</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</header>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">HỒ SƠ ĐOÀN TRƯỜNG</h1>
        @yield('content') 
        {{-- một placeholder, nơi nội dung của các trang con sẽ được chèn vào. --}}
    </div>
</body>
</html>