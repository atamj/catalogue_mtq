<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'url',
        'img',
        'operation_id'
    ];
    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function bombes()
    {
        $products = $this->products()->get();
        $bombes = [];
        foreach ($products as $product){
            $product->convertData();
            if ($product->bombe_1 == "1"){
                $bombes[] = $product;
            }
        }
        return $bombes;
    }
    public function bombe()
    {
        return $this->bombes()[0];
    }
}
