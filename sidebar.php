<?php

		global $wp_query;
		if( isset ( $wp_query ) ){
			if( is_single() or is_page() ){
				$postID = get_the_ID();
				$column1 = get_post_meta( $postID, 'columnck', true );
			}else{
				$column1 = '';
			}

		$stdata11 = get_option( 'st-data11' );
		if ( ( is_home() && $stdata11 === 'yes' ) || ( $column1 === 'yes' && !is_home() && !is_archive() ) ) {
		} elseif ( ( is_home() && $stdata11 === 'lp' ) || ( $column1 === 'lp' && !is_home() && !is_archive() ) ) {
		} else {

	?>
<div id="side">
	<aside>
		<?php if ( is_404() ) { ?>
		<?php } else { ?>
			<div class="ad">
				<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 4 ) ) : else : //アドセンス ?>
				<?php endif; ?>
			</div>
		<?php } ?>

		<?php if ( $GLOBALS["stdata16"] === '' ) { ?>
			<!-- RSSボタンです -->
			<div class="rssbox">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>/?feed=rss2"><i class="fa fa-rss-square"></i>&nbsp;購読する</a></div>
			<!-- RSSボタンここまで -->
		<?php } ?>

		<div id="sidebg">
			<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 7 ) ) : else : //固定ページリンク用サイドウイジェット読み込み ?>
            		<?php endif; ?>
		</div>

		<?php if (!is_home() && !is_front_page()){ ?>
			<?php get_template_part( 'newpost' ); //最近のエントリ ?>
		<?php } ?>

		<div id="mybox">
			<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 1 ) ) : else : //サイドウイジェット読み込み ?>
			<?php endif; ?>
		</div>

		<div id="scrollad">
			<?php get_template_part( 'popular-thumbnail-sc' ); //任意のエントリ ?>
			<?php get_template_part( 'scroll-ad' ); //追尾式広告 ?>
			<?php get_template_part( 'st-rank-side' ); //ランキング ?>
		</div>
	</aside>
</div>
<!-- /#side -->
<?php }
} ?>
<div class="waku top"></div>
<div class="waku left"></div>
<div class="waku right"></div>
<div class="waku bottom"></div>
