<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if (is_array($links) && checkArrayForValues($links)): ?>
	<section class="links-grid"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="wrapper">

				<?php foreach ($links as $item): ?>
					<?php if ($item['bold_text_and_link']): ?>
						<div class="item">
							<a href="<?= $item['bold_text_and_link']['url'] ?>" class="btn btn--secondary btn--with-arrow"<?php if($item['bold_text_and_link']['target']) echo ' target="_blank"' ?>>
								<span><?= $item['bold_text_and_link']['title'] ?></span>

								<?php if ($item['subtitle']): ?>
									<h4><?= $item['subtitle'] ?></h4>
								<?php endif ?>

							</a>
						</div>
					<?php endif ?>
				<?php endforeach ?>
				
			</div>
		</div>
	</section>
<?php endif ?>

<?php endif; ?>