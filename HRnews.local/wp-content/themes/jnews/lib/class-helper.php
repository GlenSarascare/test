<?php
/**
 * @author : Jegtheme
 */

if ( ! class_exists( 'Jeg\Form\Form_Widget' ) ) {
	require_once get_parent_theme_file_path( 'lib/class-fallback/class-form-widget.php' );
}

if ( ! class_exists( 'Jeg\Customizer\Customizer' ) ) {
	require_once get_parent_theme_file_path( 'lib/class-fallback/class-customizer.php' );
}

if ( ! class_exists( 'Jeg\Util\Style_Generator' ) ) {
	require_once get_parent_theme_file_path( 'lib/class-fallback/class-style-generator.php' );
}

if ( ! class_exists( 'Jeg\Util\Font' ) ) {
	require_once get_parent_theme_file_path( 'lib/class-fallback/class-font.php' );
}
