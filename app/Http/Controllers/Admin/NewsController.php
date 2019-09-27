<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\News;
class NewsController extends Controller
{
    public function list(Request $request){
       
        $news_data = new News();
        $seach = $request->all();
        $news_list = $news_data->admin_news_list($seach);
        return view('admin.news.list',compact('news_list'));
        
    }
    public function add(){
      
        return view('admin.news.add');
    }
    public function save(Request $request){
        $data = $request->all();
        $file = $request->file('news_image');
       
        $dir_yeramonth =  date('Ym');
        $news_image = Storage::putFile('sc_news/'.$dir_yeramonth,$file);
        var_dump($news_image);die();
        $array_merge = array_merge($data,['news_image' =>$news_image]);
        $news_meaage = new News();
       
        $result = $news_meaage->news_add($array_merge);
        if($result){
            return json_encode(['bool' => true,'message' => '添加成功']);
        }else{
            return json_encode(['bool' => false,'message' => '添加失败']);
        }
    }

}
