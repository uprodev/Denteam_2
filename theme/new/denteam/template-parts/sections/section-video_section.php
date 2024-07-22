<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

	<?php 
		$id_ = uniqid('vid-');
	?>
	<section class="video-block"<?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">

			<?php if ($title): ?>
				<div class="text-center text-primary">
					<h3><?= $title ?></h3>
				</div>
			<?php endif ?>

			<div class="video-wrapper" style="background-image:url('<?= $cover_image['url'] ?>'); background-size:cover; background-position: center; background-repeat:no-repeat;">
				<button type="button" class="video-play-modal" data-bs-toggle="modal" data-bs-target="#<?= $id_; ?>"></button>
			</div>

		</div>
		<div class="modal modal-video fade" id="<?= $id_; ?>" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><?= _e('close', 'Denteam') ?></button>
				<div class="modal-body">
				<div class="video-wrapper" style="padding-top: 0px!important;">
					<?php if ($video_type == "file" && $video): ?>
						<div class="video-wrapper">
							<video title="video" src="<?= $video['url'] ?>" controls></video>
						</div>
					<?php elseif($video_link):?>
						<iframe style="aspect-ratio:16/9" src="<?= str_replace("watch?v=", "embed/", $video_link); ?>" title="Video" width="100%" frameborder="0"></iframe>
					<?php endif;?>
					<!-- <button type="button" class="video-play"></button> -->
				</div>
				</div>
			</div>
			</div>
		</div>
	</section>
	<script>
	jQuery(document).ready(function($) {
		$(".video-block button").click(function() {
			$($(this).data("bs-target")).find("video").trigger("play");
			// $($(this).data("bs-target")).find("iframe").attr("src", $($(this).data("bs-target")).find("iframe").attr("data-src")+"&autoplay=1");
		});
	});
	</script>

	<?php endif; ?>