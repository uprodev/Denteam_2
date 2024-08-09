<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if ($image): ?>
		<div class="details-content"<?php if($id) echo ' id="' . $id . '"' ?>>
			<figure>
				<?= wp_get_attachment_image($image['ID'], 'full') ?>

				<?php if ($text): ?>
					<figcaption><?= $text ?></figcaption>
				<?php endif ?>
				
			</figure>
		</div>
	<?php endif ?>

	<?php endif; ?>