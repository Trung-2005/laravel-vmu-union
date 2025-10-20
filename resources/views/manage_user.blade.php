
@extends('layouts.app')

<div class="container-fluid" id="user-management">

    <div class="user-management-div" id="show-users-list">
        <div id="database-handle">
            <h5>DANH SÁCH TÀI KHOẢN</h5>
            <div style="margin-left: auto;">
                <button type="button" class="btn btn-primary"     id="call-modal-signin">
                    {{-- onclick="loadSignUpModal() --}}
                    <i class="bi bi-person-plus"></i>
                    Thêm thành viên
                </button>
                <button type="button" class="btn btn-secondary" id="reset-list-btn"    >
                    {{-- onclick="resetPage()" --}}
                    <i class="bi bi-arrow-clockwise"></i>
                    Reset
                </button>
                <button type="button" class="btn btn-secondary" style="margin-left: 10px;" id="filter-list-btn"    >
                    {{-- onclick="loadFilter()" --}}
                    <i class="bi bi-filter"></i>
                    Filter
                </button>
            </div>
        </div>
        <div id="users-data-container">
            <table class="table table-hover" id="users-data-board">
                <thead>
                    <tr class="table-col">
                        <th scope="col">MSV</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Lớp</th>
                        <th scope="col">Chi đoàn</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody id="show-data-here">
                    <!-- Kết quả sẽ được chèn vào đây bởi AJAX -->
                </tbody>
            </table>
            <div class="pagination-container" style="display: flex; justify-content: center; margin-top: 20px;">
                <nav aria-label="Page navigation">
                    <ul class="pagination" id="pagination-controls">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous" id="prev-page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next" id="next-page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>