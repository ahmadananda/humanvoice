<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newspaper Eye
 */
$newspaper_eye_blog_layout = get_theme_mod('newspaper_eye_blog_layout', 'rightside');
if ($newspaper_eye_blog_layout == 'fullwidth' || !is_active_sidebar('sidebar-1')) {
	$newspaper_eye_grid = 3;
} else {
	$newspaper_eye_grid = 4;
}
$newspaper_eye_categories = get_the_category();
if ($newspaper_eye_categories) {
	$newspaper_eye_category = $newspaper_eye_categories[mt_rand(0, count($newspaper_eye_categories) - 1)];
} else {
	$newspaper_eye_category = '';
}
?>
<div class="col-lg-<?php echo esc_attr($newspaper_eye_grid); ?> grid-item mb-5">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="grid-item-post">
			<?php if (has_post_thumbnail()) : ?>
				<div class="grid-item-img">
					<a class="grid-item-img-link" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php endif; ?>

			<div class="grid-item-details">
				<?php if ($newspaper_eye_category) : ?>
					<a class="cat-noimg-top" href="<?php echo esc_url(get_category_link($newspaper_eye_category)); ?>"><?php echo esc_html($newspaper_eye_category->name); ?></a>
				<?php endif; ?>
				<?php the_title('<h2 class="grid-item-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
				<?php the_excerpt(); ?>
				<div class="grid-bottom">
					<?php if ('post' === get_post_type()) : ?>
						<div class="entry-meta">
							<?php newspaper_eye_posted_by(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
					<span class="reding-time"><?php echo newspaper_eye_content_reading_time(); ?></span>
				</div>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->

</div>