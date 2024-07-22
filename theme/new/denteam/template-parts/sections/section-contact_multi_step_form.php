<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="contact-info-form-section bg-light bg-top-white bg-bot-white pb-0"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="denteam-card">
				<div class="row">
					<div class="col-lg-5">

						<?php if ($title): ?>
							<h2><?= $title ?></h2>
						<?php endif ?>

						<?php if ($text): ?>
							<div class="description"><?= $text ?></div>
						<?php endif ?>

						<?php if (is_array($contact_info) && checkArrayForValues($contact_info)): ?>
						<div class="contact-info">

							<?php if ($contact_info['image']): ?>
								<figure class="contact-image">
									<?= wp_get_attachment_image($contact_info['image']['ID'], 'full') ?>
								</figure>
							<?php endif ?>
							
							<div class="contact-inner">

								<?php if ($contact_info['title']): ?>
									<h5 class="contact-title"><?= $contact_info['title'] ?></h5>
								<?php endif ?>

								<?php if (is_array($contact_info['items']) && checkArrayForValues($contact_info['items'])): ?>
								<div class="links">

									<?php foreach ($contact_info['items'] as $item): ?>
										<p>

											<?php if ($item['letter']): ?>
												<strong><?= $item['letter'] ?></strong>
											<?php endif ?>
											
											<?php if ($item['link']): ?>
												<a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a>
											<?php endif ?>

										</p>
									<?php endforeach ?>
									
								</div>
							<?php endif ?>

						</div>
					</div>
				<?php endif ?>

			</div>

			<?php if ($form): ?>
				<div class="col-lg-7 ps-xl-0">
					<div class="form-wrapper" data-step="1">
						<div class="form-step-num"><span id="formStepInd" data-step="1"></span>/3</div>
						<div class="form-step-progress"><span></span></div>
						<?= do_shortcode('[contact-form-7 id="' . $form . '"]') ?>
					</div>
				</div>
			<?php endif ?>
			
		</div>
	</div>
</div>
</section>

<?php endif; ?>