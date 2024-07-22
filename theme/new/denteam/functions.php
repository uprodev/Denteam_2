<?php 

// show_admin_bar( false );

include 'inc/post_types.php';
include 'inc/filters.php';

add_action('wp_enqueue_scripts', 'load_style_script');
function load_style_script(){
	wp_enqueue_style('dt-fontawesome', get_template_directory_uri() . '/fontawesome/css/all.min.css');
	wp_enqueue_style('dt-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('dt-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css');
	//wp_enqueue_style('dt-locomotive', get_template_directory_uri() . '/css/locomotive-scroll.min.css');
	wp_enqueue_style('dt-swiper', get_template_directory_uri() . '/css/swiper-bundle.min.css');
	wp_enqueue_style('dt-styles', get_template_directory_uri() . '/css/styles.css');
	wp_enqueue_style('dt-media', get_template_directory_uri() . '/css/media.css');
	wp_enqueue_style('dt-style', get_template_directory_uri() . '/style.css');

	wp_enqueue_script('jquery');
	wp_enqueue_script('dt-bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), false, true);
	wp_enqueue_script('dt-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array(), false, true);
	wp_enqueue_script('dt-lenis', get_template_directory_uri() . '/js/lenis.js', array(), false, true);
	wp_enqueue_script('dt-swiper', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), false, true);
	wp_enqueue_script('dt-main', get_template_directory_uri() . '/js/main.js', array(), false, true);
	wp_enqueue_script('dt-add', get_template_directory_uri() . '/js/add.js', array(), false, true);
}


add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header' => 'Header menu',
		'languages' => 'Languages menu',
	) );
});


add_theme_support( 'title-tag' );
add_theme_support('html5');
add_theme_support( 'post-thumbnails' ); 


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Main settings',
		'menu_title'	=> 'Theme options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


add_filter('wpcf7_autop_or_not', '__return_false');


function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDiyT05YehIdz2LrV-QOeRa5M18WfKtlnY');
}
add_action('acf/init', 'my_acf_init');


function override_mce_options($initArray) {
	$opts = '*[*]';
	$initArray['valid_elements'] = $opts;
	$initArray['extended_valid_elements'] = $opts;
	return $initArray;
}
add_filter('tiny_mce_before_init', 'override_mce_options');



function custom_language_switcher(){
	$languages = icl_get_languages('skip_missing=0&orderby=id&order=desc');
	if(!empty($languages)){ ?>

		<div class="header-languages">

			<?php if ($languages['en']['active'] === '1'): ?>
				<a href="<?= $languages['nl']['url'] ?>">
					<img src="<?= get_stylesheet_directory_uri() ?>/img/language-nl.svg" alt="" /><span>DUTCH</span>
				</a>
			<?php else: ?>
				<a href="<?= $languages['en']['url'] ?>">
					<img src="<?= get_stylesheet_directory_uri() ?>/img/language-en.svg" alt="" /><span>ENGLISH</span>
				</a>
			<?php endif ?>
			
		</div>

	<?php }
}


add_action('wp_enqueue_scripts', 'wpcf7_recaptcha_no_refill', 15, 0);
function wpcf7_recaptcha_no_refill() {
	$service = WPCF7_RECAPTCHA::get_instance();
	if ( ! $service->is_active() ) { return; }
	wp_add_inline_script('contact-form-7', 'wpcf7.cached = 0;', 'before' );
}


add_filter('acfe/flexible/thumbnail', 'my_acf_layout_thumbnail', 10, 3);
function my_acf_layout_thumbnail($thumbnail, $field, $layout){

    // Must return an URL or Attachment ID
	return get_stylesheet_directory_uri() . '/img/acf/' . $layout['name'] . '.png';

}


function checkArrayForValues($arr) {
    foreach ($arr as $value) {
        if (is_array($value)) {
            if (checkArrayForValues($value)) {
                return true;
            }
        } else {
            if (!empty($value)) {
                return true;
            }
        }
    }
    return false;
}


function add_class_content($string, $ul_class='', $p_class='', $h_class='') {

    if (str_contains($string, '<h') && $h_class) {
        foreach (range(1,6) as $i) {
            $from[] = "<h$i";
            $to[] = '<h'. $i .' class="'. $h_class . '"';
        }
    } 
    if (str_contains($string, '<p') && $p_class){
        $from[] = "<p";
        $to[] = '<p class="'. $p_class . '"';
    }
    if (str_contains($string, '<ul') && $ul_class){
        $from[] = "<ul";
        $to[] = '<ul class="'. $ul_class . '"';
    }

    return str_replace ($from, $to, $string);

}