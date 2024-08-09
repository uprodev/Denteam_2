<?php get_header(); ?>

<div<?php if(get_field('height_404', 'option') == 'Full') echo ' class="tpl-page-short"' ?>>
	<section class="page-banner page-banner--image-right">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="page-banner-text">

						<?php if ($field = get_field('title_404', 'option')): ?>
							<h1 class="h2"><?= $field ?></h1>
						<?php endif ?>

						<?php if ($field = get_field('description_404', 'option')): ?>
							<?= $field ?>
						<?php endif ?>

						<?php if ($field = get_field('link_404', 'option')): ?>
							<a href="<?= $field['url'] ?>" class="btn btn-primary"<?php if($field['target']) echo ' target="_blank"' ?>>
								<span><?= $field['title'] ?></span>
								<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" />
							</a>
						<?php endif ?>

					</div>
				</div>
				<div class="col-md-6">

					<?php if ($field = get_field('image_404', 'option')): ?>
						<div class="page-banner-image">
							<?= wp_get_attachment_image($field['ID'], 'full') ?>
						</div>
					<?php endif ?>

				</div>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>