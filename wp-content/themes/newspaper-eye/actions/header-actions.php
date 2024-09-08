<?php

/**
 * The file for header all actions
 *
 *
 * @package Newspaper Eye
 */

function newspaper_eye_header_top_output()
{
	$newspaper_eye_latest_news = get_theme_mod('newspaper_eye_latest_news', 1);
	$newspaper_eye_date_show = get_theme_mod('newspaper_eye_date_show', 1);
?>
	<div class="header-top">
		<div class="container">
			<div class="header-top-all-items">
				<div class="ht-row">
					<?php if ($newspaper_eye_date_show) : ?>
						<div class="web-date ht-date">
							<i class="far fa-calendar-check"></i>
							<p><?php echo date(get_option('date_format')); ?></p>
						</div>
					<?php endif; ?>
					<?php if ($newspaper_eye_latest_news) : ?>
						<div class="breaking-news ht-news">
							<div class="breaking-news-title">
								<i class="fas fa-wifi"></i>
								<h5 class="breaking-title"><?php esc_html_e('Breaking News', 'newspaper-eye'); ?></h5>
							</div>
							<div class="news-update ticker news-noload">
								<?php
								$news_update_args = array(
									'post_type'  		=>	'post',
									'post_status'  		=>	'publish',
									'posts_per_page' 	=> 5,
									'ignore_sticky_posts' 	    =>	1,
								);
								$news_update_loop = new WP_Query($news_update_args);
								while ($news_update_loop->have_posts()) :  $news_update_loop->the_post(); ?>
									<div> <?php the_title(); ?>&nbsp; | &nbsp;</div>
								<?php endwhile;
								wp_reset_postdata(); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

<?php
}
add_action('newspaper_eye_header_top', 'newspaper_eye_header_top_output');

function newspaper_eye_header_logo_output()
{
	$newspaper_eye_mlogo_show = get_theme_mod('newspaper_eye_mlogo_show', 1);
	$newspaper_eye_search_show = get_theme_mod('newspaper_eye_search_show', 1);
	$newspaper_eye_header_social_show = get_theme_mod('newspaper_eye_header_social_show', 1);
	$newspaper_eye_hfacebook_link = get_theme_mod('newspaper_eye_hfacebook_link');
	$newspaper_eye_htwitter_link = get_theme_mod('newspaper_eye_htwitter_link');
	$newspaper_eye_hlinkedin_link = get_theme_mod('newspaper_eye_hlinkedin_link');
	$newspaper_eye_hyoutube_link = get_theme_mod('newspaper_eye_hyoutube_link');
	$newspaper_eye_hpinterest_link = get_theme_mod('newspaper_eye_hpinterest_link');
	$newspaper_eye_hinstagram_link = get_theme_mod('newspaper_eye_hinstagram_link');

	if ($newspaper_eye_search_show && $newspaper_eye_header_social_show) {
		$newspaper_eye_logo_col = '4';
		$newspaper_eye_search_col = '5';
		$newspaper_eye_social_col = '3';
	} elseif ($newspaper_eye_header_social_show) {
		$newspaper_eye_logo_col = '8';
		$newspaper_eye_search_col = ' ';
		$newspaper_eye_social_col = '4';
	} elseif ($newspaper_eye_search_show) {
		$newspaper_eye_logo_col = '7';
		$newspaper_eye_search_col = '5';
		$newspaper_eye_social_col = ' ';
	} else {
		$newspaper_eye_logo_col = '12';
		$newspaper_eye_search_col = ' ';
		$newspaper_eye_social_col = ' ';
	}

?>
	<div class="header-middle">
		<div class="container">
			<div class="header-middle-all-content">
				<div class="row">
					<div class="col-lg-<?php echo esc_attr($newspaper_eye_logo_col); ?>">
						<?php
						if ($newspaper_eye_mlogo_show) {
							newspaper_eye_logo_output();
						}
						?>
					</div>
					<?php if ($newspaper_eye_search_show) : ?>
						<div class="col-lg-<?php echo esc_attr($newspaper_eye_search_col); ?>">
							<div class="npaper search-box">
								<?php echo get_search_form(); ?>

							</div>
						</div>
					<?php endif; ?>
					<?php if ($newspaper_eye_header_social_show) : ?>
						<div class="col-lg-<?php echo esc_attr($newspaper_eye_social_col); ?>">
							<div class="header-links">
								<div class="social-links">
									<?php if ($newspaper_eye_hfacebook_link) : ?>
										<a href="<?php echo esc_url($newspaper_eye_hfacebook_link); ?>"><i class="fab fa-facebook-f"></i></a>
									<?php endif; ?>
									<?php if ($newspaper_eye_htwitter_link) : ?>
										<a href="<?php echo esc_url($newspaper_eye_htwitter_link); ?>"><i class="fab fa-twitter"></i></a>
									<?php endif; ?>
									<?php if ($newspaper_eye_hlinkedin_link) : ?>
										<a href="<?php echo esc_url($newspaper_eye_hlinkedin_link); ?>"><i class="fab fa-linkedin-in"></i></a>
									<?php endif; ?>
									<?php if ($newspaper_eye_hyoutube_link) : ?>
										<a href="<?php echo esc_url($newspaper_eye_hyoutube_link); ?>"><i class="fab fa-youtube"></i></a>
									<?php endif; ?>
									<?php if ($newspaper_eye_hpinterest_link) : ?>
										<a href="<?php echo esc_url($newspaper_eye_hpinterest_link); ?>"><i class="fab fa-pinterest"></i></a>
									<?php endif; ?>
									<?php if ($newspaper_eye_hinstagram_link) : ?>
										<a href="<?php echo esc_url($newspaper_eye_hinstagram_link); ?>"><i class="fab fa-instagram"></i></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php
}
add_action('newspaper_eye_header_logo', 'newspaper_eye_header_logo_output');

// Newspaper Eye mene style
function newspaper_eye_main_menu_output()
{
	$newspaper_eye_menubar_show = get_theme_mod('newspaper_eye_menubar_show', 1);
	if (empty($newspaper_eye_menubar_show)) {
		return;
	}

	$newspaper_eye_menubarlogo_show = get_theme_mod('newspaper_eye_menubarlogo_show', 1);
	$newspaper_eye_mainmenu_show = get_theme_mod('newspaper_eye_mainmenu_show', 1);
	$newspaper_eye_menusearch_show = get_theme_mod('newspaper_eye_menusearch_show', 1);

?>
	<div class="menu-bar ">
		<div class="container">
			<div class="menubar-content">
				<?php
				if ($newspaper_eye_menubarlogo_show) {
					newspaper_eye_logo_output();
				}
				?>
				<div class="newspaper-eye-container menu-inner">
					<?php if ($newspaper_eye_mainmenu_show) : ?>
						<nav id="site-navigation" class="main-navigation">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'main-menu',
								'menu_id'        => 'newspaper-eye-menu',
								'menu_class'        => 'newspaper-eye-menu',
							));
							?>
						</nav><!-- #site-navigation -->
					<?php endif; ?>
					<?php if ($newspaper_eye_menusearch_show) : ?>
						<div class="serach-show">
							<div class="besearch-icon">
								<a href="#" id="besearch"><i class="fas fa-search"></i></a>
							</div>
							<div id="bspopup" class="soff">
								<div id="affsearch" class="sopen">
									<button data-widget="remove" id="removeClass" class="sclose" type="button">×</button>
									<?php get_search_form(); ?>
									<small class="beshop-cradit"><?php esc_html_e('Newspaper Eye Theme By', 'newspaper-eye') ?> <a target="_blank" title="<?php esc_attr_e('Newspaper Eye Theme', 'newspaper-eye') ?>" href="<?php echo esc_url('https://wpthemespace.com/product/beshop/'); ?>"><?php esc_html_e('Wp Theme Space', 'newspaper-eye') ?></a></small>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>

<?php
}
add_action('newspaper_eye_main_menu', 'newspaper_eye_main_menu_output');



// Newspaper Eye mene style
function newspaper_eye_mobile_menu_output()
{
?>
	<div id="wsm-menu" class="mobile-menu-bar wsm-menu">
		<div class="container">
			<nav id="mobile-navigation" class="mobile-navigation">
				<button id="mmenu-btn" class="menu-btn" aria-expanded="false">
					<span class="mopen"><?php esc_html_e('Menu', 'newspaper-eye'); ?></span>
					<span class="mclose"><?php esc_html_e('Close', 'newspaper-eye'); ?></span>
				</button>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'main-menu',
					'menu_id'        => 'wsm-menu-ul',
					'menu_class'        => 'wsm-menu-has',
				));
				?>
			</nav><!-- #site-navigation -->
		</div>
	</div>

<?php
}
add_action('newspaper_eye_mobile_menu', 'newspaper_eye_mobile_menu_output');


function newspaper_eye_logo_output()
{
	$newspaper_eye_hide_tagline = get_theme_mod('newspaper_eye_hide_tagline');
?>
	<div class="head-logo-sec">
		<?php if (has_custom_logo()) : ?>
			<div class="site-branding brand-logo">
				<?php the_custom_logo(); ?>
			</div>
		<?php else : ?>
			<?php
			if (display_header_text() == true || (display_header_text() == true && is_customize_preview())) : ?>
				<div class="site-branding brand-text">
					<?php if (display_header_text() == true || (display_header_text() == true && is_customize_preview())) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
						<?php
						$newspaper_eye_description = get_bloginfo('description', 'display');
						if (($newspaper_eye_description || is_customize_preview()) && empty($newspaper_eye_hide_tagline)) :
						?>
							<p class="site-description"><?php echo $newspaper_eye_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
														?></p>
						<?php endif; ?>
					<?php endif; ?>

				</div><!-- .site-branding -->
			<?php endif; ?>
		<?php endif; ?>
	</div>
<?php
}

function newspaper_eye_catmenubar_output()
{
?>
	<div class="nseye-catmenu">
		<ul id="nseye-catmenu" class="nseye-catlist">
			<?php wp_list_categories(array(
				'title_li' => __return_false()
			)); ?>
		</ul>
	</div>
<?php
}
add_action('newspaper_eye_catmenubar', 'newspaper_eye_catmenubar_output');
