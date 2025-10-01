<?php
/*
Template Name: About Us Page
*/
?>

<?php
	get_header();
?>

<main class="page about-us">
	<section class="about-us__hero hero">
		<div class="hero__container">
			<h1 data-fls-gsap="" class="hero__title h1">About Us</h1>
			<div data-fls-gsap="" class="hero__text p1">
				We display products based on the latest products we have, if you want
		to see our old products please enter the name of the item
			</div>
			<div data-fls-gsap-opacity="" class="hero__img">
			<?php 
				$imgId = attachment_url_to_postid(get_field('hero_image'));
				?>
			<img title="<?php echo get_post_field('post_title', $imgId) ?>" alt="<?php echo get_post_meta( $imgId, '_wp_attachment_image_alt', true ); ?>" src="<?php the_field('hero_image'); ?>">
		</div>
		</div>
	</section>
	<section class="about-us__mission mission section">
		<div class="mission__container">
			<div class="mission__subtitle h5">Our Mission</div>
			<div class="mission__flex">
				<div class="mission__col">
					<h2 class="mission__title h2">Our team dedicated to help find smart home product</h2>
					<div data-fls-watcher="" class="mission__numbers our-product">
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
				<div class="mission__col">
					<ul class="mission__list">
						<li class="mission__item">
							<div class="mission__icon">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/call-received.svg" alt="Call Icon">
							</div>
							<div class="mission__info">
								<div class="mission__caption h3">24/7 Supports</div>
								<div class="mission__text p1">
									24/7 support means a support service that is provided 24 hours a
						day and 7 days a week.
								</div>
							</div>
						</li>
						<li class="mission__item">
							<div class="mission__icon">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/messages.svg" alt="Messages Icon">
							</div>
							<div class="mission__info">
								<div class="mission__caption h3">Free Consultation</div>
								<div class="mission__text p1">
									A free consultation is a one-on-one interaction or conversation
						given freely to share one's thoughts and discuss
						possible
								</div>
							</div>
						</li>
						<li class="mission__item">
							<div class="mission__icon">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/award.svg" alt="Award Icon">
							</div>
							<div class="mission__info">
								<div class="mission__caption h3">Overall Guarantee</div>
								<div class="mission__text p1">
									The comprehensive guarantee is required for import, warehousing,
						transit, processing and specific use.
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="about-us__team team section">
		<div class="team__container">
			<div class="team__header">
				<div class="team__col">
					<div data-fls-gsap="" class="team__subtitle h5">Our Team</div>
					<h2 data-fls-gsap="" class="team__title h2">Meet our leading and strong team</h2>
				</div>
				<div data-fls-gsap="" class="team__col">
					<div class="team__text p1">
						Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim
				placerat nisi, adipiscing mauris non purus
				parturient.
					</div>
				</div>
			</div>
			<ul class="team__grid">
				<?php 
					$args = array(
					'post_type' => 'team',
					'post_status' => 'publish',
					'order' => 'ASC',
					'posts_per_page' => -1,
					);

					$query = new WP_Query($args);

					if($query->have_posts() ) {
						while ($query->have_posts() ) {
							$query->the_post(); ?>
							<li class="team__item">
								<div class="team__photo">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="team__name"><?php the_title(); ?></div>
								<div class="team__position"><?php the_content(); ?></div>
							</li>
					<?php	}
					}
				?>
			</ul>
		</div>
	</section>
	<section class="about-us__join join section">
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
</main>

<?php
	get_footer();
?>