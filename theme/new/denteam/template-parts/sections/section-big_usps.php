<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="list-cards-icons"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<div class="text">

						<?php if ($title): ?>
							<h2><?= $title ?></h2>
						<?php endif ?>

						<?= $text ?>

					</div>
				</div>

				<?php if (is_array($items) && checkArrayForValues($items)): ?>
				<div class="col-lg-8">
					<ul>

						<?php foreach ($items as $item): ?>
							<li>

								<?php if ($item['image_or_icon'] == 'Image' && $item['image']): ?>
									<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
								<?php endif ?>

								<?php if ($item['image_or_icon'] == 'Icon' && $item['icon']): ?>
									<span class="icon"><i class="<?= $item['icon'] ?>"></i></span>
								<?php endif ?>
								
								<?php if ($item['title']): ?>
									<h3><?= $item['title'] ?></h3>
								<?php endif ?>
								
								<?= $item['text'] ?>

							</li>
						<?php endforeach ?>

					</ul>
				</div>
			<?php endif ?>

			<?php if ($button): ?>
				<div class="text-center">
					<a href="<?= $button['url'] ?>" class="content-link"<?php if($button['target']) echo ' target="_blank"' ?>><?= $button['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt=""></a>
				</div>
			<?php endif ?>

		</div>
	</div>
</section>

<?php endif; ?>