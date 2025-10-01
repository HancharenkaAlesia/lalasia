</main>
			<footer data-fls-footer="" class="footer">
				<div class="footer__container">
					<div class="footer__wrapper">
						<div class="footer__col">
							<a href="<?php echo get_home_url(); ?>" class="footer__logo">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/logo.svg" alt="Lalasia Logo">
							</a>
							<div class="footer__descr p1">
								Lalasia is digital agency that help you make better experience iaculis cras in.
							</div>
						</div>
						<div class="footer__menus">
							<div class="footer__menu">
								<div class="footer__caption h4">Pages</div>
								<ul class="footer__list">
									<?php
										wp_nav_menu( array(
											'menu' => 'footer-menu',
											'menu_class' => 'footer__list',
											'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'container' => 'ul',
											'container_class' => false,
										) );
									?>
								</ul>
							</div>
							<div class="footer__menu">
								<div class="footer__caption h4">Follow Us</div>
								<ul class="footer__list">
									<li>
										<a href="#">Facebook</a>
									</li>
									<li>
										<a href="#">Instagram</a>
									</li>
									<li>
										<a href="#">Twitter</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<div class="minicart" id="miniCart-popup">
			<div class="minicart__layout">
			</div>
			<div class="minicart__frame">
				<button class="minicart__close">&#215;</button>
				<div class="minicart__title h3">Cart</div>
				<?php woocommerce_mini_cart(); ?>
			</div>
		</div>
	</body>

	<?php
		wp_footer();
	?>		
	
</html>


