<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Rules\ValidRating;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductReviewController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(Review::class, 'review');
    // }


    public function indexAll()
    {
        Gate::authorize('viewDashboard');
        $reviews = Review::orderByDesc('created_at')->paginate(10);
        return view('dashboard.reviews.index')->with([
            'reviews' => $reviews
        ]); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        if (auth()->user()) {
            
            $request->validate([
                'title' => ['string', 'max:100', 'required'],
                'description' => ['string', 'max:500', 'required'],
                'rating' => ['required', new ValidRating],
            ]);
            
            Review::updateOrCreate(
                [
                'user_id' => $request->user()->id,
                'product_id' => $product->id
                ],

                ['title' => $request['title'],
                'description' => $request['description'],
                'rating' => $request['rating']]
            );
    
    
            return redirect()->route('products.show', $product);
        }else {
            return redirect()->route('login')->with('status', 'Login to post a review');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        Gate::authorize('viewDashboard');
        $review->delete();
        return redirect()->back();
    }
}
