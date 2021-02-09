<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public $csv;
    public $isGoogleSheet;
    private $data = [];
    public $products = [];
    public $categories = [];
    public $subcategories = [];
    public $filtered;
    public $keys;

    public function __construct()
    {
        /** Get products google sheet id */
        $this->csv = env('SHEET_ID');
    }

    public function index($category)
    {
        /** Get products from GSheet or Session */
        $this->getProducts();

        /** Filter products by category based on  URL */
        $products = $this->products->where('categorie_url', $category);

        /** Get product bombe 1*/
        $bombe = $products->where('bombe_1', '1');

        /** Get list of sub-categories for current products list */
        $sous_cats = [];
        foreach ($products as $product) {
            if (!in_array($product->sous_categorie, $sous_cats)) {
                $sous_cats[] = $product->sous_categorie;
            }
        }

        /** Create an array key value for sub-categories for get slug in key*/
        $sous_categories = [];
        foreach ($sous_cats as $sous_category) {

            $url = str_replace(" ", "-", $sous_category);
            $url = str_replace("É", 'E', $url);
            $url = str_replace("È", 'E', $url);
            $url = strtolower($url);
            $sous_categories[$url] = $sous_category;

        }

        return view('catalogue', compact('products', 'bombe', 'category', 'sous_categories'));
    }

    public function show($id)
    {
        $product = $this->products->where('id', $id)->first();
        dump($product);
    }

    private function getProducts()
    {
        if (session()->has('products')) {
            $this->products = session('products');
        } else {

            if (Storage::exists('data.json')) {
                $products = json_decode(Storage::get('data.json'));
                $this->products = [];
                foreach ($products as $item) {
                    $product = new Product();
                    foreach ($item as $key => $value) {
                        $product->$key = $value;
                    }
                    $this->products[] = $product;
                }
                $this->products = collect($this->products);
            } else {
                $this->getData();
                $this->formatData();
                $this->addId();
            }


            session()->put('products', $this->products);

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
        /** Delete & get first column data*/
        $firstCol = array_splice($this->data, 0, 1);

        $this->formatTitle($firstCol);

        /** Create array to contains product*/
        foreach ($this->data as $key => $tabs) {

            $product = new Product();
            $product->keys = $this->keys;
            foreach ($tabs as $i => $val) {
                $title = $this->keys[$i];
                $product->$title = $val;
            }
            if (!in_array($product->categorie, $this->categories) && $product->categorie) {
                $this->categories[] = $product->categorie;
            }
            if (!in_array($product->sous_categorie, $this->subcategories) && $product->sous_categorie) {
                $this->subcategories[] = $product->sous_categorie;
            }
            $sous_category = $product->sous_categorie;
            $sous_categorie_url = str_replace(" ", "-", $sous_category);
            $sous_categorie_url = str_replace("É", 'E', $sous_categorie_url);
            $sous_categorie_url = str_replace("È", 'E', $sous_categorie_url);
            $sous_categorie_url = strtolower($sous_categorie_url);
            $product->sous_categorie_url = $sous_categorie_url;

            $this->products[] = $product;

        }
        Storage::put('data.json', json_encode($this->products));
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

        /** Remove space */
        $firstColString = str_replace(" ", "_", $firstColString);
        /** Remove ° */
        $firstColString = str_replace("°", "", $firstColString);
        /** Remove é */
        $firstColString = str_replace("é", "e", $firstColString);
        /** Remove è*/
        $firstColString = str_replace("è", "e", $firstColString);
        /** Remove ê*/
        $firstColString = str_replace("ê", "e", $firstColString);
        /** Convert Uppercase to lower */
        $firstColString = strtolower($firstColString);

        /** Format fist column to use for key*/
        $this->keys = explode(';', $firstColString);
    }

    /**
     * Filter products
     *
     * @param $key
     * @param string $operator
     * @param $content
     * @return array
     */
    public function where($key, $operator = '==', $content)
    {
        $this->filtered = [];
        foreach ($this->products as $product) {

            switch ($operator) {

                case '<':
                    if ($product->$key < $content) {

                        $this->filtered[] = $product;

                    }
                    break;
                case '<=':
                    if ($product->$key <= $content) {

                        $this->filtered[] = $product;

                    }
                    break;
                case '>':
                    if ($product->$key > $content) {

                        $this->filtered[] = $product;

                    }
                    break;
                case '>=':
                    if ($product->$key >= $content) {

                        $this->filtered[] = $product;

                    }
                    break;
                default:
                    if ($product->$key == $content) {

                        $this->filtered[] = $product;

                    }

            }

        }
        return $this->filtered;

    }

    private function addId()
    {
        foreach ($this->products as $key => $product) {
            $product->id = $key + 1;
        }
    }

}
