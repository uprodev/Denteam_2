<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if ($text): ?>
		<?= $text ?>
	<?php endif ?>

	<?php endif; ?>