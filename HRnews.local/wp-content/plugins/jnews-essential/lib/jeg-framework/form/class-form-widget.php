<?php
/**
 * Customizer Form Widget
 *
 * @author Jegstudio
 * @since 1.0.0
 * @package jeg-framework
 */

namespace Jeg\Form;

/**
 * Form Widget Class
 */
class Form_Widget {

	/**
	 * Form_Menu constructor.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'widget_setting' ), 99 );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'widget_setting' ) );
		add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'widget_setting' ) );
	}

	/**
	 * Print menu option on bottom of admin page
	 */
	public function widget_setting() {
		wp_enqueue_script( 'jeg-form-widget-script', JEG_URL . '/assets/js/form/widget-container.js', array( 'jeg-form-builder-script' ), jeg_get_version(), true );
	}

	/**
	 * Render Widget Form
	 *
	 * @param string $id Field Identifier.
	 * @param array  $segments List of Segment available on widget.
	 * @param array  $fields List of Fields available on widget.
	 */
	public static function render_form( $id, $segments, $fields ) {
		$data = array(
			'segments' => $segments,
			'fields'   => $fields,
		);
		?>
		<div id="<?php echo esc_html( $id ); ?>" data-id="<?php echo esc_html( $id ); ?>" class="widget-form-holder"></div>
		<script type="text/html" class="widget-form-data" data-id="<?php echo esc_html( $id ); ?>">
			<?php echo wp_json_encode( $data ); ?>
		</script>
		<script type="text/javascript">
			// temporary fix
			if (undefined !== window.elementor) {
				if (undefined !== jeg.widget) {
					jeg.widget.build('<?php echo esc_html( $id ); ?>');
				}
			} else {
				(function ($) {
					$(document).on('ready', function() {
						if (undefined !== jeg.widget) {
							jeg.widget.build('<?php echo esc_html( $id ); ?>');
						}
					})
				})(jQuery);
			}
		</script>
		<?php
	}
}
