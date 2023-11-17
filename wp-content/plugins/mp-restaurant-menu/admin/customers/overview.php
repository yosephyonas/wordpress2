<?php
$customer = mprm_get_customer($id);
$users = apply_filters('mprm_edit_users', get_users());;

if (isset($customer->user_id) && $customer->user_id > 0) :
	$address = get_user_meta($customer->user_id, '_mprm_user_address', true);
	$defaults = array(
		'line1' => '',
		'line2' => '',
		'city' => '',
		'state' => '',
		'country' => '',
		'zip' => ''
	);

	$address = wp_parse_args($address, $defaults);
endif;
?>

<div class="wrap">
	<h1><?php esc_html_e('Customer Details', 'mp-restaurant-menu'); ?></h1>
	<?php do_action('mprm_customers_detail_top'); ?>
	<div id="mprm-customers-details-wrap" class="postbox ">
		<form id="mprm-customers-details-form" method="post">
			<p class="mprm-class-email"><label for="mprm-email">
					<?php esc_html_e('Email', 'mp-restaurant-menu'); ?>
				</label>
				<input class="mprm-input large-text" type="email" required name="mprm-email" value="<?php echo esc_attr( $customer->email ); ?>">
			</p>
			<p class="mprm-class-name">
				<label for="mprm-name">
					<?php esc_html_e('Full name', 'mp-restaurant-menu'); ?>
				</label>
				<input type="text" class="mprm-input large-text" required name="mprm-name" value="<?php echo esc_attr( $customer->name ); ?>">
			</p>
			<p class="mprm-class-telephone"><label for="mprm-telephone">
					<?php esc_html_e('Phone', 'mp-restaurant-menu'); ?>
				</label>
				<input class="mprm-input large-text" type="text" name="mprm-telephone" value="<?php echo esc_attr( $customer->telephone ); ?>">
			</p>
			<p class="mprm-class-wp-user">
				<label for="mprm-user">
					<?php esc_html_e('User', 'mp-restaurant-menu'); ?>
				</label>
				<br/>
				<select class="mprm-select large-text" required name="mprm-user">
					<?php if (empty($users)) { ?>
						<option value="0"><?php esc_html_e('No available users', 'mp-restaurant-menu') ?></option>
					<?php } else { ?>
						<option value="0"><?php esc_html_e('No user selected', 'mp-restaurant-menu') ?></option>
						<?php foreach ($users as $user) { ?>
							<option value="<?php echo esc_attr( $user->ID ); ?>" <?php selected($user->ID, $customer->user_id); ?> ><?php echo esc_html( $user->user_nicename );?></option>
						<?php }
					} ?>
				</select>
			</p>

			<p><?php echo mprm_get_error_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php submit_button(esc_html__('Update customer', 'mp-restaurant-menu'), 'primary', 'mprm-submit') ?>

			<input type="hidden" name="controller" value="customer">
			<input type="hidden" name="mprm_action" value="update_customer">
		</form>
	</div>

	<?php do_action('mprm_customers_detail_bottom'); ?>
</div>