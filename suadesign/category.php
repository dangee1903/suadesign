<?php get_header(); 
$categories = get_categories( $args );
$category=get_category(get_query_var('cat'));
$args_my_query = array(
	'post_type' => 'post',
	'category_name'   => 'blog',
	'posts_per_page'  => 4,
);
$my_query = new WP_Query( $args_my_query ); ?>
<main class="category">
    <div class="category__wrap container">
        <h2>Blog</h2>
        <div class="row">
<?php 
	if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
		the_post();
		get_template_part( 'template-parts/content/content-category' );
	endwhile; endif;    
?>
		</div>
	</div>
</main>
<?php get_footer()?>
