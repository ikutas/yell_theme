<footer id="footer">
<?php get_template_part( 'st-footer-link' ); //フッターリンク ?>
<h3>
<?php if ( is_home() or is_front_page() ) { ?>
	<!-- ロゴ又はブログ名 -->
	<?php if ( get_option( 'st_logo_image' ) ): //ロゴ画像がある時 ?>
		<img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo esc_url( get_option( 'st_logo_image' ) ); ?>" >
	<?php else: //ロゴ画像が無い時 ?>
		<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
	<?php endif; ?>
<?php } else { ?>
	<?php if ( get_option( 'st_logo_image' ) ): //ロゴ画像がある時 ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo esc_url( get_option( 'st_logo_image' ) ); ?>" ></a>
	<?php else: //ロゴ画像が無い時 ?>
		<?php st_wp_title( '' ); ?>
	<?php endif; ?>
<?php } ?>
</h3>

	<p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'description' ); ?></a>
	</p>
		<?php get_template_part( 'st-header-widget' ); //電話番号とヘッダー用ウィジェット ?>
	<p class="copy">Copyright&copy;
		<?php bloginfo( 'name' ); ?>
		,
		<?php echo date( 'Y' ); ?>
		All Rights Reserved.</p>
</footer>
</div>
<!-- /#wrapper -->
<!-- ページトップへ戻る -->
<div id="page-top"><a href="#wrapper" class="fa fa-angle-up"></a></div>
<!-- ページトップへ戻る　終わり -->
<?php wp_enqueue_script( 'base', get_template_directory_uri() . '/js/base.js', array() ); ?>

<?php if ( st_is_mobile() ) { //PCのみ追尾広告のjs読み込み ?>
<?php } else { ?>
	<?php wp_enqueue_script( 'scroll', get_template_directory_uri() . '/js/scroll.js', array() ); ?>
<?php } ?>

<?php wp_footer(); ?>
</body></html>