<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\News;
use App\Services\OSS;
class NewsController extends Controller
{
    public function list(Request $request){
       
        $news_data = new News();
        $seach = $request->all();
        $news_list = $news_data->admin_news_list($seach);
        return view('admin.news.list',compact('news_list'));
        
    }
    public function add(){
        //echo  md5(md5('BSyunBo*852').'3475ef');die();
        return view('admin.news.add');
    }
    
    public function news_video_upload(){
        return view('admin.news.news_video_upload');
    }
    
    public function save_upload(Request $request){
       
        
    }
    public function save(Request $request){
        $data = $request->all();
        $file = $request->file('news_image');
        $file_big =  $request->file('news_big_image');
        
       
       
       //小图
        $tmppath = $file->getRealPath();
        $fileName = uniqid().time() .date('Ymd') . '.' . $file->getClientOriginalExtension();
        $dir_yeramonth =  date('Ym');
        $pathName = 'sc_news/'.$dir_yeramonth.'/'.$fileName;
        OSS::publicUpload('soucat', $pathName, $tmppath, ['ContentType' => $file->getClientMimeType()]);
        $url = OSS::getPublicObjectURL('soucat', $pathName);
        $joint = explode("/", $url);
        
        $news_image = $joint[3].'/'.$joint[4].'/'.$joint[5];
        
        //大图
        
        if($file_big === NULL){
            $news_big_image = '';
        }
        else{
            $big_tmppath = $file_big->getRealPath();
            $big_fileName = uniqid().time() .date('YmdHis') . '.' . $file_big->getClientOriginalExtension();
            $big_pathName = 'sc_news/'.$dir_yeramonth.'/'.$big_fileName;
            OSS::publicUpload('soucat', $big_pathName, $big_tmppath, ['ContentType' => $file_big->getClientMimeType()]);
            $big_url = OSS::getPublicObjectURL('soucat', $big_pathName);
            $big_joint = explode("/", $big_url);
            $news_big_image = $big_joint[3].'/'.$big_joint[4].'/'.$big_joint[5];
        }
       
       // $news_image = Storage::putFile('sc_news/'.$dir_yeramonth,$file);
       // $news_big_image = Storage::putFile('sc_news/'.$dir_yeramonth,$file_big);
        $array_merge = array_merge($data,['news_image' =>$news_image,'news_big_image' => $news_big_image]);
        $news_meaage = new News();
        $result = $news_meaage->news_add($array_merge);
        if($result){
            return json_encode(['bool' => true,'message' => '添加成功']);
        }else{
            return json_encode(['bool' => false,'message' => '添加失败']);
        }
    }

}
