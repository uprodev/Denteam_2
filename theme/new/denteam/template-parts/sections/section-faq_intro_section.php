<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="page-banner"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row align-items-end justify-content-between">
				<div class="col-md-6 col-xl-7">
					<div class="page-banner-text">

						<?php if ($title): ?>
							<h1><?= $title ?></h1>
						<?php endif ?>
						
						<?php if ($description): ?>
							<?= $description ?>
						<?php endif ?>
						
					</div>
				</div>
				<div class="col-md-6 col-xl-5">
					<div class="page-banner-cta">

						<?php if ($subtitle): ?>
							<div class="text-primary">
								<h4><?= $subtitle ?></h4>
							</div>
						<?php endif ?>
						
						<?php 
						$terms = get_terms( [
							'taxonomy' => 'faq_cat',
							'hide_empty' => false,
						] );
						?>

						<?php if ($terms): ?>
							<div class="dropdown">
								<button class="btn btn-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><?php _e('Make choice', 'Denteam') ?></button>
								<div class="dropdown-menu">
									<ul data-lenis-prevent class="dropdown-scroller">

										<?php foreach ($terms as $term): ?>
										<li>
											<a class="dropdown-item" href="#<?= $term->slug ?>">
												<img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-right-drop.svg" alt="" /><?= $term->name ?>
											</a>
										</li>
										<?php endforeach ?>
										
									</ul>
								</div>
							</div>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
		<div class="banner-element-left d-none d-xl-block"><img src="<?= get_stylesheet_directory_uri() ?>/img/banner-element-left.svg" alt="" /></div>
		<div class="banner-element-right d-none d-xl-block"><img src="<?= get_stylesheet_directory_uri() ?>/img/banner-element-right-01.svg" alt="" /></div>
	</section>

	<?php endif; ?>