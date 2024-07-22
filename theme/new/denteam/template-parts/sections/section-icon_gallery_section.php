<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if ($icon_gallery): ?>
		<section class="icons-list d-none d-md-block"<?php if($id) echo ' id="' . $id . '"' ?>>
			<div class="container-fluid">
				<div class="row gy-6 justify-content-center">

					<?php foreach ($icon_gallery as $item): ?>
						<div class="col-3">
							<div class="icons-list-item">

								<?php if ($item['icon']): ?>
									<span class="icon">
										<i class="<?= $item['icon'] ?>"></i>
									</span>
								<?php endif ?>
								
								<?php if ($item['link']): ?>
									<h4><?= $item['link']['title'] ?></h4>
									<a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?php _e('READ MORE', 'Denteam') ?></a>
								<?php endif ?>

							</div>
						</div>
					<?php endforeach ?>
					
				</div>

				<?php if ($link): ?>
					<div class="text-center">
						<a href="<?= $link['url'] ?>" class="content-link"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
					</div>
				<?php endif ?>

			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>