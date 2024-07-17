<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if ($link): ?>
		<div class="text-center mt-8 mb-5">
			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="<?= $link['url'] ?>"><span><?= $link['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></button>
		</div>
	<?php endif ?>

	<?php endif; ?>