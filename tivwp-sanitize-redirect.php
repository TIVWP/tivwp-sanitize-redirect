<?php
/**
 * Plugin Name: TIVWP non-ASCII wp_sanitize_redirect
 * Plugin URI:  https://github.com/TIVWP/tivwp-sanitize-redirect
 * Description: Do not remove non-ASCII characters from URLs on wp_redirect
 * Author:      TIV.NET
 * Author URI:  http://www.tiv.net/
 * Version:     14.11.11
 * License: GPL2
 * Example:
 * @link  http://www.example.com/wp-login.php?redirect_to=http://www.example.com/русский-title/
 */

if ( ! function_exists( 'wp_sanitize_redirect' ) ) {

	/**
	 * Sanitizes a URL for use in a redirect.
	 * @since 2.3.0
	 *
	 * @param string $location
	 *
	 * @return string redirect-sanitized URL
	 */
	function wp_sanitize_redirect( $location ) {
		/**
		 * This line exists in the original function (wp-includes/pluggable.php)
		 * @see wp_sanitize_redirect()
		 */
		//	$location = preg_replace('|[^a-z0-9-~+_.?#=&;,/:%!*]|i', '', $location);
		$location = wp_kses_no_null( $location );

		// remove %0d and %0a from location
		$strip    = array( '%0d', '%0a', '%0D', '%0A' );
		$location = _deep_replace( $strip, $location );

		return $location;
	}

}

# --- EOF
