<?php if($team['delivery']=='express'){?>
<script src="/static/v2/js/v1/city.js" type="text/javascript"></script>
<script type="text/javascript">
    $("#s1").change(function() {
        var values1 = $(this).val();
    });
    X.selectCity.setupcity();
    //初始化地址
<?php if($userData['province']){?>
    document.getElementById("s1").value = "<?php echo $userData['province']; ?>";
    X.selectCity.change(1);
<?php }?>
<?php if($userData['city']){?>
    document.getElementById("s2").value = "<?php echo $userData['city']; ?>";
    X.selectCity.change(2);
<?php }?>
<?php if($userData['area']){?>
    document.getElementById("s3").value = "<?php echo $userData['area']; ?>";
<?php }?>
<?php if($login_user['province']){?>
    document.getElementById("s1").value = "<?php echo $login_user['province']; ?>";
    X.selectCity.change(1);
<?php }?>
<?php if($login_user['city']){?>
    document.getElementById("s2").value = "<?php echo $login_user['city']; ?>";
    X.selectCity.change(2);
<?php }?>
<?php if($login_user['area']){?>
    document.getElementById("s3").value = "<?php echo $login_user['area']; ?>";
<?php }?>
</script>
<?php }?>
<script language="javascript">
    jQuery(function(){
        window.location.href="#bd";
        jQuery('form').submit(function(){
            if(X.cart.RichCartModel.itemsCount<=0){
                alert("商品数量不能为空!");
                return false;
            }
            $('input[name=quantity]').val($('input.number').val());

            var $form = $(this);
		
        });
        X.cart.RichCartModel.hideTitle = false;
        X.cart.RichCartModel.hideAttr = true;
        X.cart.RichCartModel.onCalc = function(count,prodTotal,fare,total){
            jQuery('#tCount').html(count);
            jQuery('#tTotal').html("¥"+prodTotal);
            <?php if($team['delivery']=='express'){?>
            jQuery('#RichCart table tfoot tr td:first').html("商品总价:<span>¥"+prodTotal+"</span>　　配送费:<span>¥"+fare+"</span>");
            jQuery('#RichCart table tfoot tr td:last').html("<b>应付总额:</b><label>¥"+total+"</label>");
            <?php } else { ?>
            jQuery('#RichCart table tfoot tr td:first').hide();
            jQuery('#RichCart table tfoot tr td:last').html("<b>应付总额:</b><label>¥"+total+"</label>");
            <?php }?>
        }
        //初始化购物车
        X.cart.initRichCart(<?php echo $initRichCart; ?>,<?php echo $team['farefree']; ?>,true);
        //初始化
        X.cart.addItem({
            id:"<?php echo $team['id']; ?>",
            title:"<?php echo htmlspecialchars($team['product']); ?>",//标题
            img:"<?php echo $team['image']; ?>",//图片
            url:"/team/<?php echo $team['id']; ?>.html",
            price:<?php echo $team['team_price']; ?>,//单价
            str_attr:"<?php echo htmlspecialchars($team['product']); ?>",//商品规格
            count:<?php echo $userData['quantity']; ?>//商品数量
        });
    });
</script>
<?php if(!$login_user){?>
<script language="javascript">
    $(document).ready(function(){
        if($('#no-login-btn').length > 0){
            var ajaxFormConf = {
                beforeSubmit:  showRequest,
                success:       showResponse,
                url:'/ajax/login.php'
            }
            $("#orderFormJQ").ajaxForm(ajaxFormConf);
            /*$("#no-login-btn").click(function(){
                $("#orderFormJQ").ajaxSubmit(ajaxFormConf);
                return false; 
            });*/
            function showRequest(formData, jqForm, options) { 
                return true;
            }
            function showResponse(responseText, statusText, xhr, $form)  { 
                var datta = eval("("+responseText+")");
                X.boxShow(datta.data.data,true);
            }
        }
    })
</script>
<?php }?>
<!--百分点代码：购物车页-->
<script type="text/javascript">
    window["_BFD"] = window["_BFD"] || {};
     _BFD.BFD_INFO = {
          "cart_items" : [["<?php echo $team['id']; ?>", <?php echo $team['team_price']; ?>, "<?php echo $userData['quantity']; ?>"]],   //2维数组，参数分别是["商品id号","该商品的单价","购物车中该商品的数量"];商品id号需和单品页提供的ID号一致
          "category" : ["",""],   //购物车内的商品的最小类别
          "user_id" : "<?php echo $login_user['id']; ?>", //网站当前用户id，如果未登录就为0或空字符串
          "page_type" : "shopcart" //当前页面全称，请勿修改
     };
</script>