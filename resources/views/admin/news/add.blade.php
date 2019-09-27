@extends('admin.layouts.main')
@section('content')
 <div class="content-wrapper">
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">新闻添加</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">新闻标题</label>

                  <div class="col-sm-10">
                    <input id="title" style="width: 40%;" type="text" id="title" class="form-control" id="inputEmail3" placeholder="标题">
                    <label id="title_error" style="display: none;"></label>
                  </div>
               
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">关键字</label>

                  <div class="col-sm-10">
                    <input id="keyword" style="width: 40%;" type="text" id="title" class="form-control" id="inputEmail3" placeholder="关键字">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">新闻类别</label>

                  <div class="col-sm-10">
                   <select id="news_type" style="width: 40%;" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                  <option value="1">普通</option>
                  <option value="2">要闻</option>
                  <option value="3">专题</option>
                </select>
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">新闻来源</label>

                  <div class="col-sm-10">
                    <input id="source" style="width: 40%;" type="text" id="title" class="form-control" id="inputEmail3" placeholder="来源">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">原标题</label>

                  <div class="col-sm-10">
                    <input id="source_title" style="width: 40%;" type="text" id="title" class="form-control" id="inputEmail3" placeholder="新闻原标题">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">原地址</label>

                  <div class="col-sm-10">
                    <input id="source_url" style="width: 40%;" type="text" id="title" class="form-control" id="inputEmail3" placeholder="新闻原地址">
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">上传图片</label>

                  <div class="col-sm-10">
                    <input type="file" id="news_image"> <label>上传尺寸：150*100</label>   
                  </div>
                </div>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">是否精选</label>
                  <div class="col-sm-10">
                       <input type="radio" name="choiceness"  checked="checked" value="1">是&nbsp;&nbsp;&nbsp;
                       <input type="radio" name="choiceness"   value="2">否
                  </div>
                </div>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">是否置顶</label>
                  <div class="col-sm-10">
                       <input type="radio" name="is_top"  checked="checked" value="1">是&nbsp;&nbsp;&nbsp;
                       <input type="radio" name="is_top"   value="2">否
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">上传大图片</label>

                  <div class="col-sm-10">
                    <input type="file" id="news_big_image"> <label>上传尺寸：410*205</label>   
                  </div>
              </div>
             <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">新闻内容</label>
                  <div class="col-sm-10" style="width: 50%;" >
                   <div id="editor" >
				</div>
                  </div>
                </div>
                <div class="form-group">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                 <button type="button" id="submit" onclick="add();"  style="margin-left: 360px;" class="btn btn-info">提交</button>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
 </div>
 
 
<script>

	initSample();

</script>
   @endsection       
