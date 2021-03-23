<main class="post">
	<div class="post__wrap container">
		<div class="row">
			<div class="col-md-8">
				<?php dimox_breadcrumbs() ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_singular() ) : ?>
						<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
					<?php else : ?>
						<?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<?php endif; ?>
						<?php the_content();?>
				</article><!-- #post-<?php the_ID(); ?> -->
			</div>
			<div class="col-md-4">
				<div class="baivietlienquan">
					<h3>Bài viết liên quan</h3>
					<ul>
					<?php
						/*
						* Code hiển thị bài viết liên quan trong cùng 1 category
						* Code by levantoan.com
						*/
						$categories = get_the_category(get_the_ID());
						if ($categories){
							$category_ids = array();
							foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
							$args=array(
								'category__in' => $category_ids,
								'post__not_in' => array(get_the_ID()),
								'posts_per_page' => 5, // So bai viet dc hien thi
							);
							$my_query = new wp_query($args);
							if( $my_query->have_posts() ):
								while ($my_query->have_posts()):$my_query->the_post();
									?>
									<li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
									<?php
								endwhile;
								echo '</ul>';
							endif; wp_reset_query();
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</main>