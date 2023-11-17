<?php do_action('mprm_purchase_link_form_before', $post->ID, $args) ?>
	<div class="mprm-add-menu-item mprm-display-inline" style="position: relative;">
		<?php mprm_get_preloader('small-preloader mprm-hidden'); ?>

		<form id="<?php echo esc_attr( $form_id ); ?>" class="mprm_purchase_form mprm_purchase_submit_wrapper mprm_purchase_<?php echo absint($post->ID); ?>" data-id="<?php echo esc_attr( $post->ID );?>" method="post">
			<?php do_action('mprm_purchase_link_top', $post->ID, $args); ?>

			<?php $class = implode(' ', array($args['style'], $args['color'], trim($args['class']), trim($args['padding'])));

			if (!$is_ajax_disabled) { ?>
				<a href="#" class="mprm-add-to-cart mprm-has-js <?php echo esc_attr($class) ?> mprm-display-inline"
				   data-action="mprm_add_to_cart"
				   data-menu-item-id="<?php echo esc_attr($post->ID) ?>" <?php echo $data_variable . ' ' . $type . ' ' . $data_price // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> >
					<span class="mprm-add-to-cart-label"><?php echo esc_html( $args['text'] );?></span>
				</a>
			<?php } else { ?>
				<input type="submit" class="mprm-add-to-cart mprm-no-js <?php echo esc_attr($class) ?>" name="mprm_purchase_<?php echo esc_attr( $post->ID );?>" value="<?php echo esc_attr($args['text']) ?>" data-action="mprm_add_to_cart" data-menu-item-id="<?php echo esc_attr($post->ID) ?>" <?php echo $data_variable . ' ' . $type . ' ' . $button_display // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>/>
			<?php } ?>

			<a href="<?php echo esc_url($checkout_uri) ?>" style="<?php echo (mprm_item_in_cart($post->ID) && $is_ajax_disabled && !$straight_to_checkout) ? '' : 'display: none' ?>" class="mprm_go_to_checkout <?php echo esc_attr($class) ?> mprm-display-inline"><?php esc_html_e('Checkout', 'mp-restaurant-menu') ?></a>

			<?php if (!$is_free): ?>
				<?php if ($display_tax_rate && $prices_include_tax) {
					echo '<span class="mprm_purchase_tax_rate">' . sprintf( esc_html__('Includes %1$s&#37; tax', 'mp-restaurant-menu'), esc_html( floatval( $tax_rate ) * 100 ) ) . '</span>';
				} elseif ($display_tax_rate && !$prices_include_tax) {
					echo '<span class="mprm_purchase_tax_rate">' . sprintf( esc_html__('Excluding %1$s&#37; tax', 'mp-restaurant-menu'), esc_html( floatval( $tax_rate ) * 100 ) ) . '</span>';
				} ?>
			<?php endif; ?>

			<input type="hidden" name="menu_item_id" value="<?php echo esc_attr($post->ID); ?>">
			<input type="hidden" name="controller" value="cart">

			<?php wp_referer_field() ?>

			<?php if ($variable_pricing && isset($price_id) && isset($prices[$price_id])): ?>
				<input type="hidden" name="mprm_options[price_id][]" id="mprm_price_option_<?php echo esc_attr( $post->ID ); ?>_1" class="mprm_price_option_<?php echo esc_attr( $post->ID ); ?>" value="<?php echo esc_attr( $price_id ); ?>">
			<?php endif; ?>

			<?php if (!empty($args['direct']) && !$this->is_free($args['price_id'], $post->ID)) { ?>
				<input type="hidden" name="mprm_action" class="mprm_action_input" value="straight_to_gateway">
			<?php } else { ?>
				<input type="hidden" name="mprm_action" class="mprm_action_input" value="add_to_cart">
			<?php } ?>

			<?php if (apply_filters('mprm_redirect_to_checkout', $straight_to_checkout, $post->ID, $args)) : ?>
				<input type="hidden" name="mprm_redirect_to_checkout" id="mprm_redirect_to_checkout" value="1">
			<?php endif; ?>

			<?php do_action('mprm_purchase_link_end', $post->ID, $args); ?>
		</form>

	</div>
<?php do_action('mprm_purchase_link_form_after', $post->ID, $args) ?>