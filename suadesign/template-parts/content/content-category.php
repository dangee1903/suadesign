<div class="col-md-4">
	<div class="col-md-12">
		<div class="img">
			<a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail( $post_id, '', array( 'class' =>'') ); ?></a>
		</div>
		<a href="<?php the_permalink();?>"><h2><?php echo the_title()?></h2></a>
		<a href="<?php the_permalink();?>"><p><?php echo the_excerpt()?></p></a>
	</div>
</div>



