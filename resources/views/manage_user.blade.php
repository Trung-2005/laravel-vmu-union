<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
  </head>
  <body>
    @include('layouts.header')
    <div>
      <div class="w-full flex justify-between p-5">
        <div class="">
          <h1>Danh sách Đoàn Viên</h1>
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
            Tải lại
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
          id="memberTable"
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
            @forelse ($dsDoanVien as $doanVien)
            <tr
              class="border-b border-gray-200 hover:bg-gray-50 cursor-pointer open-edit-modal"
              data-id="{{ $doanVien->id }}" {{-- Thêm data-id để xác định đoàn viên khi click --}}
            >
              <td class="py-2 px-4 text-sm">{{ $doanVien->id }}</td>
              <td class="py-2 px-4 text-sm">{{ $doanVien->ho_ten }}</td>
              <td class="py-2 px-4 text-sm">{{ $doanVien->ngay_sinh }}</td>
              <td class="py-2 px-4 text-sm">{{ $doanVien->lop->ten_lop ?? 'N/A' }}</td>
              <td class="py-2 px-4 text-sm">{{ $doanVien->chiDoan->ten_chidoan ?? 'N/A' }}</td>
              <td class="py-2 px-4 text-sm">{{ $doanVien->sdt }}</td>
              <td class="py-2 px-4 text-sm">{{ $doanVien->email }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="py-2 px-4 text-center">Không có đoàn viên nào</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      {{-- Phân trang --}}
      <div class="w-full flex justify-center items-center gap-2 mt-6">
        {{ $dsDoanVien->links() }} {{-- Sử dụng links() để render các nút phân trang --}}
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
        <form id="addMemberForm" action="{{ route('add_doanvien') }}" method="POST">
            @csrf 
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="flex flex-col gap-4">
                <div>
                    <label for="ho_ten" class="block mb-1 text-sm font-medium">Họ và Tên <span class="text-red-500">*</span></label>
                    <input name="ho_ten" id="ho_ten" type="text" class="input-style" placeholder="Nhập họ và tên" required />
                </div>
                 <div>
                    <label for="ngay_sinh" class="block mb-1 text-sm font-medium">Ngày Sinh</label>
                    <input name="ngay_sinh" id="ngay_sinh" type="date" class="input-style" />
                </div>
                <div>
                    <label for="gioi_tinh" class="block mb-1 text-sm font-medium">Giới tính <span class="text-red-500">*</span></label>
                    <select name="gioi_tinh" id="gioi_tinh" class="input-style" required>
                        <option value="">Chọn giới tính</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                </div>
                 <div>
                    <label for="khoa" class="block mb-1 text-sm font-medium">Khóa học <span class="text-red-500">*</span></label>
                    <input name="khoa" id="khoa" type="number" class="input-style" placeholder="Ví dụ: 65" required />
                </div>
            </div>
            <div class="flex flex-col gap-4">
                 <div>
                    <label for="chidoan_id" class="block mb-1 text-sm font-medium">Chi đoàn (Khoa/Viện)</label>
                    <select name="chidoan_id" id="chidoan_id" class="input-style">
                        <option value="">Chọn chi đoàn</option>
                        @foreach($dsChiDoan as $chiDoan)
                            <option value="{{ $chiDoan->id }}">{{ $chiDoan->ten_chidoan }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="lop_id" class="block mb-1 text-sm font-medium">Lớp</label>
                    <select name="lop_id" id="lop_id" class="input-style">
                        <option value="">Chọn lớp</option>
                         @foreach($dsLop as $lop)
                            <option value="{{ $lop->id }}" data-chidoan="{{ $lop->chidoan_id }}">{{ $lop->ten_lop }}</option> {{-- Thêm data-chidoan để filter lớp theo chi đoàn nếu cần --}}
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="nien_khoa" class="block mb-1 text-sm font-medium">Niên khóa</label>
                    <input name="nien_khoa" id="nien_khoa" type="number" class="input-style" placeholder="Ví dụ: 2020" />
                </div>
                <div>
                    <label for="chuc_vu" class="block mb-1 text-sm font-medium">Chức vụ <span class="text-red-500">*</span></label>
                    <select name="chuc_vu" id="chuc_vu" class="input-style" required>
                        <option value="doanvien">Đoàn viên</option>
                        <option value="canbodoan">Cán bộ Đoàn</option>
                        <option value="admin">Quản trị viên</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                 <div>
                    <label for="email" class="block mb-1 text-sm font-medium">Email</label>
                    <input name="email" id="email" type="email" class="input-style" placeholder="example@gmail.com" />
                </div>
                <div>
                    <label for="sdt" class="block mb-1 text-sm font-medium">Số điện thoại</label>
                    <input name="sdt" id="sdt" type="tel" class="input-style" placeholder="Số điện thoại" />
                </div>
                <div>
                    <label for="password" class="block mb-1 text-sm font-medium">Mật khẩu</label>
                    <input name="password" id="password" type="password" class="input-style" placeholder="Nhập mật khẩu" />
                </div>
                 <div>
                    <label for="password_confirmation" class="block mb-1 text-sm font-medium">Xác nhận mật khẩu</label>
                    <input name="password_confirmation" id="password_confirmation" type="password" class="input-style" placeholder="Xác nhận mật khẩu" />
                </div>
            </div>
            </div>

            {{-- Nút đóng và nút thêm --}}
            <button
                type="button" 
                id="closeModalX"
                class="absolute top-3 right-4 text-gray-500 hover:text-gray-700 text-2xl font-bold"
            >
                &times;
            </button>
            <div class="mt-6 flex justify-end items-center gap-3">
                 <button
                    type="button"
                    id="cancelAddBtn"
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400"
                >
                    Hủy
                </button>
                <button
                    type="submit"
                    id="submitAddBtn"
                    {{-- class="them px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700" --}}
                    class="them px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center gap-2"
                >
                    {{-- Thêm Đoàn viên --}}
                    <span id="submitText">Thêm Đoàn viên</span>
                    <div id="loadingSpinner" class="hidden w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                </button>
            </div>
        </form>
        
      </div>
    </div>

    <!-- Modal sửa/thêm thành viên -->
    <div
      id="editMemberModal"
      class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50 transition-opacity duration-300"
    >
      <div
        class="relative bg-white w-[85%] h-[85%] rounded-lg shadow-lg p-6 overflow-y-auto animate-fadeIn"
      >
        <h2 class="text-2xl font-semibold mb-4 text-center text-blue-600">
          Chỉnh sửa thông tin Đoàn viên
        </h2>
        {{-- Form sửa đoàn viên --}}
        <form id="editMemberForm" method="POST">
          @csrf
          @method('PUT') {{-- Báo cho Laravel đây là request PUT --}}
          
          {{-- Input ẩn để lưu ID của đoàn viên đang sửa --}}
          <input type="hidden" id="edit_doanvien_id" name="edit_doanvien_id">

          <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="flex flex-col gap-4">
              <div>
                <label for="edit_ho_ten" class="block mb-1 text-sm font-medium"
                  >Họ và Tên <span class="text-red-500">*</span></label
                >
                <input
                  name="ho_ten"
                  id="edit_ho_ten"
                  type="text"
                  class="input-style"
                  placeholder="Nhập họ và tên"
                />
                <span class="text-red-500 text-sm" id="edit_ho_ten_error"></span>
              </div>
              <div>
                <label for="edit_ngay_sinh" class="block mb-1 text-sm font-medium"
                  >Ngày Sinh</label
                >
                <input
                  name="ngay_sinh"
                  id="edit_ngay_sinh"
                  type="date"
                  class="input-style"
                />
                <span class="text-red-500 text-xs mt-1 error-message" id="error_edit_ngay_sinh"></span>
              </div>
              <div>
                <label for="edit_gioi_tinh" class="block mb-1 text-sm font-medium"
                  >Giới tính <span class="text-red-500">*</span></label
                >
                <select
                  name="gioi_tinh"
                  id="edit_gioi_tinh"
                  class="input-style"
                >
                  <option value="">Chọn giới tính</option>
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                  <option value="Khác">Khác</option>
                </select>
                <span class="text-red-500 text-xs mt-1 error-message" id="error_edit_gioi_tinh"></span>
              </div>
              <div>
                <label for="edit_khoa" class="block mb-1 text-sm font-medium"
                  >Khóa học <span class="text-red-500">*</span></label
                >
                <input
                  name="khoa"
                  id="edit_khoa"
                  type="text"
                  class="input-style"
                  placeholder="Ví dụ: 65"
                />
                <span class="text-red-500 text-xs mt-1 error-message" id="error_edit_khoa"></span>
              </div>
            </div>
            <div class="flex flex-col gap-4">
              <div>
                <label for="edit_chidoan_id" class="block mb-1 text-sm font-medium">Chi đoàn (Khoa/Viện)</label>
                <select name="chidoan_id" id="edit_chidoan_id" class="input-style">
                  <option value="">Chọn chi đoàn</option>
                  @foreach ($dsChiDoan as $chiDoan)
                    <option value="{{ $chiDoan->id }}">{{ $chiDoan->ten }}</option>
                  @endforeach
                </select>
                <span class="text-red-500 text-xs mt-1 error-message" id="error_edit_chidoan_id"></span>
              </div>
              <div>
                <label for="edit_lop_id" class="block mb-1 text-sm font-medium">Lớp</label>
                <select name="lop_id" id="edit_lop_id" class="input-style">
                  <option value="">Chọn lớp</option>
                  @foreach ($dsLop as $lop)
                    <option value="{{ $lop->id }}">{{ $lop->ten }}</option>
                  @endforeach
                </select>
                <span class="text-red-500 text-xs mt-1 error-message" id="error_edit_lop_id"></span>
              </div>
              <div>
                <label for="edit_nien_khoa" class="block mb-1 text-sm font-medium">Niên khóa</label>
                <input
                  name="nien_khoa"
                  id="edit_nien_khoa"
                  type="number"
                  class="input-style"
                  placeholder="Ví dụ: 2020"
                />
                <span class="text-red-500 text-xs mt-1 error-message" id="error_edit_nien_khoa"></span>
              </div>
              <div>
                <label for="edit_chu_vu" class="block mb-1 text-sm font-medium">Chức vụ <span class="text-red-500">*</span></label>
                <select name="chuc_vu" id="edit_chuc_vu" class="input-style">
                  <option value="doanvien">Đoàn viên</option>
                  <option value="canbodoan">Cán bộ Đoàn</option>
                  <option value="admin">Quản trị viên</option>
                </select>
                <span class="text-red-500 text-xs mt-1 error-message" id="error_edit_chuc_vu"></span>
              </div>
            </div>
            <div class="flex flex-col gap-4">
              <div>
                <label for="edit_email" class="block mb-1 text-sm font-medium">Email</label>
                <input name="email" id="edit_email" type="email" class="input-style" placeholder="example@gmail.com" />
                <span class="text-red-500 text-xs mt-1 error-message" id="error_edit_email"></span>
              </div>
              <div>
                <label for="edit_sdt" class="block mb-1 text-sm font-medium">Số điện thoại</label>
                <input name="sdt" id="edit_sdt" type="tel" class="input-style" placeholder="Số điện thoại" />
                <span class="text-red-500 text-xs mt-1 error-message" id="error_edit_sdt"></span>
              </div>
              <div>
                <label for="edit_password" class="block mb-1 text-sm font-medium">Mật khẩu mới</label>
                <input name="password" id="edit_password" type="password" class="input-style" placeholder="Bỏ trống nếu không đổi" />
                <span class="text-red-500 text-xs mt-1 error-message" id="error_edit_password"></span>
              </div>
              <div>
                <label for="edit_password_confirmation" class="block mb-1 text-sm font-medium">Xác nhận mật khẩu mới</label>
                <input name="password_confirmation" id="edit_password_confirmation" type="password" class="input-style" placeholder="Nhập lại mật khẩu mới" />
                {{-- Không cần span lỗi cho trường 'password_confirmation' vì lỗi sẽ hiện ở 'password' --}}
              </div>
            </div>
          </div>

          {{-- Nút đóng và nút cập nhật --}}
          <button
            type="button"
            id="closeEditModalX"
            class="absolute top-3 right-4 text-gray-500 hover:text-gray-700 text-2xl font-bold"
          >
           &times;
          </button>
          <div class="mt-6 flex justify-end items-center gap-3">
            <button
              type="button"
              id="cancelEditBtn"
              class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400"
            >
              Hủy
            </button>
            <button
              type="submit"
              class="them px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700"
            >
              Lưu Cập nhật
            </button>
          </div>
        </form>
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
    // Biến toàn cục
    const addMemberBtn = document.querySelector('.add'); // nút thêm thành viên
    const addModal = document.getElementById('addMemberModal'); // nút thêm thành viên ở trong modal
    const closeModalX = document.getElementById('closeModalX'); // nút đóng modal
    const cancelAddBtn = document.getElementById('cancelAddBtn'); // nút huỷ modal
    const addMemberForm = document.getElementById('addMemberForm'); // nút form thêm thành viên
    const submitAddBtn = document.getElementById('submitAddBtn'); // nút submit thêm thành viên
    const submitText = document.getElementById('submitText'); // text trong nút submit
    const loadingSpinner = document.getElementById('loadingSpinner'); // quay quay trong nút thêm thành viên

    // Hàm đóng modal
    function closeModal() {
        addModal.classList.add('hidden');
        addModal.classList.remove('flex');
    }

    // Hàm hiển thị loading
    function setLoading(isLoading) {
        submitAddBtn.disabled = isLoading;
        submitText.textContent = isLoading ? 'Đang xử lý...' : 'Thêm Đoàn viên';
        loadingSpinner.classList.toggle('hidden', !isLoading);
    }

    // Hàm submit form thêm thành viên
    async function submitForm(e) {
      e.preventDefault();
      setLoading(true);

      const formData = new FormData(addMemberForm);
      const data = Object.fromEntries(formData.entries());
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      try {
        const response = await fetch("{{ route('add_doanvien') }}", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
          },
          body: JSON.stringify(data)
        });

        // Lưu phản hồi từ server vào biến res
        const result = await response.json();

        if (response.status === 201) {
          alert(result.message);
          closeModal();
          addMemberForm.reset();
          location.reload();
        } else if (response.status === 422) {
          const errors = Object.values(result.errors || {}).flat().join('\n'); // chuỗi chứa tất cả các lỗi validation từ server
          alert(`Thêm thất bại:\n${result.message}\n${errors}`); // hiển thị lỗi
        } else {
          alert(result.message || 'Lỗi không xác định.'); // các lỗi khác
        }
      } catch (error) {
        console.error('Lỗi Fetch:', error);
        alert('Đã xảy ra lỗi khi gửi yêu cầu.');
      } finally {
        setLoading(false); // set lại trạng thái loading
      }
    }

    // Các sự kiện
    addMemberBtn.addEventListener('click', () => {
      addModal.classList.remove('hidden');
      addModal.classList.add('flex');
    });

    closeModalX.addEventListener('click', closeModal);
    cancelAddBtn.addEventListener('click', closeModal);
    addMemberForm.addEventListener('submit', submitForm); // sự kiện submit form thêm thành viên


    
    // Biến modal sửa
    const editModal = document.getElementById('editMemberModal');
    const editForm = document.getElementById('editMemberForm');
    const editDoanVienIdInput = document.getElementById('edit_doanvien_id');

    // Hàm đóng modal sửa
    function closeEditModal() {
        editModal.classList.add('hidden');
        editModal.classList.remove('flex');
        editForm.reset(); // Reset form
        document.querySelectorAll('.error-message').forEach(span => span.textContent = ''); // Xóa lỗi cũ
    }

    // Hàm fetch dữ liệu đoàn viên và điền vào modal
    async function loadDoanVienData(id) {
        try {
            const response = await fetch(`{{ route('get_doanvien', ':id') }}`.replace(':id', id), {
                method: 'GET',
                headers: { 'Accept': 'application/json' }
            });
            const data = await response.json();
            if (response.ok) {
                // Điền dữ liệu vào form
                editDoanVienIdInput.value = data.id;
                document.getElementById('edit_ho_ten').value = data.ho_ten || '';
                document.getElementById('edit_ngay_sinh').value = data.ngay_sinh || '';
                document.getElementById('edit_gioi_tinh').value = data.gioi_tinh || '';
                document.getElementById('edit_khoa').value = data.khoa || '';
                document.getElementById('edit_chidoan_id').value = data.chidoan_id || '';
                document.getElementById('edit_lop_id').value = data.lop_id || '';
                document.getElementById('edit_nien_khoa').value = data.nien_khoa || '';
                document.getElementById('edit_chuc_vu').value = data.chuc_vu || '';
                document.getElementById('edit_email').value = data.email || '';
                document.getElementById('edit_sdt').value = data.sdt || '';
                // Password không điền (để trống)
                editModal.classList.remove('hidden');
                editModal.classList.add('flex');
            } else {
                alert('Không thể tải dữ liệu đoàn viên.');
            }
        } catch (error) {
            console.error('Lỗi fetch:', error);
            alert('Đã xảy ra lỗi khi tải dữ liệu.');
        }
    }

    // Hàm submit form sửa
    async function submitEditForm(e) {
        e.preventDefault();
        const formData = new FormData(editForm);
        const data = Object.fromEntries(formData.entries());
        const id = data.edit_doanvien_id; // Lấy ID từ input ẩn
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Xóa lỗi cũ
        document.querySelectorAll('.error-message').forEach(span => span.textContent = '');

        try {
            const response = await fetch(`{{ route('update_doanvien', ':id') }}`.replace(':id', id), {
                method: 'POST', // Laravel xử lý PUT qua @method
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            });
            const result = await response.json();
            if (response.ok) {
                alert(result.message);
                closeEditModal();
                location.reload(); // Reload để cập nhật bảng
            } else if (response.status === 422) {
                // Hiển thị lỗi validation
                for (const [field, messages] of Object.entries(result.errors || {})) {
                    const errorSpan = document.getElementById(`error_edit_${field}`);
                    if (errorSpan) errorSpan.textContent = messages.join(', ');
                }
                alert('Vui lòng kiểm tra các lỗi và thử lại.');
            } else {
                alert(result.message || 'Lỗi không xác định.');
            }
        } catch (error) {
            console.error('Lỗi Fetch:', error);
            alert('Đã xảy ra lỗi khi gửi yêu cầu.');
        }
    }

    // Event listeners
    document.querySelectorAll('.open-edit-modal').forEach(row => { // Giả sử hàng bảng có class này và data-id
        row.addEventListener('click', () => {
            const id = row.getAttribute('data-id');
            loadDoanVienData(id);
        });
    });

    document.getElementById('closeEditModalX').addEventListener('click', closeEditModal);
    document.getElementById('cancelEditBtn').addEventListener('click', closeEditModal);
    editForm.addEventListener('submit', submitEditForm);


  </script>
</html>