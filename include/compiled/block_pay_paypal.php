<form id="order-pay-form" method="post" action="<?php echo $post_url; ?>" target="_blank" sid="<?php echo $order_id; ?>">
	<!-- PayPal Configuration -->
	<input type="hidden" name="business" value="<?php echo $business; ?>">
	<input type="hidden" name="cmd" value="<?php echo $cmd; ?>">
	<input type="hidden" name="return" value="<?php echo $return_url; ?>">
	<input type="hidden" name="cancel_return" value="<?php echo $cancel_url; ?>">
	<input type="hidden" name="notify_url" value="<?php echo $notify_url; ?>">
	<input type="hidden" name="rm" value="2">
	<input type="hidden" name="currency_code" value="<?php echo $currency_code; ?>">
	<input type="hidden" name="lc" value="<?php echo $location; ?>">
	<input type="hidden" name="charset" value="utf-8" />

	<!-- Payment Page Information -->
	<input type="hidden" name="no_shipping" value="1">
	<input type="hidden" name="no_note" value="1">

	<!-- Product Information -->
	<input type="hidden" name="item_name" value="<?php echo $item_name; ?>">
	<input type="hidden" name="amount" value="<?php echo $amount; ?>">
	<input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
	<input type="hidden" name="item_number" value="<?php echo $item_number; ?>">

	<!-- Customer Information -->
	<input type="hidden" name="first_name" value="<?php echo $login_user['realname']; ?>">
	<input type="hidden" name="last_name" value="">
	<input type="hidden" name="address1" value="<?php echo $login_user['address']; ?>">
	<input type="hidden" name="address2" value="">

	<input type="hidden" name="zip" value="<?php echo $login_user['zipcode']; ?>">
	<input type="hidden" name="email" value="<?php echo $login_user['email']; ?>">
	<img src="/static/theme/ev56_58/css/i/paypal.png" /><br/><input type="submit" class="formbutton gotopay" value="Go to PayPal" style="vertical-align:middle;"/>
</form>
