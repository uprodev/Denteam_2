<?php get_header(); ?>

<div class="tpl-page-details">

	<?php if (get_the_content()): ?>
		<div class="block-text-simple">
			<div class="container-fluid">
				<h1><?php the_title() ?></h1>
				<?php the_post_thumbnail('full') ?>
				<?php the_content() ?>
			</div>
		</div>
	<?php endif ?>

	<?php if ( have_posts() ) :

		get_template_part( 'template-parts/content', 'builder' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</div>

<?php get_footer(); ?>