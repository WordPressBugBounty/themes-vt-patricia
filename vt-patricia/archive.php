<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vt-patricia
 */

get_header(); ?>

<div id="primary" class="col-md-9 col-sm-9 content-area">
		
	<div class="archive-box">
		<header class="page-header">
		<?php
			the_archive_title( '<h2 class="page-title">', '</h2>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
		</header><!-- .page-header -->
	</div>
			
	<?php if ( get_theme_mod( 'archive-page-layout' ) == 'layout-grid' ) :

			get_template_part( 'layouts/layout', 'grid' ); 

		elseif ( get_theme_mod( 'archive-page-layout' ) == 'layout-standard' ): 

			get_template_part( 'layouts/layout', 'standard' );
						
		else :

			get_template_part( 'layouts/layout', 'grid' );

		endif;
				 
	?>
		
	<?php the_posts_pagination(); ?>

</div><!-- #primary -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>