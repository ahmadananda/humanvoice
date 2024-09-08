<?php

/**
 * Newspaper Eye Theme Customizer
 *
 * @package Newspaper Eye
 */

//calback functon for topbar header
if (!function_exists('newspaper_eye_header_top_calback')) :
	function newspaper_eye_header_top_calback()
	{
		if (get_theme_mod('newspaper_eye_header_top') == 1) {
			return true;
		} else {
			return false;
		}
	}
endif;

// adctive call back function for header social
if (!function_exists('newspaper_eye_header_social_callback')) :
	function newspaper_eye_header_social_callback()
	{
		if (get_theme_mod('newspaper_eye_header_social_show') == 1 && get_theme_mod('newspaper_eye_headermiddle_show') == 1) {
			return true;
		} else {
			return false;
		}
	}
endif;
// adctive call back function for header social
if (!function_exists('newspaper_eye_header_middle_callback')) :
	function newspaper_eye_header_middle_callback()
	{
		if (get_theme_mod('newspaper_eye_headermiddle_show') == 1) {
			return true;
		} else {
			return false;
		}
	}
endif;
// adctive call back function for header social
if (!function_exists('newspaper_eye_menubar_callback')) :
	function newspaper_eye_menubar_callback()
	{
		if (get_theme_mod('newspaper_eye_menubar_show') == 1) {
			return true;
		} else {
			return false;
		}
	}
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function newspaper_eye_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	//select sanitization function
	function newspaper_eye_sanitize_select($input, $setting)
	{
		$input = sanitize_key($input);
		$choices = $setting->manager->get_control($setting->id)->choices;
		return (array_key_exists($input, $choices) ? $input : $setting->default);
	}
	$wp_customize->add_setting('newspaper_eye_hide_tagline', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  ' ',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_hide_tagline', array(
		'label'      => __('Hide Site Tagline?', 'newspaper-eye'),
		'section'    => 'title_tagline',
		'settings'   => 'newspaper_eye_hide_tagline',
		'type'       => 'checkbox',
	));

	$wp_customize->add_panel('newspaper_eye_settings', array(
		'priority'       => 50,
		'title'          => __('Newspaper Eye Theme settings', 'newspaper-eye'),
		'description'    => __('All Newspaper Eye theme settings', 'newspaper-eye'),
	));
	$wp_customize->add_section('newspaper_eye_header', array(
		'title' => __('Newspaper Eye Header Settings', 'newspaper-eye'),
		'capability'     => 'edit_theme_options',
		'description'     => __('Newspaper Eye theme header settings', 'newspaper-eye'),
		'panel'    => 'newspaper_eye_settings',

	));

	$wp_customize->add_setting('newspaper_eye_header_top', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '1',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_header_top', array(
		'label'      => __('Show Header Area Top?', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_header_top',
		'type'       => 'checkbox',
	));

	$wp_customize->add_setting('newspaper_eye_latest_news', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '1',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_latest_news', array(
		'label'      => __('Show Latest News Ticker?', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_latest_news',
		'type'       => 'checkbox',
		'active_callback' => 'newspaper_eye_header_top_calback',
	));
	$wp_customize->add_setting('newspaper_eye_date_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '1',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_date_show', array(
		'label'      => __('Date Show?', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_date_show',
		'type'       => 'checkbox',
		'active_callback' => 'newspaper_eye_header_top_calback',
	));

	$wp_customize->add_setting('newspaper_eye_headermiddle_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_headermiddle_show', array(
		'label'      => __('Show Header Middle?', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_headermiddle_show',
		'type'       => 'checkbox',
	));
	$wp_customize->add_setting('newspaper_eye_mlogo_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '1',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_mlogo_show', array(
		'label'      => __('Show Header Middle Logo?', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_mlogo_show',
		'type'       => 'checkbox',
		'active_callback' => 'newspaper_eye_header_middle_callback',

	));
	$wp_customize->add_setting('newspaper_eye_search_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  '1',
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_search_show', array(
		'label'      => __('Show Header Search?', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_search_show',
		'type'       => 'checkbox',
		'active_callback' => 'newspaper_eye_header_middle_callback',

	));
	$wp_customize->add_setting('newspaper_eye_header_social_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  1,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_header_social_show', array(
		'label'      => __('Show Header Social?', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_header_social_show',
		'type'       => 'checkbox',
		'active_callback' => 'newspaper_eye_header_middle_callback',

	));
	// header social link start
	// Header facebook url
	$wp_customize->add_setting('newspaper_eye_hfacebook_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_hfacebook_link', array(
		'label'      => __('Header Facebook url', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_hfacebook_link',
		'type'       => 'url',
		'active_callback' => 'newspaper_eye_header_social_callback',
	));
	// Header twitter url
	$wp_customize->add_setting('newspaper_eye_htwitter_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_htwitter_link', array(
		'label'      => __('Header Twitter url', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_htwitter_link',
		'type'       => 'url',
		'active_callback' => 'newspaper_eye_header_social_callback',
	));
	// Header linkedin url
	$wp_customize->add_setting('newspaper_eye_hlinkedin_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_hlinkedin_link', array(
		'label'      => __('Header Linkedin url', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_hlinkedin_link',
		'type'       => 'url',
		'active_callback' => 'newspaper_eye_header_social_callback',
	));
	// Header linkedin url
	$wp_customize->add_setting('newspaper_eye_hyoutube_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_hyoutube_link', array(
		'label'      => __('Header Youtube url', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_hyoutube_link',
		'type'       => 'url',
		'active_callback' => 'newspaper_eye_header_social_callback',
	));
	// Header pinterest url
	$wp_customize->add_setting('newspaper_eye_hpinterest_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_hpinterest_link', array(
		'label'      => __('Header Pinterest url', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_hpinterest_link',
		'type'       => 'url',
		'active_callback' => 'newspaper_eye_header_social_callback',
	));
	// Header INSTAGRAM url
	$wp_customize->add_setting('newspaper_eye_hinstagram_link', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_hinstagram_link', array(
		'label'      => __('Header Instagram url', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_hinstagram_link',
		'type'       => 'url',
		'active_callback' => 'newspaper_eye_header_social_callback',
	));
	// Header Menu bar

	$wp_customize->add_setting('newspaper_eye_menubar_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  1,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_menubar_show', array(
		'label'      => __('Show Menubar Section?', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_menubar_show',
		'type'       => 'checkbox',
	));

	$wp_customize->add_setting('newspaper_eye_menubarlogo_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  1,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_menubarlogo_show', array(
		'label'      => __('Show Menubar Logo?', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_menubarlogo_show',
		'type'       => 'checkbox',
		'active_callback' => 'newspaper_eye_menubar_callback',

	));
	$wp_customize->add_setting('newspaper_eye_mainmenu_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  1,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_mainmenu_show', array(
		'label'      => __('Show Main Menu?', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_mainmenu_show',
		'type'       => 'checkbox',
		'active_callback' => 'newspaper_eye_menubar_callback',

	));
	$wp_customize->add_setting('newspaper_eye_menusearch_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  1,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_menusearch_show', array(
		'label'      => __('Show Menubar Search Icon?', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_menusearch_show',
		'type'       => 'checkbox',
		'active_callback' => 'newspaper_eye_menubar_callback',
	));
	$wp_customize->add_setting('newspaper_eye_catmenu_show', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'default'       =>  1,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_catmenu_show', array(
		'label'      => __('Show Categories Menu?', 'newspaper-eye'),
		'section'    => 'newspaper_eye_header',
		'settings'   => 'newspaper_eye_catmenu_show',
		'type'       => 'checkbox',
	));



	//NewsBox PLus blog settings
	$wp_customize->add_section('newspaper_eye_blog', array(
		'title' => __('Newspaper Eye Blog Settings', 'newspaper-eye'),
		'capability'     => 'edit_theme_options',
		'description'     => __('Newspaper Eye theme blog settings', 'newspaper-eye'),
		'panel'    => 'newspaper_eye_settings',

	));
	$wp_customize->add_setting('newspaper_eye_blog_container', array(
		'default'        => 'container',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'newspaper_eye_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_blog_container', array(
		'label'      => __('Container type', 'newspaper-eye'),
		'description' => __('You can set standard container or full width container. ', 'newspaper-eye'),
		'section'    => 'newspaper_eye_blog',
		'settings'   => 'newspaper_eye_blog_container',
		'type'       => 'select',
		'choices'    => array(
			'container' => __('Standard Container', 'newspaper-eye'),
			'container-fluid' => __('Full width Container', 'newspaper-eye'),
		),
	));

	$wp_customize->add_setting('newspaper_eye_blog_layout', array(
		'default'        => 'rightside',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'newspaper_eye_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_blog_layout', array(
		'label'      => __('Select Blog Layout', 'newspaper-eye'),
		'description' => __('Right and Left sidebar only show when sidebar widget is available. ', 'newspaper-eye'),
		'section'    => 'newspaper_eye_blog',
		'settings'   => 'newspaper_eye_blog_layout',
		'type'       => 'select',
		'choices'    => array(
			'rightside' => __('Right Sidebar', 'newspaper-eye'),
			'leftside' => __('Left Sidebar', 'newspaper-eye'),
			'fullwidth' => __('No Sidebar', 'newspaper-eye'),
		),
	));
	$wp_customize->add_setting('newspaper_eye_blog_style', array(
		'default'        => 'grid',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'newspaper_eye_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_blog_style', array(
		'label'      => __('Select Blog Style', 'newspaper-eye'),
		'section'    => 'newspaper_eye_blog',
		'settings'   => 'newspaper_eye_blog_style',
		'type'       => 'select',
		'choices'    => array(
			'grid' => __('Grid Style', 'newspaper-eye'),
			'list' => __('List Style', 'newspaper-eye'),
			'classic' => __('Classic Style', 'newspaper-eye'),
		),
	));
	//Newspaper Eye page settings
	$wp_customize->add_section('newspaper_eye_page', array(
		'title' => __('Newspaper Eye Page Settings', 'newspaper-eye'),
		'capability'     => 'edit_theme_options',
		'description'     => __('Newspaper Eye theme blog settings', 'newspaper-eye'),
		'panel'    => 'newspaper_eye_settings',

	));
	$wp_customize->add_setting('newspaper_eye_page_container', array(
		'default'        => 'container',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'newspaper_eye_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_page_container', array(
		'label'      => __('Page Container type', 'newspaper-eye'),
		'description' => __('You can set standard container or full width container for page. ', 'newspaper-eye'),
		'section'    => 'newspaper_eye_page',
		'settings'   => 'newspaper_eye_page_container',
		'type'       => 'select',
		'choices'    => array(
			'container' => __('Standard Container', 'newspaper-eye'),
			'container-fluid' => __('Full width Container', 'newspaper-eye'),
		),
	));
	$wp_customize->add_setting('newspaper_eye_page_header', array(
		'default'        => 'show',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
		'sanitize_callback' => 'newspaper_eye_sanitize_select',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('newspaper_eye_page_header', array(
		'label'      => __('Show Page header', 'newspaper-eye'),
		'section'    => 'newspaper_eye_page',
		'settings'   => 'newspaper_eye_page_header',
		'type'       => 'select',
		'choices'    => array(
			'show' => __('Show all pages', 'newspaper-eye'),
			'hide-home' => __('Hide Only Front Page', 'newspaper-eye'),
			'hide' => __('Hide All Pages', 'newspaper-eye'),
		),
	));




	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'newspaper_eye_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'newspaper_eye_customize_partial_blogdescription',
			)
		);
	}
}
add_action('customize_register', 'newspaper_eye_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function newspaper_eye_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function newspaper_eye_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newspaper_eye_customize_preview_js()
{
	wp_enqueue_script('newspaper-eye-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), NEWSPAPER_EYE_VERSION, true);
}
add_action('customize_preview_init', 'newspaper_eye_customize_preview_js');
