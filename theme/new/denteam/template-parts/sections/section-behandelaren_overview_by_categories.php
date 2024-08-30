<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php 
	$taxonomy = 'behandelaar_cat';
	$is_default = $custom_default == 'Default';
	$is_custom = $custom_default == 'Custom' && $custom;

	if ($is_default) {
		$terms = get_terms( [
			'taxonomy' => $taxonomy,
		] );
		if($terms) $terms = wp_list_pluck($terms, 'term_id');
	}

	if ($is_custom) {
		$terms = [];
		foreach ($custom as $post_) {
			$post_terms = wp_get_object_terms($post_->ID, $taxonomy);
			$post_terms_ids = wp_list_pluck($post_terms, 'term_id');
			foreach ($post_terms_ids as $post_terms_id) {
				if(!in_array($post_terms_id, $terms)) $terms[] = $post_terms_id;
			}
		}
	}
	?>

	<?php if (($is_default || $is_custom) && is_array($terms)): ?>
	<section class="team-wrapper bg-light">
		<div class="container-fluid">

			<?php if ($title): ?>
				<h3><?= $title ?></h3>
			<?php endif ?>

			<?php foreach ($terms as $index => $term_id): ?>

				<?php 
				$args = array(
					'post_type' => 'behandelaar', 
					'posts_per_page' => -1,
					'post_status' => 'publish',
					'tax_query' => array(
						array(
							'taxonomy' => $taxonomy,
							'field'    => 'id',
							'terms'    => $term_id
						)
					),
					'paged' => get_query_var('paged')
				);
				if ($is_custom) {
					$args['post__in'] = wp_list_pluck($custom, 'ID');
					$args['orderby'] = 'post__in';
				}
				$wp_query = new WP_Query($args);
				if($wp_query->have_posts()): 
					?>

					<div class="team-headline text-center">
						<h3><?= get_term($term_id)->name ?></h3>
					</div>
					<div class="row gy-7">

						<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
							<div class="col-sm-6 col-md-4 col-lg-3">
								<?php get_template_part('parts/content', 'team', ['link_text' => $link_text]) ?>
							</div>
						<?php endwhile; ?>

					</div>

					<?php if ($is_cta_block && $index == 0 && is_array($cta_block) && checkArrayForValues($cta_block)): ?>
					<div class="denteam-card">
						<div class="row justify-content-between">
							<div class="col-left">

								<?php if ($cta_block['title']): ?>
									<h2><?= $cta_block['title'] ?></h2>
								<?php endif ?>
								
								<?= $cta_block['text'] ?>

							</div>

							<?php if (is_array($cta_block['contact_info']) && checkArrayForValues($cta_block['contact_info'])): ?>
							<div class="col-right">
								<div class="contact-info">

									<?php if ($cta_block['contact_info']['image']): ?>
										<figure class="contact-image">
											<?= wp_get_attachment_image($cta_block['contact_info']['image']['ID'], 'full') ?>
										</figure>
									<?php endif ?>
									
									<div class="contact-inner">

										<?php if ($cta_block['contact_info']['title']): ?>
											<h5 class="contact-title"><?= $cta_block['contact_info']['title'] ?></h5>
										<?php endif ?>

										<div class="links">

											<?php if ($cta_block['contact_info']['telephone']): ?>
												<p>
													<strong>T</strong>
													<a href="<?= $cta_block['contact_info']['telephone']['url'] ?>"<?php if($cta_block['contact_info']['telephone']['target']) echo ' target="_blank"' ?>><?= $cta_block['contact_info']['telephone']['title'] ?></a>
												</p>
											<?php endif ?>

											<?php if ($cta_block['contact_info']['email']): ?>
												<p>
													<strong>E</strong>
													<a href="<?= $cta_block['contact_info']['email']['url'] ?>"<?php if($cta_block['contact_info']['email']['target']) echo ' target="_blank"' ?>><?= $cta_block['contact_info']['email']['title'] ?></a>
												</p>
											<?php endif ?>

										</div>
									</div>
								</div>
							</div>
						<?php endif ?>

					</div>
				</div>
			<?php endif ?>

			<?php 
		endif;
		wp_reset_query(); 
		?>

	<?php endforeach ?>

</div>
</section>
<?php endif ?>

<?php endif; ?>