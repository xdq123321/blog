function addCookie(name,value,expiresdays){
		var cookieString=name+"="+escape(value); 
		//判断是否设置过期时间 
		if(expiresdays>0){ 
		var date=new Date(); 
		date.setTime(date.getTime()+expiresdays*60*24*60*1000); 
		cookieString=cookieString+"; expires="+date.toGMTString(); 
		} 
		document.cookie=cookieString; 
} 

function getCookie(name){
		var strCookie=document.cookie.replace(/[ ]/g,''); 
		var arrCookie=strCookie.split(";"); 
		for(var i=0;i<arrCookie.length;i++){ 
		var arr=arrCookie[i].split("="); 
		if(arr[0]==name)return unescape(arr[1]); 
		}
		return false; 
}
function allowDrop(ev)
{
	ev.preventDefault();
}

function drag(ev)
{
	ev.dataTransfer.setData("Text",ev.target.id);
}

function drop(ev)
{
	ev.preventDefault();
	var data=ev.dataTransfer.getData("Text");
	ev.target.appendChild(document.getElementById(data));
	ev.dataTransfer.clearData("Text");
}
function showHint(keyid,imgtype){
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
				    		console.log('wu');
				    	}else{
				    	var response_txt=JSON.parse(xmlhttp.responseText);
				    	var response_result=response_txt.result;
				    	res_span.innerHTML=response_result+'人';
				    	//console.log(xmlhttp.responseText);
				    	}
				    }
				  }
				  xmlhttp.open("GET","details_add.php?id="+keyid+"&&face="+imgtype,true);
				  xmlhttp.send();
			}
function check_code(trueCode){
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
				    		//console.log(xmlhttp.responseText);
				    	var response_txt=JSON.parse(xmlhttp.responseText);
				    	var response_result=response_txt.result;
				    	if(response_result=="res_false"){
				    		truecode_span.innerText="是不是看错了呢？换一张试试";
				    		cross4=false;
				    	}
				    	if(response_result=="res_true"){
				    		truecode_span.innerText="";
				    		cross4=true;
				    	}
				    	
				    	//console.log(xmlhttp.responseText);
				    	}
				    }
				  }
				  xmlhttp.open("GET","check_code.php?code="+trueCode,true);
				  xmlhttp.send();
}
function add0(m){return m<10?'0'+m:m }
function my_format(shijianchuo){
var time = new Date(shijianchuo*1000);
var y = time.getFullYear();
var m = time.getMonth()+1;
var d = time.getDate();
var h = time.getHours();
var mm = time.getMinutes();
var s = time.getSeconds();
return y+'-'+add0(m)+'-'+add0(d)+' '+add0(h)+':'+add0(mm)+':'+add0(s);
}
function user_message(postdata){
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
				    		//console.log(xmlhttp.responseText);
				    		var response_txt=JSON.parse(xmlhttp.responseText);
				    		var response_res=response_txt.result;
				    		var resp_count=response_txt.count.count_art;
				    		document.querySelector("#h2_common_span").innerText=resp_count;
				    		//console.log(resp_count);
				    		 var arr=[];
				    		for(var i in response_res){
								    arr.push(response_res[i]);
								}
				    		//console.log(arr);
				    		var pText=arr[0].slice(0,1);
				    		var li=document.createElement('li');
				    		li.className="details_user_common_li";
				    		var p=document.createElement('p');
				    		p.style.backgroundColor=arr[1];
				    		p.className="user_common_li_p";
				    		var p_text=document.createTextNode(pText);
				    		p.appendChild(p_text);
				    		li.appendChild(p);
				    		var div=document.createElement('div');
				    		div.className="user_common_li_header";
				    		li.appendChild(div);
				    		var span_one=document.createElement('span');
				    		span_one.className="user_header_span";
				    		var spanOneText=document.createTextNode(arr[0]);
				    		span_one.appendChild(spanOneText);
				    		div.appendChild(span_one);
				    		
				    		var p_two=document.createElement('p');
				    		p_two.className="user_header_p";
				    		var span_two=document.createElement('span');
				    		span_two.className="one";
				    		var spanTwoText=document.createTextNode(arr[2]);
				    		span_two.appendChild(spanTwoText);
				    		p_two.appendChild(span_two);
				    		var span_three=document.createElement('span');
				    		span_three.className="two";
				    		var spanThreeText=document.createTextNode(arr[4]);
				    		span_three.appendChild(spanThreeText);
				    		p_two.appendChild(span_three);
				    		div.appendChild(p_two);
				    		
				    		var div_two=document.createElement('div');
				    		div_two.className="user_common_li_content";
				    		var p_three=document.createElement('p');
				    		var pThreeText=document.createTextNode(arr[3]);
				    		p_three.appendChild(pThreeText);
				    		div_two.appendChild(p_three);
				    		li.appendChild(div_two);
				    		
				    		var div_three=document.createElement('div');
				    		div_three.className="user_common_li_footer";
				    		var div_four=document.createElement('div');
				    		div_four.className="user_common_time";
				    		var divFourText=document.createTextNode(my_format(parseInt(arr[5])));
				    		div_four.appendChild(divFourText);
				    		div_three.appendChild(div_four);
				    		li.appendChild(div_three);
				    		var ul=document.querySelector("#details_user_common_ul");
				    		var first_child=ul.firstChild;
				    		ul.insertBefore(li,first_child);
				    		
				    		
				    		
				    		
				    		
				    		
				    	}
				    }
				  }
				  xmlhttp.open("POST","leave_message.php?"+Math.random(),true);
				  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
				  xmlhttp.send(postdata);
}
/* 判断浏览器版本及操作系统版本    开始   */
    function getOsInfo() {
    var userAgent = navigator.userAgent.toLowerCase();
    var name = 'Unknown';
    var version = "Unknown";
    if(userAgent.indexOf("win") > -1) {
        name = "Windows";
        if(userAgent.indexOf("windows nt 5.0") > -1) {
            version = "Windows 2000";
        } else if(userAgent.indexOf("windows nt 5.1") > -1 || userAgent.indexOf("windows nt 5.2") > -1) {
            version = "Windows XP";
        } else if(userAgent.indexOf("windows nt 6.0") > -1) {
            version = "Windows Vista";
        } else if(userAgent.indexOf("windows nt 6.1") > -1 || userAgent.indexOf("windows 7") > -1) {
            version = "Windows 7";
        } else if(userAgent.indexOf("windows nt 6.2") > -1 || userAgent.indexOf("windows 8") > -1) {
            version = "Windows 8";
        } else if(userAgent.indexOf("windows nt 6.3") > -1) {
            version = "Windows 8.1";
        } else if(userAgent.indexOf("windows nt 6.2") > -1 || userAgent.indexOf("windows nt 10.0") > -1) {
            version = "Windows 10";
        } else {
            version = "Unknown";
        }
    } else if(userAgent.indexOf("iphone") > -1) {
        name = "Iphone";
    } else if(userAgent.indexOf("mac") > -1) {
        name = "Mac";
    } else if(userAgent.indexOf("x11") > -1 || userAgent.indexOf("unix") > -1 || userAgent.indexOf("sunname") > -1 || userAgent.indexOf("bsd") > -1) {
        name = "Unix";
    } else if(userAgent.indexOf("linux") > -1) {
        if(userAgent.indexOf("android") > -1) {
            name = "Android"
        } else {
            name = "Linux";
        }
 
    } else {
        name = "Unknown";
    }
    var os = new Object();
    os.name =  name;
    os.version = version;
        //document.write("------" + os.name + "--------" + os.version)
    return os;
 
}
function getBrowerInfo(){
    var Browser = Browser || (function(window) {
        var document = window.document,
            navigator = window.navigator,
            agent = navigator.userAgent.toLowerCase(),
            //IE8+支持.返回浏览器渲染当前文档所用的模式
            //IE6,IE7:undefined.IE8:8(兼容模式返回7).IE9:9(兼容模式返回7||8)
            //IE10:10(兼容模式7||8||9)
            IEMode = document.documentMode,
            //chorme
            chrome = window.chrome || false,
            System = {
                //user-agent
                agent: agent,
                //是否为IE
                isIE: /trident/.test(agent),
                //Gecko内核
                isGecko: agent.indexOf("gecko") > 0 && agent.indexOf("like gecko") < 0,
                //webkit内核
                isWebkit: agent.indexOf("webkit") > 0,
                //是否为标准模式
                isStrict: document.compatMode === "CSS1Compat",
                //是否支持subtitle
                supportSubTitle: function() {
                    return "track" in document.createElement("track");
                },
                //是否支持scoped
                supportScope: function() {
                    return "scoped" in document.createElement("style");
                },
 
                //获取IE的版本号
                ieVersion: function() {
                    var rMsie  = /(msie\s|trident.*rv:)([\w.]+)/;
                    var ma = window.navigator.userAgent.toLowerCase()
                    var  match  = rMsie.exec(ma);
                    try {
                        return match[2];
                    } catch (e) {
                        //									console.log("error");
                        return IEMode;
                    }
                },
                //Opera版本号
                operaVersion: function() {
                    try {
                        if (window.opera) {
                            return agent.match(/opera.([\d.]+)/)[1];
                        } else if (agent.indexOf("opr") > 0) {
                            return agent.match(/opr\/([\d.]+)/)[1];
                        }
                    } catch (e) {
                        //									console.log("error");
                        return 0;
                    }
                }
            };
 
        try {
            //浏览器类型(IE、Opera、Chrome、Safari、Firefox)
            System.type = System.isIE ? "IE" :
                window.opera || (agent.indexOf("opr") > 0) ? "Opera" :
                    (agent.indexOf("chrome") > 0) ? "Chrome" :
                        //safari也提供了专门的判定方式
                        window.openDatabase ? "Safari" :
                            (agent.indexOf("firefox") > 0) ? "Firefox" :
                                'unknow';
 
            //版本号
            System.version = (System.type === "IE") ? System.ieVersion() :
                (System.type === "Firefox") ? agent.match(/firefox\/([\d.]+)/)[1] :
                    (System.type === "Chrome") ? agent.match(/chrome\/([\d.]+)/)[1] :
                        (System.type === "Opera") ? System.operaVersion() :
                            (System.type === "Safari") ? agent.match(/version\/([\d.]+)/)[1] :
                                "0";
 
            //浏览器外壳
            System.shell = function() {
 
                if (agent.indexOf("edge") > 0) {
                    System.version = agent.match(/edge\/([\d.]+)/)[1] || System.version;
                    return "edge浏览器";
                }
                //遨游浏览器
                if (agent.indexOf("maxthon") > 0) {
                    System.version = agent.match(/maxthon\/([\d.]+)/)[1] || System.version;
                    return "傲游浏览器";
                }
                //QQ浏览器
                if (agent.indexOf("qqbrowser") > 0) {
                    System.version = agent.match(/qqbrowser\/([\d.]+)/)[1] || System.version;
                    return "QQ浏览器";
                }
 
                //搜狗浏览器
                if (agent.indexOf("se 2.x") > 0) {
                    return '搜狗浏览器';
                }
 
                //Chrome:也可以使用window.chrome && window.chrome.webstore判断
                if (chrome && System.type !== "Opera") {
                    var external = window.external,
                        clientInfo = window.clientInformation,
                        //客户端语言:zh-cn,zh.360下面会返回undefined
                        clientLanguage = clientInfo.languages;
 
                    //猎豹浏览器:或者agent.indexOf("lbbrowser")>0
                    if (external && 'LiebaoGetVersion' in external) {
                        return '猎豹浏览器';
                    }
                    //百度浏览器
                    if (agent.indexOf("bidubrowser") > 0) {
                        System.version = agent.match(/bidubrowser\/([\d.]+)/)[1] ||
                            agent.match(/chrome\/([\d.]+)/)[1];
                        return "百度浏览器";
                    }
                    //360极速浏览器和360安全浏览器
                    if (System.supportSubTitle() && typeof clientLanguage === "undefined") {
                        //object.key()返回一个数组.包含可枚举属性和方法名称
                        var storeKeyLen = Object.keys(chrome.webstore).length,
                            v8Locale = "v8Locale" in window;
                        return storeKeyLen > 1 ? '360极速浏览器 ' : '360安全浏览器 ';
                    }
                    return "Chrome";
                }
                return System.type;
            };
 
            //浏览器名称(如果是壳浏览器,则返回壳名称)
            System.name = System.shell();
            //对版本号进行过滤过处理
            //	System.version = System.versionFilter(System.version);
 
        } catch (e) {
            //						console.log(e.message);
        }
        return {
            client: System
        };
 
    })(window);
    if (Browser.client.name == undefined || Browser.client.name=="") {
        Browser.client.name = "Unknown";
        Browser.client.version = "Unknown";
    }else if(Browser.client.version == undefined){
        Browser.client.version = "Unknown";
    }
    				//document.write(Browser.client.name + " " + Browser.client.version);
    return Browser ;
}

/*  判断浏览器及操作系统  结束   */
function user_color(){
  var colors = [ '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f' ];     
  var res = '';
  for(var i=0; i<6; i++){
    var n = parseInt( Math.random()*15 );
    res += colors[n];
  }
  return '#' + res;
}
function changing(){
	document.getElementById('checkpic').src="code.php?"+Math.random();
	truecode.value="";
	truecode.focus();
}
	var cross1,cross2,cross3,cross4=false;
	var sub=document.querySelector("#common_sub");
	var content=document.querySelector("#details_common_content");
	var content_span=document.querySelectorAll(".common_tips")[0];
	var nic=document.querySelector("#input_author");
	var nic_span=document.querySelectorAll(".common_tips")[1];
	var email=document.querySelector("#input_email");
	var email_span=document.querySelectorAll(".common_tips")[2];
	var truecode=document.querySelector("#input_truecode");
	var truecode_span=document.querySelectorAll('.common_tips')[3];
	
function cross_content(){
	if(content.value==''){
		content_span.innerText="写点内容吧，小伙伴O(∩_∩)O~~~";
		cross1=false;
		}else{
		content_span.innerText="";
		cross1=true;
		}
}
function cross_nic(){
	if(nic.value==''){
		nic_span.innerText="你是不是忘了键入你的昵称呢^_^";
		cross2=false;
		}else{
		nic_span.innerText="";
		cross2=true;
		}
}
function cross_email(){
	if(email.value==''){
		email_span.innerText="你滴邮箱忘了填哟~~~";
		cross3=false;
		}else{
			var reg = /^[0-9a-zA-Z_.-]+[@][0-9a-zA-Z_.-]+([.][a-zA-Z]+){1,2}$/;
			if(reg.test(email.value)){
			email_span.innerText="";
			cross3=true;
			}else{
			email_span.innerText="你滴邮箱格式不正确哟o(╥﹏╥)o";
			cross3=false;
			}
		}
}
function cross_code(){
	if(truecode.value==''){
		truecode_span.innerText="请填写验证码，不然怎么验证呢^_^";
		cross4=false;
		}else{
		var tr_val=truecode.value;
		var Reg = /[0-9a-zA-Z]/g;
		if(!Reg.test(tr_val))return false;
		else check_code(tr_val);
		}
}
	var div_top=0;
function create_tips(txt){
	//<div id="user_clicked"><i class="iconfont">&#xe609;</i>&nbsp;&nbsp;<span>您已经发表过意见了!</span></div>
	var par=document.querySelector(".article_link");
	var click_div=document.createElement("div");
	click_div.id="user_clicked";
	var click_i=document.createElement("i");
	click_i.innerHTML="&#xe609;"
	click_i.className="iconfont";
	var click_span=document.createElement("span");
	click_span.innerHTML="&nbsp;&nbsp;"+txt;
	click_div.appendChild(click_i);
	click_div.appendChild(click_span);
	par.appendChild(click_div);
	var t=setInterval(function(){
	
		div_top+=10;
		if(div_top>=30){
			clearInterval(t);
			div_top=30;
		}
		click_div.style.top=div_top+"px";
	},30);
	
}
function up_tips(){
	var par=document.querySelector(".article_link");
	var timer=setTimeout(function(){
				var target_div=document.querySelector("#user_clicked");
				target_div.style.top= -50+"px";
				target_div.addEventListener('transitionend',function(){
					par.removeChild(target_div);
					clearTimeout(timer);
				});
			},2200);
}
	
$(document).ready(function(){
	$("#my_weixin").click(function(){
		$(".div_weixin").fadeIn(500);
	});
	$("#weixin_close").click(function(){
		$(".div_weixin").fadeOut(500);
	});
	/*打赏开始*/
	$('.el_radio').click(function(){
		var img=['zhifubao.jpg','weixin_good.png'];
		$(this).find('.el_radio_input').addClass('is-checked');
		$(this).siblings().find('.el_radio_input').removeClass('is-checked');
		$('.qr_code>img').attr('src','img/'+img[$(this).index()]);
	});
	$('.share_money').click(function(){
		$('.money_div').css('display','block');
	})
	$('.close_svg,.mask').click(function(){
		$('.money_div').css('display','none');
	});
	
	
	/*打赏结束*/
	$('.pp').on('click',function(){
		$(this).find('.ii').toggleClass('i_transform');
	})
	 detaa=document.querySelector("#inp_hidden");
	var father=document.querySelector('.ul_expression');
	father.addEventListener("click",function(e){
		var deta_id=detaa.value;
		var e = e||window.event;
		var target = e.target||e.srcElement;
		 res_span=target.parentNode.querySelector('.count');
		var res_img=target.getAttribute('data-imgname');
		var cook="fxbLink"+deta_id;
		if(getCookie(cook)){
			if(!document.querySelector("#user_clicked")){
			create_tips("您已经发表过意见了!");
			up_tips();
			}
			//console.log("点击过了");
			return false;
		}else{
			if(res_img)
			showHint(deta_id,res_img);
			addCookie(cook,"true",1);
		}
	});
	
	truecode.onkeyup=function(){
		cross_code();
		
	}
	content.onkeyup=function(){
		cross_content();
	}
	nic.onkeyup=function(){
		cross_nic();
	}
	email.onkeyup=function(){
		cross_email();
	}
	sub.onclick=function(){
	cross_content();
	cross_nic();
	cross_email();
	if(truecode.value==''){
		truecode_span.innerText="请填写验证码，不然怎么验证呢^_^";
		cross4=false;
		}
		if(cross1&&cross2&&cross3&&cross4){
			//console.log("通过");
			var user_system=getOsInfo().version;
   			var user_browser_res=getBrowerInfo().client;
   			var user_browser=user_browser_res.name+" "+user_browser_res.version.slice(0,4);
   			var user_bg=user_color();
					var oStr = '';
					var postData = {};
					//post提交的数据
					postData = {"articleId":detaa.value,"content":content.value,"nic":nic.value,"email":email.value,"userSys":user_system,"userBrow":user_browser,"userBg":user_bg};
					//这里需要将json数据转成post能够进行提交的字符串  name1=value1&name2=value2格式
					postData = (function(value){
					　　for(var key in value){
					　　　　oStr += key+"="+value[key]+"&&";
					　　};
					　　return oStr;
					}(postData));
					user_message(postData);
					content.value="";
					nic.value="";
					email.value="";
					truecode.value="";
					if(!document.querySelector("#user_clicked")){
			create_tips("发表留言成功!");
			up_tips();
			}
			
		}
	}
});
