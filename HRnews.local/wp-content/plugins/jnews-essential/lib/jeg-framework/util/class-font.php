<?php
/**
 * @author Jegstudio
 * @since 1.0.0
 * @package jeg-framework
 */

namespace Jeg\Util;

/**
 * The Font object.
 */
final class Font {
	/**
	 * The mode we'll be using to add google fonts.
	 * This is a todo item, not yet functional.
	 *
	 * @static
	 * @todo
	 * @access public
	 * @var string
	 */
	public static $mode = 'link';

	/**
	 * Holds a single instance of this object.
	 *
	 * @static
	 * @access private
	 * @var null|object
	 */
	private static $instance = null;

	/**
	 * An array of our google fonts.
	 *
	 * @static
	 * @access public
	 * @var null|object
	 */
	public static $google_fonts = null;

	/**
	 * Google font index
	 *
	 * @var array
	 */
	public static $google_font_index = null;

	/**
	 * The class constructor.
	 */
	private function __construct() {
	}

	/**
	 * Get the one, true instance of this class.
	 * Prevents performance issues since this is only loaded once.
	 *
	 * @return object Font
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Compile font options from different sources.
	 *
	 * @return array    All available fonts.
	 */
	public static function get_all_fonts() {
		$standard_fonts = self::get_standard_fonts();
		$google_fonts   = self::get_google_fonts();

		return apply_filters( 'jeg_fonts_all', array_merge( $standard_fonts, $google_fonts ) );
	}

	/**
	 * Return an array of standard websafe fonts.
	 *
	 * @return array    Standard websafe fonts.
	 */
	public static function get_standard_fonts() {
		$standard_fonts = array(
			'serif'      => array(
				'label' => _x( 'Serif', 'font style', 'jeg' ),
				'stack' => 'Georgia,Times,Times New Roman,serif',
			),
			'sans-serif' => array(
				'label' => _x( 'Sans Serif', 'font style', 'jeg' ),
				'stack' => 'Helvetica Neue, Helvetica, Roboto, Arial, sans-serif',
			),
			'monospace'  => array(
				'label' => _x( 'Monospace', 'font style', 'jeg' ),
				'stack' => 'Monaco, Lucida Sans Typewriter,Lucida Typewriter,Courier New,Courier,monospace',
			),
		);

		return apply_filters( 'jeg_fonts_standard_fonts', $standard_fonts );
	}

	/**
	 * Return an array of backup fonts based on the font-category
	 *
	 * @return array
	 */
	public static function get_backup_fonts() {
		$backup_fonts = array(
			'sans-serif'  => 'Helvetica Neue, Helvetica, Roboto, Arial, sans-serif',
			'serif'       => 'Georgia, serif',
			'display'     => 'Comic Sans MS, cursive, sans-serif',
			'handwriting' => 'Comic Sans MS, cursive, sans-serif',
			'monospace'   => 'Lucida Console, Monaco, monospace',
		);

		return apply_filters( 'jeg_fonts_backup_fonts', $backup_fonts );
	}

	/**
	 * Return an array of all available Google Fonts.
	 *
	 * @return array    All Google Fonts.
	 */
	public static function get_google_fonts() {

		if ( null === self::$google_fonts || empty( self::$google_fonts ) ) {

			$fonts = self::load_file_content( JEG_DIR . '/data/webfonts.json' );
			$fonts = json_decode( $fonts, true );

			$google_fonts = array();
			if ( is_array( $fonts ) ) {
				foreach ( $fonts['items'] as $font ) {
					$google_fonts[ $font['family'] ] = array(
						'label'    => $font['family'],
						'variants' => $font['variants'],
						'subsets'  => $font['subsets'],
						'category' => $font['category'],
						'type'     => 'google',
					);
				}
			}

			self::$google_fonts = apply_filters( 'jeg_fonts_google_fonts', $google_fonts );
		}

		return self::$google_fonts;

	}

	/**
	 * Dummy function to avoid issues with backwards-compatibility.
	 * This is not functional, but it will prevent PHP Fatal errors.
	 *
	 * @static
	 * @access public
	 */
	public static function get_google_font_uri() {
	}

	/**
	 * Returns an array of all available subsets.
	 *
	 * @static
	 * @access public
	 * @return array
	 */
	public static function get_google_font_subsets() {
		return array(
			'cyrillic'     => esc_attr__( 'Cyrillic', 'jeg' ),
			'cyrillic-ext' => esc_attr__( 'Cyrillic Extended', 'jeg' ),
			'devanagari'   => esc_attr__( 'Devanagari', 'jeg' ),
			'greek'        => esc_attr__( 'Greek', 'jeg' ),
			'greek-ext'    => esc_attr__( 'Greek Extended', 'jeg' ),
			'khmer'        => esc_attr__( 'Khmer', 'jeg' ),
			'latin-ext'    => esc_attr__( 'Latin Extended', 'jeg' ),
			'vietnamese'   => esc_attr__( 'Vietnamese', 'jeg' ),
			'hebrew'       => esc_attr__( 'Hebrew', 'jeg' ),
			'arabic'       => esc_attr__( 'Arabic', 'jeg' ),
			'bengali'      => esc_attr__( 'Bengali', 'jeg' ),
			'gujarati'     => esc_attr__( 'Gujarati', 'jeg' ),
			'tamil'        => esc_attr__( 'Tamil', 'jeg' ),
			'telugu'       => esc_attr__( 'Telugu', 'jeg' ),
			'thai'         => esc_attr__( 'Thai', 'jeg' ),
		);
	}

	/**
	 * Returns an array of all available variants.
	 *
	 * @static
	 * @access public
	 * @return array
	 */
	public static function get_all_variants() {
		return array(
			'100'       => esc_attr__( 'Ultra-Light 100', 'jeg' ),
			'100italic' => esc_attr__( 'Ultra-Light 100 Italic', 'jeg' ),
			'200'       => esc_attr__( 'Light 200', 'jeg' ),
			'200italic' => esc_attr__( 'Light 200 Italic', 'jeg' ),
			'300'       => esc_attr__( 'Book 300', 'jeg' ),
			'300italic' => esc_attr__( 'Book 300 Italic', 'jeg' ),
			'regular'   => esc_attr__( 'Normal 400', 'jeg' ),
			'italic'    => esc_attr__( 'Normal 400 Italic', 'jeg' ),
			'500'       => esc_attr__( 'Medium 500', 'jeg' ),
			'500italic' => esc_attr__( 'Medium 500 Italic', 'jeg' ),
			'600'       => esc_attr__( 'Semi-Bold 600', 'jeg' ),
			'600italic' => esc_attr__( 'Semi-Bold 600 Italic', 'jeg' ),
			'700'       => esc_attr__( 'Bold 700', 'jeg' ),
			'700italic' => esc_attr__( 'Bold 700 Italic', 'jeg' ),
			'800'       => esc_attr__( 'Extra-Bold 800', 'jeg' ),
			'800italic' => esc_attr__( 'Extra-Bold 800 Italic', 'jeg' ),
			'900'       => esc_attr__( 'Ultra-Bold 900', 'jeg' ),
			'900italic' => esc_attr__( 'Ultra-Bold 900 Italic', 'jeg' ),
		);
	}

	/**
	 * Determine if a font-name is a valid google font or not.
	 *
	 * @static
	 * @access public
	 *
	 * @param string $fontname The name of the font we want to check.
	 *
	 * @return bool
	 */
	public static function is_google_font( $fontname ) {
		if ( is_null( self::$google_font_index ) ) {
			self::$google_font_index = include JEG_DIR . '/data/googlefontsindex.php';
		}

		return in_array( $fontname, self::$google_font_index, true );
	}

	/**
	 * Gets available options for a font.
	 *
	 * @static
	 * @access public
	 * @return array
	 */
	public static function get_font_choices() {
		$fonts       = self::get_all_fonts();
		$fonts_array = array();
		foreach ( $fonts as $key => $args ) {
			$fonts_array[ $key ] = $key;
		}

		return $fonts_array;
	}

	/**
	 * Load file content
	 * 
	 * @param  string $filepath File path
	 * 
	 * @return mixed
	 */
	public static function load_file_content( $filepath ) {
        ob_start();
        include $filepath;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
