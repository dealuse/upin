<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=0" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<?php if(time()>strtotime('2013-11-10') && time()<strtotime('2013-11-11 20:01') && $REAL_LINK_GLOBAL['is34line']){?>
<script>
$(function(){
    function ShowTimes(){  
        var AfterTime= new Date("Mon Nov 11 2013 <?php echo $DEla; ?>:00:00 GMT+0800");  
        LeaveTime = AfterTime - new Date();  
        LeaveDays=Math.floor(LeaveTime/(1000*60*60*24));//天  
        LeaveHours=Math.floor(LeaveTime/(1000*60*60)%24);//时  
        LeaveMinutes=Math.floor(LeaveTime/(1000*60)%60);//分  
        LeaveSeconds=Math.floor(LeaveTime/1000%60);//秒  
        var c=new Date();  
        var q=c.getMilliseconds();  
        if(q<10){//因为毫秒为一位数时只占一个字符位置，会让毫秒二字变动位置
            q="00"+c.getMilliseconds();  
        }  
        if(q>=10 && q<100){//因为毫秒为两位数时只占两个字符位置，会让毫秒二字变动位置  
            q="0"+c.getMilliseconds();  
        }  
        $('#de-int').html("距双十一第<font color=red><?php echo $DEStep; ?></font>轮五折抢购还剩<font color=red>"+LeaveDays+"</font>天<font color=red>"+LeaveHours+"</font>时<font color=red>"+LeaveMinutes+"</font>分<font color=red>"+LeaveSeconds+"</font>秒<font color=red>"+q+"</font>");
        if(LeaveSeconds<0){
            $('#de-int').hide();
        }
    }  
    setInterval(ShowTimes,10);  
})
</script>
<?php }?>