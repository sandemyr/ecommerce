<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Stock;
use App\Item;
use App\Denomination;

class StocksController extends Controller
{
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $stocks = Stock::find($product->id);

        return view('stocks.create')->with('product', $product)->with('stocks', $stocks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);
        
        $prod_id = $stock->prod_id;

        if($stock->delete()) {
            $deno = Stock::where('prod_id', $stock->prod_id)->count();
            
            Item::where('deno_name', $stock->deno_name)->delete();
            Denomination::where('prod_id', $stock->prod_id)->update(['denomination' => $deno]);
        }

        return redirect('products/' .$prod_id);
    }

    public function showStocks($id)
    {

        $stock = Stock::find($id);
        $items = Item::all();
        
        return view('stocks.show')->with('stock', $stock)->with('items', $items);
    }
}
