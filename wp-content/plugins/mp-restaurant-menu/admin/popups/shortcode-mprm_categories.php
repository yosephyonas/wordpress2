<div class="mprm-line" data-selector="data-line">
	<div class="mprm-left-side"><?php esc_html_e('View mode', 'mp-restaurant-menu'); ?></div>
	<div class="mprm-right-side">
		<select name="view" data-selector="form_data">
			<option value="grid"><?php esc_html_e('Grid', 'mp-restaurant-menu'); ?></option>
			<option value="list"><?php esc_html_e('List', 'mp-restaurant-menu'); ?></option>
		</select>
	</div>
</div>
<div class="mprm-line" data-selector="data-line">
	<div class="mprm-left-side"><?php esc_html_e('Categories', 'mp-restaurant-menu'); ?></div>
	<div class="mprm-right-side">
		<select name="categ" multiple="6" data-selector="form_data">
			<?php if ($categories): ?>
				<?php foreach ($categories as $category): ?>
					<option value="<?php echo esc_attr( $category->term_id ); ?>"><?php echo esc_html( $category->name ); ?></option>
				<?php endforeach; ?>
			<?php endif; ?>
		</select>
	</div>
</div>
<div class="mprm-line" data-selector="data-line">
	<div class="mprm-left-side"><?php esc_html_e('Columns', 'mp-restaurant-menu'); ?></div>
	<div class="mprm-right-side">
		<select name="col" data-selector="form_data">
			<option value="1" class="event-column-1">1 <?php esc_html_e('column', 'mp-restaurant-menu'); ?></option>
			<option value="2" class="event-column-2">2 <?php esc_html_e('columns', 'mp-restaurant-menu'); ?></option>
			<option value="3" class="event-column-3">3 <?php esc_html_e('columns', 'mp-restaurant-menu'); ?></option>
			<option value="4" class="event-column-4">4 <?php esc_html_e('columns', 'mp-restaurant-menu'); ?></option>
			<option value="6" class="event-column-6">6 <?php esc_html_e('columns', 'mp-restaurant-menu'); ?></option>
		</select>
	</div>
</div>
<div class="mprm-line" data-selector="data-line">
	<div class="mprm-left-side"><?php esc_html_e('Show category name', 'mp-restaurant-menu'); ?></div>
	<div class="mprm-right-side">
		<input type="checkbox" name="categ_name" checked value="1" data-selector="form_data"/>
	</div>
</div>
<div class="mprm-line" data-selector="data-line">
	<div class="mprm-left-side"><?php esc_html_e('Show category featured image', 'mp-restaurant-menu'); ?></div>
	<div class="mprm-right-side">
		<input type="checkbox" name="feat_img" checked value="1" data-selector="form_data"/>
	</div>
</div>
<div class="mprm-line" data-selector="data-line">
	<div class="mprm-left-side"><?php esc_html_e('Show category icon', 'mp-restaurant-menu'); ?></div>
	<div class="mprm-right-side">
		<input type="checkbox" name="categ_icon" checked value="1" data-selector="form_data"/>
	</div>
</div>
<div class="mprm-line" data-selector="data-line">
	<div class="mprm-left-side"><?php esc_html_e('Show category description', 'mp-restaurant-menu'); ?></div>
	<div class="mprm-right-side">
		<input type="checkbox" name="categ_descr" checked value="1" data-selector="form_data"/>
	</div>
</div>
<div class="mprm-line" data-selector="data-line">
	<div class="mprm-left-side"><?php esc_html_e('Description length', 'mp-restaurant-menu'); ?></div>
	<div class="mprm-right-side">
		<input type="text" name="desc_length" data-selector="form_data" placeholder="">
	</div>
</div>