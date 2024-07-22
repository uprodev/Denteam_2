<?php 

add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){
	register_taxonomy( 'vacancy_cat', [ 'vacancy' ], [
		'label'                 => '', 
		'labels'                => [
			'name'              => __('Vacancy categories', 'Denteam'),
			'singular_name'     => __('Vacancy Category', 'Denteam'),
			'search_items'      => __('Search Vacancy Categories', 'Denteam'),
			'all_items'         => __('All Vacancy Categories', 'Denteam'),
			'view_item '        => __('View Vacancy Category', 'Denteam'),
			'parent_item'       => __('Parent Vacancy Category', 'Denteam'),
			'parent_item_colon' => __('Parent Vacancy Category:', 'Denteam'),
			'edit_item'         => __('Edit Vacancy Category', 'Denteam'),
			'update_item'       => __('Update Vacancy Category', 'Denteam'),
			'add_new_item'      => __('Add New Vacancy Category', 'Denteam'),
			'new_item_name'     => __('New Vacancy Category Name', 'Denteam'),
			'menu_name'         => __('Vacancy Category', 'Denteam'),
			'back_to_items'     => __('← Back to Vacancy Category', 'Denteam'),
		],
		'description'           => '',
		'public'                => true,
		// 'publicly_queryable'    => null,
		// 'show_in_nav_menus'     => true,
		// 'show_ui'               => true,
		// 'show_in_menu'          => true,
		// 'show_tagcloud'         => true,
		// 'show_in_quick_edit'    => null,
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => true,
		'show_in_rest'          => null,
		'rest_base'             => null,
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );

	register_taxonomy( 'behandeling_cat', [ 'behandeling' ], [
		'label'                 => '', 
		'labels'                => [
			'name'              => __('Behandeling categories', 'Denteam'),
			'singular_name'     => __('Behandeling Category', 'Denteam'),
			'search_items'      => __('Search Behandeling Categories', 'Denteam'),
			'all_items'         => __('All Behandeling Categories', 'Denteam'),
			'view_item '        => __('View Behandeling Category', 'Denteam'),
			'parent_item'       => __('Parent Behandeling Category', 'Denteam'),
			'parent_item_colon' => __('Parent Behandeling Category:', 'Denteam'),
			'edit_item'         => __('Edit Behandeling Category', 'Denteam'),
			'update_item'       => __('Update Behandeling Category', 'Denteam'),
			'add_new_item'      => __('Add New Behandeling Category', 'Denteam'),
			'new_item_name'     => __('New Behandeling Category Name', 'Denteam'),
			'menu_name'         => __('Behandeling Category', 'Denteam'),
			'back_to_items'     => __('← Back to Behandeling Category', 'Denteam'),
		],
		'description'           => '',
		'public'                => true,
		// 'publicly_queryable'    => null,
		// 'show_in_nav_menus'     => true,
		// 'show_ui'               => true,
		// 'show_in_menu'          => true,
		// 'show_tagcloud'         => true,
		// 'show_in_quick_edit'    => null,
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => true,
		'show_in_rest'          => null,
		'rest_base'             => null,
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );

	register_taxonomy( 'specialisme_cat', [ 'specialisme' ], [
		'label'                 => '', 
		'labels'                => [
			'name'              => __('Specialisme categories', 'Denteam'),
			'singular_name'     => __('Specialisme Category', 'Denteam'),
			'search_items'      => __('Search Specialisme Categories', 'Denteam'),
			'all_items'         => __('All Specialisme Categories', 'Denteam'),
			'view_item '        => __('View Specialisme Category', 'Denteam'),
			'parent_item'       => __('Parent Specialisme Category', 'Denteam'),
			'parent_item_colon' => __('Parent Specialisme Category:', 'Denteam'),
			'edit_item'         => __('Edit Specialisme Category', 'Denteam'),
			'update_item'       => __('Update Specialisme Category', 'Denteam'),
			'add_new_item'      => __('Add New Specialisme Category', 'Denteam'),
			'new_item_name'     => __('New Specialisme Category Name', 'Denteam'),
			'menu_name'         => __('Specialisme Category', 'Denteam'),
			'back_to_items'     => __('← Back to Specialisme Category', 'Denteam'),
		],
		'description'           => '',
		'public'                => true,
		// 'publicly_queryable'    => null,
		// 'show_in_nav_menus'     => true,
		// 'show_ui'               => true,
		// 'show_in_menu'          => true,
		// 'show_tagcloud'         => true,
		// 'show_in_quick_edit'    => null,
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => true,
		'show_in_rest'          => null,
		'rest_base'             => null,
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );

	register_taxonomy( 'story_cat', [ 'story' ], [
		'label'                 => '', 
		'labels'                => [
			'name'              => __('Story Categories', 'Denteam'),
			'singular_name'     => __('Story Category', 'Denteam'),
			'search_items'      => __('Search Story Categories', 'Denteam'),
			'all_items'         => __('All Story Categories', 'Denteam'),
			'view_item '        => __('View Story Category', 'Denteam'),
			'parent_item'       => __('Parent Story Category', 'Denteam'),
			'parent_item_colon' => __('Parent Story Category:', 'Denteam'),
			'edit_item'         => __('Edit Story Category', 'Denteam'),
			'update_item'       => __('Update Story Category', 'Denteam'),
			'add_new_item'      => __('Add New Story Category', 'Denteam'),
			'new_item_name'     => __('New Story Category Name', 'Denteam'),
			'menu_name'         => __('Story Category', 'Denteam'),
			'back_to_items'     => __('← Back to Story Category', 'Denteam'),
		],
		'description'           => '',
		'public'                => true,
		// 'publicly_queryable'    => null,
		// 'show_in_nav_menus'     => true,
		// 'show_ui'               => true,
		// 'show_in_menu'          => true,
		// 'show_tagcloud'         => true,
		// 'show_in_quick_edit'    => null,
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => true,
		'show_in_rest'          => null,
		'rest_base'             => null,
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );

	register_taxonomy( 'news_cat', [ 'news' ], [
		'label'                 => '', 
		'labels'                => [
			'name'              => __('Kennisbank Categories', 'Denteam'),
			'singular_name'     => __('Kennisbank Category', 'Denteam'),
			'search_items'      => __('Search Kennisbank Categories', 'Denteam'),
			'all_items'         => __('All Kennisbank Categories', 'Denteam'),
			'view_item '        => __('View Kennisbank Category', 'Denteam'),
			'parent_item'       => __('Parent Kennisbank Category', 'Denteam'),
			'parent_item_colon' => __('Parent Kennisbank Category:', 'Denteam'),
			'edit_item'         => __('Edit Kennisbank Category', 'Denteam'),
			'update_item'       => __('Update Kennisbank Category', 'Denteam'),
			'add_new_item'      => __('Add New Kennisbank Category', 'Denteam'),
			'new_item_name'     => __('New Kennisbank Category Name', 'Denteam'),
			'menu_name'         => __('Kennisbank Category', 'Denteam'),
			'back_to_items'     => __('← Back to Kennisbank Category', 'Denteam'),
		],
		'description'           => '',
		'public'                => true,
		// 'publicly_queryable'    => null,
		// 'show_in_nav_menus'     => true,
		// 'show_ui'               => true,
		// 'show_in_menu'          => true,
		// 'show_tagcloud'         => true,
		// 'show_in_quick_edit'    => null,
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => true,
		'show_in_rest'          => null,
		'rest_base'             => null,
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );

	register_taxonomy( 'news_label', [ 'news' ], [
		'label'                 => '', 
		'labels'                => [
			'name'              => __('Kennisbank Labels', 'Denteam'),
			'singular_name'     => __('Kennisbank Label', 'Denteam'),
			'search_items'      => __('Search Kennisbank Labels', 'Denteam'),
			'all_items'         => __('All Kennisbank Labels', 'Denteam'),
			'view_item '        => __('View Kennisbank Label', 'Denteam'),
			'parent_item'       => __('Parent Kennisbank Label', 'Denteam'),
			'parent_item_colon' => __('Parent Kennisbank Label:', 'Denteam'),
			'edit_item'         => __('Edit Kennisbank Label', 'Denteam'),
			'update_item'       => __('Update Kennisbank Label', 'Denteam'),
			'add_new_item'      => __('Add New Kennisbank Label', 'Denteam'),
			'new_item_name'     => __('New Kennisbank Label Name', 'Denteam'),
			'menu_name'         => __('Kennisbank Label', 'Denteam'),
			'back_to_items'     => __('← Back to Kennisbank Label', 'Denteam'),
		],
		'description'           => '',
		'public'                => true,
		// 'publicly_queryable'    => null,
		// 'show_in_nav_menus'     => true,
		// 'show_ui'               => true,
		// 'show_in_menu'          => true,
		// 'show_tagcloud'         => true,
		// 'show_in_quick_edit'    => null,
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => true,
		'show_in_rest'          => null,
		'rest_base'             => null,
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );

	register_taxonomy( 'about-us_cat', [ 'about-us' ], [
		'label'                 => '', 
		'labels'                => [
			'name'              => __('About Us Categories', 'Denteam'),
			'singular_name'     => __('About Us Category', 'Denteam'),
			'search_items'      => __('Search About Us Categories', 'Denteam'),
			'all_items'         => __('All About Us Categories', 'Denteam'),
			'view_item '        => __('View About Us Category', 'Denteam'),
			'parent_item'       => __('Parent About Us Category', 'Denteam'),
			'parent_item_colon' => __('Parent About Us Category:', 'Denteam'),
			'edit_item'         => __('Edit About Us Category', 'Denteam'),
			'update_item'       => __('Update About Us Category', 'Denteam'),
			'add_new_item'      => __('Add New About Us Category', 'Denteam'),
			'new_item_name'     => __('New About Us Category Name', 'Denteam'),
			'menu_name'         => __('About Us Category', 'Denteam'),
			'back_to_items'     => __('← Back to About Us Category', 'Denteam'),
		],
		'description'           => '',
		'public'                => true,
		// 'publicly_queryable'    => null,
		// 'show_in_nav_menus'     => true,
		// 'show_ui'               => true,
		// 'show_in_menu'          => true,
		// 'show_tagcloud'         => true,
		// 'show_in_quick_edit'    => null,
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => true,
		'show_in_rest'          => null,
		'rest_base'             => null,
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );

	register_taxonomy( 'faq_cat', [ 'faq' ], [
		'label'                 => '', 
		'labels'                => [
			'name'              => __('FAQ Categories', 'Denteam'),
			'singular_name'     => __('FAQ Category', 'Denteam'),
			'search_items'      => __('Search FAQ Categories', 'Denteam'),
			'all_items'         => __('All FAQ Categories', 'Denteam'),
			'view_item '        => __('View FAQ Category', 'Denteam'),
			'parent_item'       => __('Parent FAQ Category', 'Denteam'),
			'parent_item_colon' => __('Parent FAQ Category:', 'Denteam'),
			'edit_item'         => __('Edit FAQ Category', 'Denteam'),
			'update_item'       => __('Update FAQ Category', 'Denteam'),
			'add_new_item'      => __('Add New FAQ Category', 'Denteam'),
			'new_item_name'     => __('New FAQ Category Name', 'Denteam'),
			'menu_name'         => __('FAQ Category', 'Denteam'),
			'back_to_items'     => __('← Back to FAQ Category', 'Denteam'),
		],
		'description'           => '',
		'public'                => true,
		// 'publicly_queryable'    => null,
		// 'show_in_nav_menus'     => true,
		// 'show_ui'               => true,
		// 'show_in_menu'          => true,
		// 'show_tagcloud'         => true,
		// 'show_in_quick_edit'    => null,
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => true,
		'show_in_rest'          => null,
		'rest_base'             => null,
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
	
}

add_action( 'init', 'register_post_types' );
function register_post_types(){

	register_post_type( 'vacancy', [
		'label'  => null,
		'labels' => [
			'name'               => __('Vacancies', 'Denteam'), 
			'singular_name'      => __('Vacancy', 'Denteam'), 
			'add_new'            => __('Add', 'Denteam'),
			'add_new_item'       => __('Add', 'Denteam'), 
			'edit_item'          => __('Edit', 'Denteam'),
			'new_item'           => __('New', 'Denteam'), 
			'view_item'          => __('View', 'Denteam'), 
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, 
		// 'exclude_from_search' => null, 
		// 'show_ui'             => null, 
		// 'show_in_nav_menus'   => null, 
		'show_in_menu'           => null, 
		// 'show_in_admin_bar'   => null, 
		'show_in_rest'        => null, 
		'rest_base'           => null, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-nametag',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', 
		//'map_meta_cap'      => null, 
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'behandeling', [
		'label'  => null,
		'labels' => [
			'name'               => __('Behandelingen', 'Denteam'), 
			'singular_name'      => __('Behandeling', 'Denteam'), 
			'add_new'            => __('Add', 'Denteam'),
			'add_new_item'       => __('Add', 'Denteam'), 
			'edit_item'          => __('Edit', 'Denteam'),
			'new_item'           => __('New', 'Denteam'), 
			'view_item'          => __('View', 'Denteam'), 
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, 
		// 'exclude_from_search' => null, 
		// 'show_ui'             => null, 
		// 'show_in_nav_menus'   => null, 
		'show_in_menu'           => null, 
		// 'show_in_admin_bar'   => null, 
		'show_in_rest'        => null, 
		'rest_base'           => null, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-nametag',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', 
		//'map_meta_cap'      => null, 
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'specialisme', [
		'label'  => null,
		'labels' => [
			'name'               => __('Specialismen ', 'Denteam'), 
			'singular_name'      => __('Specialisme', 'Denteam'), 
			'add_new'            => __('Add', 'Denteam'),
			'add_new_item'       => __('Add', 'Denteam'), 
			'edit_item'          => __('Edit', 'Denteam'),
			'new_item'           => __('New', 'Denteam'), 
			'view_item'          => __('View', 'Denteam'), 
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, 
		// 'exclude_from_search' => null, 
		// 'show_ui'             => null, 
		// 'show_in_nav_menus'   => null, 
		'show_in_menu'           => null, 
		// 'show_in_admin_bar'   => null, 
		'show_in_rest'        => null, 
		'rest_base'           => null, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-nametag',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', 
		//'map_meta_cap'      => null, 
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'story', [
		'label'  => null,
		'labels' => [
			'name'               => __('Stories', 'Denteam'), 
			'singular_name'      => __('Story', 'Denteam'), 
			'add_new'            => __('Add', 'Denteam'),
			'add_new_item'       => __('Add', 'Denteam'), 
			'edit_item'          => __('Edit', 'Denteam'),
			'new_item'           => __('New', 'Denteam'), 
			'view_item'          => __('View', 'Denteam'), 
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, 
		// 'exclude_from_search' => null, 
		// 'show_ui'             => null, 
		// 'show_in_nav_menus'   => null, 
		'show_in_menu'           => null, 
		// 'show_in_admin_bar'   => null, 
		'show_in_rest'        => null, 
		'rest_base'           => null, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-testimonial',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', 
		//'map_meta_cap'      => null, 
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'news', [
		'label'  => null,
		'labels' => [
			'name'               => __('Kennisbank', 'Denteam'), 
			'singular_name'      => __('Kennisbank', 'Denteam'), 
			'add_new'            => __('Add', 'Denteam'),
			'add_new_item'       => __('Add', 'Denteam'), 
			'edit_item'          => __('Edit', 'Denteam'),
			'new_item'           => __('New', 'Denteam'), 
			'view_item'          => __('View', 'Denteam'), 
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, 
		// 'exclude_from_search' => null, 
		// 'show_ui'             => null, 
		// 'show_in_nav_menus'   => null, 
		'show_in_menu'           => null, 
		// 'show_in_admin_bar'   => null, 
		'show_in_rest'        => null, 
		'rest_base'           => null, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-admin-site-alt3',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', 
		//'map_meta_cap'      => null, 
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'about-us', [
		'label'  => null,
		'labels' => [
			'name'               => __('About us', 'Denteam'), 
			'singular_name'      => __('About us', 'Denteam'), 
			'add_new'            => __('Add', 'Denteam'),
			'add_new_item'       => __('Add', 'Denteam'), 
			'edit_item'          => __('Edit', 'Denteam'),
			'new_item'           => __('New', 'Denteam'), 
			'view_item'          => __('View', 'Denteam'), 
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, 
		// 'exclude_from_search' => null, 
		// 'show_ui'             => null, 
		// 'show_in_nav_menus'   => null, 
		'show_in_menu'           => null, 
		// 'show_in_admin_bar'   => null, 
		'show_in_rest'        => null, 
		'rest_base'           => null, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-groups',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', 
		//'map_meta_cap'      => null, 
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'FAQ', [
		'label'  => null,
		'labels' => [
			'name'               => __('FAQ', 'Denteam'), 
			'singular_name'      => __('FAQ', 'Denteam'), 
			'add_new'            => __('Add', 'Denteam'),
			'add_new_item'       => __('Add', 'Denteam'), 
			'edit_item'          => __('Edit', 'Denteam'),
			'new_item'           => __('New', 'Denteam'), 
			'view_item'          => __('View', 'Denteam'), 
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, 
		// 'exclude_from_search' => null, 
		// 'show_ui'             => null, 
		// 'show_in_nav_menus'   => null, 
		'show_in_menu'           => null, 
		// 'show_in_admin_bar'   => null, 
		'show_in_rest'        => null, 
		'rest_base'           => null, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-format-chat',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', 
		//'map_meta_cap'      => null, 
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}