<?php
if ( function_exists('vt_patricia_require_file') ) {
    
	// Load Customizer Library scripts
    vt_patricia_require_file( VT_PATRICIA_CORE_PATH . 'customizer/customizer-library/customizer-library.php' );
    vt_patricia_require_file( VT_PATRICIA_CORE_PATH . 'customizer/customizer-options.php' );
    vt_patricia_require_file( VT_PATRICIA_CORE_PATH . 'customizer/styles.php' );
	
    // Include Welcome page
	if ( is_admin() ) {
		vt_patricia_require_file( VT_PATRICIA_CORE_PATH . 'welcome-screen/class-patricia-admin.php' );
	}
	
    // Load Functions
	vt_patricia_require_file( VT_PATRICIA_CORE_FUNCTIONS . 'custom-header.php' );
    vt_patricia_require_file( VT_PATRICIA_CORE_FUNCTIONS . 'template-tags.php' );
	vt_patricia_require_file( VT_PATRICIA_CORE_FUNCTIONS . 'template-functions.php' );
    
    // Load Widgets
    vt_patricia_require_file( VT_PATRICIA_CORE_WIDGETS . 'widget-init.php' );
    vt_patricia_require_file( VT_PATRICIA_CORE_WIDGETS . 'vt-about-widget.php' );
    vt_patricia_require_file( VT_PATRICIA_CORE_WIDGETS . 'vt-latest-posts-widget.php' );
}