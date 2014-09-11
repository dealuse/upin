<?php include template("wap_header");?>

        <nav class="nav">
                <a href="#" class="back">返回</a>
                <div class="position">提交订单</div>
                 <?php if($login_user_id){?>
				   <a href="my.php" class="me"></a>	
					<?php } else { ?>
				   <a href="login.php" class="login_wap">登陆</a>	
				   <?php }?>                 
            </nav>
            <article class="detail">
                <div class="h_info"><?php echo $team['title']; ?></div>
                <form action="" method="post">
                <ul class="order">
                    <li class="order_price"><span>单价</span> <span id="price"><?php echo $currency; ?><?php echo moneyit($team['team_price']); ?></span></li>
                    <li class="order_num"><span>数量</span> 
                        <p class="count"><span class="red" id="red">-</span> <input type="text" name="quantity" id="num" value="1" > <span class="add" id="add">+</span></p>
                    </li>
                    <li class="order_pn"><span>总价</span> <span id="andp"><?php echo $currency; ?><?php echo moneyit($team['team_price']); ?></span></li>
                </ul>

                <?php if($team['delivery']=='express'){?>              
                <div class="h_info">快递信息</div>
                <ul class="freight">
                    <li><span>收件人：</span> <input type="text"   placeholder="姓名"/></li>
                    <li><span>手机号: </span> <input type="text"   placeholder="手机号" /></li>
                    <li><span>邮政编码:</span><input type="text"   placeholder="邮政编码" /></li>
                    <li class="address"><span>收件地址:</span> <textarea></textarea></li>                                   
                </ul>
                <?php }?>
                <div class="order_buy">
                    <input class="submit" type="submit" value="提交订单" style="width:200px;">
                    <br><br>
                    <?php if(!$login_user_id){?> 
                    <p>请使用优品会账号 <a href="login.php">登录</a> 提交订单</p>
                    <?php }?>
                </div>
                </form>
            </article>  
            
        

        <script type="text/javascript">
            var price=parseInt(ng("price").innerHTML.slice(1)),red=ng("red"),num=ng("num"),add=ng("add"),andp=ng("andp");
            console.log(price);
            red.onclick=add.onclick=function(e){
                var v=parseInt(num.value);      
                if(this.id==red.id){
                    if(v>0){
                        num.value=--v;
                        andp.innerHTML="$"+(v*price);
                    }
                }else{
                    if(v<200){
                        num.value=++v;
                        andp.innerHTML="$"+(v*price);
                    }
                }
            }

            function ng(id){
                return document.getElementById(id);
            }
        </script>

<?php include template("wap_footer");?>
