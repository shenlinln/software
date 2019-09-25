<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class NewsController extends Controller
{
    public function list(Request $request){
        
        return view('admin.news.list');
        
    }

}
