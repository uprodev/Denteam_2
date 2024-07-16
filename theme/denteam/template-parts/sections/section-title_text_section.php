<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="text-with-headline<?= $title_right ? ' text-with-headline--text-left' : ' text-with-headline--text-right' ?>">
		<div class="container-fluid">
			<div class="row">

				<?php if ($title): ?>
					<div class="headline">
						<div class="inner">
							<h2><?= $title ?></h2>
						</div>
					</div>
				<?php endif ?>
				
				<div class="text">
					<div class="inner">

						<?php if ($text): ?>
							<?= $text ?>
						<?php endif ?>
						
						<?php if ($link): ?>
							<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="<?= $link['url'] ?>"><span><?= $link['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></button>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>