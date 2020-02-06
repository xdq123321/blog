function init(){
	function move_top(){
		var obtn=document.getElementById('move_btn');
			var clientHeight=document.documentElement.clientHeight;
			var timer=null;
			var isTop=true;
			
			window.onscroll=function(){
				var osTop=document.documentElement.scrollTop||document.body.scrollTop;
				if(osTop>=(clientHeight-100)){
					/*obtn.setAttribute('style','transform: translateX(100px)');*/
					obtn.style.transform = "translateX(0)";
				}else{
					/*
					obtn.setAttribute('style','transform: translateX(160px)');*/
					obtn.style.transform = "translateX(100px)";
				}
				if(!isTop){
					clearInterval(timer);
				}
				isTop=false;
			}
			
			obtn.onclick=function(){
				timer=setInterval(function(){
					var osTop=document.documentElement.scrollTop||document.body.scrollTop;
					 var ispeed=Math.floor(-osTop/6);
					 
				document.documentElement.scrollTop=document.body.scrollTop=osTop+ispeed;
				isTop=true;
				if(osTop==0){
					clearInterval(timer);
				}
				},30);
				
				
			}

	}
	
	
	move_top();	
 
}
init();



