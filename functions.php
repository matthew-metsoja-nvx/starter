<?php
/**
 * functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sandbox
 */

if (!defined('THE_DIR_PATH', )) {
    define('THE_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('THE_DIR_URI', )) {
    define('THE_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

function my_addScriptsAndStyles()
{
    wp_enqueue_style('mainCSS', THE_DIR_URI . '/dist/style.css', [], 'none', 'all');

    //todo change this this in production and comment out link above.
    // wp_enqueue_style( 'bundled-styles', get_stylesheet_uri().'dist/style.bundle.css', [], filemtime(THE_DIR_PATH. '/dist/style.bundle.css', 'all' );

    // // Javascript and libraries (webpack is bundling behind the scenes)
    // register the script so that we can use it as a dependency. (we set to true so that it loads into the footer.)
    wp_register_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/gsap.min.js', [], 1.0, true);
    wp_register_script('gsap-CSSRule', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/CSSRulePlugin.min.js', [], 1.0, true);
    wp_register_script('gsap-TextPlugin', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/TextPlugin.min.js', [], 1.0, true);
    wp_register_script('gsap-Scroll2', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/ScrollToPlugin.min.js', [], 1.0, true);
    wp_register_script('gsap-ScrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/ScrollTrigger.min.js', [], 1.0, true);

    wp_register_script('lottie-player', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js', [], 1.0, true);

    wp_register_script('sandbox-vendor', THE_DIR_URI . '/dist/vendor.js', ['gsap-js', 'gsap-CSSRule', 'gsap-TextPlugin', 'gsap-Scroll2', 'gsap-ScrollTrigger', 'lottie-player'], 1.0, true);

    wp_enqueue_script('sandbox-main', THE_DIR_URI . '/dist/main.js', ['sandbox-vendor'], filemtime(THE_DIR_PATH . '/dist/main.js'), true);
};

add_action('wp_enqueue_scripts', 'my_addScriptsAndStyles');