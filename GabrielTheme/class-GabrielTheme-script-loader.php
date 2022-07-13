<?php
/**
 * Javascript Loader Class
 *
 * Allow `async` and `defer` while enqueuing Javascript.
 *
 * Based on a solution in WP Rig.
 *
 * @package WordPress
 * @subpackage GabrielTheme
 * @since GabrielTheme 1.0
 */

if ( ! class_exists( 'GabrielTheme_Script_Loader' ) ) {
	/**
	 * A class that provides a way to add `async` or `defer` attributes to scripts.
	 *
	 * @since GabrielTheme 1.0
	 */
	class GabrielTheme_Script_Loader {

		/**
		 * Adds async/defer attributes to enqueued / registered scripts.
		 *
		 * If #12009 lands in WordPress, this function can no-op since it would be handled in core.
		 *
		 * @since GabrielTheme 1.0
		 *
		 * @link https://github.com/GABSVN
		 *
		 * @param string $tag    The script tag.
		 * @param string $handle The script handle.
		 * @return string Script HTML string.
		 */
		public function filter_script_loader_tag( $tag, $handle ) {
			foreach ( array( 'async', 'defer' ) as $attr ) {
				if ( ! wp_scripts()->get_data( $handle, $attr ) ) {
					continue;
				}
				// Prevent adding attribute when already added in #12009.
				if ( ! preg_match( ":\s$attr(=|>|\s):", $tag ) ) {
					$tag = preg_replace( ':(?=></script>):', " $attr", $tag, 1 );
				}
				// Only allow async or defer, not both.
				break;
			}
			return $tag;
		}

	}
}
