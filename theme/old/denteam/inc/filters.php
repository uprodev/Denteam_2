<?php 

add_action('wp_ajax_filter_vacancies', 'filter_vacancies');
add_action('wp_ajax_nopriv_filter_vacancies', 'filter_vacancies');
function filter_vacancies(){

	$args = array(
		'post_type' => 'vacancy',
		'posts_per_page' => 9,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_status' => 'publish',
		'suppress_filters' => false
	);

		// for taxonomies / categories
		if(isset($_GET['vacancy_cat']) && ($_GET['vacancy_cat'] !== "all")) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'vacancy_cat',
					'field' => 'slug',
					'terms' => $_GET['vacancy_cat'],
				),
			);
		} 

	$query = new WP_Query( $args );

	if( $query->have_posts() ) :
		$i = 1;
		while( $query->have_posts() ): $query->the_post(); ?>

			<div class="col-md-6 col-lg-4">
				<?php get_template_part('parts/content', 'vacancy'); ?>
			</div>

			<?php if ($i == 6): ?>
				<div class="col-12">
					<?php get_template_part('parts/matchtest_section'); ?>
				</div>
			<?php endif ?>
			
			<?php $i++;
		endwhile;
		wp_reset_postdata(); ?>

		<?php if ( $query->max_num_pages > 1 ) { ?>
			<div class="text-center mt-6 btn_more_vacancies_wrap">
				
				<script> var this_page = 1; </script>

				<a class="content-link btn_more_vacancies" href="#"
				data-param-posts='<?php echo serialize($query->query_vars); ?>'
				data-max-pages='<?php echo $query->max_num_pages; ?>'
				data-tpl=<?= $post_type; ?>><?php _e('LOAD MORE ITEMS', 'Denteam') ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
			</div>
		<?php } ?>

	<?php else :
		_e('No posts found', 'Denteam');
	endif;

	die();
}



add_action('wp_ajax_filter_stories', 'filter_stories');
add_action('wp_ajax_nopriv_filter_stories', 'filter_stories');
function filter_stories(){

	$args = array(
		'post_type' => 'story',
		'posts_per_page' => 9,
	);

		// for taxonomies / categories
	if(isset($_GET['story_cat']))
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'story_cat',
				'field' => 'slug',
				'terms' => $_GET['story_cat'],
			),
		);

	$query = new WP_Query( $args );

	if( $query->have_posts() ) :
		$i = 1;
		while( $query->have_posts() ): $query->the_post(); ?>

			<div class="col-md-6 col-lg-4">
				<?php get_template_part('parts/content', 'story'); ?>
			</div>

			<?php if ($i == 6): ?>
				<div class="col-12">
					<?php get_template_part('parts/cta_contacts'); ?>
				</div>
			<?php endif ?>
			
			<?php $i++;
		endwhile;
		wp_reset_postdata(); ?>

		<?php if ( $query->max_num_pages > 1 ) { ?>
			<div class="text-center mt-6 btn_more_stories_wrap">
				
				<script> var this_page = 1; </script>

				<a class="content-link btn_more_stories" href="#"
				data-param-posts='<?php echo serialize($query->query_vars); ?>'
				data-max-pages='<?php echo $query->max_num_pages; ?>'
				data-tpl=<?= $post_type; ?>><?php _e('LOAD MORE ITEMS', 'Denteam') ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
			</div>
		<?php } ?>

	<?php else :
		_e('No posts found', 'Denteam');
	endif;

	die();
}



add_action('wp_ajax_filter_news', 'filter_news');
add_action('wp_ajax_nopriv_filter_news', 'filter_news');
function filter_news(){

	$args = array(
		'post_type' => 'news',
		'posts_per_page' => 9,
	);

		// for taxonomies / categories
	if(isset($_GET['news_cat']))
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'news_cat',
				'field' => 'slug',
				'terms' => $_GET['news_cat'],
			),
		);

	$query = new WP_Query( $args );

	if( $query->have_posts() ) :
		$i = 1;
		while( $query->have_posts() ): $query->the_post(); ?>

			<div class="col-md-6 col-lg-4">
				<?php get_template_part('parts/content', 'news'); ?>
			</div>

			<?php if ($i == 6): ?>
				<div class="col-12">
					<?php get_template_part('parts/cta_contacts'); ?>
				</div>
			<?php endif ?>
			
			<?php $i++;
		endwhile;
		wp_reset_postdata(); ?>

		<?php if ( $query->max_num_pages > 1 ) { ?>
			<div class="text-center mt-6 btn_more_news_wrap">
				
				<script> var this_page = 1; </script>

				<a class="content-link btn_more_news" href="#"
				data-param-posts='<?php echo serialize($query->query_vars); ?>'
				data-max-pages='<?php echo $query->max_num_pages; ?>'
				data-tpl=<?= $post_type; ?>><?php _e('LOAD MORE ITEMS', 'Denteam') ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
			</div>
		<?php } ?>

	<?php else :
		_e('No posts found', 'Denteam');
	endif;

	die();
}



add_action('wp_ajax_more_vacancies', 'more_vacancies');
add_action('wp_ajax_nopriv_more_vacancies', 'more_vacancies');
function more_vacancies () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	//$args['posts_per_page'] = 3;
	$args['paged'] = $_POST['page'] + 1;

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<div class="col-md-6 col-lg-4">
				<?php get_template_part('parts/content', 'vacancy') ?>
			</div>

		<?php }
		die();
	}
}



add_action('wp_ajax_more_stories', 'more_stories');
add_action('wp_ajax_nopriv_more_stories', 'more_stories');
function more_stories () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	//$args['posts_per_page'] = 3;
	$args['paged'] = $_POST['page'] + 1;

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<div class="col-md-6 col-lg-4">
				<?php get_template_part('parts/content', 'story') ?>
			</div>

		<?php }
		die();
	}
}



add_action('wp_ajax_more_news', 'more_news');
add_action('wp_ajax_nopriv_more_news', 'more_news');
function more_news () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	//$args['posts_per_page'] = 3;
	$args['paged'] = $_POST['page'] + 1;

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<div class="col-md-6 col-lg-4">
				<?php get_template_part('parts/content', 'news') ?>
			</div>

		<?php }
		die();
	}
}