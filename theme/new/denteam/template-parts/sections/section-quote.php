<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<div class="quote-wrapper"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="quote-text">

			<?php if ($quote): ?>
				<blockquote><?= $quote ?></blockquote>
			<?php endif ?>
			
			<?php if ($name): ?>
				<div class="quote-name"><?= $name ?></div>
			<?php endif ?>
			
			<?php if ($function): ?>
				<div class="quote-position"><?= $function ?></div>
			<?php endif ?>
			
		</div>

		<?php if ($image): ?>
			<figure class="quote-image d-none d-md-block">
				<?= wp_get_attachment_image($image['ID'], 'full') ?>
			</figure>
		<?php endif ?>
		
	</div>

	<?php endif; ?>