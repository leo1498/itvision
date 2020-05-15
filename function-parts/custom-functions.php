<?php

/**
 * CUSTOM POST TYPES
 */

function create_post_types() {

    register_post_type('clients', array(
        'labels' => array(
            'name' => __('Nasi klienci'),
            'singular_name' => __('Nasi klienci'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'rewrite' => array('slug' => 'clients'),
        'supports' => array(
            'title',
            'page-attributes',
            'editor',
            'thumbnail',
            'excerpt'
        ),
        'show_in_rest' => true,
        'hierarchical' => false,
        'taxonomies' => array('post_tag', 'category'),
        'posts_per_archive_page' => 50,
    ));

    register_post_type('services', array(
        'labels' => array(
            'name' => __('Usługi'),
            'singular_name' => __('Usługi'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'rewrite' => array('slug' => 'services'),
        'supports' => array(
            'title',
            'page-attributes',
            'editor',
            'thumbnail',
            'excerpt'
        ),
        'show_in_rest' => true,
        'hierarchical' => false,
        'posts_per_archive_page' => 50,
    ));

    register_post_type('products', array(
        'labels' => array(
            'name' => __('Produkty'),
            'singular_name' => __('Produkty'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'rewrite' => array('slug' => 'products'),
        'supports' => array(
            'title',
            'page-attributes',
            'editor',
            'thumbnail',
            'excerpt',
        ),
        'show_in_rest' => true,
        'hierarchical' => true,
        'posts_per_archive_page' => 50,
    ));

    register_post_type('experts', array(
        'labels' => array(
            'name' => __('Eksperci'),
            'singular_name' => __('Eksperci'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'rewrite' => array('slug' => 'experts'),
        'supports' => array(
            'title',
            'page-attributes',
            'editor',
            'thumbnail',
            'excerpt'
        ),
        'show_in_rest' => true,
        'hierarchical' => false,
        'taxonomies' => array('post_tag', 'category'),
        'posts_per_archive_page' => 50,
    ));
}

add_action('init', 'create_post_types');

// svg
function getSvgContent($file) {
    $svgContent = file_get_contents($file);
    return $svgContent;
}

// News image sizes
add_image_size('news-tile', 247, 247, array('center', 'top'));


// News image sizes
add_image_size('recent-post', 224, 224, array('center', 'top'));

// Box tile image size
add_image_size('box-tile', 421, 421, array('center', 'top'));

// Clients tile image sizes
add_image_size('client-tile', 504, 504, array('center', 'top'));

// Positions image sizes
add_image_size('services-tile', 436, 417, array('center', 'top'));

// Positions image sizes
add_image_size('services-single', 770);

// Positions image sizes
add_image_size('client-single', 900);

// Solution position tile size
add_image_size('position-tile', 504, 336, true);

// Gallery
add_image_size('gallery', 359, 277, array('center', 'top'));

// Avatar
add_image_size('avatar', 162, 162, array('center', 'top'));

// Product item
add_image_size('product-item', 300);

// Custom Fields
function custom_fields(){
    include(locate_template( 'function-parts/home-fields.php' ));
    include(locate_template( 'function-parts/posts-fields.php' ));
}

add_action('cmb2_init', 'custom_fields');


// split google maps x,y
function getLatLngArray($position) {
    return explode(',', $position);
}

// active class of menu
function special_nav_class ($classes, $item) {
	if (in_array('current-menu-item', $classes) ){
		$classes[] = 'active';
    }
	return $classes;
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

// Polylang
include locate_template('function-parts/polylang-translate.php');

// Ajax load news
// function newsLoadAjax() {
//     $offset = $_POST['offset'];
//     $postsPerPage = $_POST['postsPerPage'];

//     $news = new WP_Query(array(
//         'post_type' => 'post',
//         'posts_per_page' => $postsPerPage,
//         'offset' => $offset
//       ));

//       while ($news->have_posts()) : $news->the_post();
//         include locate_template('template-parts/news-tile.php');
//       endwhile;

//     wp_reset_query();

//     die();
// }

// add_action('wp_ajax_newsLoadAjax', 'newsLoadAjax');
// add_action('wp_ajax_nopriv_newsLoadAjax', 'newsLoadAjax');

// Ajax clients filter

function clientFilter() {
    $searchTitle = $_POST['searchTitle'];
    $sort = $_POST['sort'];

    $args = array (
        'post_type'  => 'clients',
        'posts_per_page' => -1,
    );

    if ($sort == 0) {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    }

    if ($sort == 'sort_new' || $sort == 'sort_old') {
        $args['orderby'] = 'date';

        if ($sort == 'sort_new') {
            $args['order'] = 'DESC';
        } else {
            $args['order'] = 'ASC';
        }
    }

    if ($sort == 'sort_a' || $sort == 'sort_z') {
        $args['orderby'] = 'title';

        if ($sort == 'sort_a') {
            $args['order'] = 'ASC';
        } else {
            $args['order'] = 'DESC';
        }
    }

    if ($searchTitle != '') {
        $args['s'] = $searchTitle;
    }


    $search = new WP_Query($args);

    ob_start();

    if ( $search->have_posts() ):
        while ( $search->have_posts() ) : $search->the_post();
			include(locate_template('template-parts/client-tile.php'));
        endwhile;
        wp_reset_postdata();
	else :
		echo '<p class="filter__error">'.pll__('Brak wyników wyszukiwania.').'</p>';
	endif;

    $content = ob_get_clean();
    echo $content;
    
	die();
}

add_action('wp_ajax_clientFilter', 'clientFilter');
add_action('wp_ajax_nopriv_clientFilter', 'clientFilter');


function slider_fancy( $file_list_meta_key, $img_size) {

    $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

    foreach ( (array) $files as $attachment_id => $attachment_url ) {
        echo '<div class="slide">';
        echo '<a class="fancy__slide" href="' . wp_get_attachment_url($attachment_id) . '">';
        echo wp_get_attachment_image( $attachment_id, $img_size );
        echo '</a></div>';
    }
}

function cmb2_output_file_list( $file_list_meta_key, $img_size) {

    $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

    foreach ( (array) $files as $attachment_id => $attachment_url ) {
        echo '<div class="slide">';
        echo wp_get_attachment_image( $attachment_id, $img_size );
        echo '</div>';
    }
}



function breadcrumbs() {

	$text['home']     = 'IT Vision';
	$text['404']      = 'Error 404';

	$wrap_before    = '<ul class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; 
	$wrap_after     = '</ul>';
	$before         = '<li class="breadcrumbs__current">'; 
	$after          = '</li>';

	$show_on_home   = 0;
	$show_home_link = 1;
	$show_current   = 1; 
	$show_last_sep  = 1;

	global $post;
	$home_url       = home_url('/');
	$link           = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
	$link          .= '<meta itemprop="position" content="%3$s" />';
	$link          .= '</li>';
	$parent_id      = ( $post ) ? $post->post_parent : '';
	$home_link      = sprintf( $link, $home_url, $text['home'], 1 );

	if ( is_home() || is_front_page() ) {
		if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;
	} else {
		$position = 0;
		echo $wrap_before;
		if ( $show_home_link ) {
			$position += 1;
			echo $home_link;
		}
		if ( is_category() ) {
			$parents = get_ancestors( get_query_var('cat'), 'category' );
			foreach ( array_reverse( $parents ) as $cat ) {
				$position += 1;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$cat = get_query_var('cat');
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				echo $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
				}
			}

        } elseif ( is_single() && ! is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$position += 1;
				$post_type = get_post_type_object( get_post_type() );
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
				if ( $show_current ) echo $before . get_the_title() . $after;
	
            }
            else {
				echo $before . get_the_title() . $after;
			}
        }
        
        elseif ( is_page() && ! $parent_id ) {
			if ( $show_current ) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			$parents = get_post_ancestors( get_the_ID() );
			foreach ( array_reverse( $parents ) as $pageID ) {
				$position += 1;
				echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
			}
			if ( $show_current ) echo $before . get_the_title() . $after;

		} elseif ( is_404() ) {
			if ( $show_current ) echo $before . $text['404'] . $after;

		}

		echo $wrap_after;

	}
} // end breadcrumbs


add_post_type_support( 'page', 'excerpt' );