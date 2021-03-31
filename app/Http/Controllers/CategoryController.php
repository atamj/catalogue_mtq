<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Operation;
use App\Models\Product;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
//    public $csv;
//    private $data = [];
    public $products = [];
    public $keys;

    public function __construct()
    {
        /** Get products google sheet id */
//        $this->csv = env('SHEET_ID');
        setlocale(LC_ALL, 'fr_FR');

    }

    public function index($ope, $category)
    {
        if (env("APP_VERSION") == "2") {

            /** Récupère les info de l'opération selon l'url*/
            $operation = Operation::where('shortname', $ope)->first();

            /** On récupère l'url de base pour identifier le client*/
            $client_url = \request()->server->get('HTTP_HOST');

            /** Local*/
            if (env("APP_ENV") == 'local') {

                /** On récupère les info client selon l'url*/
                $client = $operation->clients()->where('url', env('APP_URL'))->first();

            } /** Production*/
            else {

                /** On récupère les info client selon l'url*/
                $client = $operation->clients()->where('url', $client_url)->first();

            }

            /** On récupère toutes les catégories de cette opération*/
            $category = Category::where('url', $category)->where('operation_id', $operation->id)->first();
            $categories = $operation->categories()->get();
            $pivot = $client->operations->find($operation->id)->pivot;
            $pivot = $pivot->find($pivot->id);
            $products = $category->products()->get();
            $bombes = [];
            foreach ($products as $product) {
                $product->convertData();
                if ($product->bombe_1 == '1') {
                    $bombes[] = $product;
                }
            }
            $sous_categories = $category->subCategories()->get();
            $bombe = "";
            if (count($sous_categories) == 0) {
                $bombe = $bombes[0];
            }

            if ($operation->template == "default" || $operation->template == "" || !$operation->template) {
                return view('catalogue', compact('products', 'bombe', 'bombes', 'category', 'pivot', 'sous_categories', 'operation', 'client'));
            } else {
                return view('templates.catalogue-' . $operation->template, compact('products', 'bombe', 'category', 'categories', 'pivot', 'sous_categories', 'operation', 'client'));
            }

        } else {
            /** Redirect to secure URL if app production*/
            $this->secure();
            /** Get products from GSheet or Session */
            $this->getProducts($ope);

            /** Filter products by category based on  URL */
            $products = $this->products->where('categorie_url', $category);

            /** Get product bombe 1*/
            $bombe = $products->where('bombe_1', '1');

            /** Get list of sub-categories for current products list */
            $sous_categories = Product::getSubCategories($products);

            /** Get Category string & category_url*/
            $category_url = $category;
            $category = $products->first()->categorie;

            return view('catalogue', compact('products', 'bombe', 'category', 'category_url', 'sous_categories', 'ope'));
        }
    }

    public function show($ope, $ean)
    {
        /** Redirect to secure URL if app production*/
        $this->secure();

        /** Get all product stored to $this->products */
        $this->getProducts($ope);

        /** Filter product by ean*/
        $product = $this->products->where('ean', $ean)->first();

        return view('show', compact('product', 'ope'));
    }

    /**
     * Get full catalogue
     */
    public function catalogue($ope)
    {
        if (env("APP_VERSION") == "2") {

            /** Récupère les info de l'opération selon l'url*/
            $operation = Operation::where('shortname', $ope)->first();

            /** On récupère l'url de base pour identifier le client*/
            $client_url = \request()->server->get('HTTP_HOST');

            /** Local*/
            if (env("APP_ENV") == 'local') {

                /** On récupère les info client selon l'url*/
                $client = $operation->clients()->where('url', env('APP_URL'))->first();

            } /** Production*/
            else {

                /** On récupère les info client selon l'url*/
                $client = $operation->clients()->where('url', $client_url)->first();

            }

            /** On récupère toutes les catégories de cette opération*/
            $categories = $operation->categories()->get();
            $pivot = $client->operations->find($operation->id)->pivot;
            $pivot = $pivot->find($pivot->id);
            $products = $operation->products()->get();
            $bombes = [];
            foreach ($products as $product) {
                $product->convertData();
                if ($product->bombe_1 == '1') {
                    $bombes[] = $product;
                }
            }
            $sous_categories = [];

            if (!$sous_categories || count($sous_categories) <= 0) {
                $sous_categories = [];
                foreach ($categories as $category) {
                    $arr = $category->subCategories()->get();
                    if (count($arr) > 0) {
                        foreach ($arr as $one) {
                            $sous_categories[] = $one->id;
                        }
                    }
                }

                $sous_categories = SubCategory::findMany($sous_categories);
            }
            $category = "Cataloque";
            if ($operation->template == "default" || $operation->template == "" || !$operation->template) {
                return view('catalogue', compact('products', 'bombes', 'category', 'pivot', 'sous_categories', 'operation', 'client'));
            } else {
                return view('templates.catalogue-' . $operation->template, compact('products', 'bombes', 'category', 'categories', 'pivot', 'sous_categories', 'operation', 'client'));
            }

        } else {
            /** Redirect to secure URL if app production*/
            $this->secure();

            /** Get products from GSheet or Session */
            $this->getProducts($ope);

            /** Filter products by category based on  URL */
            $products = $this->products;
            /** Get product bombe 1*/
            $bombe = $products->where('bombe_1', '1');

            /** Get list of sub-categories for current products list */
            $sous_categories = Product::getSubCategories($products);

            $category = "Cataloque";
            return view('catalogue', compact('products', 'bombe', 'category', 'sous_categories', 'ope'));
        }

    }

    /**
     * Get or update products
     */
    private function getProducts($ope)
    {
        /** If have news data */
//        if (Storage::exists('public/'. $ope .'/data.csv')) {
//
//            /** Reset session*/
//            session()->forget('products');
//
//            /** Get all products in BD to delete*/
//            $products = Product::all();
//
//            /** List IDS to delete*/
//            $idsToDelete = [];
//            foreach ($products as $product) {
//                if ($product->ope == $ope){
//                    $idsToDelete[] = $product->id;
//                }
//            }
//            /** Delete list*/
//            Product::destroy($idsToDelete);
//
//            /** Get formated data from CSV */
//            $this->formatData($ope);
//
//            /** Delete CSV*/
//            Storage::delete('public/'. $ope .'/data.csv');
//
//            /** Put data in session for optimisation*/
////            session()->put('products', $this->products);
//
//        } else {
//            /** If session existe get products from session else get product from BD*/
//            if (session()->has('products') && count(session('products')) > 0) {
//
//                /** Get product from session */
//                $this->products = session('products');
//                /*test*/
//                session()->forget('products');
//
//            } else {
//
//                /** Reset session*/
//                session()->forget('products');

        /** Reset $this->products*/
        $this->products = [];

        /** Get products from BD*/
        $products = Product::where('ope', $ope)->get();

        /** Format et save products in $this->products*/
        foreach ($products as $item) {

            $product = new Product();
            $product->ope = $item->ope;
            $item = json_decode($item->data);
            foreach ($item as $key => $value) {

                $product->$key = $value;

            }

            $this->products[] = $product;

        }

        /** Convert $this->products to laravel collection*/
        $this->products = collect($this->products);

        /** Put products in session*/
//                session()->put('products', $this->products);

//            }

//        }

    }

//    /**
//     * Get data from sheet
//     */
//    private function getData($ope)
//    {
//
//        /** Google Sheet URL*/
//        $urlGoogleSheet = "https://docs.google.com/spreadsheets/d/" . $this->csv . "/gviz/tq?tqx=out:csv";
//
//        if (Storage::exists('public/'. $ope .'/data.csv')) {
//
//            $csv = Storage::get('public/'. $ope .'/data.csv');
//
//        } else {
//
//            /** Get CSV GoogleSheet content*/
//            $csv = file_get_contents($urlGoogleSheet);
//
//        }
//
//        /** Convert CSV to Array*/
//        $this->data = str_getcsv($csv, "\r\n");
//        foreach ($this->data as &$row) $row = str_getcsv($row, ",");
//
//    }

//    /**
//     * Format data to obj
//     */
//    private function formatData($ope)
//    {
//
//        /** Get data to CSV & convert to array*/
//        $this->getData($ope);
//
//        /** Delete & get first column data*/
//        $firstCol = array_splice($this->data, 0, 1);
//
//        /** Format title to key*/
//        $this->formatTitle($firstCol);
//
//        /** Create array to contains product*/
//        foreach ($this->data as $key => $tabs) {
//
//            $product = new Product();
//
//            foreach ($tabs as $i => $val) {
//
//                $title = $this->keys[$i];
//                $product->$title = $val;
//
//            }
//
//            $this->products[] = $product;
//            Product::create(['data' => json_encode($product), 'ope'=> $ope]);
//
//        }
//        $this->products = collect($this->products);
//    }

//    /**
//     * Format titles sheet to keys
//     * @param $firstCol
//     * @return false|string[]
//     */
//    private function formatTitle($firstCol)
//    {
//
//        /** Convert to string*/
//        $firstColString = implode(';', $firstCol[0]);
//
//        /** Cleaning first column */
//        $firstColString = $this->stringToUrl($firstColString);
//
//        /** Convert to Array*/
//        $this->keys = explode(';', $firstColString);
//
//    }

    /** Secure url*/
    private function secure()
    {

        if (!request()->secure() && env('APP_ENV') === 'production') {

            return redirect()->secure(request()->getRequestUri());
            /*URL::forceScheme('https');*/

        }

    }

//    /** Convert string to URL*/
//    private function stringToUrl($string)
//    {
//
//        $url = str_replace(" ", "-", $string);
//        $url = str_replace(["°", "&"], "", $url);
//        $url = str_replace(["É", "È", "è", "é", "ê", "Ê", "ë", "Ë"], 'e', $url);
//        return strtolower($url);
//
//    }

}
