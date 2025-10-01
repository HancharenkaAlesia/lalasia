<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}

$product_cats_ids = wc_get_product_term_ids( $product->get_id(), 'product_cat' );
$term;
?>

<a href="<?php echo $product->get_permalink(); ?>" class="product-card <?php if(is_front_page()) : ?> product-slider__slide swiper-slide <? endif; ?>">
	<div class="product-card__img">
		<?php echo $product->get_image(); ?>
	</div>
	<div class="product-card__wrap">
		<div class="product-card__info">
			<div class="product-card__category p1">
				<?php foreach( $product_cats_ids as $cat_id ) {
					$term = get_term_by( 'id', $cat_id, 'product_cat' );
					echo $term->name;
					echo ' ';
					} ?>
			</div>
			<div class="product-card__name h3"><?php echo $product->get_title(); ?></div>
			<div class="product-card__descr p1"><?php echo $product->get_short_description(); ?></div>
		</div>
		<div class="product-card__price h3"><?php echo $product->get_price_html(); ?></div>
	</div>
</a>
