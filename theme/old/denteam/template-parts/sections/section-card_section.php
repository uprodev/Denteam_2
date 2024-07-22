<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="vacancy-details">
		<div class="container-fluid">
			<div class="vacancy-details-inner">
				<div class="vacancy-details-text">

					<?php if ($title): ?>
						<h3><?= $title ?></h3>
					<?php endif ?>
					
					<?php if ($list_detail): ?>
						<ul>

							<?php foreach ($list_detail as $item): ?>
								<li>

									<?php if ($item['title']): ?>
										<strong><?= $item['title'] ?></strong>
									<?php endif ?>
									
									<?php if ($item['description']): ?>
										<?= $item['description'] ?>
									<?php endif ?>
									
								</li>
							<?php endforeach ?>
							
						</ul>
					<?php endif ?>
					
				</div>

				<?php if ($image): ?>
					<div class="vacancy-details-image d-none d-md-block">
						<?= wp_get_attachment_image($image['ID'], 'full') ?>
					</div>
				<?php endif ?>
				
			</div>
		</div>
	</section>

	<?php endif; ?>