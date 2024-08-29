<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if (is_array($gallery) && checkArrayForValues($gallery)): ?>
	<div class="details-content block-wide">
		<div class="row">

			<?php foreach ($gallery as $item): ?>
				<?php if ($item['image']): ?>
					<div class="col-md-6 col-lg">
						<figure>
							<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>

							<?php if ($item['text']): ?>
								<figcaption><?= $item['text'] ?></figcaption>
							<?php endif ?>

						</figure>
					</div>
				<?php endif ?>
			<?php endforeach ?>
			
		</div>
	</div>
<?php endif ?>

<?php endif; ?>