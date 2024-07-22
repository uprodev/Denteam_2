<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<div class="details-intro"<?php if($id) echo ' id="' . $id . '"' ?>>

		<?php if ($name): ?>
			<div class="subtitle"><?= $name ?></div>
		<?php endif ?>
		
		<?php if ($title): ?>
			<h1><?= $title ?></h1>
		<?php endif ?>
		
		<?php if ($text): ?>
			<?= $text ?>
		<?php endif ?>
		
		<?php if ($image): ?>
			<figure>
				<?= wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'logo-mob')) ?>

				<?php if ($alt_description): ?>
					<figcaption><?= $alt_description ?></figcaption>
				<?php endif ?>
				
			</figure>
		<?php endif ?>
		
	</div>

	<?php endif; ?>