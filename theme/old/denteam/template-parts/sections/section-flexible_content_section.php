<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>
	<?php /*var_dump($args)*/ ?>

	<section class="details-banner">
		<div class="banner-element-left d-none d-xl-block"><img src="<?= get_stylesheet_directory_uri() ?>/img/banner-element-left.svg" alt="" /></div>
		<div class="banner-element-right d-none d-xl-block"><img src="<?= get_stylesheet_directory_uri() ?>/img/banner-element-right-01.svg" alt="" /></div>
	</section>

	<section class="details">
		<div class="container-fluid">
			
			<?php if ( have_posts() ) :

				get_template_part( 'template-parts/content', 'builder_2' );

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</div>
	</section>

	<?php endif; ?>