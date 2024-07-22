<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="text-with-headline text-with-headline--faq">
		<div class="container-fluid">
			<div class="row">
				<div class="headline">
					<div class="inner">

						<?php if ($field = $default ? get_field('title_faqs', 'option') : $title): ?>
							<h2><?= $field ?></h2>
						<?php endif ?>

						<?php if ($field = $default ? get_field('text_faqs', 'option') : $subtitle): ?>
							<?= $field ?>
						<?php endif ?>

						<?php if ($field = $default ? get_field('cta_link_faqs', 'option') : $link): ?>
							<a href="<?= $field['url'] ?>" class="content-link"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle-white.svg" alt="" /></a>
						<?php endif ?>

					</div>
				</div>
				<div class="text">

					<?php
					$featured_posts = $default ? get_field('faqs', 'option') : $faqs;
					if($featured_posts): ?>

						<div class="inner">
							<div class="accordion" id="accordion">

								<?php foreach($featured_posts as $index => $post): 

									setup_postdata($post); ?>
									<div class="accordion-item">
										<div class="accordion-header" id="heading<?= $index + 1 ?>">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index + 1 ?>" aria-expanded="false" aria-controls="collapse<?= $index + 1 ?>"><?php the_title() ?></button>
										</div>
										<div id="collapse<?= $index + 1 ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $index + 1 ?>" data-bs-parent="#accordion">
											<div class="accordion-body"><?php the_content() ?></div>
										</div>
									</div>
								<?php endforeach; ?>

								<?php wp_reset_postdata(); ?>

							</div>
						</div>

					<?php endif; ?>

				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>