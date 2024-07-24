<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="contact-info-form-section bg-light"<?php if($id) echo ' id="' . $id . '"' ?>>
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

						<?php if (is_array($contactperson) && checkArrayForValues($contactperson)): ?>
						<div class="contact-info">

							<?php if ($contactperson['image']): ?>
								<figure class="contact-image">
									<?= wp_get_attachment_image($contactperson['image']['ID'], 'full') ?>
								</figure>
							<?php endif ?>
							
							<div class="contact-inner">

								<?php if ($contactperson['title']): ?>
									<h5 class="contact-title"><?= $contactperson['title'] ?></h5>
								<?php endif ?>

								<?php if ($contactperson['telephone'] || $contactperson['email']): ?>
									<div class="links">

										<?php if ($contactperson['telephone']): ?>
											<p>
												<strong>T</strong>
												<a href="<?= $contactperson['telephone']['url'] ?>"<?php if($contactperson['telephone']['target']) echo ' target="_blank"' ?>><?= $contactperson['telephone']['title'] ?></a>
											</p>
										<?php endif ?>

										<?php if ($contactperson['email']): ?>
											<p>
												<strong>E</strong>
												<a href="<?= $contactperson['email']['url'] ?>"<?php if($contactperson['email']['target']) echo ' target="_blank"' ?>><?= $contactperson['email']['title'] ?></a>
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
<section class="block-contacts-wrapper bg-light">
	<div class="container-fluid">
		<div class="row gy-3">

			<?php if (is_array($main_contact_information) && checkArrayForValues($main_contact_information)): ?>
			<div class="col-md-6">
				<div class="contacts-box h-100">

					<?php if ($main_contact_information['title']): ?>
						<h3><?= $main_contact_information['title'] ?></h3>
					<?php endif ?>
					
					<?php if (is_array($main_contact_information['information']) && checkArrayForValues($main_contact_information['information'])): ?>
					<ul class="contacts-list">

						<?php foreach ($main_contact_information['information'] as $item): ?>
							<?php if ($item['link']): ?>
								<li>
									<a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>

										<?php if ($item['icon']): ?>
											<span class="icon"><i class="<?= $item['icon'] ?>"></i></span>
										<?php endif ?>

										<span class="text"><strong><?= $item['link']['title'] ?></strong><?= $item['text'] ?></span>
									</a>
								</li>
							<?php endif ?>
						<?php endforeach ?>
						
					</ul>
				<?php endif ?>

			</div>
		</div>
	<?php endif ?>

	<div class="col-md-6 d-md-flex flex-column justify-content-between">

		<?php if (is_array($address_and_information) && checkArrayForValues($address_and_information)): ?>
		<div class="contacts-box">
			<div class="d-xl-flex justify-content-between">

				<?php if (is_array($address_and_information['left_column']) && checkArrayForValues($address_and_information['left_column'])): ?>
				<address>

					<?php if ($address_and_information['left_column']['title']): ?>
						<strong><?= $address_and_information['left_column']['title'] ?></strong><br />
					<?php endif ?>
					
					<?= $address_and_information['left_column']['text'] ?>

				</address>
			<?php endif ?>

			<?php if (is_array($address_and_information['right_column']) && checkArrayForValues($address_and_information['right_column'])): ?>
			<div class="account-data">
				
				<?php if ($address_and_information['right_column']['title']): ?>
					<strong><?= $address_and_information['right_column']['title'] ?></strong><br />
				<?php endif ?>

				<?= $address_and_information['right_column']['text'] ?>

			</div>
		<?php endif ?>

	</div>
</div>
<?php endif ?>

<?php if (is_array($socials) && checkArrayForValues($socials)): ?>
<div class="contacts-box">
	<div class="socials">

		<?php if ($socials['title']): ?>
			<div class="h4"><?= $socials['title'] ?></div>
		<?php endif ?>
		
		<?php if (is_array($socials['items']) && checkArrayForValues($socials['items'])): ?>
		<ul>

			<?php foreach ($socials['items'] as $item): ?>
				<?php if ($item['link'] && $item['icon']): ?>
					<li>
						<a href="<?= $item['link']['url'] ?>"<?php if($item['class']) echo ' class="' . $item['class'] . '"'; if($item['link']['target']) echo ' target="_blank"'; ?>>
							<i class="<?= $item['icon'] ?>"></i>
						</a>
					</li>
				<?php endif ?>
			<?php endforeach ?>
			
		</ul>
	<?php endif ?>

</div>
</div>
<?php endif ?>

</div>
</div>
<div class="content-banner text-white">
	<div class="content-banner-image"><img src="<?= get_stylesheet_directory_uri() ?>/img/banner-14.jpg" alt="" /></div>
	<div class="content-banner-text">
		<h3>Afspraak inplannen??</h3>
	</div>
</div>
</div>
</section>

<?php endif; ?>