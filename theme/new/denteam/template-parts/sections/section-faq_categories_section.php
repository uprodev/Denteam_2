<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php 
	$terms = get_terms( [
		'taxonomy' => 'faq_cat',
		'hide_empty' => false,
	] );
	?>

	<?php if ($terms): ?>
		<section class="faq-list"<?php if($id) echo ' id="' . $id . '"' ?>>
			<div class="container-fluid">
				<div class="inner">

					<?php foreach ($terms as $index => $term): ?>
						<div class="item" id="<?= $term->slug ?>">
							<div class="row justify-content-between">
								<div class="col-md-6 col-xl-5">

									<?php if ($field = get_field('image', 'term_' . $term->term_id)): ?>
										<figure>
											<?= wp_get_attachment_image($field['ID'], 'full') ?>
										</figure>
									<?php endif ?>

								</div>
								<div class="col-md-6 align-self-center">
									<h3><?= $term->name ?></h3>
									<div class="accordion" id="accordion<?= $index ?>">

										<?php 
										$wp_query = new WP_Query(array('post_type' => 'faq', 'tax_query' => array(array('taxonomy' => 'faq_cat', 'field' => 'id', 'terms' => $term->term_id)), 'posts_per_page' => -1, 'paged' => get_query_var('paged')));
										$i = 1;
										while ($wp_query->have_posts()): $wp_query->the_post(); 
											?>

											<div class="accordion-item">
												<div class="accordion-header" id="heading<?= $index . $i ?>">
													<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index . $i ?>" aria-expanded="false" aria-controls="collapse<?= $index . $i ?>"><?php the_title() ?></button>
												</div>
												<div id="collapse<?= $index . $i ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $index . $i ?>" data-bs-parent="#accordion<?= $index ?>">
													<div class="accordion-body"><?php the_content() ?></div>
												</div>
											</div>

											<?php 
											$i++;
										endwhile; 
										wp_reset_query(); 
										?>

									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
					
				</div>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>