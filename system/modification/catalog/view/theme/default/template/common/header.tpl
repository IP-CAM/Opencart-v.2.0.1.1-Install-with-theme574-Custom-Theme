<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html prefix="og: http://ogp.me/ns#" dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html prefix="og: http://ogp.me/ns#" dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html prefix="og: http://ogp.me/ns#" dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<!--<![endif]-->
<head>
<meta charset="UTF-8" dfdfdfdf/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>

<?php if ($noindex) { ?>
<!-- OCFilter Start -->
<meta name="robots" content="noindex,nofollow" />
<!-- OCFilter End -->
<?php } ?>
      
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content= "<?php echo $keywords; ?>" />
<?php } ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php if ($icon) { ?>
<link href="<?php echo $icon; ?>" rel="icon" />
<?php } ?>
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
<link href="catalog/view/theme/default/stylesheet/stylesheet.css" rel="stylesheet">
<?php foreach ($styles as $style) { ?>
<link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<script src="catalog/view/javascript/common.js" type="text/javascript"></script>
<?php foreach ($scripts as $script) { ?>
<script src="<?php echo $script; ?>" type="text/javascript"></script>
<?php } ?>
<?php echo $google_analytics; ?>

<?php global $config;
$design_fastorder = $config->get('config_select_design_fastorder');
$background_button_open_form_send_order = $config->get('config_background_button_open_form_send_order');
$color_button_open_form_send_order = $config->get('config_color_button_open_form_send_order');
$background_button_open_form_send_order_hover = $config->get('config_background_button_open_form_send_order_hover');
?>
<?php if($design_fastorder){ ?>
	<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/fastorder<?php echo $design_fastorder;?>.css" />
<?php } else { ?>
	<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/fastorder1.css" />
<?php } ?>
<script src="catalog/view/javascript/newfastorder.js" type="text/javascript"></script>	
<script src="catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js" type="text/javascript"></script>
<link media="screen" href="catalog/view/javascript/jquery/magnific/magnific-popup.css" type="text/css" rel="stylesheet">	
<script type="text/javascript" src="catalog/view/javascript/quickorder/owl-carousel/owl.carousel.min.js"></script> 
<link media="screen" href="catalog/view/javascript/quickorder/owl-carousel/owl.carousel.css" rel="stylesheet">
<script type="text/javascript">
function fastorder_open(product_id) {  
	
    $.magnificPopup.open({
        tLoading: '<span><i style="font-size:50px;" class="fa fa-spinner fa-pulse"></i></span>',
        items: {
        src: 'index.php?route=module/newfastorder&product_id='+product_id + syncFastOrder(),
        type: 'ajax',
		},
		/*callbacks: {
		    ajaxContentAdded: function() {
				syncFastOrder();
		    }
		}*/
    });
yaCounter45763188.reachGoal('FASTORDER');
ga('send', 'event', 'product', 'click');
}

function syncFastOrder(){
	if(!$('#product').length) return '';
	$('.product-options').wrap('<form id="product-options-form" />');
	var str = $('#product-options-form').serialize();
	str += '&amount=' + $('#input-quantity').val();
	$('.product-options').unwrap('form');
	return '&' + str;
}
function fastorder_open_cart() {  
    $.magnificPopup.open({
        tLoading: '<span><i style="font-size:50px;" class="fa fa-spinner fa-pulse"></i></span>',
        items: {
        src: 'index.php?route=module/newfastordercart',
        type: 'ajax'
        }	
    });
}		
</script>

<style>
.btn-quick-order {
	background:#<?php echo $background_button_open_form_send_order;?>;
	border-color:#<?php echo $background_button_open_form_send_order;?>;
	color:#<?php echo $color_button_open_form_send_order;?> !important;
}
.btn-quick-order:hover {
	background:#<?php echo $background_button_open_form_send_order_hover;?>;
	border-color:#<?php echo $background_button_open_form_send_order_hover;?>;				
}
.fast-checkout .btn-ordercart {
	background:#<?php echo $background_button_open_form_send_order;?>;
	border-color:#<?php echo $background_button_open_form_send_order;?>;
	color:#<?php echo $color_button_open_form_send_order;?> !important;
}
.fast-checkout .btn-ordercart:hover {
	background:#<?php echo $background_button_open_form_send_order_hover;?>;
	border-color:#<?php echo $background_button_open_form_send_order_hover;?>;	
}
</style>
		
<?php echo $tc_og; ?>
</head>
<body class="<?php echo $class; ?>">
<nav id="top">
  <div class="container">
    <?php echo $currency; ?>
    <?php echo $language; ?>
    <div id="top-links" class="nav pull-right">
      <ul class="list-inline">
        <li><a href="<?php echo $contact; ?>"><i class="fa fa-phone"></i></a> <span class="hidden-xs hidden-sm hidden-md"><?php echo $telephone; ?></span></li>
        <li class="dropdown"><a href="<?php echo $account; ?>" title="<?php echo $text_account; ?>" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_account; ?></span> <span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-menu-right">
            <?php if ($logged) { ?>
            <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
            <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
            <li><a href="<?php echo $transaction; ?>"><?php echo $text_transaction; ?></a></li>
            <li><a href="<?php echo $download; ?>"><?php echo $text_download; ?></a></li>
            <li><a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
            <?php } else { ?>
            <li><a href="<?php echo $register; ?>"><?php echo $text_register; ?></a></li>
            <li><a href="<?php echo $login; ?>"><?php echo $text_login; ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <li><a href="<?php echo $wishlist; ?>" id="wishlist-total" title="<?php echo $text_wishlist; ?>"><i class="fa fa-heart"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_wishlist; ?></span></a></li>
        <li><a href="<?php echo $shopping_cart; ?>" title="<?php echo $text_shopping_cart; ?>"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_shopping_cart; ?></span></a></li>
        <li><a href="<?php echo $checkout; ?>" title="<?php echo $text_checkout; ?>"><i class="fa fa-share"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_checkout; ?></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<header>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div id="logo">
          <?php if ($logo) { ?>
          <a href="<?php echo $home; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" /></a>
          <?php } else { ?>
          <h1><a href="<?php echo $home; ?>"><?php echo $name; ?></a></h1>
          <?php } ?>
        </div>
      </div>
      <div class="col-sm-5"><?php echo $search; ?>
      </div>
      <div class="col-sm-3"><?php echo $cart; ?></div>
    </div>
  </div>
</header>
<?php if ($categories) { ?>
<div class="container">
  <nav id="menu" class="navbar">
    <div class="navbar-header"><span id="category" class="visible-xs"><?php echo $text_category; ?></span>
      <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <?php foreach ($categories as $category) { ?>
        <?php if ($category['children']) { ?>
        <li class="dropdown"><a href="<?php echo $category['href']; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category['name']; ?></a>
          <div class="dropdown-menu">
            <div class="dropdown-inner">
              <?php foreach (array_chunk($category['children'], ceil(count($category['children']) / $category['column'])) as $children) { ?>
              <ul class="list-unstyled">
                <?php foreach ($children as $child) { ?>
                <li><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a></li>
                <?php } ?>
              </ul>
              <?php } ?>
            </div>
            <a href="<?php echo $category['href']; ?>" class="see-all"><?php echo $text_all; ?> <?php echo $category['name']; ?></a> </div>
        </li>
        <?php } else { ?>
        <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></li>
        <?php } ?>
        <?php } ?>
      </ul>
    </div>
  </nav>
</div>
<?php } ?>
