<?php get_header(); ?>

<div class="tpl-page-details-behandeling">

	<?php if ( have_posts() ) :

		get_template_part( 'template-parts/content', 'builder' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</div>

<?php get_footer(); ?>