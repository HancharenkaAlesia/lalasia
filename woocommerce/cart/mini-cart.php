<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
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

do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="widget_shopping_cart_content">

	<?php if ( WC()->cart && ! WC()->cart->is_empty() ) : ?>

		<ul class="minicart__list woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
			<?php
			do_action( 'woocommerce_before_mini_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					/**
					 * This filter is documented in woocommerce/templates/cart/cart.php.
					 *
					 * @since 2.1.0
					 */
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<li class="woocommerce-mini-cart-item minicart__item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
						<div class="minicart__wrapper">
							<?php
							echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								'woocommerce_cart_item_remove_link',
								sprintf(
									'<a href="%s" class="minicart__remove remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s" data-success_message="%s"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><g data-name="70-Trash"><path d="m29.89 6.55-1-2A1 1 0 0 0 28 4h-7V2a2 2 0 0 0-2-2h-6a2 2 0 0 0-2 2v2H4a1 1 0 0 0-.89.55l-1 2A1 1 0 0 0 3 8h2v22a2 2 0 0 0 .47 1.41A2 2 0 0 0 7 32h18a2 2 0 0 0 2-2V8h2a1 1 0 0 0 .89-1.45zM13 2h6v2h-6zm12 28H7V8h18z"/><path d="M17 26V10a2 2 0 0 0-2 2l.06 14H15v2a2 2 0 0 0 2-2zM22 26V10a2 2 0 0 0-2 2l.06 14H20v2a2 2 0 0 0 2-2zM12 26V10a2 2 0 0 0-2 2l.06 14H10v2a2 2 0 0 0 2-2z"/></g></svg></a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									/* translators: %s is the product name */
									esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
									esc_attr( $product_id ),
									esc_attr( $cart_item_key ),
									esc_attr( $_product->get_sku() ),
									/* translators: %s is the product name */
									esc_attr( sprintf( __( '&ldquo;%s&rdquo; has been removed from your cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) )
								),
								$cart_item_key
							);
							?>
							<?php if ( empty( $product_permalink ) ) : ?>
								<?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php else : ?>
								<a href="<?php echo esc_url( $product_permalink ); ?>">
									<?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</a>
							<?php endif; ?>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</div>
						<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity minicart__total">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</li>
					<?php
				}
			}

			do_action( 'woocommerce_mini_cart_contents' );
			?>
		</ul>

		<p class="woocommerce-mini-cart__total total">
			<?php
			/**
			 * Hook: woocommerce_widget_shopping_cart_total.
			 *
			 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
			 */
			do_action( 'woocommerce_widget_shopping_cart_total' );
			?>
		</p>

		<div class="minicart__btns">
			<a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-black ">View cart</a>
			<a href="<?php echo wc_get_checkout_url(); ?>" class="btn btn-black mt-10">Place an order</a>
		</div>

	<?php else : ?>

		<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_mini_cart' ); ?>

</div>
