<div class="box-cart">
<div id="cart" class="cart toggle-wrap">
	<button  data-loading-text="<?php echo $text_loading; ?>" class="toggle">
		<i class="shopping_bag"></i> 
		<strong><?php echo $text_shopping_cart; ?></strong>
		<span id="cart-total"><?php echo $text_items; ?></span>
		<?php if (isset($text_items2)) { ?><span id="cart-total2"><?php echo $text_items2; ?></span><?php } ?>
	</button>
  <ul class="toggle_cont pull-right" style="padding: 20px 20px 14px 20px">
	<?php if ($products || $vouchers) { ?>
	<li>
		<div>
	  <table class="table">
		<?php foreach ($products as $product) { ?>
		<tr>
		  <td class="text-center"><?php if ($product['thumb']) { ?>
			<div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-thumbnail" id="minicartimg" /></a></div>
			<?php } ?></td>
		  <td class="text-left">
			<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
			<?php if ($product['option']) { ?>
			<?php foreach ($product['option'] as $option) { ?>
			<?php if ($option['value'] != 'Купить дешевле') { ?>

			- <small><?php echo $option['name']; ?>  <?php echo $option['value']; ?></small>
			<?php } ?>
			<?php } ?>
			<?php } ?>
			<?php if ($product['recurring']) { ?>
			<br />
			- <small><?php echo $text_recurring; ?> <?php echo $product['recurring']; ?></small>
			<?php } ?>
			<div> x <?php echo $product['quantity']; ?>  <span class="price-cart" 
			style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif;"><?php echo $product['total']; ?></span></div>
			</td>
		  <td class="text-right"></td>
		  <td class="text-center"><button type="button" onclick="cart.remove('<?php echo $product['key']; ?>');" title="<?php echo $button_remove; ?>" class="btn btn-danger btn-xs"><i class="fa fa-times" id="minicartico"></i></button></td>
		</tr>
		<?php } ?>
		<?php foreach ($vouchers as $voucher) { ?>
		<tr>
		  <td class="text-center"></td>
		  <td class="text-left"><?php echo $voucher['description']; ?></td>
		  <td class="text-right">x&nbsp;1</td>
		  <td class="text-right"><?php echo $voucher['amount']; ?></td>
		  <td class="text-center text-danger"><button type="button" onclick="voucher.remove('<?php echo $voucher['key']; ?>');" title="<?php echo $button_remove; ?>" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></td>
		</tr>
		<?php } ?>
	  </table>
		</div>
	</li>
	<li>
	  <div>
		<table class="table total" id="tothide">
		  <?php foreach ($totals as $total) { ?>
		  <tr>
			<td class="text-right"><strong><span style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif;"><?php echo $total['title']; ?></span></strong></td>
			<td class="text-right price-tx"><span style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif;"><?php echo $total['text']; ?></span></td>
		  </tr>
		  <?php } ?>
		</table>
		<p class="text-right" style="margin-bottom: 0">
			<a class="btn btn-default" style="padding: 12px 15px; margin-bottom: 15px;" href="<?php echo $cart; ?>"><?php echo $text_cart; ?></a>
			<a class="btn btn-primary" href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a></p>
	  </div>
	</li>
	<?php } else { ?>
	<li>
	  <p class="text-center"><?php echo $text_empty; ?></p>
	</li>
	<?php } ?>
  </ul>
</div>
</div>
