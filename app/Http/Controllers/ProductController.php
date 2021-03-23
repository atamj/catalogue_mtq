<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Operation;
use App\Models\Product;
use App\Models\SubCategory;
use Composer\Package\Archiver\ZipArchiver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZanySoft\Zip\Zip;
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

        if ($request->has('zip')){
            $request->file('zip')->storeAs('public/'.$request->operation.'/images', 'products.zip' );
            /*$is_valid = Zip::check(public_path('storage/'.$request->operation.'/images/products.zip'));
            if ($is_valid){
                $zip = Zip::open(public_path('storage/'.$request->operation.'/images/products.zip'));
                $zip->extract(public_path('storage/'.$request->operation.'/images/products'));
            }*/
            $zip = new \ZipArchive();
            if ($zip->open(public_path('storage/'.$request->operation.'/images/products.zip')) === TRUE) {
                $zip->extractTo(public_path('storage/'.$request->operation.'/images/products'));
                $zip->close();
            } else {
                return back()->with('status', 'échec');

            }
        }
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
        foreach ($productData as $key => $value) {
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

        if ($request->hasFile('photo_principale')) {

            if (Storage::exists('public/' . $product->ope . "/images/products/" . $product->photo_principale)) {

                Storage::delete('public/' . $product->ope . "/images/products/" . $product->photo_principale);

            }

            $request->file('photo_principale')->storeAs('public/' . $product->ope . "/images/products", $product->photo_principale);

        }

        if ($request->hasFile('photo_1')) {

            if ($product->photo_1 != "") {

                if (Storage::exists('public/' . $product->ope . "/images/products/" . $product->photo_1)) {

                    Storage::delete('public/' . $product->ope . "/images/products/" . $product->photo_1);

                }

                $request->file('photo_1')->storeAs('public/' . $product->ope . "/images/products", $product->photo_1);

            } else {

                $product->photo_1 = $request->file('photo_1')->getClientOriginalName();
                $product->save();
                $request->file('photo_1')->storeAs('public/' . $product->ope . "/images/products", $product->photo_1);

            }

        }

        if ($request->hasFile('photo_2')) {

            if ($product->photo_2 != "") {

                if (Storage::exists('public/' . $product->ope . "/images/products/" . $product->photo_2)) {

                    Storage::delete('public/' . $product->ope . "/images/products/" . $product->photo_2);

                }

                $request->file('photo_2')->storeAs('public/' . $product->ope . "/images/products", $product->photo_2);

            } else {

                $product->photo_2 = $request->file('photo_2')->getClientOriginalName();
                $product->save();
                $request->file('photo_2')->storeAs('public/' . $product->ope . "/images/products", $product->photo_2);

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
        $operation = Operation::where('shortname', $ope)->first();
        /** Create array to contains product*/
        foreach ($data as $key => $tabs) {

            $product = new Product();

            foreach ($tabs as $i => $val) {

                $title = $keys[$i];
                $product->$title = $val;

            }
            $category = Category::where('url', $product->categorie_url)->where('operation_id', $operation->id)->first();
            if (!$category) {
                $category = Category::create([
                    'operation_id' => $operation->id,
                    'name' => $product->categorie,
                    'url' => $product->categorie_url
                ]);
            }
            if ($product->sous_categorie_url) {
                $subCategory = SubCategory::where('url', $product->sous_categorie_url)->first();
                if (!$subCategory) {
                    $subCategory = SubCategory::create([
                        'category_id' => $category->id,
                        'name' => $product->sous_categorie,
                        'url' => $product->sous_categorie_url,
                    ]);
                }

                Product::create([
                    'data' => json_encode($product),
                    'operation_id' => $operation->id,
                    'category_id' => $category->id,
                    'subcategory_id' => $subCategory->id,
                ]);

            } else {

                Product::create([
                    'data' => json_encode($product),
                    'operation_id' => $operation->id,
                    'category_id' => $category->id,
                ]);

            }

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
