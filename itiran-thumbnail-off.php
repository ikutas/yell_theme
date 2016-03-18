<div class="kanren">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div class="no-thumbitiran">
			<h3><a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
			</a></h3>

			<div class="blog_info <?php st_hidden_class(); ?>">
				<p><i class="fa fa-clock-o"></i>
					<?php the_time( 'Y/m/d' ); ?>
					&nbsp;<span class="pcone"><i class="fa fa-tags"></i>
					<?php the_category( ', ' ); ?>
					<?php the_tags( '', ', ' ); ?>
				</span></p>
			</div>
			<div class="smanone2">
				<?php the_excerpt(); //抜粋文 ?>
			</div>
		</div>

	<?php endwhile;
	else: ?>
		<p>記事がありません</p>
	<?php endif; ?>
</div>
