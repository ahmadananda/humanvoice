<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Newspaper Eye
 */

$newspaper_eye_blog_container = get_theme_mod('newspaper_eye_blog_container', 'container');
$newspaper_eye_blog_layout = get_theme_mod('newspaper_eye_blog_layout', 'rightside');
$newspaper_eye_blog_style = get_theme_mod('newspaper_eye_blog_style', 'grid');

if (is_active_sidebar('sidebar-1') && $newspaper_eye_blog_layout != 'fullwidth') {
	$newspaper_eye_blog_column = 'col-lg-9';
} else {
	$newspaper_eye_blog_column = 'col-lg-12';
}
get_header();
?>

<div class="<?php echo esc_attr($newspaper_eye_blog_container); ?> mt-5 mb-5 pt-5 pb-5">
	<div class="row main-content">
		<?php if (is_active_sidebar('sidebar-1') && $newspaper_eye_blog_layout == 'leftside') : ?>
			<div class="col-lg-3 widget-sidebar">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
		<div class="<?php echo esc_attr($newspaper_eye_blog_column); ?> site-content">
			<main id="primary" class="site-main">


				<?php if (have_posts()) : ?>

					<header class="page-header search-header shadow-sm p-4 mb-5 text-center">
						<h1 class="page-title">
							<?php
							/* translators: %s: search query. */
							printf(esc_html__('Search Results for: %s', 'newspaper-eye'), '<span>' . get_search_query() . '</span>');
							?>
						</h1>
					</header><!-- .page-header -->

					<?php
					if ($newspaper_eye_blog_style == 'grid') :
					?>
						<div class="row" data-masonry='{"percentPosition": true }'>

						<?php
					endif;
					/* Start the Loop */
					while (have_posts()) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part('template-parts/content', 'search');

					endwhile;
					if ($newspaper_eye_blog_style == 'grid') :
						?>
						</div>
					<?php
					endif;
					?>

				<?php

					the_posts_pagination();

				else :

					get_template_part('template-parts/content', 'none');

				endif;
				?>

			</main><!-- #main -->
		</div>
		<?php if (is_active_sidebar('sidebar-1') && $newspaper_eye_blog_layout == 'rightside') : ?>
			<div class="col-lg-3 widget-sidebar">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();
