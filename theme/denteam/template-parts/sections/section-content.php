<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if ($text): ?>
		<div class="details-content text-block">
			<?= $text ?>
		</div>
	<?php endif ?>

	<?php endif; ?>