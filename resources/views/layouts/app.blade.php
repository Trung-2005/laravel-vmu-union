<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý hồ sơ đoàn viên</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">HỒ SƠ ĐOÀN TRƯỜNG</h1>
        @yield('content') 
        {{-- một placeholder, nơi nội dung của các trang con sẽ được chèn vào. --}}
    </div>
</body>
</html>