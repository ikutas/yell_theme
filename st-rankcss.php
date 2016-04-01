<?php
header('Content-Type: text/css; charset=utf-8');
include_once(dirname( __FILE__ ) . '/../../../wp-load.php');

if ( !function_exists( 'sanitize_hex_color' ) ) {
	/**
	 * #付き16進数カラー以外を除去
	 *
	 * @param string $color
	 *
	 * @return string|null
	 */
	function sanitize_hex_color( $color ) {
		if ( '' === $color ) {
			return '';
		}

		if ( preg_match( '|\A#([A-Fa-f0-9]{3}){1,2}\z|', $color ) ) {
			return $color;
		}

		return null;
	}
}
?>
