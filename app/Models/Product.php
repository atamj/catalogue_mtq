<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table = 'product';
    protected $fillable = ['data', 'ope'];
    public static function getSubCategories($products)
    {
        /** Get list of sub-categories for current products list */
        $sous_categories = [];
        foreach ($products as $product) {
            if (!in_array($product->sous_categorie, $sous_categories)) {
                $sous_categories[$product->sous_categorie_url] = $product->sous_categorie;
            }
        }
        return $sous_categories;
    }
    public function convertData()
    {
        $productData = json_decode($this->data);
        foreach ($productData as $key => $value){
            $this->$key = $value;
        }
    }

}
