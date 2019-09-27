@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>数据表<small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><button type="button" class="btn btn-block btn-primary" id="submit">添加新闻</button></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>新闻标题</th>
                  <th>缩略图片</th>
                  <th>回复数</th>
                  <th>发布时间</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news_list as $key => $value)
                <tr>
                  <td>{{$value->title}}</td>
                  <td><img src="https://valve-platform.oss-cn-beijing.aliyuncs.com/{{$value->news_image}}" /></td>
                  <td> 4</td>
                  <td>{{ date('Y-m-d',$value->release_date) }}</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 <script type="text/javascript">
 document.getElementById("submit").onclick=function(){add()};
 function add(){
	 window.location.href = "/admin/news/add";
}
</script>
 @endsection