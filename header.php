<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="preload" href="<?php bloginfo('template_url'); ?>/assets/fonts/EudoxusSans-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<link rel="preload" href="<?php bloginfo('template_url'); ?>/assets/fonts/EudoxusSans-Medium.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<link rel="preload" href="<?php bloginfo('template_url'); ?>/assets/fonts/EudoxusSans-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<?php wp_head(); ?>
	</head>
	<body>
		<div class="wrapper">
			<header data-fls-header="" class="header">
				<div class="header__container">
					<a href="<?php echo get_home_url(); ?>" class="header__logo">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/logo.svg" alt="Lalasia Logo">
					</a>
					<div class="header__menu menu">
						<button type="button" data-fls-menu="" class="menu__icon icon-menu">
							<span></span>
						</button>
						<nav class="menu__body">
							<?php
								wp_nav_menu( array(
									'menu' => 'header-menu',
									'menu_class' => 'menu__list',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'container' => 'ul',
									'container_class' => false,
								) );
							?>
						</nav>
					</div>
					<div data-fls-dynamic=".header__container, 768, 1" class="header__wrapper">
						<?php if( !is_cart() ) { ?>
							<button class="header__cart cart">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/cart.svg" alt="Cart Icon" class="cart__icon">
								<div class="cart__quantity"><?php echo count(WC()->cart->get_cart()) ?></div>
							</button>
						<?php } ?>
						<!-- <button class="header__user user">
							<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/user.svg" alt="User Icon" class="user__icon">
						</button> -->
					</div>
				</div>
			</header>
			







			