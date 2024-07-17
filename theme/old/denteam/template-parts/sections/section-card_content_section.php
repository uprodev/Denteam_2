<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<div class="vacancy-contacts">
		<div class="vacancy-contacts-text">

			<?php if ($title): ?>
				<h3><?= $title ?></h3>
			<?php endif ?>
			
			<?php if ($name): ?>
				<div class="name"><?= $name ?></div>
			<?php endif ?>
			
			<?php if ($position): ?>
				<div class="position"><?= $position ?></div>
			<?php endif ?>
			
			<?php if ($phone || $email): ?>
				<div class="links">

					<?php if ($phone): ?>
						<p>
							<a href="tel:+<?= preg_replace('/[^0-9]/', '', $phone) ?>"><i class="fa-light fa-phone"></i><?= $phone ?></a>
						</p>
					<?php endif ?>
					
					<?php if ($email): ?>
						<p>
							<a href="mailto:<?= $email ?>"><i class="fa-light fa-envelope"></i><?= $email ?></a>
						</p>	
					<?php endif ?>
					
				</div>
			<?php endif ?>
			
		</div>

		<?php if ($image): ?>
			<div class="vacancy-contacts-image d-none d-md-block">
				<?= wp_get_attachment_image($image['ID'], 'full') ?>
			</div>
		<?php endif ?>
		
	</div>

	<?php endif; ?>