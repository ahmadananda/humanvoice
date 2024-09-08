<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Affiliate Eye
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function affiliate_eye_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'affiliate_eye_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function affiliate_eye_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'affiliate_eye_pingback_header');

if (!function_exists('newspaper_eye_content_reading_time')) :
	function newspaper_eye_content_reading_time()
	{
		$newspaper_eye_post_id = get_the_ID();
		$newspaper_eye_content = get_the_content($newspaper_eye_post_id);
		$newspaper_eye_striped_tag = strip_tags($newspaper_eye_content);
		$newspaper_eye_word_count = str_word_count($newspaper_eye_striped_tag);
		$newspaper_eye_reading_minute = ceil($newspaper_eye_word_count / 200);
		$newspaper_eye_reading_second = ceil($newspaper_eye_word_count % 200 / (200 / 60));
		$newspaper_eye_second_zero = $newspaper_eye_reading_second < 10 ? 0 : '';
		$newspaper_eye_reading_time = sprintf('%s ' . __('Minute', 'newspaper-eye'), $newspaper_eye_reading_minute, $newspaper_eye_second_zero, $newspaper_eye_reading_second);
		return $newspaper_eye_reading_time;
	}
endif;
