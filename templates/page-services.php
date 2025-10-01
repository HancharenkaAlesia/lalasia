<?php
/*
Template Name: Services Page
*/
?>

<?php
	get_header();
?>

	<section class="services__hero hero">
		<div class="hero__container">
			<h1 data-fls-gsap="" class="hero__title h1">Services</h1>
			<div data-fls-gsap="" class="hero__text p1">
				The product crafted by talented crafter and using high quality material with love inside
			</div>
			<div data-fls-gsap-opacity="" class="hero__img">
				<?php 
					$imgId = attachment_url_to_postid(get_field('hero_image'));
					?>
				<img title="<?php echo get_post_field('post_title', $imgId) ?>" alt="<?php echo get_post_meta( $imgId, '_wp_attachment_image_alt', true ); ?>" src="<?php the_field('hero_image'); ?>">
			</div>
		</div>
	</section>
	<section class="services__items serv-items">
		<div class="serv-items__container">
			<ul class="serv-items__list">
				<li class="serv-items__item">
					<div class="serv-items__num">01</div>
					<div class="serv-items__caption">Furniture</div>
					<div class="serv-items__descr p1">
						At the ultimate smart home, you're met with technology before you even
			step through the front door.
					</div>
				</li>
				<li class="serv-items__item">
					<div class="serv-items__num">02</div>
					<div class="serv-items__caption">Home Decoration</div>
					<div class="serv-items__descr p1">
						Create A Calming Summer Escape With Our Luxurious Home Accessories For
			The
			Balmy Evenings.
					</div>
				</li>
				<li class="serv-items__item">
					<div class="serv-items__num">03</div>
					<div class="serv-items__caption">Kitchen Cabinet</div>
					<div class="serv-items__descr p1">
						Introducing the modular kitchen cabinet system. Start with our huge
			selection of base and wall cabinets.
					</div>
				</li>
				<li class="serv-items__item">
					<div class="serv-items__num">04</div>
					<div class="serv-items__caption">Interior Design</div>
					<div class="serv-items__descr p1">
						Innovative products often feature innovative designs that play with the
			patterns we are familiar.
					</div>
				</li>
				<li class="serv-items__item">
					<div class="serv-items__num">05</div>
					<div class="serv-items__caption">Exterior Design</div>
					<div class="serv-items__descr p1">
						These stylish and resilient products provide up-to-date options for
			roofing, siding, decking, and outdoor spaces.
					</div>
				</li>
				<li class="serv-items__item">
					<div class="serv-items__num">06</div>
					<div class="serv-items__caption">Custom Furniture</div>
					<div class="serv-items__descr p1">
						With Quality Materials and Modern Designs, we have Designs for all
			Tastes.
			we bring you World Class Designs.
					</div>
				</li>
			</ul>
		</div>
	</section>
	<section class="services__portfolio portfolio">
		<div class="portfolio__container">
			<div class="portfolio__header">
				<div class="portfolio__col">
					<div data-fls-gsap="" class="portfolio__subtitle h5">Portofolio</div>
					<h2 data-fls-gsap="" class="portfolio__title h2">
						Amazing project we’ve
						<br>
						done before
					</h2>
				</div>
				<div data-fls-gsap="" class="portfolio__col">
					<div class="portfolio__text p1">
						Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim
				placerat nisi, adipiscing mauris non.
					</div>
					<a href="/portfolio" class="portfolio__link link">View Portofolio</a>
				</div>
			</div>
			<div class="portfolio__grid">
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
							<a href="<?php the_permalink(); ?>" class="portfolio__item">
								<div class="portfolio__bg">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="portfolio__info">
									<div class="portfolio__name h3"><?php the_title(); ?></div>
									<div class="portfolio__descr p1">
										<?php the_field('short_description'); ?>
									</div>
									<div class="portfolio__detail">See Detail</div>
								</div>
							</a>
					<?php	}
					}
				?>
			</div>
		</div>
	</section>
	<section class="services__join join section">
		<div class="join__container">
			<div class="join__flex">
				<h2 data-fls-gsap="" class="join__title h2">
					Are you interested
					<br>
					work with us?
				</h2>
				<a href="" class="join__btn btn">
					<span>Let’s Talk</span>
					<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/arrow-btn.svg" alt="Right arrow icon">
				</a>
			</div>
		</div>
	</section>

<?php
	get_footer();
?>
