<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<section class="page-banner"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row gy-3">
				<div class="col-md-6">
					<div class="contacts-box">

						<?php if ($title): ?>
							<h3><?= $title ?></h3>
						<?php endif ?>
						
						<?php if ($contact_info): ?>
							<ul class="contacts-list">

								<?php foreach ($contact_info as $item): ?>
									<?php 
									switch ($item['choose_an_option']) {
										case 'Tel': ?>
										<?php if ($item['tel']): ?>
											<li>
												<a href="tel:+<?= preg_replace('/[^0-9]/', '', $item['tel']) ?>">

													<?php if ($item['icon']): ?>
														<span class="icon">
															<?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
														</span>
													<?php endif ?>
													
													<span class="text">
														<strong><?= $item['tel'] ?></strong>

														<?php if ($item['description']): ?>
															<?= $item['description'] ?>
														<?php endif ?>
														
													</span>
												</a>
											</li>
										<?php endif ?>
										<?php break;
										case 'Email': ?>
										<?php if ($item['email']): ?>
											<li>
												<a href="mailto:<?= $item['email'] ?>">
													
													<?php if ($item['icon']): ?>
														<span class="icon">
															<?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
														</span>
													<?php endif ?>
													
													<span class="text">
														<strong><?= $item['email'] ?></strong>

														<?php if ($item['description']): ?>
															<?= $item['description'] ?>
														<?php endif ?>
														
													</span>
												</a>
											</li>
										<?php endif ?>
										<?php break;
										case 'Text': ?>
										<li>
											<a href="<?= $item['link'] ?>" target="_blank">
												
												<?php if ($item['icon']): ?>
													<span class="icon">
														<?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
													</span>
												<?php endif ?>
												
												<span class="text">
													<strong><?= $item['text'] ?></strong>

													<?php if ($item['description']): ?>
														<?= $item['description'] ?>
													<?php endif ?>
													
												</span>
											</a>
										</li>
										<?php break;
										
										default:
											// code...
										break;
									}
									?>
								<?php endforeach ?>
								
							</ul>
						<?php endif ?>
						
					</div>
				</div>
				<div class="col-md-6">
					
					<?php if ($form): ?>
						<div class="contacts-box">

							<?php if ($form_title): ?>
								<h3><?= $form_title ?></h3>
							<?php endif ?>

							<?= do_shortcode('[contact-form-7 id="' . $form . '"]') ?>
						</div>
					<?php endif ?>
					
				</div>
				<div class="col-md-6">

					<?php if ($company_information): ?>
						<div class="contacts-box">
							<div class="d-xl-flex">

								<?php if ($company_information['address']): ?>
									<address>
										<?= $company_information['address'] ?>
									</address>
								<?php endif ?>
								
								<?php if ($company_information['information']): ?>
									<div class="account-data">
										<?= $company_information['information'] ?>
									</div>
								<?php endif ?>
								
							</div>
						</div>
					<?php endif ?>
					
				</div>
				<div class="col-md-6">

					<?php if ($social_media): ?>
						<div class="contacts-box">
							<div class="socials">

								<?php if ($social_media['title']): ?>
									<div class="h4"><?= $social_media['title'] ?></div>
								<?php endif ?>
								
								<?php if ($social_media['socials']): ?>
									<ul>

										<?php foreach ($social_media['socials'] as $item): ?>
											<?php if ($item['icon']): ?>
												<li>
													<a href="<?= $item['link'] ?>">
														<?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
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
		</div>
		<div class="banner-element-left d-none d-xl-block"><img src="<?= get_stylesheet_directory_uri() ?>/img/banner-element-left.svg" alt="" /></div>
		<div class="banner-element-right d-none d-xl-block"><img src="<?= get_stylesheet_directory_uri() ?>/img/banner-element-right-01.svg" alt="" /></div>
	</section>

	<?php endif; ?>