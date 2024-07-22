<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<div class="details-video">
		<div class="video-wrapper">

			<?php if ($image_placeholder): ?>
				<?= wp_get_attachment_image($image_placeholder['ID'], 'full') ?>
			<?php endif ?>
			
			<?php if ($link): ?>
				<button type="button" class="video-play-modal" data-bs-toggle="modal" data-bs-target="<?= $link['url'] ?>"></button>
			<?php endif ?>
			
		</div>

		<?php if ($description): ?>
			<div class="details-video-description"><?= $description ?></div>
		<?php endif ?>
		
	</div>

	<?php endif; ?>