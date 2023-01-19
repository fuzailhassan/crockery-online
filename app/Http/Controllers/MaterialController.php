<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MaterialController extends Controller
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
        $materials = Material::paginate(8);
        return view('dashboard.materials.create')->with('materials', $materials);
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
        Material::create([
           'name' => $request['name'],
           'description' => $request['description'], 
        ]);
        return redirect()->back()->banner('Material Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        $products = $material->products()->paginate(12);
        // $products = Category::find($category->id)->products()->paginate(10);
        return view('product.index')->with([
            'products' => $products,
            'material' => $material
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        Gate::authorize('viewDashboard');
        $materials = Material::paginate(10);
        return view('dashboard.materials.edit')->with([
            'material'=> $material,
            'materials' => $materials
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required','string'] 
        ]);
        $material->update([
           'name' => $request['name'],
           'description' => $request['description'], 
        ]);
        return redirect()->route('materials.create')->banner('Material Updated Successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }
}
