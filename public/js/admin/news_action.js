function add(){
	let title =  document.getElementById("title").value;
	if(title == ''){
		
		document.getElementById("title_error").style.display = 'block';
		document.getElementById("title_error").innerHTML  = '标题不能为空';
		 document.getElementById("title_error").style.color='red';	
		return false;
	}
	let keyword = document.getElementById("keyword").value;
	let news_type = document.getElementById("news_type").value;
	let source = document.getElementById("source").value;
	let source_title = document.getElementById("source_title").value;
	let source_url = document.getElementById("source_url").value;
	let news_image = document.getElementById("news_image").files[0];
	let is_top=$('input:radio[name="is_top"]:checked').val();
	let choiceness=$('input:radio[name="choiceness"]:checked').val();
	
	var objFile = document.getElementById("news_big_image");
	if(typeof(objFile.files[0]) != "undefined")
	{
		var news_big_image = document.getElementById("news_big_image").files[0];
	}
	else
	{
		var news_big_image = '';
	}
	let editor = CKEDITOR.instances.editor.getData();
	let _token = document.getElementById("_token").value;
	
	let formData = new FormData();
	 var d_url = '/admin/news/save';
	 formData.append("title", title);
	 formData.append("keyword", keyword);
	 formData.append("news_type", news_type);
	    formData.append("source", source);
	    formData.append("source_title", source_title);
	    formData.append("source_url", source_url);
	    formData.append("news_image", news_image);
	    formData.append("is_top", is_top);
	    formData.append("choiceness", choiceness);
	    formData.append("news_big_image", news_big_image);
	    formData.append("content", editor);
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
function upload_video(){
	
	window.open ('/admin/news/news_video_upload', 'newwindow', 'height=300, width=700, top=400, left=900, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no') ;
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