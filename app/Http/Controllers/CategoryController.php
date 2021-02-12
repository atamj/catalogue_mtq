<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
    public $csv;
    private $data = [];
    public $products = [];
    public $keys;

    public function __construct()
    {
        /** Get products google sheet id */
        $this->csv = env('SHEET_ID');

    }

    public function index($category)
    {

        /** Redirect to secure URL if app production*/
        $this->secure();
        /** Get products from GSheet or Session */
        $this->getProducts();

        /** Filter products by category based on  URL */
        $products = $this->products->where('categorie_url', $category);

        /** Get product bombe 1*/
        $bombe = $products->where('bombe_1', '1');

        /** Get list of sub-categories for current products list */
        $sous_categories = Product::getSubCategories($products);

        /** Get Category string & category_url*/
        $category_url = $category;
        $category = $products->first()->categorie;

        return view('catalogue', compact('products', 'bombe', 'category', 'category_url', 'sous_categories'));
    }

    public function show($ean)
    {
        /** Redirect to secure URL if app production*/
        $this->secure();

        /** Get all product stored to $this->products */
        $this->getProducts();

        /** Filter product by ean*/
        $product = $this->products->where('ean', $ean)->first();

        return view('show', compact('product'));
    }

    /**
     * Get full catalogue
    */
    public function catalogue()
    {
        /** Redirect to secure URL if app production*/
        $this->secure();

        /** Get products from GSheet or Session */
        $this->getProducts();

        /** Filter products by category based on  URL */
        $products = $this->products;
        /** Get product bombe 1*/
        $bombe = $products->where('bombe_1', '1');

        /** Get list of sub-categories for current products list */
        $sous_categories = Product::getSubCategories($products);

        $category = "Cataloque";
        return view('catalogue', compact('products', 'bombe', 'category', 'sous_categories'));

    }

    /**
     * Get or update products
     */
    private function getProducts()
    {
        /** If have news data */
        if (Storage::exists('data.csv')) {

            /** Reset session*/
            session()->forget('products');

            /** Get all products in BD to delete*/
            $products = Product::all();

            /** List IDS to delete*/
            $idsToDelete = [];
            foreach ($products as $product) {
                $idsToDelete[] = $product->id;
            }
            /** Delete list*/
            Product::destroy($idsToDelete);

            /** Get formated data from CSV */
            $this->formatData();

            /** Delete CSV*/
            Storage::delete('data.csv');

            /** Put data in session for optimisation*/
            session()->put('products', $this->products);

        } else {
            /** If session existe get products from session else get product from BD*/
            if (session()->has('products') && count(session('products')) > 0) {

                /** Get product from session */
                $this->products = session('products');

            } else {

                /** Reset session*/
                session()->forget('products');

                /** Reset $this->products*/
                $this->products = [];

                /** Get products from BD*/
                $products = Product::all();

                /** Format et save products in $this->products*/
                foreach ($products as $item) {

                    $item = json_decode($item->data);
                    $product = new Product();
                    foreach ($item as $key => $value) {

                        $product->$key = $value;

                    }

                    $this->products[] = $product;

                }

                /** Convert $this->products to laravel collection*/
                $this->products = collect($this->products);

                /** Put products in session*/
                session()->put('products', $this->products);

            }

        }

    }

    /**
     * Get data from sheet
     */
    private function getData()
    {

        /** Google Sheet URL*/
        $urlGoogleSheet = "https://docs.google.com/spreadsheets/d/" . $this->csv . "/gviz/tq?tqx=out:csv";

        if (Storage::exists('data.csv')) {

            $csv = Storage::get('data.csv');

        } else {

            /** Get CSV GoogleSheet content*/
            $csv = file_get_contents($urlGoogleSheet);

        }

        /** Convert CSV to Array*/
        $this->data = str_getcsv($csv, "\r\n");
        foreach ($this->data as &$row) $row = str_getcsv($row, ",");

    }

    /**
     * Format data to obj
     */
    private function formatData()
    {

        /** Get data to CSV & convert to array*/
        $this->getData();

        /** Delete & get first column data*/
        $firstCol = array_splice($this->data, 0, 1);

        /** Format title to key*/
        $this->formatTitle($firstCol);

        /** Create array to contains product*/
        foreach ($this->data as $key => $tabs) {

            $product = new Product();

            foreach ($tabs as $i => $val) {

                $title = $this->keys[$i];
                $product->$title = $val;

            }

            $this->products[] = $product;
            Product::create(['data' => json_encode($product)]);

        }
        $this->products = collect($this->products);
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
        $this->keys = explode(';', $firstColString);

    }

    /** Secure url*/
    private function secure()
    {

        if (!request()->secure() && env('APP_ENV') === 'production') {

            return redirect()->secure(request()->getRequestUri());
            /*URL::forceScheme('https');*/

        }

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
