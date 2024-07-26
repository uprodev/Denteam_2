<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="contact-info-form-section bg-light bg-bot-white mb-xl-6<?php require_once(get_template_directory() . '/inc/backgrounds.php') ?>">
		<div class="container-fluid">

			<?php if ($image): ?>
				<figure class="contact-info-form-section-image">
					<div class="sticker">
						<img src="<?= get_stylesheet_directory_uri() ?>/img/sticker.svg" alt="" />
					</div>
					<?= wp_get_attachment_image($image['ID'], 'full') ?>
				</figure>
			<?php endif ?>


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

								<?php if ($contact_info['telephone'] || $contact_info['email']): ?>
									<div class="links">

										<?php if ($contact_info['telephone']): ?>
											<p>
												<strong>T</strong>
												<a href="<?= $contact_info['telephone']['url'] ?>"<?php if($contact_info['telephone']['target']) echo ' target="_blank"' ?>><?= $contact_info['telephone']['title'] ?></a>
											</p>
										<?php endif ?>

										<?php if ($contact_info['email']): ?>
											<p>
												<strong>E</strong>
												<a href="<?= $contact_info['email']['url'] ?>"<?php if($contact_info['email']['target']) echo ' target="_blank"' ?>><?= $contact_info['email']['title'] ?></a>
											</p>
										<?php endif ?>
										
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