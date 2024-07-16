<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if ($link): ?>
		<div class="btn-wrapper">
			<div class="container-fluid">
				<div class="text-center mb-5">
					<a href="<?= $link['url'] ?>" class="btn btn-primary"<?php if($link['target']) echo ' target="_blank"' ?>><span><?= $link['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></a>
				</div>
			</div>
		</div>
	<?php endif ?>	

	<?php endif; ?>