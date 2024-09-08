<?php

/**
 * About setup
 *
 * @package Newspaper Eye
 */

require_once trailingslashit(get_template_directory()) . 'inc/about/class.about.php';

if (!function_exists('newspaper_eye_about_setup')) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function newspaper_eye_about_setup()
	{
		$theme = wp_get_theme();
		$xtheme_name = $theme->get('Name');
		$xtheme_domain = $theme->get('TextDomain');
		if ($xtheme_domain == 'x-magazine') {
			$theme_slug = $xtheme_domain;
		} else {
			$theme_slug = 'newspaper-eye';
		}



		$config = array(
			// Menu name under Appearance.
			'menu_name'               => sprintf(esc_html__('%s Info', 'newspaper-eye'), $xtheme_name),
			// Page title.
			'page_name'               => sprintf(esc_html__('%s Info', 'newspaper-eye'), $xtheme_name),
			/* translators: Main welcome title */
			'welcome_title'         => sprintf(esc_html__('Welcome to %s! - Version ', 'newspaper-eye'), $theme['Name']),
			// Main welcome content
			// Welcome content.
			'welcome_content' => sprintf(esc_html__('%1$s is now installed and ready to use. We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. Thanks for using our theme!', 'newspaper-eye'), $theme['Name']),

			// Tabs.
			'tabs' => array(
				'getting_started' => esc_html__('Getting Started', 'newspaper-eye'),
				'recommended_actions' => esc_html__('Recommended Actions', 'newspaper-eye'),
				'useful_plugins'  => esc_html__('Useful Plugins', 'newspaper-eye'),
				'free_pro'  => esc_html__('Free Vs Pro', 'newspaper-eye'),
			),

			// Quick links.
			'quick_links' => array(
				'xmagazine_url' => array(
					'text'   => esc_html__('UPGRADE NEWPAPER EYE PRO', 'newspaper-eye'),
					'url'    => 'https://wpthemespace.com/product/newspaper-eye-pro/?add-to-cart=9664',
					'button' => 'danger',
				),
				'update_url' => array(
					'text'   => esc_html__('View demo', 'newspaper-eye'),
					'url'    => 'https://wpthemespace.com/newspaper-eye-demo/',
					'button' => 'primery',
				),
				'video_url' => array(
					'text'   => esc_html__('Show Video', 'newspaper-eye'),
					'url'    => 'https://www.youtube.com/watch?v=ATu84uap_bc',
					'button' => 'danger',
				),

			),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__('Demo Content', 'newspaper-eye'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('Demo content is pro feature. To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'newspaper-eye'), esc_html__('One Click Demo Import', 'newspaper-eye')),
					'button_text' => esc_html__('UPGRADE For  Demo Content', 'newspaper-eye'),
					'button_url'  => 'https://wpthemespace.com/product/newspaper-eye-pro/?add-to-cart=9664',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),

				'two' => array(
					'title'       => esc_html__('Theme Options', 'newspaper-eye'),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__('Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'newspaper-eye'),
					'button_text' => esc_html__('Customize', 'newspaper-eye'),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
				),
				'three' => array(
					'title'       => esc_html__('Show Video', 'newspaper-eye'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('You may show Newspaper Eye short video for better understanding', 'newspaper-eye'), esc_html__('One Click Demo Import', 'newspaper-eye')),
					'button_text' => esc_html__('Show video', 'newspaper-eye'),
					'button_url'  => 'https://www.youtube.com/watch?v=ATu84uap_bc',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),
				'five' => array(
					'title'       => esc_html__('Set Widgets', 'newspaper-eye'),
					'icon'        => 'dashicons dashicons-tagcloud',
					'description' => esc_html__('Set widgets in your sidebar, Offcanvas as well as footer.', 'newspaper-eye'),
					'button_text' => esc_html__('Add Widgets', 'newspaper-eye'),
					'button_url'  => admin_url() . '/widgets.php',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'six' => array(
					'title'       => esc_html__('Theme Preview', 'newspaper-eye'),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__('You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized. Theme demo only work in pro theme', 'newspaper-eye'),
					'button_text' => esc_html__('View Demo', 'newspaper-eye'),
					'button_url'  => 'https://wpthemespace.com/newspaper-eye-demo/',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'seven' => array(
					'title'       => esc_html__('Contact Support', 'newspaper-eye'),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__('Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'newspaper-eye'),
					'button_text' => esc_html__('Contact Support', 'newspaper-eye'),
					'button_url'  => 'https://wpthemespace.com/support/',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
			),

			'useful_plugins'        => array(
				'description' => esc_html__('Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'newspaper-eye'),
				'already_activated_message' => esc_html__('Already activated', 'newspaper-eye'),
				'version_label' => esc_html__('Version: ', 'newspaper-eye'),
				'install_label' => esc_html__('Install and Activate', 'newspaper-eye'),
				'activate_label' => esc_html__('Activate', 'newspaper-eye'),
				'deactivate_label' => esc_html__('Deactivate', 'newspaper-eye'),
				'content'                   => array(
					array(
						'slug' => 'magical-addons-for-elementor',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-products-display'
					),
					array(
						'slug' => 'magical-posts-display'
					),
					array(
						'slug' => 'click-to-top'
					),
					array(
						'slug' => 'gallery-box',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-blocks'
					),
					array(
						'slug' => 'easy-share-solution',
						'icon' => 'svg',
					),
					array(
						'slug' => 'wp-edit-password-protected',
						'icon' => 'svg',
					),
				),
			),
			// Required actions array.
			'recommended_actions'        => array(
				'install_label' => esc_html__('Install and Activate', 'newspaper-eye'),
				'activate_label' => esc_html__('Activate', 'newspaper-eye'),
				'deactivate_label' => esc_html__('Deactivate', 'newspaper-eye'),
				'content'            => array(
					'magical-blocks' => array(
						'title'       => __('Magical Posts Display', 'newspaper-eye'),
						'description' => __('Now you can add or update your site elements very easily by Magical Products Display. Supercharge your Elementor block with highly customizable Magical Blocks For WooCommerce.', 'newspaper-eye'),
						'plugin_slug' => 'magical-products-display',
						'id' => 'magical-posts-display'
					),
					'go-pro' => array(
						'title'       => '<a target="_blank" class="activate-now button button-danger" href="https://wpthemespace.com/product/newspaper-eye-pro/?add-to-cart=9664">' . __('UPGRADE NEWPAPER EYE PRO', 'newspaper-eye') . '</a>',
						'description' => __('You will get more frequent updates and quicker support with the Pro version.', 'newspaper-eye'),
						//'plugin_slug' => 'x-instafeed',
						'id' => 'go-pro'
					),

				),
			),
			// Free vs pro array.
			'free_pro'                => array(
				'free_theme_name'     => $xtheme_name,
				'pro_theme_name'      => $xtheme_name . __(' Pro', 'newspaper-eye'),
				'pro_theme_link'      => 'https://wpthemespace.com/product/newspaper-eye-pro/',
				/* translators: View link */
				'get_pro_theme_label' => sprintf(__('Get %s', 'newspaper-eye'), 'Newspaper Eye Pro'),
				'features'            => array(
					array(
						'title'       => esc_html__('Daring Design for Devoted Readers', 'newspaper-eye'),
						'description' => esc_html__('Newspaper Eye \'s design helps you stand out from the crowd and create an experience that your readers will love and talk about. With a flexible home page you have the chance to easily showcase appealing content with ease.', 'newspaper-eye'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Mobile-Ready For All Devices', 'newspaper-eye'),
						'description' => esc_html__('Newspaper Eye makes room for your readers to enjoy your articles on the go, no matter the device their using. We shaped everything to look amazing to your audience.', 'newspaper-eye'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Home slider', 'newspaper-eye'),
						'description' => esc_html__('Newspaper Eye gives you extra slider feature. You can create awesome home slider in this theme.', 'newspaper-eye'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Widgetized Sidebars To Keep Attention', 'newspaper-eye'),
						'description' => esc_html__('Newspaper Eye comes with a widget-based flexible system which allows you to add your favorite widgets over the Sidebar as well as on offcanvas too.', 'newspaper-eye'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Auto Set-up Feature', 'newspaper-eye'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'newspaper-eye'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Multiple Header Layout', 'newspaper-eye'),
						'description' => esc_html__('Newspaper Eye gives you extra ways to showcase your header with miltiple layout option you can change it on the basis of your requirement', 'newspaper-eye'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('One Click Demo install', 'newspaper-eye'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'newspaper-eye'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Extra Drag and drop support', 'newspaper-eye'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advanced Portfolio Filter', 'newspaper-eye'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Testimonial Carousel', 'newspaper-eye'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Diffrent Style Blog', 'newspaper-eye'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Flexible Home Page Design', 'newspaper-eye'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Pro Service Section', 'newspaper-eye'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Animation Home Text', 'newspaper-eye'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Customizer Options', 'newspaper-eye'),
						'description' => esc_html__('Advance control for each element gives you different way of customization and maintained you site as you like and makes you feel different.', 'newspaper-eye'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Pagination', 'newspaper-eye'),
						'description' => esc_html__('Multiple Option of pagination via customizer can be obtained on your site like Infinite scroll, Ajax Button On Click, Number as well as classical option are available.', 'newspaper-eye'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),

					array(
						'title'       => esc_html__('Premium Support and Assistance', 'newspaper-eye'),
						'description' => esc_html__('We offer ongoing customer support to help you get things done in due time. This way, you save energy and time, and focus on what brings you happiness. We know our products inside-out and we can lend a hand to help you save resources of all kinds.', 'newspaper-eye'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('No Credit Footer Link', 'newspaper-eye'),
						'description' => esc_html__('You can easily remove the Theme: Newspaper Eye by Newspaper Eye copyright from the footer area and make the theme yours from start to finish.', 'newspaper-eye'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
				),
			),

		);

		newspaper_eye_About::init($config);
	}

endif;

add_action('after_setup_theme', 'newspaper_eye_about_setup');

/**
 * Pro notice text
 *
 */
function newspaper_eye_pnotice_output()
{
?>
	<div class="mgadin-hero">
		<div class="mge-info-content">
			<div class="mge-info-hello">
				<?php
				$current_theme = wp_get_theme();
				$current_theme_name = $current_theme->get('Name');
				$current_user = wp_get_current_user();

				$demo_link = esc_url('https://wpthemespace.com/product/newspaper-eye-pro/');
				$pro_link = esc_url('https://wpthemespace.com/product/newspaper-eye-pro/?add-to-cart=9664');


				esc_html_e('Hello, ', 'newspaper-eye');
				echo esc_html($current_user->display_name);
				?>

				<?php esc_html_e('👋🏻', 'newspaper-eye'); ?>
			</div>
			<div class="mge-info-desc">
				<div><?php printf(esc_html__('Attention, don\'t miss out Newspaper Eye Pro version! 🚨 Upgrade to Newspaper Eye Pro today and enjoy SEO-friendly and lightweight design, lightning-fast speed optimization, more secure, premade demos, effortless one-click demo imports, and exclusive custom Elementor premium widgets. With the pro version, you can take your website to the next level and truly stand out from the competition.', 'newspaper-eye'), $current_theme_name); ?></div>
				<div class="mge-offer"><?php printf(esc_html__('Don\'t miss out on these incredible features - upgrade to Newspaper Eye Pro now! ', 'newspaper-eye'), $current_theme_name); ?></div>
			</div>
			<div class="mge-info-actions">
				<a href="<?php echo esc_url($pro_link); ?>" target="_blank" class="button button-primary upgrade-btn">
					<?php esc_html_e('Upgrade Pro', 'newspaper-eye'); ?>
				</a>
				<a href="<?php echo esc_url($demo_link); ?>" target="_blank" class="button button-primary demo-btn">
					<?php esc_html_e('View Details', 'newspaper-eye'); ?>
				</a>
				<button class="button button-info btnend"><?php esc_html_e('Dismiss this notice', 'newspaper-eye') ?></button>
			</div>

		</div>

	</div>
<?php
}
//Admin notice 
function newspaper_eye_new_optins_texts()
{
	$hide_date = get_option('newspaper_eye_infohide1');
	if (!empty($hide_date)) {
		$clickhide = round((time() - strtotime($hide_date)) / 24 / 60 / 60);
		if ($clickhide < 25) {
			return;
		}
	}
?>
	<div class="mgadin-notice notice notice-info mgadin-theme-dashboard mgadin-theme-dashboard-notice mge is-dismissible meis-dismissible">
		<?php newspaper_eye_pnotice_output(); ?>
	</div>
<?php

}
add_action('admin_notices', 'newspaper_eye_new_optins_texts');

function newspaper_eye_new_optins_texts_init()
{
	if (isset($_GET['xbnotice']) && $_GET['xbnotice'] == 1) {
		update_option('newspaper_eye_infohide1', current_time('mysql'));
	}
}
add_action('init', 'newspaper_eye_new_optins_texts_init');
