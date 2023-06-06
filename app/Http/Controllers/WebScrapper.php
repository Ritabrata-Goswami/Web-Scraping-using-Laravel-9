<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class WebScrapper extends Controller
{
    public function index()
    {
        $client = new Client();
        
        $website = $client->request('GET', 'https://www.w3schools.com/php/php_ref_string.asp');
        
        // return $website->html();
        return $website->text();
    }
}
