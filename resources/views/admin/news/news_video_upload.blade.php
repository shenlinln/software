      <link rel="stylesheet" href="{{URL::asset('css/admin/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{URL::asset('css/admin/AdminLTE.min.css')}}">

 <div class="content-wrapper">
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">视频上传</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">上传视频</label>

                  <div class="col-sm-10">
                    <input type="file" id="video_url"> 
                  </div>
              </div>
                <div class="form-group">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                 <button type="button"  onclick="upload();"  style="margin-left: 360px;" class="btn btn-info">上传</button>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
 </div>
<script type="text/javascript">
 function upload(){
		var objFile = document.getElementById("video_url");
		if(typeof(objFile.files[0]) != "undefined")
		{
			let video_url = document.getElementById("video_url").files[0];
			let _token = document.getElementById("_token").value;
			let formData = new FormData();
			 var d_url = '/admin/news/save_upload';
			    formData.append("video_url", video_url);
			    formData.append("_token", _token);
			    httpHelperupload({
		           type:'post',
		           async:'true',
		           data:formData,
		           url:d_url,
		           success:function(data){
		           var json_data = JSON.parse(data);
		               alert(json_data.message);
		           	 self.location='/admin/news/list';
		           },
		       });
		}
		else
		{
			alert('请上传视频');
			return false;
		}
 
		}

	function httpHelperupload(params) {
	    var request;
	    if(XMLHttpRequest)
	        request=new XMLHttpRequest();
	    else
	        request=new ActiveXObject("Microsoft.XMLHTTP");

	    request.onreadystatechange = function () {
	        if (request.readyState == 4) {
	            if (request.status == 200) {
	                if (params.success)
	                    params.success(request.responseText);
	            }
	            else if (parseInt(request.status / 100) == 4) {
	                if (params.error)
	                    params.error(request.responseText);
	            }
	        }
	    }
	    request.open(params.type, params.url, params.async);
	    try {
	        request.send(params.data||null);
	    } catch (e) {
	        if (params.error)
	            params.error(request.responseText);
	    }
	}
</script>
