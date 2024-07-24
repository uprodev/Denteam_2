<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php if (is_array($steps) && checkArrayForValues($steps)): ?>
	<section class="steps"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-lg-5 d-none d-md-block">

					<?php if ($title): ?>
						<h3><?= $title ?></h3>
					<?php endif ?>

					<div class="steps-slider-pagination">
						<ul>

							<?php foreach ($steps as $index => $item): ?>
								<li data-slide="<?= $index ?>"<?php if($index == 0) echo ' class="active"' ?>><span><?php if($index < 9) echo '0'; echo $index + 1; ?></span><?= $item['menu_title'] ?></li>
							<?php endforeach ?>

						</ul>
						<div class="d-none d-md-block">
							<a href="#" class="content-link steps-slider-next"><?= $next_button ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-7">
					<div class="steps-slider">
						<div class="swiper-wrapper">

							<?php foreach ($steps as $item): ?>
								<div class="swiper-slide">

									<?php if ($item['image']): ?>
										<figure>
											<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
										</figure>
									<?php endif ?>

									<?php if ($item['content_title']): ?>
										<div class="slide-title"><?= $item['content_title'] ?></div>
									<?php endif ?>

									<?= $item['text'] ?>

								</div>
							<?php endforeach ?>

						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>

<?php endif; ?>