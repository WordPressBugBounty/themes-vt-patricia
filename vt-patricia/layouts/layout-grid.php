<div class="vt-blog-grid grid-2-col">	
<?php
	/* Grid Layout */
	if ( have_posts() ) :	
							
	/* Start the Loop */
	while ( have_posts() ) : the_post();
	
	$sticky_class = ( is_sticky() ) ? 'is_sticky' : null;

	$class = ( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'clear last' : 'clear'; ?>
	
        <article <?php post_class("post {$sticky_class}"); ?>>
			<div class="post-content">
			
				<?php get_template_part( 'template-parts/post', 'meta' ); ?>
				
				<?php if ( get_the_title() ) : ?>
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a></h2>
				<?php endif; ?>
				
				<div class="patricia-thumbnail">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('vt_patricia_grid_post'); ?>
					</a>
				</div>
				
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div>
				<span class="readmore">
					<a href="<?php the_permalink(); ?>" class="btn link-more"><?php esc_html_e( 'Read more', 'vt-patricia' ); ?><span class="dslc-icon fa fa-arrow-right"></span></a>
				</span>
			</div>
        </article>

<?php
	endwhile;
    else:
        get_template_part('template-parts/content', 'none');
    endif;
	?>
	
</div>