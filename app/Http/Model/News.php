<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class News extends Model
{
    protected  $table  = 'news';
    public $timestamps = false;
    
    protected $fillable = ['news_image','title','content','news_type','news_big_image','is_top','source','source_title','source_url','keyword','video_url','release_date','choiceness'];
    
    //index
    public function web_index_news_list($pagesize)
    {
        $list = $this::orderBy('id','DESC')
        ->paginate($pagesize);
        return $list;
    }
    public function web_essence_news($pagesize)
    {
        $list = $this::orderBy('browse','DESC')
        ->paginate($pagesize);
        return $list;
    }
    
    //web
    public function web_news_index($request,$is_top = null, $news_type = null,$pagesize,$sortby,$sortvalue)
    {
        
        $search = '';
        if(!empty($request['search']) && isset($request['search']))
        {
            $search = $request['search'];
        }
        $list = $this::where(function($query) use($search) {
            if (!empty($search)) {
                $query->where('title','like', '%' . $search . '%');}
        })
        ->where(function($query) use($news_type) {
            if (!empty($news_type)) {
                $query->where('news_type','=', $news_type);}
        })
        ->where(function($query) use($is_top) {
            if (!empty($is_top)) {
                $query->where('is_top','=', $is_top);}
        })
        ->orderBy($sortby,$sortvalue)
        ->paginate($pagesize);
        return $list;
    }
    //related to recommend
    
    public function web_news_recommend($request,$pagesize)
    {
        
        $search = '';
        if(!empty($request['search']) && isset($request['search']))
        {
            $search = $request['search'];
        }
        $list = $this::where(function($query) use($search) {
            if (!empty($search)) {
                $query->where('keyword','like', '%' . $search . '%');}
        })
        
        ->orderBy('id','DESC')
        ->paginate($pagesize);
        return $list;
    }
    //web
    public function web_news_list($request,$browse = null)
    {
        
        $search = '';
        $news_type = 0;
        if(!empty($request['search']) && isset($request['search']))
        {
            $search = $request['search'];
        }
        if(!empty($request['query_newstype']) && isset($request['query_newstype']))
        {
            $news_type = $request['query_newstype'];
        }
        
        $list = $this::where(function($query) use($search) {
            if (!empty($search)) {
                $query->where('title','like', '%' . $search . '%');}
        })
        ->where(function($query) use($news_type) {
            if (!empty($news_type)) {
                $query->where('news_type','=', $news_type);}
        })
        ->orderBy('id','DESC')
        ->paginate(20);
        return $list;
    }
    
    public function web_news_top()
    {
        $list = $this::where('is_top',1)->orderBy('id','DESC')
        ->paginate(3);
        return $list;
    }
    
    
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
    public  function change_news($request)
    {
        $id = $request['id'];
        $update = $this::where('id', $id)->update(['title' =>  $request['title'],'synopsis' => $request['synopsis'],'content' => $request['content'],
            'news_type' => $request['news_type'],'is_top' => $request['is_top']
        ]);
        return $update;
    }
    public function news_next($id)
    {
        $increment = $id;
        
        $result = $this::where('id','>',$increment)->orderBy('id','ASC')->first();
        return $result;
    }
    
    public function news_previous($id)
    {
        $previous = $id;
        
        $result = $this::where('id','<',$previous)->orderBy('id','DESC')->first();
        return $result;
    }
    public function admin_first_new($id)
    {
        $result = $this::where('id',$id)->first();
        return $result;
    }
    //admin_valve_del
    public function admin_del_news($id)
    {
        $data = $this::where('id', $id)->delete();
        return $data;
        
    }
    public function admin_add_bigimage()
    {
        $select_bigimage = $this::orderBy('id','DESC')->first();
        return $select_bigimage;
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
    public function news_add_bigimage($request)
    {
        $bigimage = $this::where('id',$request['id'])
        ->update(['news_big_image' => $request['news_big_image']]);
        return $bigimage;
    }
    
}




