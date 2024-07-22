<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="details"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="details-content text-block">
				
				<?php if ( have_posts() ) :

					get_template_part( 'template-parts/content', 'builder_2' );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
				
			</div>
		</div>
	</section>
	

	<?php endif; ?>