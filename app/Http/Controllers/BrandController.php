<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('viewDashboard');
        $brands = Brand::paginate(8);
        return view('dashboard.brands.create')->with('brands', $brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required','string'] 
        ]);
        Brand::create([
           'name' => $request['name'],
           'description' => $request['description'], 
        ]);
        return redirect()->back()->banner('Brand Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        $products = $brand->products()->latest()->paginate(12);
        $brands = Brand::all();

        return view('product.index')->with([
            'products' => $products,
            'brand' => $brand,
            'brands' => $brands,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        Gate::authorize('viewDashboard');
        $brands = Brand::paginate(10);
        return view('dashboard.brands.edit')->with([
            'brand'=> $brand,
            'brands' => $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required','string'] 
        ]);
        $brand->update([
           'name' => $request['name'],
           'description' => $request['description'], 
        ]);
        return redirect()->route('brands.create')->banner('Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
    return redirect()->back()->banner('Brand deleted Successfully');
    }
}
