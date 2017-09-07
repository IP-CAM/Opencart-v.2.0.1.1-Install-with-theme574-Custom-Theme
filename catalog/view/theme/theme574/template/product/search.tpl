<?php echo $header; ?>

<style>
	p {
		font-family: 'Ubuntu', sans-serif;
		font-size: 14px;
	}
</style>
<div class="container">
	<ul class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
		<?php } ?>
	</ul>
	<div class="row"><?php echo $column_left; ?>
		<?php if ($column_left && $column_right) { ?>
		<?php $class = 'col-sm-6'; ?>
		<?php } elseif ($column_left || $column_right) { ?>
		<?php $class = 'col-sm-9'; ?>
		<?php } else { ?>
		<?php $class = 'col-sm-12'; ?>
		<?php } ?>
		<div id="content" class="<?php echo $class; ?>"><?php echo $content_top; ?>
			<h1><?php echo $heading_title; ?></h1>
			<!--label class="control-label" for="input-search"><?php echo $entry_search; ?></label-->
			<div class="product-filter clearfix" style="margin-bottom: -25px; margin-top: 21px;  padding-bottom: 4px;">

				<div class="row">
					<div class="col-lg-4 col-sm-6 col-xs-9 mob_searh">
						<input type="text" name="search" value="<?php echo $search; ?>" placeholder="<?php echo $text_keyword; ?>" id="input-search" class="form-control" style="height:41px;" required="required"/>
						<br />
					</div>
					<input type="button" value="<?php echo $button_search; ?>" id="button-search" class="btn btn-primary mob_searh_btn" />
					<div class="button-view" style="float: right;    margin-top: 3px;">
						<button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="<?php echo $button_list; ?>"><i class="fa fa-th-list"></i></button>
						<button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="<?php echo $button_grid; ?>"><i class="fa fa-th"></i></button>
					</div>
					<a href="<?php echo $compare; ?>" id="compare-total" class="hidden-xs" style="float: right; margin-right: 30px;"><?php echo $text_compare; ?></a>
				</div>
		<!--div class="col-lg-4 col-sm-6">
		  <select name="category_id" class="form-control">
			<option value="0"><?php echo $text_category; ?></option>
			<?php foreach ($categories as $category_1) { ?>
			<?php if ($category_1['category_id'] == $category_id) { ?>
			<option value="<?php echo $category_1['category_id']; ?>" selected="selected"><?php echo $category_1['name']; ?></option>
			<?php } else { ?>
			<option value="<?php echo $category_1['category_id']; ?>"><?php echo $category_1['name']; ?></option>
			<?php } ?>
			<?php foreach ($category_1['children'] as $category_2) { ?>
			<?php if ($category_2['category_id'] == $category_id) { ?>
			<option value="<?php echo $category_2['category_id']; ?>" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
			<?php } else { ?>
			<option value="<?php echo $category_2['category_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
			<?php } ?>
			<?php foreach ($category_2['children'] as $category_3) { ?>
			<?php if ($category_3['category_id'] == $category_id) { ?>
			<option value="<?php echo $category_3['category_id']; ?>" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
			<?php } else { ?>
			<option value="<?php echo $category_3['category_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
			<?php } ?>
			<?php } ?>
			<?php } ?>
			<?php } ?>
		  </select>
			<br />
		</div-->
		<!--div class="col-lg-4 col-sm-12">
		  <label class="checkbox-inline">
			<?php if ($sub_category) { ?>
			<input type="checkbox" name="sub_category" value="1" checked="checked" />
			<?php } else { ?>
			<input type="checkbox" name="sub_category" value="1" />
			<?php } ?>
			<?php echo $text_sub_category; ?></label>
		</div-->
	</div>
	<p>
		<!--label class="checkbox-inline">
		  <?php if ($description) { ?>
		  <input type="checkbox" name="description" value="1" id="description" checked="checked" />
		  <?php } else { ?>
		  <input type="checkbox" name="description" value="1" id="description" />
		  <?php } ?>
		  <?php echo $entry_description; ?></label-->
		</p>
		<br><br>

		<?php if ($products) { ?>

		<div class="nav-cat clearfix">
			<div class="pull-left"><?php echo $pagination; ?></div>
			<div class="pull-left nam-page hidden-xs"><?php echo $results; ?></div>
			<div class="pull-right">
			</div>
		</div>
		<div class="row">
			<?php foreach ($products as $product) { ?>
			<div class="product-layout product-list col-xs-12">
				<div class="product-thumb">
					<div class="image">
						<a class="lazy" style="padding-bottom: <?php echo ($product['img-height']/$product['img-width']*100); ?>%" href="<?php echo $product['href']; ?>"> <img alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive" data-src="<?php echo $product['thumb']; ?>" src="#"/> </a>

						<div class="stickers">
							<?php
							$arr_last = $product['last_array'];
							foreach( $arr_last as $value ){
								if ($product['product_id']==$value) {
									?>
									<div class="new_pr"><?php echo $text_new; ?></div>
									<?php
								}
							}
							?>
							<?php if ($product['special']) { ?>
							<div class="sale"><?php echo $text_sale; ?></div>
							<?php } ?>
						</div>

					</div>
					<div class="caption">
						<div class="name name-product"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>

						<div class="description-small"><?php echo mb_substr($product['description'],0,62,'UTF-8').'...'; ?></div>
						<div class="description"><?php echo $product['description']; ?></div>

						<?php if ($product['price']) { ?>
						<div class="price price-product">
							<?php if (!$product['special']) { ?>
							<?php echo $product['price']; ?>
							<?php } else { ?>
							<span class="price-new"><?php echo $product['special']; ?></span> <span class="price-old"><?php echo $product['price']; ?></span>
							<?php } ?>
							<?php if ($product['tax']) { ?>
							<span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
							<?php } ?>
						</div>
						<?php } ?>
					</div>
					<div class="cart-button">
						<button class="product-btn-add" type="button" onclick="cart.add('<?php echo $product['product_id']; ?>');"><i class="material-design-shopping231"></i> <span class="hidden-sm"><?php echo $button_cart; ?></span></button>
						<div class="row">
							<button class="product-btn" type="button" data-toggle="tooltip" title="<?php echo $button_wishlist; ?>" onclick="wishlist.add('<?php echo $product['product_id']; ?>');"><i class="material-design-favorite22"></i></button><button class="product-btn" type="button" data-toggle="tooltip" title="<?php echo $button_compare; ?>" onclick="compare.add('<?php echo $product['product_id']; ?>');"><i class="material-design-shuffle24"></i></button><a class="product-btn" data-toggle="tooltip" title="<?php echo $text_details; ?>" href="<?php echo $product['href']; ?>"><i class="material-design-right244"></i></a>
						</div>

						<div class="rating">
							<?php for ($i = 1; $i <= 5; $i++) { ?>
							<?php if ($product['rating'] < $i) { ?>
							<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
							<?php } else { ?>
							<span class="fa fa-stack"><i class="fa fa-star active fa-stack-2x"></i></span>
							<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="row">
			<div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
			<div class="col-sm-6 text-right"><?php echo $results; ?></div>
		</div>
		<?php } else { ?>
		<p style="font:300 16px/16px Ubuntu, sans-serif;"><?php echo $text_empty; ?></p>
		<?php } ?>
		<?php echo $content_bottom; ?></div>
		<?php echo $column_right; ?></div>
	</div>
	<?php echo $footer; ?>
	<script type="text/javascript"><!--
		$('#button-search').bind('click', function() {
			url = 'index.php?route=product/search';

			var search = $('#content input[name=\'search\']').prop('value');

			if (search) {
				url += '&search=' + encodeURIComponent(search);
			}

			var category_id = $('#content select[name=\'category_id\']').prop('value');

			if (category_id > 0) {
				url += '&category_id=' + encodeURIComponent(category_id);
			}

			var sub_category = $('#content input[name=\'sub_category\']:checked').prop('value');

			if (sub_category) {
				url += '&sub_category=true';
			}

			var filter_description = $('#content input[name=\'description\']:checked').prop('value');

			if (filter_description) {
				url += '&description=true';
			}

			location = url;
		});

		$('#content input[name=\'search\']').bind('keydown', function(e) {
			if (e.keyCode == 13) {
				$('#button-search').trigger('click');
			}
		});

		$('select[name=\'category_id\']').on('change', function() {
			if (this.value == '0') {
				$('input[name=\'sub_category\']').prop('disabled', true);
			} else {
				$('input[name=\'sub_category\']').prop('disabled', false);
			}
		});

		$('select[name=\'category_id\']').trigger('change');
	--></script>