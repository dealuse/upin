//团购时间倒数
var bindLiHover=function(li){
li.mouseover(function(){
            var that=$(this);
            that.addClass("active");
        }).mouseout(function(){
            var that=$(this);
            that.removeClass("active");
        });
};

//收藏分享代码
var share={
    sina:function(title,url){
        window.open('http://v.t.sina.com.cn/share/share.php?title='+title+'&url='+url+'&appkey=1993179646','','width=700, height=380, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no');
    },
    kaixin:function(title,url){
        window.open('http://www.kaixin001.com/repaste/bshare.php?rtitle='+title+'&rurl='+url,'','width=700, height=380, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no');
    },
    renren:function(title,url){
        window.open('http://www.connect.renren.com/share/sharer?url=http://widget.renren.com/?widget=freeshare&title='+title+'|'+url,'','width=700, height=380, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no');
    },
    baidu:function(title,url){
        window.open('http://cang.baidu.com/do/add?it='+title+'&iu='+url+'&fr=ien#nw=1','_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes');
    },
    txwb:function(title,url){
        var _t = title;
        var _url = url;
        var _appkey = encodeURI('appkey');//你从腾讯获得的appkey
        var _pic = encodeURI('');//（例如：var _pic='图片url1|图片url2|图片url3....）
        var _site = 'http://www.lashouwang.com';//你的网站地址
        var _u = 'http://v.t.qq.com/share/share.php?url='+_url+'&appkey=3b8ee7c75a884ee6bfb149b00c865231&site='+_site+'&pic='+_pic+'&title='+_t;
        window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
    },
    qzone:function(title,url){
        window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+url+'&title='+title);
    }
};  

$(window).load(function(){

	

	bindLiHover($(".n_content_box").find("li"));
    //返回顶部
    var topBtn=$("#to_top");
    $(document).scroll(function(){
        if($(document).scrollTop()>0){
            topBtn.css("display","block");
        }else{
            topBtn.hide();
        }
    });
	
    //分享按钮绑定
    var shareTitle=encodeURIComponent("你爱团-团购网站模板_最新模板_国内最大团购网模板服务提供商"),
        shareUrl=encodeURIComponent("http://www.lashouwang.com/");
    $("#share_list").click(function(e){
        var elem=e.target||e.srcElement;
        if(elem.tagName=="SPAN"){
            var type=elem.className.replace("share-","");
            share[type](shareTitle,shareUrl);
            return false;
        }
    });	
	
    var backTop=function(){
        var top=$(document).scrollTop();
        top=(top-top*0.2-1)|0;
        $(document).scrollTop(top);
        if(top>0){
            setTimeout(arguments.callee,10);
        }
        return false;
    }
    topBtn.click(backTop);
});