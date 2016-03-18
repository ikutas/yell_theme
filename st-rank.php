<?php
if ( is_home() ) {  //トップページ 

	if ( trim( $GLOBALS["myaf0a"] ) !== '' ) {
		if ( trim( $GLOBALS["myaf"] ) !== '' ) {
			echo '<h3 class="rankh3">' . esc_html( $GLOBALS["myaf"] ) . '</h3>';
		}

		//ショートコードのランキングを表示
			for($i = 1; $i<11 ; $i++ ){
			$myafs = 'myafsc'.$i;
			if ( trim( $GLOBALS[$myafs] ) !== '' ) {
				$myafsc = '[st_af id="'.$GLOBALS[$myafs].'"]';
				echo do_shortcode("$myafsc"); 

			}
		}
		//通常ののランキングを表示
		echo do_shortcode( '[rank]' );
	}
 } else if ( is_page() ) {  //固定ページ 

	if ( trim( $GLOBALS["myaf0"] ) !== '' ) {
		echo '<div class="rankst-wrap">';
		if ( trim( $GLOBALS["myaf"] ) !== '' ) {
			echo '<h3 class="rankh3">' . esc_html( $GLOBALS["myaf"] ) . '</h3>';
		}

		//ショートコードのランキングを表示
			for($i = 1; $i<11 ; $i++ ){
			$myafs = 'myafsc'.$i;
			if ( trim( $GLOBALS[$myafs] ) !== '' ) {
				$myafsc = '[st_af id="'.$GLOBALS[$myafs].'"]';
				echo do_shortcode("$myafsc"); 

			}
		}
		//通常ののランキングを表示
		echo do_shortcode( '[rank]' ) . '</div>';
	}
} else if ( is_single() ) { //投稿ページ 

	if ( trim( $GLOBALS["myaf0b"] ) !== '' ) {
		echo '<div class="rankst-wrap">';
		if ( trim( $GLOBALS["myaf"] ) !== '' ) {
			echo '<h3 class="rankh3">' . esc_html( $GLOBALS["myaf"] ) . '</h3>';
		}

		//ショートコードのランキングを表示
			for($i = 1; $i<11 ; $i++ ){
			$myafs = 'myafsc'.$i;
			if ( trim( $GLOBALS[$myafs] ) !== '' ) {
				$myafsc = '[st_af id="'.$GLOBALS[$myafs].'"]';
				echo do_shortcode("$myafsc"); 

			}
		}
		//通常ののランキングを表示
		echo do_shortcode( '[rank]' ) . '</div>';
	}
 } else { 
 }