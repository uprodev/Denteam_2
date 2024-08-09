<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if ($text): ?>
		<div class="details-content"<?php if($id) echo ' id="' . $id . '"' ?>>
			<?= $text ?>
		</div>
	<?php endif ?>

	<?php endif; ?>