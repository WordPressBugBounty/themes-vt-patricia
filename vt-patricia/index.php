<?php
/**
 * The main template file.
 *
 * @package vt-patricia
 */

get_header(); ?>

<div id="primary" class="col-md-9 col-sm-9 content-area">

	<?php if ( get_theme_mod( 'blog-page-layout' ) == 'layout-grid' ) :

			get_template_part( 'layouts/layout', 'grid' ); 

		elseif ( get_theme_mod( 'blog-page-layout' ) == 'layout-standard' ): 

			get_template_part( 'layouts/layout', 'standard' );
						
		else :

			get_template_part( 'layouts/layout', 'grid' );
			
		endif;
				 
	?>
	
	<?php the_posts_pagination(); ?>
	
</div><!-- #primary -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>