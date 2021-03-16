<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationClient extends Model
{
    use HasFactory;
    public $table = "operation_client";
    public $fillable = [
        'operation_id',
        'client_id',
        'title',
        'css',
        'js',
    ];
}
