<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Herb;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view("reviews.index", [
            "reviews" => $reviews
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $herb_id = $request->query("id");
        $herb = Herb::find($herb_id);
        return view("reviews.create", [
            "herb" => $herb
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
        $herb = Herb::find($request->input("herb_id"));
        $review = new Review;
        
        $review->name = $request->input("name");
        $review->comment = $request->input("comment");
        $review->herb()->associate($herb);

        $review->save();

        return redirect()->route('herbs.show', ['id' => $herb->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::find($id);
        $herb = $review->herb;
        // dd($herb);
        return view("reviews.show", [
            "review" => $review,
            "herb" => $herb
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);
        $review_herb = $review->herb;
        $herbs = Herb::all();
        return view("reviews.edit", [
            "review" => $review,
            "review_herb" => $review_herb,
            "herbs" => $herbs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        $review->name = $request->input("name");
        $review->comment = $request->input("comment");
        $review->herb_id = $request->input("herb");

        $review->save();

        return redirect()->route('reviews.show', ['id' => $review->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();

        return redirect()->route('reviews.index');
    }
}
