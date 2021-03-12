<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'url',
        'gtag',
        'logo_header',
        'logo_footer',
        'facebook_link',
        'contact_link',
        'conditions_link',
        'cookies_link',
        'confidentialite_link'
    ];
}
