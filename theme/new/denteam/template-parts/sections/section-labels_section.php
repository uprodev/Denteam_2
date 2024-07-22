<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if ($labels): ?>
		<section class="labels"<?php if($id) echo ' id="' . $id . '"' ?>>
			<div class="container-fluid">
				<div class="labels-list">

					<?php foreach ($labels as $index => $item): ?>
						<?php if ($index == 0 && $item['including_logo']): ?>
							<div class="label-centered">
								<a href="<?= $item['link'] ?>" target="_blank">
									<?= wp_get_attachment_image($item['including_logo']['ID'], 'full') ?>
								</a>
							</div>	
						<?php endif ?>
					<?php endforeach ?>
					
					<ul>

						<?php foreach ($labels as $index => $item): ?>
							<?php if ($index > 0 && $item['including_logo']): ?>
								<li>
									<a href="<?= $item['link'] ?>" target="_blank">
										<?= wp_get_attachment_image($item['including_logo']['ID'], 'full') ?>
									</a>
								</li>
							<?php endif ?>
						<?php endforeach ?>
						
					</ul>
				</div>
			</div>
		</section>
	<?php endif ?>
	

	<?php endif; ?>