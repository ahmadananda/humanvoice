<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newspaper Eye
 */
$newspaper_eye_categories = get_the_category();
if ($newspaper_eye_categories) {
	$newspaper_eye_category = $newspaper_eye_categories[mt_rand(0, count($newspaper_eye_categories) - 1)];
} else {
	$newspaper_eye_category = '';
}
if (has_post_thumbnail()) {
	$newspaper_eye_imgclass = 'nx-has-img';
} else {
	$newspaper_eye_imgclass = 'nx-no-img';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('nx-list-item'); ?>>
	<div class="single-nx-list-item <?php echo esc_attr($newspaper_eye_imgclass); ?>">
		<?php if (has_post_thumbnail()) : ?>
			<div class="nx-single-list-img">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('medium_large'); ?>
				</a>
			</div>
		<?php endif; ?>
		<div class="nx-single-list-details">
			<?php if ($newspaper_eye_category) : ?>
				<a href="<?php echo esc_url(get_category_link($newspaper_eye_category)); ?>" class="nx-list-categories"><?php echo esc_html($newspaper_eye_category->name); ?></a>
			<?php endif; ?>
			<?php the_title('<h2 class="nx-list-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
			<?php the_excerpt(); ?>
			<a class="newspaper-eye-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE', 'newspaper-eye'); ?> <i class="fas fa-long-arrow-alt-right"></i></a>

		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->