		function showHint(keyid){
			var wat = document.querySelector('.watch');
				  var xmlhttp;
				  if (window.XMLHttpRequest)
				  {
				    xmlhttp=new XMLHttpRequest();
				  }
				  else
				  {
				    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				  xmlhttp.onreadystatechange=function(resquest,responseText){
				    if (xmlhttp.readyState==4 && xmlhttp.status==200)
				    {
				    	if(xmlhttp.responseText==''){
				    		return false;
				    	}else{
				    	var response_txt=JSON.parse(xmlhttp.responseText);
				    	var response_result=response_txt.result.article_watch;
				    	watch_span.innerHTML='<i class="iconfont">&#xe63a;</i>'+response_result;
				    	}
				    }
				  }
				  xmlhttp.open("GET","article_visit.php?q="+keyid,true);
				  xmlhttp.send();
			}
		window.onload=function(){
			var parent = document.querySelector('.main_article');
			parent.addEventListener("click",function(e){
				var e = e||window.event;
				var target = e.target||e.srcElement;
			if(target.className=="first_a"){
				watch_span=target.parentNode.parentNode.querySelector('.watch');
			}else{
				 watch_span=target.parentNode.parentNode.parentNode.querySelector('.watch');}
				if(target.getAttribute('data-artcid')){
					
					var res_id = target.getAttribute('data-artcid');
					showHint(res_id);
					
				}
			});
		}
