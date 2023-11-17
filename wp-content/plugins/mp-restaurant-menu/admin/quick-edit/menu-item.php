<?php
wp_nonce_field('mp-restaurant-menu' . '_nonce', 'mp-restaurant-menu' . '_nonce_box');
if ('mprm-price' == $column_name): ?>
	<fieldset class="inline-edit-col-right inline-price">
		<div class="inline-edit-col column-<?php echo esc_attr( $column_name ); ?>">
			<label class="inline-edit-group">
				<span class="title"><?php esc_html_e('Price', 'mp-restaurant-menu') ?></span>
				<span class="input-text-wrap"><input name="price" value="" type="text"/></span>
			</label>
		</div>
	</fieldset>
	<fieldset class="inline-edit-col-right inline-sku">
		<div class="inline-edit-col column-sku">
			<label class="inline-edit-group">
				<span class="title"><?php esc_html_e('SKU', 'mp-restaurant-menu') ?></span>
				<span class="input-text-wrap"><input name="sku" value="" type="text"/></span>
			</label>
		</div>
	</fieldset>
	<fieldset class="inline-edit-col-right inline-nutrition-facts">
		<legend class="inline-edit-legend"><?php esc_html_e('Nutrition Facts', 'mp-restaurant-menu') ?></legend>
		<div class="inline-edit-col column-nutrition-facts">
			<label class="inline-edit-group">
				<span class="title"><?php esc_html_e('Calories', 'mp-restaurant-menu'); ?>:</span>
				<span class="input-text-wrap">
					<input type="text" placeholder="0" value="" name="nutritional[calories][val]">
					<input type="hidden" placeholder="0" value="Calories" name="nutritional[calories][title]">
				</span>

				<span class="title"><?php esc_html_e('Cholesterol', 'mp-restaurant-menu'); ?>:</span>
				<span class="input-text-wrap">
					<input type="text" placeholder="0" value="" name="nutritional[cholesterol][val]">
					<input type="hidden" placeholder="0" value="Cholesterol" name="nutritional[cholesterol][title]">
				</span>

				<span class="title"><?php esc_html_e('Fiber', 'mp-restaurant-menu'); ?>:</span>
				<span class="input-text-wrap">
					<input type="text" placeholder="0" value="" name="nutritional[fiber][val]">
					<input type="hidden" placeholder="0" value="Fiber" name="nutritional[fiber][title]">
				</span>

				<span class="title"><?php esc_html_e('Sodium', 'mp-restaurant-menu'); ?>:</span>
				<span class="input-text-wrap">
					<input type="text" placeholder="0" value="" name="nutritional[sodium][val]">
					<input type="hidden" placeholder="0" value="Sodium" name="nutritional[sodium][title]">
				</span>

				<span class="title"><?php esc_html_e('Carbohydrates', 'mp-restaurant-menu'); ?>:</span>
				<span class="input-text-wrap">
					<input type="text" placeholder="0" value="" name="nutritional[carbohydrates][val]">
					<input type="hidden" placeholder="0" value="Carbohydrates" name="nutritional[carbohydrates][title]">
				</span>

				<span class="title"><?php esc_html_e('Fat', 'mp-restaurant-menu'); ?>:</span>
				<span class="input-text-wrap">
					<input type="text" placeholder="0" value="" name="nutritional[fat][val]">
					<input type="hidden" placeholder="0" value="Fat" name="nutritional[fat][title]">
				</span>
				<span class="title"><?php esc_html_e('Protein', 'mp-restaurant-menu'); ?>:</span>
				<span class="input-text-wrap">
					<input type="text" placeholder="0" value="" name="nutritional[protein][val]">
					<input type="hidden" placeholder="0" value="Protein" name="nutritional[protein][title]">
				</span>
			</label>
		</div>
	</fieldset>
	<fieldset class="inline-edit-col-right inline-portion-size">
		<legend class="inline-edit-legend"><?php esc_html_e('Portion Size', 'mp-restaurant-menu') ?></legend>
		<div class="inline-edit-col column-portion-size">
			<label class="inline-edit-group">
				<span class="title"><?php esc_html_e('Weight', 'mp-restaurant-menu'); ?>:</span>
				<span class="input-text-wrap">
					<input type="text" placeholder="0" value="" name="attributes[weight][val]">
					<input type="hidden" placeholder="0" value="Weight" name="attributes[weight][title]">
				</span>
				<span class="title"><?php esc_html_e('Volume', 'mp-restaurant-menu'); ?>:</span>
				<span class="input-text-wrap">
					<input type="text" placeholder="0" value="" name="attributes[bulk][val]">
					<input type="hidden" placeholder="0" value="Volume" name="attributes[bulk][title]">
				</span>
				<span class="title"><?php esc_html_e('Size', 'mp-restaurant-menu'); ?>:</span>
				<span class="input-text-wrap">
					<input type="text" placeholder="0" value="" name="attributes[size][val]">
					<input type="hidden" placeholder="0" value="Size" name="attributes[size][title]">
				</span>
			</label>
		</div>
	</fieldset>
<?php endif; ?>