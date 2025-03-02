<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->get();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            Brand::create($validated);
            return redirect()->route('brands.index')->with('success', 'Brand crated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error creating category: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $validated = $request->validated();
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $brand->update($validated);
        return redirect()->route('brands.index')->with('success', 'Brand updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
