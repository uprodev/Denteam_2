<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="map"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-6 col-xl-7 p-xl-0">

					<?php if ($field = $default ? get_field('map_hotspot', 'option') : $map): ?>
						<div class="map-image"><?= do_shortcode($field) ?></div>
					<?php endif ?>
					
				</div>
				<div class="col-md-6 col-xl-5">
					<div class="text">

						<?php if ($field = $default ? get_field('title_hotspot', 'option') : $title): ?>
							<h2><?= $field ?></h2>
						<?php endif ?>

						<?php if ($field = $default ? get_field('text_hotspot', 'option') : $text): ?>
							<?= $field ?>
						<?php endif ?>

						<?php if ($field = $default ? get_field('cta_link_hotspot', 'option') : $cta_link): ?>
							<a href="<?= $field['url'] ?>" class="btn btn-primary"<?php if($field['target']) echo ' target="_blank"' ?>>
								<span><?= $field['title'] ?></span>
								<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" />
							</a>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>