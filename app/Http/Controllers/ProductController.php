<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function React\Promise\all;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** Replace products*/
        if ($request->hasFile('csv')) {
            $request->file('csv')->storeAs('public/' . $request->operation, 'data.csv');

            /** Get all products in BD to delete*/
            $products = Product::all();

            /** List IDS to delete*/
            $idsToDelete = [];
            foreach ($products as $product) {
                if ($product->ope == $request->operation) {
                    $idsToDelete[] = $product->id;
                }
            }
            /** Delete list*/
            Product::destroy($idsToDelete);

            /** Get formated data from CSV */
            $this->formatData($request->operation);

            /** Delete CSV*/
            Storage::delete('public/' . $request->operation . '/data.csv');
        }
        /*if ($request->has('zip')){
            dump($request->hasFile('zip'));
            $request->file('zip')->store('/');
            dd($request->file('zip'));
        }*/
        return back()->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $productData = json_decode($product->data);
        foreach ($productData as $key => $value){
            $product->$key = $value;
        }
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        /** Convert json data */
        $product->convertData();

        if ($request->hasFile('photo_principale')){

            if (Storage::exists('public/' . $product->ope . "/images/products/". $product->photo_principale )){

                Storage::delete('public/' . $product->ope . "/images/products/". $product->photo_principale );

            }

            $request->file('photo_principale')->storeAs('public/' . $product->ope . "/images/products", $product->photo_principale );

        }

        if ($request->hasFile('photo_1')){

            if ($product->photo_1 != ""){

                if (Storage::exists('public/' . $product->ope . "/images/products/". $product->photo_1 )){

                    Storage::delete('public/' . $product->ope . "/images/products/". $product->photo_1 );

                }

                $request->file('photo_1')->storeAs('public/' . $product->ope . "/images/products", $product->photo_1 );

            }else{

                $product->photo_1 = $request->file('photo_1')->getClientOriginalName();
                $product->save();
                $request->file('photo_1')->storeAs('public/' . $product->ope . "/images/products", $product->photo_1 );

            }

        }

        if ($request->hasFile('photo_2')){

            if ($product->photo_2 != ""){

                if (Storage::exists('public/' . $product->ope . "/images/products/". $product->photo_2 )){

                    Storage::delete('public/' . $product->ope . "/images/products/". $product->photo_2 );

                }

                $request->file('photo_2')->storeAs('public/' . $product->ope . "/images/products", $product->photo_2 );

            }else{

                $product->photo_2 = $request->file('photo_2')->getClientOriginalName();
                $product->save();
                $request->file('photo_2')->storeAs('public/' . $product->ope . "/images/products", $product->photo_2 );

            }

        }

        return back()->with('status', "Success");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * Get data from sheet
     */
    private function getData($ope)
    {

        $csv = Storage::get('public/' . $ope . '/data.csv');

        /** Convert CSV to Array*/
        $data = str_getcsv($csv, "\r\n");
        foreach ($data as &$row) $row = str_getcsv($row, ",");

        return $data;

    }

    /**
     * Format data to obj
     */
    public function formatData($ope)
    {

        /** Get data to CSV & convert to array*/
        $data = $this->getData($ope);

        /** Delete & get first column data*/
        $firstCol = array_splice($data, 0, 1);

        /** Format title to key*/
        $keys = $this->formatTitle($firstCol);

        /** Create array to contains product*/
        foreach ($data as $key => $tabs) {

            $product = new Product();

            foreach ($tabs as $i => $val) {

                $title = $keys[$i];
                $product->$title = $val;

            }

            Product::create(['data' => json_encode($product), 'ope' => $ope]);

        }
    }

    /**
     * Format titles sheet to keys
     * @param $firstCol
     * @return false|string[]
     */
    private function formatTitle($firstCol)
    {

        /** Convert to string*/
        $firstColString = implode(';', $firstCol[0]);

        /** Cleaning first column */
        $firstColString = $this->stringToUrl($firstColString);

        /** Convert to Array*/
        return explode(';', $firstColString);

    }

    /** Convert string to URL*/
    private function stringToUrl($string)
    {

        $url = str_replace(" ", "-", $string);
        $url = str_replace(["°", "&"], "", $url);
        $url = str_replace(["É", "È", "è", "é", "ê", "Ê", "ë", "Ë"], 'e', $url);
        return strtolower($url);

    }

}
