<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if ($is_cards && is_array($cards) && checkArrayForValues($cards)): ?>
	<section class="contact-cards<?php require_once(get_template_directory() . '/inc/backgrounds.php') ?>"<?php if($id) echo ' id="' . $id . '"' ?>>

		<div class="container-fluid">
			<div class="row">

				<?php foreach ($cards as $item): ?>
					<?php if ($item['link']): ?>
						<div class="col-md-4">
							<div class="contact-card">
								<a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>

									<?php if ($item['icon']): ?>
										<span class="icon"><i class="<?= $item['icon'] ?>"></i></span>
									<?php endif ?>

									<?php if ($item['title']): ?>
										<h4><?= $item['title'] ?></h4>
									<?php endif ?>

									<p><?= $item['link']['title'] ?></p>
								</a>
							</div>
						</div>
					<?php endif ?>
				<?php endforeach ?>
				
			</div>
		</div>
	</section>
<?php endif ?>

<section class="text-columns bg-light">
	<div class="container-fluid">
		<div class="row">

			<?php if (is_array($left_column) && checkArrayForValues($left_column)): ?>
			<div class="col-md-6">

				<?php if ($left_column['title']): ?>
					<h3><?= $left_column['title'] ?></h3>
				<?php endif ?>
				
				<?= $left_column['text'] ?>

				<?php if ($left_column['button']): ?>
					<a href="<?= $left_column['button']['url'] ?>" class="btn btn-primary"<?php if($left_column['button']['target']) echo ' target="_blank"' ?>><span><?= $left_column['button']['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt=""></a>
				<?php endif ?>

			</div>
		<?php endif ?>

		<?php if (is_array($right_column) && checkArrayForValues($right_column)): ?>
		<div class="col-md-6">

			<?php if ($right_column['title']): ?>
				<h3><?= $right_column['title'] ?></h3>
			<?php endif ?>

			<?= $right_column['text'] ?>

			<?php if ($right_column['button']): ?>
				<a href="<?= $right_column['button']['url'] ?>" class="btn btn-primary"<?php if($right_column['button']['target']) echo ' target="_blank"' ?>><span><?= $right_column['button']['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt=""></a>
			<?php endif ?>

		</div>
	<?php endif ?>

</div>
</div>
</section>

<?php endif; ?>