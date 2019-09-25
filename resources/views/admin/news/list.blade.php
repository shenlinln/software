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
              <h3 class="box-title">Hover Data Table</h3>
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
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>5</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5
                  </td>
                  <td>Win 95+</td>
                  <td>5.5</td>
                 <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 6
                  </td>
                  <td>Win 98+</td>
                  <td>6</td>
                      <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>              
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet Explorer 7</td>
                  <td>Win XP SP2+</td>
                  <td>7</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>AOL browser (AOL desktop)</td>
                  <td>Win XP</td>
                  <td>6</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 1.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.7</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 1.5</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 2.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 3.0</td>
                  <td>Win 2k+ / OSX.3+</td>
                  <td>1.9</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Camino 1.0</td>
                  <td>OSX.2+</td>
                  <td>1.8</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Camino 1.5</td>
                  <td>OSX.3+</td>
                  <td>1.8</td>
                 <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Netscape 7.2</td>
                  <td>Win 95+ / Mac OS 8.6-9.2</td>
                  <td>1.7</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Netscape Browser 8</td>
                  <td>Win 98SE+</td>
                  <td>1.7</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Netscape Navigator 9</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.0</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.1</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.1</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.2</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.2</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.3</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.3</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.4</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.4</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.5</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.5</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.6</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.6</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>

                <tr>
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td>-</td>
                  <td >
                  <a class="btn"><button type="button" class="btn btn-block btn-primary">修改</button></a>
                  <a class="btn"><button type="button" class="btn btn-block btn-danger">删除</button></a>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 @endsection