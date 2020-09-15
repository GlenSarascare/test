<?php
/**
 * Archive Form
 *
 * @author Jegstudio
 * @since 1.0.0
 * @package jeg-framework
 */

namespace Jeg\Form;

/**
 * Form Archive Form
 */
class Form_Archive {

	/**
	 * Form_Menu constructor.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'form_script' ), 99 );
	}

	/**
	 * Print menu option on bottom of admin page
	 */
	public function form_script() {
		wp_enqueue_script( 'jeg-form-archive-script', JEG_URL . '/assets/js/form/archive-container.js', array( 'jeg-form-builder-script' ), jeg_get_version(), true );
	}

	/**
	 * Render Form
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
		<div id="<?php echo esc_html( $id ); ?>" data-id="<?php echo esc_html( $id ); ?>" class="archive-form-holder"></div>
		<script type="text/javascript">
		(function ($) {
			$(document).on('ready', function() {
				window.widgetData = <?php echo wp_json_encode( $data ); ?>;
				if ( 'undefined' !== typeof jeg && undefined !== jeg.archive) {
					jeg.archive.build('<?php echo esc_html( $id ); ?>', widgetData);
				}
			})
		})(jQuery);
		</script>
		<?php
	}
}
