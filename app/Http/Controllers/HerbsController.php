<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Herb;
use App\Store;

class HerbsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(["index", "show"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $herbs = Herb::all();
        return view("herbs.index", [
            "herbs" => $herbs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::all();
        return view("herbs.create", [
            "stores" => $stores
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
        $herb = new Herb;
        $herb->name = $request->input("name");
        $herb->price = $request->input("price");
        $herb->amount = $request->input("amount");
        $herb->image = $request->input("image");
        $herb->description = $request->input("description");

        $herb->save();

        foreach ($request->input("stores") as $value) {
            $store = Store::find($value);
            $herb->stores()->save($store);
        }

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
        $herb = Herb::find($id);
        $stores = $herb->getStores();
        $reviews = $herb->getReviews();
        return view("herbs.show", [
            "herb" => $herb,
            "stores" => $stores,
            "reviews" => $reviews
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
        $herb = Herb::find($id);
        $stores = Store::all();
        $herbStores = $herb->getStores();
        $reviews = $herb->getReviews();
        return view("herbs.edit", [
            "herb" => $herb,
            "herbStores" => $herbStores,
            "reviews" => $reviews,
            "stores" => $stores
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
        $herb = Herb::find($id);
        $herb->name = $request->input("name");
        $herb->price = $request->input("price");
        $herb->amount = $request->input("amount");
        $herb->image = $request->input("image");
        $herb->description = $request->input("description");

        $herb->save();

        $stores = $request->input("stores");

        // Syncar pivot-tabellen så den är aktuell med de stores man skickade in
        $herb->stores()->sync($stores);

        return redirect()->route('herbs.show', ['id' => $herb->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $herb = Herb::find($id);
        $herb->delete();

        return redirect()->route('herbs.index');
    }
}
