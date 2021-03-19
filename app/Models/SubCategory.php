<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'url',
        'category_id',
    ];
    public function category()
    {
        return $this->hasOne(Category::class);
    }
}