<script>
	$(function(){
		$('.item-details-topic li a').hover(function(){
			$(this).parent().addClass('active').siblings().removeClass('active').parent().addClass('active');
		},function(){
			$(this).parent().removeClass('active').parent().removeClass('active');
		});
	});
</script>