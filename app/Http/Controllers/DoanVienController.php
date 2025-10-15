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
        // 1. Lấy dữ liệu từ database
        $dsDoanVien = DoanVien::with('lop.chiDoan')->get();
        
        // Lấy thêm dữ liệu cho modal nếu cần
        $dsChiDoan = ChiDoan::all();
        $dsLop = Lop::all();

        // 2. Trả về view 'manage_user' và gửi kèm biến $dsDoanVien
        //    Sử dụng hàm compact() để tạo một mảng chứa các biến và giá trị của chúng.
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
        $doanVien = DoanVien::create($request->validated());
        return response()->json($doanVien, 201);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoanVien $doanVien)
    {
        //
    }
}
