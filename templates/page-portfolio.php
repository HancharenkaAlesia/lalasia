<?php
/*
Template Name: Portfolio Page
*/
?>

<?php
	get_header();
?>

<main class="page portfolio">
	<section class="portfolio__hero hero">
		<div class="hero__container">
			<h1 data-fls-gsap="" class="hero__title h1">Portfolio</h1>
			<div data-fls-gsap="" class="hero__text p1">
				Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim
		placerat nisi, adipiscing mauris non.
			</div>
			<div data-fls-gsap-opacity="" class="hero__img">
				<?php 
					$imgId = attachment_url_to_postid(get_field('hero_image'));
				?>
				<img title="<?php echo get_post_field('post_title', $imgId) ?>" alt="<?php echo get_post_meta( $imgId, '_wp_attachment_image_alt', true ); ?>" src="<?php the_field('hero_image'); ?>">
			</div>
		</div>
	</section>
	<section class="portfolio__projects projects">
		<div class="projects__container">
			<div class="projects__filter">
				<button class="projects__button _active">All</button>
				<?php 
					$args = [
						'post_type' => 'portfolio',
						'taxonomy' => 'post_tag',
					];
					$cats = get_terms($args);
					foreach ($cats as $cat) { ?>
						<button class="projects__button" data-cat="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></button>
					<?php }
				?>
			</div>
			<div class="projects__wrapper">
				<?php 
					$args = array(
					'post_type' => 'portfolio',
					'post_status' => 'publish',
					'order' => 'ASC',
					'posts_per_page' => 6,
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
			<button class="projects__more">Load More</button>
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

