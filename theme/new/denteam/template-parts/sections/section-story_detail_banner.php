<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="details-banner"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="details-intro">

				<?php if ($subtitle): ?>
					<div class="subtitle"><?= $subtitle ?></div>
				<?php endif ?>
				
				<?php if ($title): ?>
					<h1 class="h2 fw-bold"><?= $title ?></h1>
				<?php endif ?>
				
				<?= $text ?>

			</div>
		</div>
	</section>

	<?php endif; ?>