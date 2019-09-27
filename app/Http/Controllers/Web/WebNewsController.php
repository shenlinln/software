<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebNewsController extends Controller
{
    public function list(Request $request){
        
        return view('web.news.news_list');
        
    }
}
