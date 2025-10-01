<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit; 

get_header(); 

?>

<main class="page products">
	<section class="products__hero hero">
		<div class="hero__container">
			<h1 data-fls-gsap="" class="hero__title h1">Products</h1>
			<div data-fls-gsap="" class="hero__text p1">
				We display products based on the latest products we have, if you want
		to see our old products please enter the name of theitem
			</div>
		</div>
	</section>
	<section class="products__banner-slider banner-slider">
		<div data-fls-slider="" class="banner-slider__slider swiper">
			<div class="banner-slider__wrapper swiper-wrapper">
				<div class="banner-slider__slide swiper-slide">
					<div class="banner-slider__img">
						<picture>
							<source media="(max-width: 600px)" srcset="<?php bloginfo('template_url'); ?>/assets/img/products-page/banner-slider-600.webp" type="image/webp">
							<source media="(max-width: 1200px)" srcset="<?php bloginfo('template_url'); ?>/assets/img/products-page/banner-slider-1200.webp" type="image/webp">
							<img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/products-page/banner-slider.webp">
						</picture>
					</div>
					<div class="banner-slider__content">
						<div class="banner-slider__container">
							<div class="banner-slider__tags" data-swiper-parallax-opacity="0" data-swiper-parallax-x="-50">
								<div class="banner-slider__tag">Discount</div>
							</div>
							<div class="banner-slider__name h2" data-swiper-parallax-opacity="0" data-swiper-parallax-x="-100">Ramadhan Sale Offer</div>
							<div class="banner-slider__descr h3" data-swiper-parallax-x="-150">Get
					40% off for the first
					transaction
					onLalasia</div>
						</div>
					</div>
				</div>
				<div class="banner-slider__slide swiper-slide">
					<div class="banner-slider__img">
						<picture>
							<source media="(max-width: 600px)" srcset="<?php bloginfo('template_url'); ?>/assets/img/main-page/main-hero-img-600.webp" type="image/webp">
							<source media="(max-width: 1200px)" srcset="<?php bloginfo('template_url'); ?>/assets/img/main-page/main-hero-img-1200.webp" type="image/webp">
							<img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/main-page/main-hero-img.webp">
						</picture>
					</div>
					<div class="banner-slider__content">
						<div class="banner-slider__container">
							<div class="banner-slider__tags" data-swiper-parallax-opacity="0" data-swiper-parallax-x="-50">
								<div class="banner-slider__tag">Discount</div>
							</div>
							<div class="banner-slider__name h2" data-swiper-parallax-opacity="0" data-swiper-parallax-x="-100">Ramadhan Sale Offer</div>
							<div class="banner-slider__descr h3" data-swiper-parallax-x="-150">Get
					40% off for the first
					transaction
					onLalasia</div>
						</div>
					</div>
				</div>
				<div class="banner-slider__slide swiper-slide">
					<div class="banner-slider__img">
						<picture>
							<source media="(max-width: 600px)" srcset="<?php bloginfo('template_url'); ?>/assets/img/products-page/banner-slider-600.webp" type="image/webp">
							<source media="(max-width: 1200px)" srcset="<?php bloginfo('template_url'); ?>/assets/img/products-page/banner-slider-1200.webp" type="image/webp">
							<img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/products-page/banner-slider.webp">
						</picture>
					</div>
					<div class="banner-slider__content">
						<div class="banner-slider__container">
							<div class="banner-slider__tags" data-swiper-parallax-opacity="0" data-swiper-parallax-x="-50">
								<div class="banner-slider__tag">Discount</div>
							</div>
							<div class="banner-slider__name h2" data-swiper-parallax-opacity="0" data-swiper-parallax-x="-100">Ramadhan Sale Offer</div>
							<div class="banner-slider__descr h3" data-swiper-parallax-x="-150">Get
					40% off for the first
					transaction
					onLalasia</div>
						</div>
					</div>
				</div>
			</div>
			<div class="banner-slider__nav">
				<button aria-label="Previous product button" class="banner-slider__prev prev">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/arrow-left.svg" alt="Arrow left">
				</button>
				<button aria-label="Next product button" class="banner-slider__next next">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/arrow-right.svg" alt="Arrow right">
				</button>
			</div>
			<div class="banner-slider__pagination pagination"></div>
		</div>
	</section>
	<?php if ( woocommerce_product_loop() ) { ?>
		<?php woocommerce_output_all_notices(); ?>
	<section class="products__catalog catalog">
		<div class="catalog__container">
			<div class="catalog__bars">
				<form id="filters-form" action="#" method="POST" class="catalog__form form">
					<div class="form__wrapper search">
						<div class="search__input">
							<input name="search" placeholder="Search property" type="text">
						</div>
					</div>
					<div data-fls-dynamic=".catalog__btns, 768, 0" class="form__filter filter">
						<button class="filter__button">
							<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/filter.svg" alt="Filter icon" class="filter__icon">
							<span>Filter</span>
						</button>
						<div class="filter__popup">
							<ul class="filter__list">
								<?php 
								$product_categories = get_terms( array( 'taxonomy' => 'product_cat', 'hide_empty' => true ) );

								if( $product_categories ) :
									foreach( $product_categories as $product_category ) : ?>
										<li>
											<input type="checkbox" name="product_cats[]" id="product-cat-<?php echo absint( $product_category->term_id ) ?>" value="<?php echo absint( $product_category->term_id ) ?>" />
											<label for="product-cat-<?php echo absint( $product_category->term_id ) ?>"><?php echo esc_html( $product_category->name ) ?> <span>(<?php echo absint( $product_category->count ) ?>)</span></label>
										</li>
									<?php endforeach; ?>
								<?php endif; ?>
							</ul>
							<div class="filter__range range">
								<?php 
									$query = "SELECT MIN(CAST(meta_value AS DECIMAL(10,2))) AS min_price, MAX(CAST(meta_value AS DECIMAL(10,2))) AS max_price FROM {$wpdb->prefix}postmeta WHERE meta_key = '_price'";

									$result = $wpdb->get_row($query);

									$min_price = floor($result->min_price);
									$max_price = floor($result->max_price);

								?>
								<div class="range__price-input">
									<div class="range__field">
										<span>Min</span>
										<input type="number" class="input-min" value="<?php echo $min_price ?>">
									</div>
									<div class="range__separator">-</div>
									<div class="range__field">
										<span>Max</span>
										<input type="number" class="input-max" value="<?php echo $max_price ?>">
									</div>
								</div>
								<div class="range__slider">
									<div class="range__progress"></div>
								</div>
								 <div class="range__input">
									   <input type="range" name="min-price" class="range-min" min="<?php echo $min_price ?>" max="<?php echo $max_price ?>" value="<?php echo $min_price ?>" step="1">
        								<input type="range" name="max-price" class="range-max" min="<?php echo $min_price ?>" max="<?php echo $max_price ?>" value="<?php echo $max_price ?>" step="1">
								</div>
							</div>
						</div>
					</div>
					<input class="filter__sort" type="hidden" name="orderby" value="date" />
					<input class="filter__action" type="hidden" name="action" value="ajaxfilter" />
				</form>
			</div>
			<div class="catalog__header">
				<div class="catalog__wrapper">
					<h2 class="catalog__title h2">Total Product</h2>
					<div class="catalog__total">
						<?php do_action('hook_count_all_products'); ?>
					</div>
				</div>
				<div class="catalog__btns">
					<div class="catalog__sort sort">
						<button class="sort__btn">
							<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/sort.svg" alt="Sort Icon" class="sort__img">
							<span>Sort By</span>
						</button>
						<div class="sort__popup">
							<a href="?orderby=date" class="sort__item <?php if(isset($_GET['orderby']) && 'date' == $_GET['orderby']) : ?> _active <?php endif; ?>">New ones first</a>
							<a href="?orderby=price" class="sort__item <?php if(isset($_GET['orderby']) && 'price' == $_GET['orderby']) : ?> _active <?php endif; ?>">By price ascending</a>
							<a href="?orderby=price-desc" class="sort__item <?php if(isset($_GET['orderby']) && 'price-desc' == $_GET['orderby']) : ?> _active <?php endif; ?>">By price descending</a>
						</div>
					</div>
				</div>
			</div>
			<div class="catalog__grid">
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
			
			<div class="catalog__pagination">
				<?php
					if ( $query->max_num_pages > 1 ) {
						echo paginate_links( array(
							'base'    => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
							'format'  => '?paged=%#%',
							'total'   => $query->max_num_pages,
							'prev_next' => false,

						) );
					}
				?>
			</div>

		</div>
	</section>
	<?php 
		} else {
			do_action( 'woocommerce_no_products_found' );
		} 
	?>
</main>

<?php get_footer(); ?>
