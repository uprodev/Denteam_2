<?php 

$actions = [
	'filter_vacancies',
	'filter_stories',
	'filter_news',
	'more_vacancies',
	'more_stories',
	'more_news',
	'filter_by_term',
	'more_posts',
	'load_team',
	'load_about_us',
];
foreach ($actions as $action) {
	add_action("wp_ajax_{$action}", $action);
	add_action("wp_ajax_nopriv_{$action}", $action);
}


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


function filter_news(){

	$args = array(
		'post_type' => 'news',
		'post_status' => 'publish',
		'posts_per_page' => 9,
	);

		// for taxonomies / categories
	if(isset($_GET['news_cat']))
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $_GET['news_cat'],
			),
		);

	$query = new WP_Query( $args );

	if( $query->have_posts() ) :
		$i = 1; ?>

		<div class="row gy-4" id="response_more_news">

			<?php while( $query->have_posts() ): $query->the_post(); ?>

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

		</div>

		<?php if ( $query->max_num_pages > 1 ) { ?>
			<div class="text-center mt-8 btn_more_news_wrap">

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

function filter_by_term(){

	$args  = array(
		'post_type' => $_GET['post_type'],
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => $_GET['taxonomy'],
				'field'    => 'id',
				'terms'    => $_GET['term']
			)
		),
		'posts_per_page' => 9,
		'paged' => get_query_var('paged')
	);

	$wp_query = new WP_Query($args);
	?>

	<?php if ($wp_query->have_posts()): ?>

		<div class="row gy-5" id="response_more_posts">

			<?php while($wp_query->have_posts()): $wp_query->the_post(); ?>
				<div class="col-md-6 col-lg-4">
					<?php get_template_part('parts/content', 'about_us', ['subtitle' => $custom_post_type]) ?>
				</div>
			<?php endwhile;?>

		</div>

		<?php if($wp_query->max_num_pages > 1):?>
			<script> var this_page = 1; </script>

			<div class="text-center mt-8">
				<a href="#" class="content-link content-link-sm more_posts" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'>MEER ITEMS LADEN<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
			</div>

		<?php endif;?>

	<?php endif ?>

	<?php 

	die();

}


function more_posts () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<div class="col-md-6 col-lg-4">
				<?php 
				$subtitle = get_field('card_subtitle') ?: $custom_post_type;
				get_template_part('parts/content', 'about_us', ['subtitle' => $subtitle]);
				?>
			</div>

		<?php }
	}
	wp_reset_query(); 
	die();
}


function load_team () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<div class="col-sm-6 col-md-4 col-lg-3">
				<?php get_template_part('parts/content', 'team') ?>
			</div>

		<?php }
	}
	wp_reset_query(); 
	die();
}


function load_about_us () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<div class="col-md-6 col-lg-4">
				<?php get_template_part('parts/content', 'about_us') ?>
			</div>

		<?php }
	}
	wp_reset_query(); 
	die();
}