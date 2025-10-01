<?php
/*
 * Template Name: Project
 * Template Post Type: portfolio
 */
	get_header();
?>

<main class="page portfolio-single">
	<section class="portfolio__hero hero">
		<div class="hero__container">
			<h1 data-fls-gsap="" class="hero__title h1"><?php the_title(); ?></h1>
			<div data-fls-gsap="" class="hero__text p1"><?php the_field('short_description'); ?></div>
			<div class="hero__img">
				<?php the_post_thumbnail(); ?>
			</div>
		</div>
	</section>
	<section class="portfolio__project proj section">
		<div class="proj__container">
			<div class="proj__flex">
				<div class="proj__col">
					<div class="proj__info p1">
						<?php the_field('table_with_information'); ?>
					</div>
				</div>
				<div class="proj__col">
					<div data-fls-slider="" class="proj__slider swiper">
						<div class="proj__wrapper swiper-wrapper">
							<?php if (count(acf_photo_gallery('gallery', get_the_id()))) {?>
								<?php foreach(acf_photo_gallery('gallery', get_the_id()) as $value){ ?>
									<div class="proj__slide swiper-slide">
										<img alt="Image" src="<?php echo $value['full_image_url']; ?>">
									</div>
								<?php } ?>
							<?php } ?>
						</div>
						<div class="proj__nav">
							<button aria-label="Previous product button" class="proj__prev prev">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/arrow-left.svg" alt="Arrow left">
							</button>
							<button aria-label="Next product button" class="proj__next next">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/arrow-right.svg" alt="Arrow right">
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="proj__text p1">
				<?php the_content(); ?>
				
			</div>
		</div>
	</section>
	<section class="portfolio__projects projects section">
		<div class="projects__container">
			<div class="projects__subtitle h5">Similar Projects</div>
			<h2 class="projects__title h2">Maybe you’re interested</h2>
			<div class="projects__wrapper">
				<?php 
					$args = array(
					'post_type' => 'portfolio',
					'post_status' => 'publish',
					'orderby' => 'rand',
					'order' => 'ASC',
					'posts_per_page' => 3,
					);

					$query = new WP_Query($args);

					if($query->have_posts() ) {
						while ($query->have_posts() ) {
							$query->the_post(); ?>
							<a href="<?php the_permalink(); ?>" class="projects__item">
								<div class="projects__img">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="projects__info">
									<div class="projects__cat">
										<?php 
											$posttags = get_the_tags();
											if( $posttags ){
												foreach( $posttags as $tag ){
													echo $tag->name . ' '; 
												}
											}
										?>
									</div>
									<div class="projects__name h3"><?php the_title(); ?></div>
									<div class="projects__descr">
										<?php the_field('short_description'); ?>
									</div>
								</div>
							</a>
					<?php	}
					}
				?>
			</div>
		</div>
	</section>
	<section class="portfolio__join join section">
		<div class="join__container">
			<div class="join__flex">
				<h2 data-fls-gsap="" class="join__title h2">Subscribe our newsletter</h2>
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
