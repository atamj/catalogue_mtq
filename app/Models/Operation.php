<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    public $fillable = [
        'shortname',
        'start',
        'end',
        'title',
        'template',
    ];
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'operation_client');
    }
    public function categories()
    {
        return$this->hasMany(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
