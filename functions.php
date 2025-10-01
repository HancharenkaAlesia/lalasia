<?php
	add_action('wp_enqueue_scripts', 'scripts');


	function scripts() {
		wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/app.min.css' );
		wp_enqueue_style( 'detail-prod-style', get_template_directory_uri() . '/assets/css/detail-product.min.css' );
		wp_enqueue_style( 'gsap-style', get_template_directory_uri() . '/assets/css/gsap.min.css' );
		wp_enqueue_style( 'index-style', get_template_directory_uri() . '/assets/css/index.min.css' );
		wp_enqueue_style( 'prod-style', get_template_directory_uri() . '/assets/css/products.min.css' );
		wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/assets/css/theme-style.min.css' );

		wp_enqueue_script( 'jquery-ui-autocomplete' );
		wp_enqueue_script('nouirange-script', 'https://unpkg.com/range-slider-input@2', array(), null, true);
		wp_enqueue_script('gsap-script', get_template_directory_uri() . '/assets/js/gsap.min.js', array(), null, true);
		wp_enqueue_script('slider-script', get_template_directory_uri() . '/assets/js/slider.min.js', array(), null, true);
		wp_enqueue_script('index-script', get_template_directory_uri() . '/assets/js/index.min.js', array(), null, true);
		wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/app.min.js', array(), null, true);
		wp_enqueue_script('detail-prod-script', get_template_directory_uri() . '/assets/js/detail-product.min.js', array(), null, true);
		wp_enqueue_script('theme-script-script', get_template_directory_uri() . '/assets/js/theme-script.min.js', array(), null, true);
		

		wp_deregister_style('woocommerce-general');
		wp_deregister_style('woocommerce-layout');

		$script_data_array = array(
			'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
			'security' => wp_create_nonce( 'load_more_posts' ),
		);
		wp_localize_script( 'theme-script-script', 'script_data_array', $script_data_array );  

		global $wp_query; 
	}	

	add_theme_support('woocommerce');

	remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
	remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

	add_filter('script_loader_tag', 'add_attributes_to_script', 10, 3); 
	function add_attributes_to_script( $tag, $handle, $src ) {
		if ( 'index-script' === $handle ) {
			$tag = '<script type="module" src="' . esc_url( $src ) . '" id="index-script" ></script>';
		} 
		return $tag;
	}

	add_filter('script_loader_tag', 'add_attributes_to_script_2', 10, 3); 
	function add_attributes_to_script_2( $tag, $handle, $src ) {
		if ( 'main-script' === $handle ) {
			$tag = '<script type="module" src="' . esc_url( $src ) . '" id="main-script" ></script>';
		} 
		return $tag;
	}

	add_filter('script_loader_tag', 'add_attributes_to_script_3', 10, 3); 
	function add_attributes_to_script_3( $tag, $handle, $src ) {
		if ( 'gsap-script' === $handle ) {
			$tag = '<script type="module" src="' . esc_url( $src ) . '" id="gsap-script" ></script>';
		} 
		return $tag;
	}

	add_filter('script_loader_tag', 'add_attributes_to_script_4', 10, 3); 
	function add_attributes_to_script_4( $tag, $handle, $src ) {
		if ( 'detail-prod-script' === $handle ) {
			$tag = '<script type="module" src="' . esc_url( $src ) . '" id="detail-prod-script" ></script>';
		} 
		return $tag;
	}


	add_theme_support( 'menus' );


//количество товаров

add_action('hook_count_all_products', 'my_count_all_products');

function my_count_all_products() {
    $args = array( 
		'post_type' => 'product', 
		'post_status' => 'publish', 
		'posts_per_page' => -1,
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
    $products = new WP_Query( $args );
    echo $products->found_posts;   
}


add_action('wp_footer', function() { ?>
	<script>
		/*  вариации товаров */
		if(document.querySelector('.variations')) {
			let variationWrapper = document.querySelector('.variations');
			let variationValues = document.querySelectorAll('.value');
			
			variationWrapper.addEventListener('click', (event) => {
				if(event.target.classList.contains('variations__btn')) {
					let variationList = event.target.closest('.variations__list');

					variationValues.forEach(variationValue => {
						if(variationList.getAttribute("data-variation") == variationValue.getAttribute("data-variation")) {
							let variationListItems = variationList.querySelectorAll('.variations__btn');
							let variationValueSelect = variationValue.querySelector('select');

							variationListItems.forEach(el => {
									el.classList.remove('_active');
							});

							event.target.classList.add('_active');

							variationValueSelect.value = event.target.getAttribute("data-title");

							variationValueSelect.addEventListener('change', function(event) {	});

							let changeVariationsPromise = new Promise(resolve => {
									const changeEvent = new Event('change', { bubbles: true }); 
									variationValueSelect.dispatchEvent(changeEvent);
									resolve();
								}).then(() => {
									let cardPrice = document.querySelector('.card__price');

									jQuery( ".single_variation_wrap" ).on( "show_variation", function ( event, variation ) {
										cardPrice.innerHTML = variation.display_price + ' $';
									});
							});					

						}
					});
				}
			});
		}
		/* обновление корзины по количеству */


		if(document.querySelector('.cart-page')) {
			let cartPage = document.querySelector('.cart-page');
			let cartNums = document.querySelectorAll('.card__input');

			cartPage.addEventListener('click', (event) => {
				 if (event.target.classList.contains('number-plus') || event.target.classList.contains('number-minus')) {
					let eventNumInput = event.target.parentNode.querySelector('.card__input');

					eventNumInput.addEventListener('change', function(event) {	});

					const changeEvent = new Event('change', { bubbles: true }); 

					eventNumInput.dispatchEvent(changeEvent);

					document.querySelector('.btn-update-cart').click();
				}

				if (event.target.classList.contains('card__input')) {
					event.target.addEventListener('blur', (e) => {
						e.target.addEventListener('change', function(event) {	});

						const changeEvent = new Event('change', { bubbles: true }); 

						e.target.dispatchEvent(changeEvent);

						document.querySelector('.btn-update-cart').click();
					});
				}
			});
		}
				
	</script>
<?php });


add_filter('woocommerce_add_to_cart_fragments', function($fragments) {
	
	$fragments['.cart__quantity'] = '<div class="cart__quantity">' . count(WC()->cart->get_cart()) . '</div>';

	return $fragments;

});

/* ajax фильтры */

add_action('wp_ajax_ajaxfilter', 'products_filter'); //для авторизованных
add_action('wp_ajax_nopriv_ajaxfilter', 'products_filter'); //для не авторизованных

function products_filter() {

	//поиск

	$search_term = isset( $_POST['term'] ) ? $_POST['term'] : '';

	//агрументы

	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => 8,
		's' => $search_term,
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

	//сортировка
	$orderby = !empty($_POST['orderby']) && $_POST['orderby'] ? $_POST['orderby'] : 'date';

	if('price' === $orderby) {
		$args['orderby'] = 'price_clause';
		$args['order'] = 'ASC';
	}

	if('price-desc' === $orderby) {
		$args['orderby'] = 'price_clause';
		$args['order'] = 'DESC';
	}


	//категории товаров
	$product_cats = !empty($_POST['product_cats']) && $_POST['product_cats'] ? $_POST['product_cats'] : array();

	if($product_cats) {
		$args['tax_query'][] = array(
			'taxonomy' => 'product_cat',
			'terms' => $product_cats,
		);
	}

	//цены

	$min_price = !empty($_POST['min-price']) && $_POST['min-price'] ? absint( $_POST['min-price'] ) : 0;
	$max_price = !empty($_POST['max-price']) && $_POST['max-price'] ? absint( $_POST['max-price'] ) : 100;

	$args['meta_query'] = array(
		'price_clause' =>  array(
			'key' => '_price',
			'value' => array($min_price, $max_price),
			'compare' => 'between',
			'type' => 'numeric',
		)
	);


	//пагинация

	$args[ 'paged' ] = $_POST[ 'paged' ];

	//вывод товаров

	$query = new WP_Query($args);

 	ob_start();

	if($query->have_posts() ) {
		while ($query->have_posts() ) {
			$query->the_post();
			wc_get_template_part( 'content', 'product' );
		}
	} else {
		echo 'No products found, try changing your request';
	}

	$html_products = ob_get_contents();
	$count = $query->found_posts;

	ob_end_clean();

	if ( $query->max_num_pages > 1 ) {
			$pagination_html = paginate_links( array(
				'base'    => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'format'  => '?paged=%#%',
				'total'   => $query->max_num_pages,
				'prev_next' => false,
				'current' => $_POST[ 'paged' ],
			) );
	}



	wp_send_json(array(
		'products' => $html_products,
 		'count' => $count,
		'pagination' => $pagination_html,
	));

}


function blog_filter() {
    check_ajax_referer('load_more_posts', 'security');
    ob_start();
    $paged = $_POST['paged'];
	 $cat = $_POST['cat'];

    $args = array( 
		'post_type' => 'portfolio',
		'post_status' => 'publish',
		'order' => 'ASC',
		'posts_per_page' => 6,
		'tag_id' => $cat,
		'paged' => $paged, );
    $loop = new WP_Query( $args );
		while( $loop->have_posts() ) :
			$loop->the_post(); 
			?>
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
		<?php endwhile; wp_reset_postdata(); ?>

<?php $content = ob_get_contents();
    ob_end_clean();
    $more_btn = $loop->max_num_pages == $paged;
    $response = array();
    if ( $content ) {
        $response['status'] = 'success';
        $response['data'] = $content;
        $response['more_btn'] = $loop->max_num_pages == $paged;
    } else {
        $response['status'] = 'error';
        $response['data'] = '';
        $response['more_btn'] = $loop->max_num_pages == $paged;
    }
    echo json_encode($response);

    die();
}

add_action('wp_ajax_blog_filter', 'blog_filter');
add_action('wp_ajax_nopriv_blog_filter', 'blog_filter');

/* регистрация таксономий */

add_action( 'init', 'register_post_types' );
function register_post_types(){
    $args = [
        'labels' => [
            'name'               => 'Review', // основное название для типа записи
            'singular_name'      => 'Review', // название для одной записи этого типа
            'add_new'            => 'Add review', // для добавления новой записи
            'add_new_item'       => 'Review adding', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'reviews editing', // для редактирования типа записи
            'new_item'           => 'new review', // текст новой записи
            'view_item'          => 'Read review', // для просмотра записи этого типа.
            'search_items'       => 'Search review', // для поиска по этим типам записи
            'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found', // если не было найдено в корзине
            'menu_name'          => 'Reviews', // название меню
        ],
        'public'             => false,
		  "delete_with_user" => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
		  'show_in_nav_menus' => true,
        'show_in_rest'       => true,
		  'rest_base' => '',
		  'rest_controller_class' => 'WP_REST_Posts_Controller',
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
		  'description' => '',
		  'exclude_from_search' => true,
		  'map_meta_cap' => true,
		  'taxonomies'          => array('post_tag'),
        'supports' => [ 'title', 'editor', 'thumbnail']
    ];
    register_post_type( 'Reviews', $args );

	 $args_2 = [
        'labels' => [
            'name'               => 'Project', // основное название для типа записи
            'singular_name'      => 'Project', // название для одной записи этого типа
            'add_new'            => 'Add project', // для добавления новой записи
            'add_new_item'       => 'Project adding', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Project editing', // для редактирования типа записи
            'new_item'           => 'New project', // текст новой записи
            'view_item'          => 'Read project', // для просмотра записи этого типа.
            'search_items'       => 'Search project', // для поиска по этим типам записи
            'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found', // если не было найдено в корзине
            'menu_name'          => 'Portfolio', // название меню
        ],
        'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 5,
		  'taxonomies'          => array('post_tag'),
        'supports' => [ 'title', 'editor', 'thumbnail']
    ];
    register_post_type( 'portfolio', $args_2 );

	 $args_3 = [
        'labels' => [
            'name'               => 'Team', // основное название для типа записи
            'singular_name'      => 'Team', // название для одной записи этого типа
            'add_new'            => 'Add worker', // для добавления новой записи
            'add_new_item'       => 'Worker adding', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Worker editing', // для редактирования типа записи
            'new_item'           => 'new worker', // текст новой записи
            'view_item'          => 'Read worker', // для просмотра записи этого типа.
            'search_items'       => 'Search worker', // для поиска по этим типам записи
            'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found', // если не было найдено в корзине
            'menu_name'          => 'Team', // название меню
        ],
        'public'             => false,
		  "delete_with_user" => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
		  'show_in_nav_menus' => true,
        'show_in_rest'       => true,
		  'rest_base' => '',
		  'rest_controller_class' => 'WP_REST_Posts_Controller',
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
		  'description' => '',
		  'exclude_from_search' => true,
		  'map_meta_cap' => true,
        'supports' => [ 'title', 'editor', 'thumbnail']
    ];
    register_post_type( 'Team', $args_3 );
}

