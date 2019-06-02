<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Store;
Use App\Herb;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view("stores.index", [
            "stores" => $stores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $herbs = Herb::all();
        return view("stores.create", [
            "herbs" => $herbs
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
        $store = new Store;
        $store->name = $request->input("name");
        $store->address = $request->input("address");
        $store->save();

        $herbs = $request->input("herbs");
        // Syncar pivot-tabellen så den är aktuell med de herbs man skickade in
        $store->herbs()->sync($herbs);

        return redirect()->route('stores.show', ['id' => $store->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = Store::find($id);
        $herbs = $store->herbs;
        return view("stores.show", [
            "store" => $store
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
        $store = Store::find($id);
        $herbs = Herb::all();
        return view("stores.edit", [
            "store" => $store,
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
        $store = Store::find($id);
        $store->name = $request->input("name");
        $store->address = $request->input("address");
        $store->save();

        $herbs = $request->input("herbs");
        // Syncar pivot-tabellen så den är aktuell med de stores man skickade in
        $store->herbs()->sync($herbs);

        return redirect()->route('stores.show', ['id' => $store->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Store::destroy($id);

        return redirect()->route('stores.index');
    }
}
