<?php

namespace App\Http\Controllers;

use App\Models\ChiDoan;
use App\Http\Requests\StoreChiDoanRequest;
use App\Http\Requests\UpdateChiDoanRequest;

class ChiDoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dsChiDoan = ChiDoan::paginate(10);
        return view('chidoan.index', compact('dsChiDoan'));
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
    public function store(StoreChiDoanRequest $request)
    {
        $chiDoan = ChiDoan::create($request->validated());
        return response()->json($chiDoan, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ChiDoan $chiDoan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChiDoan $chiDoan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChiDoanRequest $request, ChiDoan $chiDoan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChiDoan $chiDoan)
    {
        //
    }
}
