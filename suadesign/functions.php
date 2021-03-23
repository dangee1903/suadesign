<?php 
define('SUA_THEME_URL', get_template_directory_uri());
define('SUA_THEME_JS_URL', SUA_THEME_URL . '/js');
define('SUA_THEME_CSS_URL', SUA_THEME_URL . '/dest');
define('SUA_THEME_IMG_URL', SUA_THEME_URL . '/img');
define('SUA_THEME_DIR', get_template_directory());

// Đăng ký css cho theme
add_action('wp_enqueue_scripts', 'zendvn_theme_register_style');

function zendvn_theme_register_style(){
	global $wp_styles;
	$cssUrl = get_template_directory_uri() . '/dest';
	wp_register_style('sua_theme_customizer', $cssUrl . '/style.min.css',array(),'1.0');
    wp_enqueue_style('sua_theme_customizer');
    wp_register_style('sua_theme_customizerFont', $cssUrl . '/fonts.css',array(),'1.0');
    wp_enqueue_style('sua_theme_customizerFont');
    wp_register_style('sua_theme_customizerStyleLib', $cssUrl . '/stylelibs.min.css',array(),'1.0');
	wp_enqueue_style('sua_theme_customizerStyleLib');
}

// Xóa jquery cho theme
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( &$scripts){
    if(!is_admin()){
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.2.1' );
    }
}

// Đăng ký jquery cho themes
add_action('wp_enqueue_scripts', 'sua_theme_register_js');

function sua_theme_register_js(){
    
    wp_register_script('myjs1', SUA_THEME_CSS_URL . '/jsmain.min.js',array('jquery'),'1.0',true);
	wp_enqueue_script('myjs1');

	wp_register_script('myjs', SUA_THEME_JS_URL . '/main.js',array('jquery'),'1.0',true);
	wp_enqueue_script('myjs');

}

// Đăng ký menu cho themes
function register_my_menu() {
    register_nav_menu('header-menu',__( 'Menu chính' ));
}
add_action( 'init', 'register_my_menu' );


/**
 * Breadcrumb
 */
function dimox_breadcrumbs() {
    $delimiter = '<li>/</li>';
    $home = 'Trang chủ'; // chữ thay thế cho phần 'Home' link
    $before = '<li class="current">'; // thẻ html đằng trước mỗi link
    $after = '</li>'; // thẻ đằng sau mỗi link
    if ( !is_home() && !is_front_page() || is_paged() ) {
        echo '<div class="breadcrumb"><ul>';
        global $post;
        $homeLink = get_bloginfo('url');
        echo '<li><a href="' . $homeLink . '">' . $home . '</a></li>' . $delimiter . ' ';
        if ( is_category() ) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $before . single_cat_title('', false) . $after;
        } else
        if ( is_day() ) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>' . $delimiter . ' ';
            echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li>' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif ( is_month() ) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                echo '<li>'.get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') . '</li>';
                echo $before . get_the_title() . $after;
            }
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif ( is_page() && !$post->post_parent ) {
            echo $before . get_the_title() . $after;
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif ( is_search() ) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif ( is_tag() ) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif ( is_author() ) {
            global $author;
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif ( is_404() ) {
            echo $before . 'Error 404' . $after;
        }
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
        echo '</ul></div>';
    }
} // end dimox_breadcrumbs()

add_theme_support( 'post-thumbnails', 
     array( 'post', 'page', 'service') 
);

remove_filter( 'the_excerpt', 'wpautop' );
