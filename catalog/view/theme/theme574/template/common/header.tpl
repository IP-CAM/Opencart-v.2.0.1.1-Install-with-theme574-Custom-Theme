<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html prefix="og: http://ogp.me/ns#" prefix="og: http://ogp.me/ns#" dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html prefix="og: http://ogp.me/ns#" prefix="og: http://ogp.me/ns#" dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html prefix="og: http://ogp.me/ns#" prefix="og: http://ogp.me/ns#" dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<head>
	<meta charset="UTF-8" dssd="sdsdsd"/>
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
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
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
	<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet"  href="catalog/view/theme/<?php echo $theme_path; ?>/js/fancybox/jquery.fancybox.css" media="screen" />
	<link href="catalog/view/javascript/jquery/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="catalog/view/theme/<?php echo $theme_path; ?>/stylesheet/photoswipe.css" rel="stylesheet">
	<link href="catalog/view/theme/<?php echo $theme_path; ?>/stylesheet/magnificent.css" rel="stylesheet">
	<link href="catalog/view/theme/<?php echo $theme_path; ?>/stylesheet/material-design.css" rel="stylesheet">
	<link href="catalog/view/theme/<?php echo $theme_path; ?>/js/jquery.bxslider/jquery.bxslider.css" rel="stylesheet">
	<?php foreach ($styles as $style) { ?>
	<link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
	<?php } ?>
	<link href="catalog/view/theme/<?php echo $theme_path; ?>/stylesheet/stylesheet.css" rel="stylesheet">

	<script src="catalog/view/theme/<?php echo $theme_path; ?>/js/common.js" type="text/javascript"></script>
	<script src="catalog/view/theme/<?php echo $theme_path; ?>/js/fancybox/jquery.fancybox.js"></script>
	<!--Green Sock-->
	<script src="catalog/view/theme/<?php echo $theme_path; ?>/js/greensock/jquery.gsap.min.js" type="text/javascript"></script>
	<script src="catalog/view/theme/<?php echo $theme_path; ?>/js/greensock/TimelineMax.min.js" type="text/javascript"></script>
	<script src="catalog/view/theme/<?php echo $theme_path; ?>/js/greensock/TweenMax.min.js" type="text/javascript"></script>
	<script src="catalog/view/theme/<?php echo $theme_path; ?>/js/greensock/jquery.scrollmagic.min.js" type="text/javascript"></script>
	<script src="catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>



	<!--custom script-->
	<?php foreach ($scripts as $script) { ?>
	<script src="<?php echo $script; ?>" type="text/javascript"></script>
	<?php } ?>
	<script src="catalog/view/theme/<?php echo $theme_path; ?>/js/device.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]><div style='clear:both;height:59px;padding:0 15px 0 15px;position:relative;z-index:10000;text-align:center;'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div><![endif]--> 

	<!-- Вставьте этот тег в заголовке страницы или непосредственно перед закрывающим тегом основной части. -->
	<script src="https://apis.google.com/js/platform.js" async defer>
		{lang: 'ru'}
	</script>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=673826492649384";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<!-- Put this script tag to the <head> of your page -->
	<!-- <script type="text/javascript" src="//vk.com/js/api/openapi.js?136"></script> -->

	<!-- <script type="text/javascript">
		VK.init({apiId: 5755733, onlyWidgets: true});
	</script> -->

	<?php echo $google_analytics; ?>
	<?php echo $tc_og; ?>

</head>
<body class="<?php echo $class; ?>">
	<p id="gl_path" class="hidden"><?php echo $theme_path;?></p>
	<!-- swipe menu -->
	<div class="swipe">
		<div class="swipe-menu">
			<ul>
				<li class="menu-item">
					<p>Роботы</p>
					<ul class="submenu-item">
						<li><a href="/vacuum-cleaners">Робот-пылесосы</a></li>
						<li><a href="/window-cleaners">Робот-мойщики окон</a></li>
						<li><a href="/lawnmowers">Робот-газонокосилки</a></li>
						<li><a href="/swimming-cleaners">Роботы для бассейна</a></li>
						<li><a href="/accessories">Аксессуары</a></li>
					</ul>
				</li>
				<li class="menu-item">
				<p>Техника для дома</p>
					<ul class="submenu-item">
						<li><a href="/multicookers">Мультиварки</a></li>
						<li><a href="/coffee-Machines">Кофемашины</a></li>
						<li><a href="/food-processor">Кухонные комбайны</a></li>
						<li><a href="/juicers">Соковыжималки</a></li>
						<li><a href="/blenders">Блендеры</a></li>
						<li><a href="/yogurt-makers">Йогуртницы</a></li>
					</ul>
				</li>
				<li class="menu-item"><a href="/sale">Акции</a></li>
				<li>
					<div id="search" itemscope itemtype="http://schema.org/WebSite">
					<meta itemprop="url" content="https://idevy.ru/"/>
						<form action="/search&search" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
						<button><i class="material-design-search100"></i></button>
						<meta itemprop="target" content="https://idevy.ru/index.php?route=product/search&search={search}"/>
						<input itemprop="query-input" type="text" name="search" value="" placeholder="<?php echo $text_search . 'Поиск...'; ?>" required/>
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div id="page">
		<div class="shadow"></div>
		<div class="toprow-1">
			<div class="burger swipe-control">
			<div class="burger_top"><div class="line1"></div></div>
			<div class="burger_center"><div class="line2"></div></div>
			<div class="burger_center"><div class="line2_2"></div></div>
			<div class="burger_bottom"><div class="line3"></div></div>
			</div>
		</div>

		<header class="header">
			<div class="container">

				<div id="logo" class="logo hidden-xs">

					<?php if ($logo) { ?>
					<a href="<?php echo $home; ?>">

						<img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" />
						<span>
							<span style="text-align: center; display: block; margin: 10px 0 20px 0; color: #fff;font-size: 38px;font-weight: 400;letter-spacing: 6px;font-family: 'CenturyGothicRegular';">IDEVY</span>
							<span style="color: #2d2e42;margin: 10px 0 25px;text-align: center;font-size: 13px;letter-spacing: 6px;margin-bottom: 0;font-weight: 300;text-transform: uppercase;line-height: 1.1;">гипермаркет современной техники</span>
						</span></a>

						<?php } else { ?>
						<h1><a href="<?php echo $home; ?>"><?php echo $name; ?></a></h1>
						<?php } ?>
					</div>
					<div class="telephone hidden-xs">
						<img src="../image/tel.png" alt="">
						<div id="telephone1">
							<a href="tel:+74993982700" class="callme">+7 (499) 398-27-00</a>
						</div>
					</div>
					<a href="/"><img class="logo_mob visible-xs" src="/image/logo_mob.svg"></a>
					<div class="telephone2">
						<img src="../image/mail.png" alt="">
						<div id="telephone2">
							<a href="mailto:info@idevy.ru">info@idevy.ru</a>
						</div>
					</div>

					<div class="pull-right">

				<!--<div class="button-setting toggle-wrap">

			<span class="toggle material-design-settings49"  type="button" ></span>
			<div class="toggle_cont pull-right">
				<?php echo $currency; ?>
				<?php echo $language; ?>
			</div>
		</div>-->

		<?php echo $cart; ?>

		<div class="button-account toggle-wrap hidden-xs">
			<a href="/login"><span class="material-design-user157" type="button"></span></a>
			<!--<span class="toggle material-design-user157"  type="button"></span>
			<div class="toggle_cont pull-right">
				<?php if ($logged) { ?>
				<ul class="list-unstyled">

					<li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
					<li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
					<li><a href="<?php echo $shopping_cart; ?>"><?php echo $text_shopping_cart; ?></a></li>
					<li><a href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a></li>
					<li><a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
				</ul>
				<?php } else { ?>
				<ul class="list-unstyled">
					<li><a href="<?php echo $login; ?>"><?php echo $text_login; ?></a></li>
					<li><a href="<?php echo $register; ?>"><?php echo $text_register; ?></a></li>
				</ul>
				<?php } ?>

			</div>-->
		</div>

		<?php echo $search; ?>

	</div>

</div>


<?php if ($categories) { ?>

<div id="tm_menu" class="nav__primary">
	<div class="container">
		<?php if ($categories_tm) {  echo $categories_tm; } ?>
		<div class="clear"></div>
	</div>
</div>

<?php } ?>
</header>

