<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if ($text): ?>
		<section class="text-block"<?php if($background) echo ' style="background-color: ' . $background . ';"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
			<div class="container-fluid">
				<?= $text ?>
			</div>
		</section>
	<?php endif ?>
	
	<?php endif; ?>