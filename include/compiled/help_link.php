<?php include template("header");?>
<style>
    #txt_link ul li { float: left; width: 125px; margin: 6px 6px;height:15px; line-height: 15px;text-shadow:1px 1px 2px #BDBDBD;}
    #txt_link ul li:hover {color:#f37717; cursor: pointer;}
       #txt_link ul li a{color: #6a6a6b}
    #txt_link ul li a:hover{border: none; color: #fb8f03;}

</style>
<div class="wrap new-order">
    <div class="fl" style="width:700px">
        <div class="uleft c3" id="uleft_ev56">
            <h2 id="helptit" class="hide"><a href="/help/tour.php">帮助中心</a></h2>

            <ul><li style="background: #fef7f7;margin: 0px;padding: 10px 14px;color: #ff6f00; " >友情链接</li></ul>
        </div>

        <div class="uright" id="uright_ev56">

            <div class="acon" style="margin-top:0px;">      
                <div class="sect">
                    <div id="txt_link" style=" font-size: 12px; display: block; ">
                        <ul>
                            <?php if(is_array($friendlink)){foreach($friendlink AS $index=>$one) { ?>
                            <li>
                                <a href="<?php echo $one['url']; ?>" title="<?php echo $one['title']; ?>" target="_blank" style="padding-left:0px; padding-right:20px;"><?php echo $one['title']; ?></a>
                            </li>
                            <?php }}?>
                        </ul>
                    </div>
                    <div style="clear:both;"></div>
                    <div>
                        <h2  style="display:block; border:none; margin-bottom:0px; color: #F60;">链接承诺</h2>	
                        <div class="intro"  style="border-top:1px #E2E2E2 solid; font-size: 12px;">
                            <p>1、不链接有反动、色情、赌博等不良内容或提供不良内容链接的网站，以及网站名称或内容违反国家有关政策法规的网站；</p>
                            <p>2、不链接含有病毒、木马，弹出插件或恶意更改他人电脑设置的网站、及有多个弹窗广告的网站；</p>
                            <p>3、不链接网站名称和实际内容不符的网站，如贵站正在建设中，或尚未明确主题的网站，请不必现在申请收录，欢迎您在贵站建设完毕后再申请；</p>
                            <p>4、不链接非顶级域名、挂靠其他站点、无实际内容，只提供域名指向的网站或仅有单页内容的网站；</p>
                            <p>5、不链接在正常情况下无法访问的网站；</p>
                            <p>6、注意：<a href="/feedback/suggest.php">提交申请</a>前请做好本站的链接，否则不予通过。</p>
                            <p style="color: #056eaa"> &nbsp;&nbsp;&nbsp;&nbsp;友情链接交换 QQ : 2820141676</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="clear"></div>
    <a href="#header" id="gotop" class="hide">返回顶部</a>
</div>
<?php include template("footer");?>