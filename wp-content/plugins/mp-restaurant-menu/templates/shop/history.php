<?php
if (!mprm_user_pending_verification()) { ?>
	<?php if (is_user_logged_in()) {
		$purchases = mprm_get_users_purchases(get_current_user_id(), 20, true, 'any');
		if (!empty($purchases) && is_array($purchases)) {
			do_action('mprm_before_purchase_history'); ?>
			<table id="mprm_user_history">
				<thead>
				<tr class="mprm_purchase_row">
					<?php do_action('mprm_purchase_history_header_before'); ?>
					<th class="mprm_purchase_id"><?php esc_html_e('ID', 'mp-restaurant-menu'); ?></th>
					<th class="mprm_purchase_date"><?php esc_html_e('Date', 'mp-restaurant-menu'); ?></th>
					<th class="mprm_purchase_amount"><?php esc_html_e('Amount', 'mp-restaurant-menu'); ?></th>
					<th class="mprm_purchase_status"><?php esc_html_e('Status', 'mp-restaurant-menu'); ?></th>
					<th class="mprm_purchase_details"><?php esc_html_e('Details', 'mp-restaurant-menu'); ?></th>
					<?php do_action('mprm_purchase_history_header_after'); ?>
				</tr>
				</thead>
				<?php foreach ($purchases as $post) : setup_postdata($post); ?>
					<?php $purchase_data = mprm_get_payment_meta($post->ID); ?>
					<tr class="mprm_purchase_row">
						<?php do_action('mprm_purchase_history_row_start', $post->ID, $purchase_data); ?>
						<td class="mprm_purchase_id">#<?php echo esc_html( mprm_get_payment_number($post->ID) ); ?></td>
						<td class="mprm_purchase_date"><?php echo esc_html( date_i18n(get_option('date_format'), strtotime(get_post_field('post_date', $post->ID))) ); ?></td>
						<td class="mprm_purchase_amount"><?php echo esc_html( mprm_currency_filter(mprm_format_amount(mprm_get_payment_amount($post->ID))) ); ?></td>
						<td class="mprm_purchase_status"><?php echo esc_html( mprm_get_payment_status($post, true) ); ?></td>
						<td class="mprm_purchase_details"><a href="<?php echo esc_url(add_query_arg('payment_key', mprm_get_payment_key($post->ID), mprm_get_success_page_uri())); ?>"><?php esc_html_e('View Details', 'mp-restaurant-menu'); ?></a></td>
						<?php do_action('mprm_purchase_history_row_end', $post->ID, $purchase_data); ?>
					</tr>
				<?php endforeach; ?>
			</table>
			<div id="mprm_purchase_history_pagination" class="mprm_pagination navigation">
				<?php
				$big = 999999;
				echo paginate_links(array( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
					'format' => '?paged=%#%',
					'current' => max(1, get_query_var('paged')),
					'total' => ceil(mprm_count_purchases_of_customer() / 20) // 20 items per page
				));
				?>
			</div>
			<?php do_action('mprm_after_purchase_history'); ?>
			<?php wp_reset_postdata(); ?>
		<?php } else { ?>
			<p class="mprm-no-purchases"><?php esc_html_e('You have not made any purchases', 'mp-restaurant-menu'); ?></p>
		<?php }
	} else { ?>
		<p class="mprm-account-pending mprm_success">
			<?php esc_html_e('You must be logged in to view your purchases.', 'mp-restaurant-menu'); ?>
			<a href="<?php echo wp_login_url(mprm_get_purchase_history_page()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped?>" title="<?php esc_attr_e('Login.', 'mp-restaurant-menu'); ?>"><?php esc_html_e('Login.', 'mp-restaurant-menu'); ?></a>
		</p>
	<?php }
} else {
	if (!empty($_GET['mprm-verify-request'])) : ?>
		<p class="mprm-account-pending mprm_success">
			<?php esc_html_e('An email with an activation link has been sent.', 'mp-restaurant-menu'); ?>
		</p>
	<?php endif; ?>
	<p class="mprm-account-pending">
		<?php $url = mprm_get_user_verification_request_url(); ?>
		<?php printf( wp_kses_post( __('Your account is pending verification. Please click the link in your email to activate your account. No email? <a href="%s">Click here</a> to send a new activation code.', 'mp-restaurant-menu') ), esc_url( $url ) ); ?>
	</p>
	<?php
}
