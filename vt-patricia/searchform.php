<?php
/**
 * The template for displaying search forms in Patricia
 *
 * @package vt-patricia
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="input-group stylish-input-group">
	<label class="label-search">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'vt-patricia' ); ?></span>
		<input class="form-control search-field" type="text" placeholder="<?php echo esc_attr_x( 'Search and hit enter...', 'placeholder', 'vt-patricia' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	</label>
	
	<span class="input-group-prepend">
		<button type="submit" class="search-button" value="<?php echo esc_attr__( 'Search', 'vt-patricia' ); ?>"><i class="fa fa-search"></i></button>
	</span>
	<span class="input-group-append">
		<button class="patricia-search-close"><i class="fa fa-times"></i></button>
	</span>
	
  </div>
</form>