<?php
require_once get_template_directory() . '/vendor/autoload.php';
// Get customizer options
use SuperbThemesCustomizer\CustomizerControls;

// New color variables
if (method_exists(CustomizerControls::class, "OverwriteDefault")) {
    CustomizerControls::OverwriteDefault(CustomizerControls::NAVIGATION_LAYOUT_STYLE, "navigation_layout_style_choice_large");
    CustomizerControls::OverwriteDefault(CustomizerControls::SITE_IDENTITY_HIDE_TAGLINE, "0");
    CustomizerControls::OverwriteDefault('--superb-pixels-primary', "#325ce9");
    CustomizerControls::OverwriteDefault('--superb-pixels-primary-dark', "#2e54d7");
    CustomizerControls::OverwriteDefault('--superb-pixels-secondary', "#eeeeee");
    CustomizerControls::OverwriteDefault('--superb-pixels-secondary-dark', "#e3e3e3");
    CustomizerControls::OverwriteDefault(CustomizerControls::BLOGFEED_COLUMNS_STYLE, "blogfeed_three_colums_masonry");
    CustomizerControls::OverwriteDefault(CustomizerControls::BLOGFEED_HIDE_SIDEBAR, "1");
    CustomizerControls::OverwriteDefault(CustomizerControls::SINGLE_HIDE_RELATED_POSTS, "0");

}


// Get stylesheet
add_action('wp_enqueue_scripts', 'elegant_writer_enqueue_styles');
function elegant_writer_enqueue_styles()
{
    wp_enqueue_style('elegant-writer-parent-style', get_template_directory_uri() . '/style.css');
}



// New fonts
function elegant_writer_enqueue_assets()
{
    // Include the file.
    require_once get_theme_file_path('webfont-loader/wptt-webfont-loader.php');
    // Load the webfont.
    wp_enqueue_style(
        'elegant-writer-fonts',
        wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=auto'),
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'elegant_writer_enqueue_assets');

function elegant_writing_custom_header_setup()
{
    add_theme_support('custom-header', apply_filters('elegant_writing_custom_header_args', array(
        'default-image'          => '',
        'default-text-color'     => '000000',
        'flex-width'         => true,
        'flex-height'        => true,
        'width'              => 1200,
        'height'             => 500,
        'default-image'         => '',
        'wp-head-callback'       => 'elegant_writing_header_style',
    )));
}
add_action('after_setup_theme', 'elegant_writing_custom_header_setup', 999999);

if (!function_exists('elegant_writing_header_style')) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see elegant_writing_custom_header_setup().
     */
    function elegant_writing_header_style()
    {
        $header_text_color = get_header_textcolor();
        $header_image = get_header_image();

        /*
         * If no custom options for text are set, let's bail.
         * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
         */
        if (empty($header_image) && $header_text_color == get_theme_support('custom-header', 'default-text-color')) {
            return;
        }

        // If we get this far, we have custom styles. Let's do this.
        ?>
        <style type="text/css">
            .site-title a,
            .site-description,
            .logofont,
            .site-title,
            .logodescription {
                color: #<?php echo esc_attr($header_text_color); ?>;
            }

            <?php if (!display_header_text()) : ?>.logofont,
            .logodescription {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
                display: none;
            }

            <?php
        endif;

        if (!display_header_text()) : ?>.logofont,
        .site-title,
        p.logodescription {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
            display: none;
        }

        <?php
    else :
        ?>.site-title a,
        .site-title,
        .site-description,
        .logodescription {
            color: #<?php echo esc_attr($header_text_color); ?>;
        }

    <?php endif; ?>
</style>
<?php
}
endif;
