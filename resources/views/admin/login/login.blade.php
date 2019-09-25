<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>搜猫管理后台</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="{{URL::asset('css/admin/bootstrap.min.css')}}">
  <!-- Font Awesome -->
   <link rel="stylesheet" href="{{URL::asset('css/admin/font-awesome.min.css')}}">
  <!-- Ionicons -->
   <link rel="stylesheet" href="{{URL::asset('css/admin/ionicons.min.css')}}">
  <!-- Theme style -->
   <link rel="stylesheet" href="{{URL::asset('css/admin/AdminLTE.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html">搜猫后台管理</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">登录开始您的会话</p>
    
   
      <div class="form-group has-feedback">
        <input type="text" id="username" class="form-control" placeholder="用户名">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" class="form-control" placeholder="密码">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button  id="submit" class="btn btn-primary btn-block btn-flat">登录</button>
        </div>
        <!-- /.col -->
      </div>
    <div id ="form1"></div>
  </div>
  <!-- /.login-box-body -->
</div>

<script>
document.getElementById("submit").onclick=function(){loginpost()};
function loginpost(){
  var username =  document.getElementById("username").value;
  var password = document.getElementById("password").value;
  
  //Determine if the text is empty
  
  if(username == "" && password == ""){
	  
	  empty_user_pass("用户名或密码不能为空");
	  return;
 }
  else{
  var xmlhttp;
  if(window.XMLHttpRequest){
       xmlhttp = new XMLHttpRequest();
      }else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");  
          }
       xmlhttp.onreadystatechange = function(){
       if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
    	   var post_b = xmlhttp.responseText;
    	   
    	   var json_data = JSON.parse(post_b);
    	   if(json_data.bool == true){
    		      self.location='/admin/index';
        	   }else{
        		   empty_user_pass(json_data.message);
          }
    	 // console.log(post_b);
    	  
           }
       }
   xmlhttp.open("POST",'/admin/login',true);
   xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   xmlhttp.send("username="+username+"&"+"password="+password+"&_token={{csrf_token()}}");
 }
}
function empty_user_pass(value){

    var label = document.createElement("label");
    var labelvalue = document.createTextNode(value);
    label.setAttribute("id","empty_id");
    label.appendChild(labelvalue);
    if(document.getElementById('empty_id') == null){
       document.getElementById("form1").appendChild(label);  
    }
    //Setting color
    document.getElementById("empty_id").style.color = "red";
	  }
</script>
</body>
</html>

