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
        'title_color',
        'header_bgc',
        'header_bgi',
        'header_color',
        'footer_top_bgc',
        'footer_top_bgi',
        'footer_top_color',
        'footer_top_btn_bgc',
        'footer_top_btn_color',
        'footer_top_btn_radius',
        'footer_top_input_radius',
        'footer_bottom_bgc',
        'footer_bottom_bgi',
        'footer_bottom_color',
        'primary_color',
        'secondary_color',
        'css',
        'js',

    ];
}
