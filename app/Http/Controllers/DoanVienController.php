<?php

namespace App\Http\Controllers;

use App\Models\DoanVien;
use App\Models\Lop;
use App\Models\ChiDoan;
use App\Http\Requests\StoreDoanVienRequest;
use App\Http\Requests\UpdateDoanVienRequest;
class DoanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dsDoanVien = DoanVien::with(['lop', 'chiDoan'])->paginate(10);
        // Lấy thêm dữ liệu cho modal nếu cần
        $dsChiDoan = ChiDoan::all();
        $dsLop = Lop::all();

        return view('manage_user', compact('dsDoanVien', 'dsChiDoan', 'dsLop'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoanVienRequest $request)
    {
        $validatedData = $request->validated();

        // Xử lý mật khẩu nếu có
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            // Loại bỏ password khỏi mảng nếu không được cung cấp
            unset($validatedData['password']);
        }

        $doanVien = DoanVien::create($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Đoàn viên đã được thêm thành công.',
            'data' => $doanVien
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(DoanVien $doanVien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoanVien $doanVien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoanVienRequest $request, DoanVien $doanVien)
    {
        $vadidateData = $request->validated();
        // Xử lý mật khẩu nếu có
        if (!empty($vadidateData['password'])) {
            $vadidateData['password'] = bcrypt($vadidateData['password']);
        } else {
            // Loại bỏ password khỏi mảng nếu không được cung cấp
            unset($vadidateData['password']);      
        }
        $doanVien->update($vadidateData);
        return response()->json([
            'success' => true,
            'message' => 'Đoàn viên đã được cập nhật thành công.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoanVien $doanVien)
    {
        //
    }
}
