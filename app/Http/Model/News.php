<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class News extends Model
{
    protected  $table  = 'news';
    public $timestamps = false;
    
    protected $fillable = ['news_image','title','content','news_type','news_big_image','is_top','source','source_title','source_url','keyword','video_url','release_date','choiceness'];
    //admin
    public function admin_news_list($request)
    {
        $search = '';
        if(!empty($request['search']) && isset($request['search']))
        {
            $search = $request['search'];
        }
        $list = $this::where(function($query) use($search) {
            if (!empty($search)) {
                $query->where('title','like', '%' . $search . '%');}
        })->orderBy('id','DESC')
        ->paginate(20);
        return $list;
    }

    public function news_add($request){
        
        
        $rules = [
            'title' => 'required|string|max:200',
        ];
        $validate = Validator::make($request, $rules);
        
        if ($validate->fails()) {
            return $validate->messages()->first();
        }
        if(isset($request['news_image']) && !empty($request['news_image'])){
            $this->news_image = $request['news_image'];
        }
        if(isset($request['title']) && !empty($request['title'])){
            $this->title = $request['title'];
        }
        if(isset($request['content']) && !empty($request['content'])){
            $this->content = $request['content'];
        }
        if(isset($request['news_type']) && !empty($request['news_type'])){
            $this->news_type = $request['news_type'];
        }
        if(isset($request['news_big_image']) && !empty($request['news_big_image'])){
            $this->news_big_image = $request['news_big_image'];
        }
        if(isset($request['is_top']) && !empty($request['is_top'])){
            $this->is_top = $request['is_top'];
        }
        if(isset($request['source']) && !empty($request['source'])){
            $this->source = $request['source'];
        }
        if(isset($request['source_title']) && !empty($request['source_title'])){
            $this->source_title = $request['source_title'];
        }
        if(isset($request['source_url']) && !empty($request['source_url'])){
            $this->source_url = $request['source_url'];
        }
        if(isset($request['keyword']) && !empty($request['keyword'])){
            $this->keyword = $request['keyword'];
        }
        $this->video_url = '';
        
        $this->release_date = time();
        $this->choiceness = $request['choiceness'];;
        $result = $this->save();
        return $result;
        
        
    }
    public function news_add_video_url($request)
    {
        $bigimage = $this::where('id',$request['id'])
        ->update(['video_url' => $request['video_url']]);
        return $bigimage;
    }
    
    
    
}




