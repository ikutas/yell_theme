<?php
if ( trim( $GLOBALS["myaf0c"] ) !== '' ) {
	if ( trim( $GLOBALS["myaf"] ) !== '' ) {
		echo '<h2 class="rankh2">' . esc_html( $GLOBALS["myaf"] ) . '</h2>';
	}
	echo do_shortcode( '[rank-side]' );
}