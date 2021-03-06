<?php
/*
Template Name:PAGE TEMPLATE03
*/
?>
<?php get_header(); ?>

<div id="content" class="clearfix">
	<div id="contentInner">
		<main <?php st_text_copyck(); ?>>
			<div class="post">
				<?php if( !is_front_page() ){ ?>
					<!--ぱんくず -->
					<div id="breadcrumb"><a href="<?php echo home_url(); ?>">HOME</a>&nbsp;>&nbsp;
						<?php foreach ( array_reverse( get_post_ancestors( $post->ID ) ) as $parid ) { ?>
							<a href="<?php echo get_page_link( $parid ); ?>" title="<?php echo  get_the_title(); ?>"> <?php echo get_page( $parid )->post_title; ?></a>&nbsp;>&nbsp;
						<?php } ?>
					</div>
					<!--/ ぱんくず -->
				<?php }else{ ?>
					<?php get_template_part( 'news-st' ); //お知らせ ?>
				<?php } ?>

				<article>
					<!--ループ開始 -->
					<?php if (have_posts()) : while (have_posts()) :
					the_post(); ?>
					<h1 class="entry-title">
						<?php the_title(); //タイトル ?>
					</h1>
					<?php the_content(); //本文 ?>

					<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 6 ) ) : else : ?>
					<?php endif; ?>
					
					<?php get_template_part( 'sns' ); //ソーシャルボタン読み込み ?>
					<?php get_template_part( 'popular-thumbnail' ); //任意のエントリ ?>
					<?php get_template_part( 'st-rank' ); //ランキング ?>
					<?php get_template_part( 'st-childlink' ); //子ページへのリンク ?>
				</article>
				<?php wp_link_pages(); ?>
				<div class="blog_info contentsbox <?php st_hidden_class(); ?>">
					<p>公開日：
						<time class="entry-date" datetime="<?php the_time(DATE_W3C); ?>">
							<?php the_time( 'Y/m/d' ); ?>
						</time>
						<br>
						<?php if ( $mtime = st_get_mtime( 'Y/m/d' ) ) {
							echo '最終更新日：', $mtime;
						} ?>
					</p>
				</div>
				<?php endwhile; else: ?>
					<p>記事がありません</p>
				<?php endif; ?>
				<!--ループ終了 -->

				<?php
				//コメント
				if ( ( $GLOBALS["stdata6"] ) === '' ) { ?>
					<?php if ( comments_open() || get_comments_number() ) {
						comments_template();
					} ?>
				<?php } ?>

			</div>
			<!--/post-->
		</main>
	</div>
	<!-- /#contentInner -->
	<?php get_sidebar(); ?>
</div>
<!--/#content -->
<?php get_footer(); ?>
