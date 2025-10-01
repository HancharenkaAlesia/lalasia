
<?php
/*
Template Name: Main page
*/
?>

<?php
	get_header();
?>
		<main class="page home">
			<section class="home__hero hero">
				<div class="hero__container">
					<h1 data-fls-gsap="" class="hero__title h1">
						Discover Furniture With
						<br>
						High QualityWood
					</h1>
					<div data-fls-gsap="" class="hero__text p1">
						Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing mauris non. Purus	parturient viverra nunc, tortor sit laoreet. Quam tincidunt aliquam adipiscing tempor.
					</div>
					<div data-fls-gsap-opacity="" class="hero__img">
						<?php 
							$imgId = attachment_url_to_postid(get_field('hero_image'));
						 ?>
						<img title="<?php echo get_post_field('post_title', $imgId) ?>" alt="<?php echo get_post_meta( $imgId, '_wp_attachment_image_alt', true ); ?>" src="<?php the_field('hero_image'); ?>">
					</div>
				</div>
			</section>
			<section class="home__benefits benefits section">
				<div class="benefits__container">
					<div class="benefits__header">
						<div class="benefits__col">
							<div data-fls-gsap="" class="benefits__subtitle h5">Benefits</div>
							<h2 data-fls-gsap="" class="benefits__title h2">Benefits when using our services</h2>
						</div>
						<div data-fls-gsap="" class="benefits__col">
							<div class="benefits__text p1">
								Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim
					placerat nisi, adipiscing mauris non purus
					parturient.
							</div>
						</div>
					</div>
					<div data-fls-gsap-opacity="" class="benefits__content">
						<div class="benefits__item">
							<div class="benefits__icon">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/3square.svg" alt="3 sqares icon">
							</div>
							<div class="benefits__caption h3">Many Choices</div>
							<div class="benefits__text p1">
								Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim
					placerat nisi, adipiscing mauris non.
							</div>
						</div>
						<div class="benefits__item">
							<div class="benefits__icon">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/calendar-tick.svg" alt="Calendar icon">
							</div>
							<div class="benefits__caption h3">Fast and On Time</div>
							<div class="benefits__text p1">
								Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim
					placerat nisi, adipiscing mauris non.
							</div>
						</div>
						<div class="benefits__item">
							<div class="benefits__icon">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/money-tick.svg" alt="Money icon">
							</div>
							<div class="benefits__caption h3">Affordable Price</div>
							<div class="benefits__text p1">
								Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim
					placerat nisi, adipiscing mauris non.
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="home__product-slider product-slider section">
				<div class="product-slider__container">
					<div data-fls-gsap="" class="product-slider__subtitle h5">Product</div>
					<h2 data-fls-gsap="" class="product-slider__title h2">Our popular product</h2>
					<div data-fls-gsap="" class="product-slider__text p1">
						Pellentesque etiam blandit in tincidunt at donec. Eget ipsum
				dignissim
				placerat nisi, adipiscing mauris non purus
				parturient.
					</div>
				</div>
				<div data-fls-gsap-opacity="" data-fls-slider="" class="product-slider__slider swiper">
					<div class="product-slider__wrapper swiper-wrapper">
							<?php 
								$args = array(
								'post_type' => 'product',
								'post_status' => 'publish',
								'orderby' => 'date',
								'order' => 'DESC',
								'posts_per_page' => 8,
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'product_visibility',
										'field' => 'name',
										'terms' => 'exclude-from-catalog',
										'operator' => 'NOT IN',
									),
								),
							);

								$query = new WP_Query($args);

								if($query->have_posts() ) {
									while ($query->have_posts() ) {
										$query->the_post();
										wc_get_template_part( 'content', 'product' );
									}
								} else {
									echo 'No products found, try changing your request';
								}
						?>
					</div>
					<div class="product-slider__nav">
						<button aria-label="Previous product button" class="product-slider__prev prev">
							<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/arrow-left.svg" alt="Arrow left">
						</button>
						<button aria-label="Next product button" class="product-slider__next next">
							<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/arrow-right.svg" alt="Arrow right">
						</button>
					</div>
				</div>
			</section>
			<section class="home__our-product our-product section">
				<div class="our-product__container">
					<div class="our-product__header">
						<div class="our-product__col">
							<div data-fls-gsap="" class="our-product__subtitle h5">Our Product</div>
							<h2 data-fls-gsap="" class="our-product__title h2">Crafted by talented and high quality material</h2>
						</div>
						<div data-fls-watcher="" data-fls-dynamic=".our-product__info, 768, 2" class="our-product__numbers">
							<div class="our-product__item">
								<div class="our-product__num">
									<span data-fls-digcounter="">20</span>
									+
								</div>
								<div class="our-product__caption">Years Experience</div>
							</div>
							<div class="our-product__item">
								<div class="our-product__num">
									<span data-fls-digcounter="">483</span>
								</div>
								<div class="our-product__caption">Happy Client</div>
							</div>
							<div class="our-product__item">
								<div class="our-product__num">
									<span data-fls-digcounter="">150</span>
									+
								</div>
								<div class="our-product__caption">Project Finished</div>
							</div>
						</div>
					</div>
					<div class="our-product__content">
						<div class="our-product__info">
							<div class="our-product__text p1">
								Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim
					placerat nisi, adipiscing mauris non purus
					parturient. morbi fermentum, vivamus et accumsan dui tincidunt pulvinar
							</div>
							<a href="/about-us" class="our-product__btn btn">Learn More</a>
							<div data-fls-gsap-opacity="" class="our-product__img" id="our-product-img-1">
								<picture>
									<source media="(max-width: 600px)" srcset="<?php bloginfo('template_url'); ?>/assets/img/main-page/our-prod-1-600.webp" type="image/webp">
									<img alt="Woodworking tools and wood shavings on a light wooden surface" src="<?php bloginfo('template_url'); ?>/assets/img/main-page/our-prod-1.webp">
								</picture>
							</div>
						</div>
						<div class="our-product__wrapper">
							<div data-fls-gsap-opacity="" class="our-product__img" id="our-product-img-2">
								<picture>
									<source media="(max-width: 600px)" srcset="<?php bloginfo('template_url'); ?>/assets/img/main-page/our-prod-2-600.webp" type="image/webp">
									<img alt="Light wooden cabinet with woven rattan doors next to a beige sofa" src="<?php bloginfo('template_url'); ?>/assets/img/main-page/our-prod-2.webp">
								</picture>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="home__testimonials testimonials section">
				<div class="testimonials__container">
					<div data-fls-gsap="" class="testimonials__subtitle h5">Testimonials</div>
					<h2 data-fls-gsap="" class="testimonials__title h2">What our customer say</h2>
					<div data-fls-gsap="" class="testimonials__text p1">
						Pellentesque etiam blandit in tincidunt at donec. Eget ipsum
				dignissim
				placerat nisi, adipiscing mauris non purus
				parturient.
					</div>
				</div>
				<div data-fls-slider="" data-fls-gsap-opacity="" class="testimonials__slider swiper">
					<div class="testimonials__wrapper swiper-wrapper">
						<?php 
								$args = array(
								'post_type' => 'reviews',
								'post_status' => 'publish',
								'orderby' => 'date',
								'order' => 'DESC',
								'posts_per_page' => -1,
							);

								$query = new WP_Query($args);

								if($query->have_posts() ) {
									while ($query->have_posts() ) {
										$query->the_post(); ?>
										
										<div class="testimonials__slide swiper-slide">
											<div class="testimonials__body">
												<div class="testimonials__quote">
													<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/quote-up.svg" alt="Quote Icon">
												</div>
												<div class="testimonials__review p1">
													<?php the_content(); ?>
												</div>
											</div>
											<div class="testimonials__bottom">
												<div class="testimonials__user">
													<div class="testimonials__photo">
														<?php the_post_thumbnail(); ?>
													</div>
													<div class="testimonials__name h4"><?php the_title(); ?></div>
												</div>
												<div class="testimonials__rating">
													<div class="testimonials__star">
														<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/star.svg" alt="Star Icon">
													</div>
													<div class="testimonials__num h5"><?php the_field('rating'); ?></div>
												</div>
											</div>
										</div>
								<?php	}
								}
						?>
					</div>
				</div>
			</section>
			<section class="home__articles articles section">
				<div class="articles__container">
					<div class="articles__flex">
						<div class="articles__wrap">
							<div class="articles__head">
								<div data-fls-gsap="" class="articles__subtitle h5">Portofolio</div>
								<h2 data-fls-gsap="" class="articles__title h2">Amazing project we’ve done before</h2>
								<div data-fls-gsap="" class="articles__text p1">Pellentesque etiam blandit in tincidunt at donec.</div>
							</div>
							<div data-fls-gsap-opacity="" class="articles__slider art-slider swiper">
								<div class="art-slider__wrapper swiper-wrapper">
									<?php 
											$args = array(
											'post_type' => 'portfolio',
											'post_status' => 'publish',
											'orderby' => 'date',
											'order' => 'ASC',
											'post__in' => array(310, 307, 312),
										);

											$query = new WP_Query($args);

											if($query->have_posts() ) {
												while ($query->have_posts() ) {
													$query->the_post(); ?>
													
												<div class="art-slider__slide swiper-slide">
													<div class="art-slider__bg">
														<?php the_post_thumbnail(); ?>
													</div>
													<div class="art-slider__content">
														<div data-swiper-parallax-opacity="0" data-swiper-parallax-x="-50" class="art-slider__category">
															<?php 
																$posttags = get_the_tags();
																if( $posttags ){
																	foreach( $posttags as $tag ){
																		echo $tag->name . ' '; 
																	}
																}
															?>
														</div>
														<div data-swiper-parallax-opacity="0" data-swiper-parallax-x="-150" class="art-slider__name"><?php the_title(); ?></div>
														<div data-swiper-parallax-opacity="0" data-swiper-parallax-x="-100" class="art-slider__descr">
															<?php the_field('short_description'); ?>
														</div>
														<a data-swiper-parallax-opacity="0" data-swiper-parallax-x="-50" href="<?php the_permalink(); ?>" class="art-slider__more">Read More</a>
													</div>
												</div>

											<?php	}
											}
									?>
								</div>
								<div class="art-slider__nav">
									<button class="art-slider__prev">
										<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/arrow-left-art.svg" alt="Prev button icon">
									</button>
									<button class="art-slider__next">
										<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/arrow-right-art.svg" alt="Next button icon">
									</button>
								</div>
							</div>
						</div>
						<div data-fls-gsap-opacity="" class="articles__col">
							<div class="articles__wrapper">
								<?php 
											$args = array(
											'post_type' => 'portfolio',
											'post_status' => 'publish',
											'orderby' => 'rand',
        									'order' => 'ASC',
											'post__not_in' => array(310, 307, 312),
											'posts_per_page' => 3,
										);

											$query = new WP_Query($args);

											if($query->have_posts() ) {
												while ($query->have_posts() ) {
													$query->the_post(); ?>
													<a href="<?php the_permalink(); ?>" class="articles__item">
														<div class="articles__thumb">
															<?php the_post_thumbnail(); ?>
														</div>
														<div class="articles__content">
															<div class="articles__category">
																<?php 
																	$posttags = get_the_tags();
																	if( $posttags ){
																		foreach( $posttags as $tag ){
																			echo $tag->name . ' '; 
																		}
																	}
																?>
															</div>
															<div class="articles__name"><?php the_title(); ?></div>
															<div class="articles__descr"><?php the_field('short_description'); ?></div>
															<div class="articles__bottom">
																<div class="articles__author">
																	<?php if(get_field('author_photo')) {?>
																		<div class="articles__author-icon">
																				<picture>
																					<img alt="<?php the_field('author_name') ?> Photo" src="<?php the_field('author_photo') ?>">
																				</picture>
																		</div>
																	<?php } ?>
																	<div class="articles__author-name">
																		By
																		<span><?php the_field('author_name') ?></span>
																	</div>
																</div>
																<div class="articles__date"><?php echo get_the_date(); ?></div>
															</div>
														</div>
													</a>
											<?php	}
											}
									?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="home__join join section">
				<div class="join__container">
					<div class="join__flex">
						<h2 data-fls-gsap="" class="join__title h2">Join with me to get special discount</h2>
						<a href="" class="join__btn btn">
							<span>Learn More</span>
							<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/arrow-btn.svg" alt="Right arrow icon">
						</a>
					</div>
				</div>
			</section>

<?php
	get_footer();
?>
