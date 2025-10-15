<?php

namespace App\Http\Controllers;

use App\Models\Lop;
use App\Models\ChiDoan;
use App\Http\Requests\StoreLopRequest;
use App\Http\Requests\UpdateLopRequest;



class LopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dsLop = Lop::with('chiDoan')->paginate(10);
        return view('lop.index', compact('dsLop'));
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
    public function store(StoreLopRequest $request)
    {
        $lop = Lop::create($request->validated());
        return response()->json($lop, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lop $lop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lop $lop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLopRequest $request, Lop $lop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lop $lop)
    {
        //
    }
}
