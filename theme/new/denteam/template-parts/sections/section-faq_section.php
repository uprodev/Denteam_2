<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php 
	$is_default = $custom_default == 'Default' && $default;
	$is_custom = $custom_default == 'Custom' && is_array($custom) && checkArrayForValues($custom);
	?>

	<?php if ($is_default || $is_custom): ?>
		<section class="text-with-headline text-with-headline--faq"<?php if($id) echo ' id="' . $id . '"' ?>>
			<div class="container-fluid">
				<div class="row">
					<div class="headline text-white">
						<div class="inner">

							<?php if ($title): ?>
								<h3><?= $title ?></h3>
							<?php endif ?>

							<?= $text ?>

							<?php if ($link): ?>
								<a href="<?= $link['url'] ?>" class="content-link"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle-white.svg" alt="" /></a>
							<?php endif ?>

						</div>
					</div>
					<div class="text">
						<div class="inner">
							<div class="accordion" id="accordion">

								<?php if ($is_default): ?>
									<?php foreach($default as $index => $post): 

										global $post;
										setup_postdata($post); ?>
										<?php get_template_part('parts/content', 'faq', ['counter' => $index + 1, 'title' => get_the_title(), 'text' => get_field('answer')]) ?>
									<?php endforeach; ?>

									<?php wp_reset_postdata(); ?>
								<?php else: ?>
									<?php foreach($custom as $index => $item):  ?>
										<?php get_template_part('parts/content', 'faq', ['counter' => $index + 1, 'title' => $item['question'], 'text' => $item['answer']]) ?>
									<?php endforeach; ?>
								<?php endif ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php endif; ?>