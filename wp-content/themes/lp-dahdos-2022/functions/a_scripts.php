<?php

/*------------------------------------*\
  Scripts e Estilos 
\*------------------------------------*/

function cal_adding_scripts() {
if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

	wp_register_script('intersection', get_template_directory_uri().'/js/intersection-observer.js', array('jquery'), '1.0', true);
    wp_enqueue_script('intersection');
    
    wp_register_script('vuejs', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.15/vue.js', array('jquery'), '1.0', true);
    wp_enqueue_script('vuejs');

    wp_register_script('userlodash', 'https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.10/lodash.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('userlodash');
    
    wp_register_script('slick', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('slick');
   
    $arquivo = get_template_directory_uri().'/js/main.js';
    $localpath = get_template_directory().'/js/main.js';
    $ver = filemtime($localpath);

	$parameters = array(
        'themeurl' => get_template_directory_uri(),
        'homeurl' => get_home_url(),
    );

	global $post;

    if (is_page_template('template-home.php')) {
        $parameters['faq'] = get_field('faq'); 
    }

    wp_register_script('main', $arquivo, array('jquery'), $ver, true);
    wp_enqueue_script('main');   
        
    wp_localize_script('main', 'parametros', $parameters );
    
}}

function cal_adding_styles() {
if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
    $arquivo = get_template_directory_uri().'/css/style.css';
    $localpath = get_template_directory().'/css/style.css';
    $ver = filemtime($localpath);
    
    wp_register_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', array(), '6.1.1', 'all');
    wp_enqueue_style('fontawesome');

    wp_register_style('slick', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css', array(), '1.0', 'all');
    wp_enqueue_style('slick');
    
    wp_register_style('stylecss', $arquivo, array(), $ver, 'all');
    wp_enqueue_style('stylecss');
    
}}

add_action( 'wp_enqueue_scripts', 'cal_adding_scripts' );
add_action('wp_enqueue_scripts', 'cal_adding_styles');

?>