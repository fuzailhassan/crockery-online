<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSorted(string $sortBy)
    {  
        switch ($sortBy) {
        case 'price_low':
            $products = Product::orderBy('price')->paginate(12);
            break;
        case 'price_high':
            $products = Product::orderByDesc('price')->paginate(12);
        break;  
        case 'latest':
            $products = Product::orderByDesc('created_at')->paginate(12);
        break; 
        
        default:
        $products = Product::paginate(12);                
            break;
    }
    $categories = Category::all();

        return view('product.index')->with([
            'products' =>$products,
            'categories' => $categories,

        ]);
    }

    public function index(Request $request)
    {
        $searchTerm = '';
        $searchTerm =  $request['search']!=null ? $request['search'] : $searchTerm;
        
        $products = Product::where('name', 'like', '%'.$searchTerm.'%')
        ->orWhere('description', 'like', '%'.$searchTerm.'%' )
        // ->orWhere(

        // )
        ->orderByDesc('created_at')
        ->paginate('12');
        $categories = Category::all();
        // $materials = Material::all();
        // $products = Product::paginate(12);

        return view('product.index')->with([
            'products' =>$products,
            // 'searchTerm' => $searchTerm
            // 'materials' => $materials,
            'categories' => $categories,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $materials = Material::all();
        $brands = Brand::all();
             
        return view('dashboard.products.create',[
            'materials' => $materials,
            'categories' => $categories,
            'brands' => $brands,
        ]);
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
            'price' => ['required', 'numeric'],
            'discounted' => [],
            'discount' => ['numeric', 'nullable'],
            'description' => ['required', 'string'],
            'images' => ['image', 'required']
            
        ]); 
        // dd($request['brand']); 

        $brand = Brand::find($request['brand']);
        // dd($brand);
        if ($brand === null) {
            $brand = Brand::first();
        }

       $product = Product::create([
            'name' => $request['name'],
            'price'=>$request['price'],
            'discounted'=>$request['discounted'],
            'discount'=>$request['discount'],
            'description'=>$request['description'],
            'brand_id'=>$brand->id,

        ]);

        $product->categories()->attach($request['category']);
        $product->materials()->attach($request['material']);
        $product->addMediaFromRequest('images')
        ->toMediaCollection();
        return redirect()->route('products.show', $product)->banner('Product Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $rating = 0;
        foreach ($product->reviews as $review ) {
          $rating += $review->rating;  
        }
        
        $rating = ($rating) ? $rating / $product->reviews->count(): 0;
        return view('product.show', [
        'product' => $product,
        'rating' => $rating,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        $categories = Category::all();
        $materials = Material::all();
        $brands = Brand::all();
             
        return view('product.edit',[
            'product' => $product,
            'brands' => $brands,
            'materials' => $materials,
            'categories' => $categories,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'images' => ['image'],
            'discounted' => [],
            'discount' => ['numeric', 'nullable'],
            'description' => ['required', 'string', ],
            
        ]);
        dd($request['brand']); 
        $brand = Brand::find($request['brand']);
        
        if ($brand === null) {
            $brand = Brand::first();
        }
        $product->update([
            'name' => $request['name'],
            'price' => $request['price'],
            'discounted' => $request['discounted'],
            'discount' => $request['discount'],
            'brand_id'=>$brand->id,
            'descripton' => $request['descripton'],            
        ]);
        if ($request->hasFile('images')) {
            $image = $product->getFirstMedia();
            if ($image != null) {
                $image->delete();
            }
            $product->addMediaFromRequest('images')
                ->toMediaCollection();
        }        
        $product->categories()->sync($request['category']);
        $product->materials()->sync($request['material']);
        
        return redirect()->route('products.show',$product->id)->banner('Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('dashboard.products.index');
    }
}
