<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
  </head>
  <body>
    @include('layouts.header')
    <div>
      <div class="w-full flex justify-between p-5">
        <div class="">
          <h1>Danh sách tài khoản</h1>
        </div>
        <div class="flex gap-5">
          <button
            class="add bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-colors duration-200"
          >
            Thêm thành viên
          </button>
          <button
            class="reset bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-colors duration-200"
          >
            reset
          </button>
          <button
            class="filter bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-colors duration-200"
          >
            Filter
          </button>
        </div>
      </div>
      <div class="overflow-x-auto p-4">
        <table
          class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm"
        >
          <thead class="text-black border">
            <tr>
              <th class="py-2 px-4 text-left">MSV</th>
              <th class="py-2 px-4 text-left">Họ tên</th>
              <th class="py-2 px-4 text-left">Ngày Sinh</th>
              <th class="py-2 px-4 text-left">Lớp</th>
              <th class="py-2 px-4 text-left">Chi đoàn</th>
              <th class="py-2 px-4 text-left">Số điện thoại</th>
              <th class="py-2 px-4 text-left">Email</th>
            </tr>
          </thead>
          <!-- --------------------------------------------------------------------------------------------------------- -->
          <tbody>
            <tr
              class="border-b border-gray-200 hover:bg-gray-100 cursor-pointer open-modal"
            >
              <td class="py-2 px-4">1</td>
              <td class="py-2 px-4">Nguyễn Văn A</td>
              <td class="py-2 px-4">a@example.com</td>
              <td class="py-2 px-4">Admin</td>
              <td class="py-2 px-4">Admin</td>
              <td class="py-2 px-4">Admin</td>
              <td class="py-2 px-4">Admin</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="w-full flex justify-center items-center gap-2 mt-4">
        <button class="p-2 bg-blue-500 rounded-lg text-white"><<</button>
        <button class="p-2 bg-blue-500 rounded-lg text-white">1</button>
        <button class="p-2 bg-blue-500 rounded-lg text-white">>></button>
      </div>
    </div>

    <!-- Modal thêm thành viên -->
    <div
      id="addMemberModal"
      class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50"
    >
      <div
        class="relative bg-white w-[80%] h-[80%] rounded-lg shadow-lg p-6 relative"
      >
        <h2 class="text-xl font-semibold mb-4 text-center text-blue-600">
          Thêm thành viên
        </h2>
        <form id="addMemberForm">
            <div class="flex w-full grid-cols-3 gap-5 justify-center items-center">
            <!-- 1 -->
            <div class="flex flex-col gap-3 w-1/3">
                <div>
                    <label class="block mb-1 text-sm font-medium">Mã Sinh Viên</label>
                    <input
                        type="text"
                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Nhập mã sinh viên"
                    />
                </div>

                <div>
                <label class="block mb-1 text-sm font-medium">Họ và Tên </label>
                <input
                    type="email"
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Nhập họ và tên "
                />
                </div>

                <div>
                <label class="block mb-1 text-sm font-medium">Ngày Sinh</label>
                <input
                    type="datetime-local"
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Nhập số điện thoại"
                />
                </div>


                <div>
                <label class="block mb-1 text-sm font-medium">Giới tính</label>
                <select
                    type=""
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    id="gioiTinh"
                >
                    <option value="none">Giới tính</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
                </div>
            </div>
            <!--  2-->
            <div class="flex flex-col gap-3 w-1/3">
                <div>
                <label class="block mb-1 text-sm font-medium">Khoa/viện</label>
                <select
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    id="khoaVien"
                    >
                    <option value="none">Chọn khoa/viện</option>
                    <option value="1">Khoa Hàng hải</option>
                    <option value="2">Khoa Máy tàu biển</option>
                    <option value="3">Khoa Công trình thủy</option>
                    <option value="4">Khoa Điện - Điện tử tàu biển</option>
                    <option value="5">Khoa Kinh tế</option>
                    <option value="6">Khoa Quản trị - Tài chính</option>
                    <option value="7">Khoa Công nghệ thông tin</option>
                    <option value="8">Khoa Đóng tàu</option>
                    <option value="9">Khoa Ngoại ngữ</option>
                    <option value="10">Viện Cơ khí</option>
                </select>

                </div>

                <div>
                <label class="block mb-1 text-sm font-medium">Lớp</label>
                <select
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    id="lop"
                    >
                    <option value="0">Chọn lớp</option>

                    <optgroup label="Khoa Hàng hải">
                        <option value="1">Điều khiển tàu biển</option>
                        <option value="2">Khai thác máy tàu biển</option>
                        <option value="3">Luật &amp; Bảo hiểm Hàng hải</option>
                    </optgroup>

                    <optgroup label="Khoa Máy tàu biển">
                        <option value="4">Khai thác máy tàu biển</option>
                        <option value="5">Kỹ thuật môi trường</option>
                    </optgroup>

                    <optgroup label="Khoa Công trình thủy">
                        <option value="6">Xây dựng công trình thủy</option>
                        <option value="7">Xây dựng dân dụng và công nghiệp</option>
                        <option value="8">Kỹ thuật an toàn hàng hải</option>
                        <option value="9">Kỹ thuật cầu đường</option>
                    </optgroup>

                    <optgroup label="Khoa Điện - Điện tử tàu biển">
                        <option value="10">Điện tự động tàu thủy</option>
                        <option value="11">Điện tử viễn thông</option>
                        <option value="12">Điện tự động công nghiệp</option>
                    </optgroup>

                    <optgroup label="Khoa Kinh tế">
                        <option value="13">Kinh tế vận tải biển</option>
                        <option value="14">Quản trị kinh doanh</option>
                        <option value="15">Kinh tế ngoại thương</option>
                        <option value="16">Tài chính kế toán</option>
                        <option value="17">Kinh doanh bảo hiểm</option>
                        <option value="18">Logistics và Quản trị chuỗi cung ứng</option>
                    </optgroup>

                    <optgroup label="Khoa Quản trị - tài chính">
                        <option value="19">Quản trị kinh doanh</option>
                        <option value="20">Quản trị Tài chính kế toán</option>
                    </optgroup>

                    <optgroup label="Khoa Công nghệ thông tin">
                        <option value="21">Công nghệ thông tin</option>
                        <option value="22">Truyền thông và mạng máy tính</option>
                        <option value="23">Kỹ thuật phần mềm</option>
                    </optgroup>

                    <optgroup label="Khoa Đóng tàu">
                        <option value="24">Thiết kế tàu thủy</option>
                        <option value="25">Đóng tàu thủy</option>
                    </optgroup>

                    <optgroup label="Khoa Ngoại ngữ">
                        <option value="26">Ngôn ngữ Anh</option>
                        <option value="27">Tiếng Anh thương mại</option>
                    </optgroup>

                    <optgroup label="Viện Cơ khí">
                        <option value="28">Thiết kế và Sửa chữa máy tàu thủy</option>
                        <option value="29">Máy nâng chuyển</option>
                    </optgroup>
                    </select>

                </div>

                <div>
                <label class="block mb-1 text-sm font-medium">Liên khóa</label>
                <select
                    type=""
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    id="nienKhoa"
                >
                    <option value="none">Niên khóa</option>
                    <option value="61">61</option>
                    <option value="62">62</option>
                    <option value="63">63</option>
                    <option value="64">64</option>
                    <option value="65">65</option>
                    <option value="66">66</option>
                </select>
                </div>

                <div>
                <label class="block mb-1 text-sm font-medium">Chức vụ</label>
                <select
                    type=""
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    id="chucVu"
                >
                    <option value="none">Chức vụ</option>
                    <option value="admin">Quản trị viên</option>
                    <option value="doanvien">Đoàn viên</option>
                    <option value="canbodoan">Cán bộ Đoàn</option>
                </select>
                </div>
            </div>
            <!-- 3 -->
            <div class="flex flex-col gap-3 w-1/3">
                <div>
                <label class="block mb-1 text-sm font-medium">Email</label>
                <input
                    type="text"
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="example@gmail.com"
                />
                </div>

                <div>
                <label class="block mb-1 text-sm font-medium"
                    >Số điện thoại</label
                >
                <input
                    type="email"
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="số điện thoại"
                />
                </div>

                <div>
                <label class="block mb-1 text-sm font-medium">Mật khẩu</label>
                <input
                    type="text"
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Nhập mật khẩu"
                />
                </div>

                <div>
                <label class="block mb-1 text-sm font-medium"
                    >Xác nhận mật khẩu</label
                >
                <input
                    type="text"
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Xác nhận mật khẩu"
                />
                </div>
            </div>

            <button
                id="closeModalX"
                class="absolute top-2 right-3 text-gray-500 hover:text-gray-700 text-xl"
            >
                &times;
            </button>
            </div>

            <div
            class="w-full absolute justify-end items-center bottom-[15px] gap-3"
            >
            <button
                class="them right-3 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
            >
                Thêm
            </button>
            </div>
        </form>
        
      </div>
    </div>

    <!-- Modal sửa/thêm thành viên -->
    <div
      id="fixMemberModal"
      class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50 transition-opacity duration-300"
    >
      <div
        class="relative bg-white w-[85%] h-[85%] rounded-lg shadow-lg p-6 overflow-y-auto animate-fadeIn"
      >
        <!-- Nút đóng -->
        <button
          id="closeModalY"
          class="absolute top-2 right-3 text-gray-500 hover:text-gray-700 text-2xl"
        >
          &times;
        </button>

        <h2 class="text-2xl font-semibold mb-4 text-center text-blue-600">
          Sửa thành viên
        </h2>

        <!-- Form chia 3 cột -->
        <div class="flex w-full gap-5 justify-center items-start">
          <!-- Cột 1 -->
          <div class="flex flex-col gap-3 w-1/3">
            <label class="text-sm font-medium">Mã Sinh Viên</label>
            <input
              type="text"
              class="input-style"
              placeholder="Nhập mã sinh viên"
            />

            <label class="text-sm font-medium">Họ và Tên</label>
            <input
              type="text"
              class="input-style"
              placeholder="Nhập họ và tên"
            />

            <label class="text-sm font-medium">Ngày Sinh</label>
            <input type="date" class="input-style" />

            <label class="text-sm font-medium">Giới tính</label>
            <select class="input-style">
              <option>Giới tính</option>
              <option>Nam</option>
              <option>Nữ</option>
            </select>
          </div>

          <!-- Cột 2 -->
          <div class="flex flex-col gap-3 w-1/3">
            <label class="text-sm font-medium">Khoa/Viện</label>
            <select class="input-style">
              <option value="none">Chọn khoa/viện</option>
                <option value="1">Khoa Hàng hải</option>
                <option value="2">Khoa Máy tàu biển</option>
                <option value="3">Khoa Công trình thủy</option>
                <option value="4">Khoa Điện - Điện tử tàu biển</option>
                <option value="5">Khoa Kinh tế</option>
                <option value="6">Khoa Quản trị - Tài chính</option>
                <option value="7">Khoa Công nghệ thông tin</option>
                <option value="8">Khoa Đóng tàu</option>
                <option value="9">Khoa Ngoại ngữ</option>
                <option value="10">Viện Cơ khí</option>
            </select>

            <label class="text-sm font-medium">Lớp</label>
            <select class="input-style">
              <option value="0">Chọn lớp</option>
              <optgroup label="Khoa Hàng hải">
                    <option value="1">Điều khiển tàu biển</option>
                    <option value="2">Khai thác máy tàu biển</option>
                    <option value="3">Luật &amp; Bảo hiểm Hàng hải</option>
                </optgroup>

                <optgroup label="Khoa Máy tàu biển">
                    <option value="4">Khai thác máy tàu biển</option>
                    <option value="5">Kỹ thuật môi trường</option>
                </optgroup>

                <optgroup label="Khoa Công trình thủy">
                    <option value="6">Xây dựng công trình thủy</option>
                    <option value="7">Xây dựng dân dụng và công nghiệp</option>
                    <option value="8">Kỹ thuật an toàn hàng hải</option>
                    <option value="9">Kỹ thuật cầu đường</option>
                </optgroup>

                <optgroup label="Khoa Điện - Điện tử tàu biển">
                    <option value="10">Điện tự động tàu thủy</option>
                    <option value="11">Điện tử viễn thông</option>
                    <option value="12">Điện tự động công nghiệp</option>
                </optgroup>

                <optgroup label="Khoa Kinh tế">
                    <option value="13">Kinh tế vận tải biển</option>
                    <option value="14">Quản trị kinh doanh</option>
                    <option value="15">Kinh tế ngoại thương</option>
                    <option value="16">Tài chính kế toán</option>
                    <option value="17">Kinh doanh bảo hiểm</option>
                    <option value="18">Logistics và Quản trị chuỗi cung ứng</option>
                </optgroup>

                <optgroup label="Khoa Quản trị - tài chính">
                    <option value="19">Quản trị kinh doanh</option>
                    <option value="20">Quản trị Tài chính kế toán</option>
                </optgroup>

                <optgroup label="Khoa Công nghệ thông tin">
                    <option value="21">Công nghệ thông tin</option>
                    <option value="22">Truyền thông và mạng máy tính</option>
                    <option value="23">Kỹ thuật phần mềm</option>
                </optgroup>

                <optgroup label="Khoa Đóng tàu">
                    <option value="24">Thiết kế tàu thủy</option>
                    <option value="25">Đóng tàu thủy</option>
                </optgroup>

                <optgroup label="Khoa Ngoại ngữ">
                    <option value="26">Ngôn ngữ Anh</option>
                    <option value="27">Tiếng Anh thương mại</option>
                </optgroup>

                <optgroup label="Viện Cơ khí">
                    <option value="28">Thiết kế và Sửa chữa máy tàu thủy</option>
                    <option value="29">Máy nâng chuyển</option>
                </optgroup>
            </select>

            <label class="text-sm font-medium">Niên khóa</label>
            <select class="input-style">
              <option value="none">Niên khóa</option>
              <option value="61">61</option>
              <option value="62">62</option>
              <option value="63">63</option>
              <option value="64">64</option>
              <option value="65">65</option>
              <option value="66">66</option>
            </select>

            <label class="text-sm font-medium">Chức vụ</label>
            <select class="input-style">
              <option value="none">Chức vụ</option>
              <option value="admin">Quản trị viên</option>
              <option value="doanvien">Đoàn viên</option>
              <option value="canbodoan">Cán bộ Đoàn</option>
            </select>
          </div>

          <!-- Cột 3 -->
          <div class="flex flex-col gap-3 w-1/3">
            <label class="text-sm font-medium">Email</label>
            <input
              type="email"
              class="input-style"
              placeholder="example@gmail.com"
            />

            <label class="text-sm font-medium">Số điện thoại</label>
            <input type="text" class="input-style" placeholder="0123456789" />

            <label class="text-sm font-medium">Mật khẩu</label>
            <input
              type="password"
              class="input-style"
              placeholder="Nhập mật khẩu"
            />

            <label class="text-sm font-medium">Xác nhận mật khẩu</label>
            <input
              type="password"
              class="input-style"
              placeholder="Nhập lại mật khẩu"
            />
          </div>
        </div>

        <!-- Hồ sơ Đoàn viên -->
        <hr class="w-full border-gray-300 my-6" />
        <h5 class="text-lg font-semibold text-gray-700 mb-4">
          Hồ sơ Đoàn Viên
        </h5>

        <div id="detail-second-wrapper" class="grid grid-cols-3 gap-5">
          <!-- Cột 1 -->
          <div class="flex flex-col gap-3">
            <label class="text-sm font-medium">Ngày vào Đoàn</label>
            <input type="date" class="input-style" />

            <label class="text-sm font-medium">Nơi kết nạp</label>
            <input
              type="text"
              class="input-style"
              placeholder="Nhập nơi kết nạp"
            />

            <label class="text-sm font-medium">Ảnh hồ sơ</label>
            <input
              type="file"
              accept=".jpg,.png,.pdf"
              class="w-full border rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-white file:bg-blue-600 hover:file:bg-blue-700"
            />
          </div>

          <!-- Cột 2 -->
          <div class="flex flex-col gap-3">
            <label class="text-sm font-medium"
              >Nơi sinh hoạt Đoàn (Thành phố)</label
            >
            <input
              type="text"
              class="input-style"
              placeholder="Tên thành phố"
            />

            <label class="text-sm font-medium"
              >Nơi sinh hoạt Đoàn (Quận/Huyện)</label
            >
            <input type="text" class="input-style" placeholder="Quận/Huyện" />
          </div>

          <!-- Cột 3 -->
          <div class="flex flex-col items-center justify-start text-gray-600">
            <h6 class="font-medium mb-2">Hình ảnh hồ sơ hiển thị tại đây:</h6>
            <div
              class="w-[150px] h-[150px] border-2 border-dashed border-gray-400 rounded-lg flex justify-center items-center"
            >
              <span class="text-sm text-gray-400">Chưa có ảnh</span>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <div class="flex justify-end items-center gap-3 mt-6">
          <button
            type="button"
            onclick="deleteUser()"
            class="px-5 py-2 border border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition"
          >
            <i class="bi bi-trash mr-1"></i> Xóa tài khoản
          </button>

          <button
            type="button"
            onclick="saveDetailChanges()"
            class="px-5 py-2 border border-blue-500 text-blue-500 rounded-lg hover:bg-blue-600 hover:text-white transition"
          >
            <i class="bi bi-save mr-1"></i> Lưu thay đổi
          </button>
        </div>

        <!-- Nút thêm nằm sát phải dưới cùng -->
      </div>
    </div>

    <!-- Style chung -->
    <style>
      .input-style {
        @apply w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400;
      }
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: scale(0.95);
        }
        to {
          opacity: 1;
          transform: scale(1);
        }
      }
      .animate-fadeIn {
        animation: fadeIn 0.25s ease-out;
      }
    </style>
  </body>
<script>
    // Lắng nghe sự kiện click trên button "Thêm"
    document.querySelector('.them').addEventListener('click', () => {
        // Thu thập dữ liệu từ form (giả sử form có ID 'addMemberForm'; nếu không, bạn có thể thêm ID này vào <form> trong modal)
        const form = document.getElementById('addMemberForm'); // Thêm ID này vào form nếu chưa có
        if (!form) {
            alert('Form không tìm thấy!');
            return;
        }
        
        const formData = new FormData(form);
        const dataStudent = {};
        
        // Duyệt qua FormData và thêm vào object
        formData.forEach((value, key) => {
            dataStudent[key] = value;
        });
        
        // Thêm các trường đặc biệt nếu cần (ví dụ: checkbox cho role admin, nhưng trong code của bạn không có, nên bỏ qua hoặc điều chỉnh)
        // dataStudent.admin_role = form.elements.admin_role ? (form.elements.admin_role.checked ? 1 : 0) : 0;
        
        // Lấy CSRF token từ meta tag (Laravel tự động thêm)
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Gửi fetch đến route Laravel
        fetch('/add_doanvien', {  // Đường dẫn mới như bạn đề xuất
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,  // CSRF token cho Laravel
            },
            body: JSON.stringify(dataStudent)
        })
        .then(res => res.json())
        .then((data) => {
            if (data.success) {
                alert(data.message);
                // Đóng modal
                const modal = document.getElementById('addMemberModal');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                // Reload trang để cập nhật danh sách
                location.reload();
            } else {
                alert('Lỗi: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
            alert('Đã xảy ra lỗi khi thêm thành viên');
        });
    });
    
    // Các phần khác giữ nguyên (mở/đóng modal, v.v.)
    const addMenberModal = document.querySelector('.add');
    const modal = document.getElementById('addMemberModal');
    const closeModalX = document.getElementById('closeModalX');
    
    addMenberModal.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });
    
    closeModalX.addEventListener('click', () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    });
    
    // ... (các phần khác như open modal sửa, v.v.)
</script>

</html>
