<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

?>

<main class="page detail-product">
	<section <?php wc_product_class( 'detail-product__card card', $product ); ?>>
		<?php
			$product_image_id = $product -> get_image_id();
			$product_gallery_ids = $product -> get_gallery_image_ids();
		?>
		<div class="card__container">
			<div class="card__flex">
				<div data-fls-slider="" class="card__slider swiper">
					<div class="card__wrapper swiper-wrapper">
						<div class="card__slide swiper-slide">
							<?php echo wp_get_attachment_image($product_image_id, 'full'); ?>
						</div>
						<?php foreach($product_gallery_ids as $product_gallery_id) :?>
							<div class="card__slide swiper-slide">
								<?php echo wp_get_attachment_image($product_gallery_id, 'full'); ?>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="card__pagination pagination"></div>
				</div>
				<div class="card__info">
					<h1 class="card__name h2"><?php the_title(); ?></h1>
					<div class="card__descr-short p1"><?php echo $product->get_short_description(); ?></div>
					<tr>
					<div class="cart__variations variations">
						
					<?php 
						$attribute_taxonomies = wc_get_attribute_taxonomies(); 
							if ( $attribute_taxonomies ) {
								foreach ( $attribute_taxonomies as $tax ) {
									$taxonomy_name = wc_attribute_taxonomy_name( $tax->attribute_name );
									$color = '';
									$terms = get_the_terms( $product->id, $taxonomy_name);

									if(!is_wp_error($terms) && !empty($terms)) {
						?>
							<div class="variations__group">
								<div class="variations__caption h5"><?php echo  $tax->attribute_label ?></div>
								<ul data-variation="<?php echo $tax->attribute_label; ?>" class="variations__list"> 
									<?php
										foreach($terms as $term)
											{ 
												$color = get_field('attr_color_code', $term->taxonomy . '_' . $term->term_id);
												if($color) {?>
													<li><button class="variations__btn" data-title="<?php echo $term->slug; ?>" style="background:<?php echo $color; ?>;">
													</button></li>
												<?php	} else { ?>
													<li><button class="variations__btn _with-border" data-title="<?php echo $term->slug; ?>"><?php echo $term->slug; ?></button></li>
												<?php }
											}
									?>
								</ul>
							</div>
						<?php }}} ?>
					</div>
				</tr>
					<div data-fls-showmore="" class="card__descr-full">
						<div data-fls-showmore-content="58" class="card__content p1">
						<?php echo $product->get_description(); ?>
						</div>
						<button hidden data-fls-showmore-button="100" type="button" class="card__more p1">
							<span>Read
					More</span>
							<span>Hide</span>
						</button>
					</div>
					<div class="card__price"><?php echo $product->get_price_html(); ?></div>
					
					<div class="card__btns">
						 <?php woocommerce_template_single_add_to_cart() ?>
					</div>

					<?php do_action('woocommerce_before_single_product'); ?>
				</div>
			</div>
		</div>
	</section>
	<section class="detail-product__related related">
		<div class="related__container">
			<h2 class="related__title">Related Items</h2>
			<div class="related__wrapper">
				<?php 
					$related_products =  array();
					$upsells = $product->get_upsell_ids();

					if($upsells) {
						$related_products = $upsells;
					} else {
						$related_products = wc_get_related_products($product->get_id(), 3);
					}

					foreach ($related_products as $related_product) {
						$post_object = get_post($related_product);

						setup_postdata( $GLOBALS['post'] =& $post_object);
						wc_get_template_part('content', 'product');
					}
				?>
			</div>
		</div>
	</section>
</main>


