<?php

if ( isset($GLOBALS['stdata35']) && $GLOBALS['stdata35'] === 'kesu' ) {
}else{

	$defaults = array(
	'container' => 'nav',
	'container_class' => 'smanone clearfix',
	'theme_location' => 'primary-menu',
	);
?>
	<?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
		<?php wp_nav_menu( $defaults ); ?>
	<?php else : ?>
		<nav class="smanone clearfix">
			<?php wp_page_menu( $defaults ); ?>
		</nav>
	<?php endif; 
} ?>