<?php 
define('SUA_THEME_URL', get_template_directory_uri());
define('SUA_THEME_JS_URL', SUA_THEME_URL . '/js');
define('SUA_THEME_CSS_URL', SUA_THEME_URL . '/dest');
define('SUA_THEME_IMG_URL', SUA_THEME_URL . '/img');
define('SUA_THEME_DIR', get_template_directory());

// Đăng ký css cho theme
add_action('wp_enqueue_scripts', 'zendvn_theme_register_style');

function zendvn_theme_register_style(){
	global $wp_styles;
	$cssUrl = get_template_directory_uri() . '/dest';
	wp_register_style('sua_theme_customizer', $cssUrl . '/style.min.css',array(),'1.0');
    wp_enqueue_style('sua_theme_customizer');
    wp_register_style('sua_theme_customizerFont', $cssUrl . '/fonts.css',array(),'1.0');
    wp_enqueue_style('sua_theme_customizerFont');
    wp_register_style('sua_theme_customizerStyleLib', $cssUrl . '/stylelibs.min.css',array(),'1.0');
	wp_enqueue_style('sua_theme_customizerStyleLib');
}

// Xóa jquery cho theme
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( &$scripts){
    if(!is_admin()){
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.2.1' );
    }
}

// Đăng ký jquery cho themes
add_action('wp_enqueue_scripts', 'sua_theme_register_js');

function sua_theme_register_js(){
    
    wp_register_script('myjs1', SUA_THEME_CSS_URL . '/jsmain.min.js',array('jquery'),'1.0',true);
	wp_enqueue_script('myjs1');

	wp_register_script('myjs', SUA_THEME_JS_URL . '/main.js',array('jquery'),'1.0',true);
	wp_enqueue_script('myjs');

}

// Tạo menu cho trang admin
add_action( "admin_menu", "addMenuPage" );
add_action( "admin_init", "register_setting_and_fields" );
function addMenuPage()
{
    add_menu_page( "My Setting Page", "My Setting", "manage_options","sua_setting_page", "settingPage");
}
function settingPage()
{
    # code...
    require_once "admin_template/settingPage.html";
}
function register_setting_and_fields()
{
    # code...
    register_setting( "sua_options", "sua_name", "validate_setting");
    add_settings_field( "sua_new_title", "Title", "newTitleInput","sua_setting_page");
}
function validate_setting()
{
    # code...
}
function newTitleInput()
{
    # code...
    echo '<input name="sua_name[sua_new_title]" type="text" value="">';
}