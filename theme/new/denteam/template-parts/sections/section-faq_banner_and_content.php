<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="page-banner"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row align-items-end justify-content-between">
				<div class="col-md-6 col-xl-7">
					<div class="page-banner-text">

						<?php if ($title): ?>
							<h1 class="h2"><strong><?= $title ?></strong></h1>
						<?php endif ?>

						<?= $text ?>

					</div>
				</div>

				<?php if ($is_filter_options): ?>
					<div class="col-md-6 col-xl-5">
						<div class="page-banner-cta">

							<?php if ($filter_options_title): ?>
								<div class="text-primary">
									<h4><?= $filter_options_title ?></h4>
								</div>
							<?php endif ?>
							
							<?php 
							$terms = get_terms( [
								'taxonomy' => 'faq_cat',
							] );
							?>

							<?php if (is_array($terms)): ?>
								<div class="dropdown">
									<button class="btn btn-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><?= $filter_options_dropdown_placeholder ?></button>
									<div class="dropdown-menu">
										<ul class="dropdown-scroller">

											<?php foreach ($terms as $term): ?>
												<li>
													<a class="dropdown-item" href="#term-<?= $term->term_id ?>"><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right-drop.svg" alt="" /> <?= $term->name ?> </a>
												</li>
											<?php endforeach ?>
											
										</ul>
									</div>
								</div>
							<?php endif ?>
							
						</div>
					</div>
				<?php endif ?>

			</div>
		</div>
	</section>

	<?php if (is_array($terms)): ?>
		<section class="faq-list">
			<div class="container-fluid">
				<div class="inner">

					<?php foreach ($terms as $term): ?>							
						<div class="item" id="term-<?= $term->term_id ?>">
							<div class="row justify-content-between">

								<?php if ($field = get_field('image', 'term_' . $term->term_id)): ?>
									<div class="col-md-6 col-xl-5">
										<figure>
											<?= wp_get_attachment_image($field['ID'], 'full') ?>
										</figure>
									</div>
								<?php endif ?>
								
								<div class="col-md-6 align-self-center">
									<h3><?= $term->name ?></h3>

									<?php 
									$args = array(
										'post_type' => 'faq', 
										'posts_per_page' => -1,
										'tax_query' => array(
											array(
												'taxonomy' => 'faq_cat',
												'field'    => 'id',
												'terms'    => $term->term_id
											)
										),
										'paged' => get_query_var('paged')
									);
									$wp_query = new WP_Query($args);
									if($wp_query->have_posts()): 
										?>

										<div class="accordion" id="accordion-<?= $term->term_id ?>">

											<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
												<?php $number = $wp_query->current_post . '-' . $term->term_id ?>
												<div class="accordion-item">
													<div class="accordion-header" id="heading-<?= $number ?>">
														<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $number ?>" aria-expanded="false" aria-controls="collapse1"><?php the_title() ?></button>
													</div>
													<div id="collapse<?= $number ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $number ?>" data-bs-parent="#accordion-<?= $term->term_id ?>">
														<div class="accordion-body"><?php the_field('answer') ?></div>
													</div>
												</div>
											<?php endwhile; ?>

										</div>

										<?php 
									endif;
									wp_reset_query(); 
									?>

								</div>
							</div>
						</div>
					<?php endforeach ?>


				</div>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>