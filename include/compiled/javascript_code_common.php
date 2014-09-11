<script type="text/javascript">
    var WEB_ROOT = '<?php echo WEB_ROOT; ?>';
    var teamId = <?php echo abs(intval($team['id'])); ?>;
    var LOGINUID = <?php echo abs(intval($login_user_id)); ?>;
</script>
<script src="/static/v2/js/v1/ga.1.js" type="text/javascript"></script>
<script src="/static/v2/js/v1/app.1_1.js" type="text/javascript"></script>
<?php echo Session::Get('script',true);; ?>
<?php if($includeScript){?>
<?php if(is_array($includeScript)){foreach($includeScript AS $in=>$one) { ?>
<?php
include template('javascript_code/'.$one);
?>

<?php }}?>
<?php }?>
<script type="text/javascript">
    //baidutongji
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F9af808db61fbeeeead806e577cb50722' type='text/javascript'%3E%3C/script%3E"));
    //google analytics
    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>