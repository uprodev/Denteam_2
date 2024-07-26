<div class="accordion-item">
	<div class="accordion-header" id="heading-<?= $args['counter'] ?>">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $args['counter'] ?>" aria-expanded="false" aria-controls="collapse1"><?= $args['title'] ?></button>
	</div>
	<div id="collapse-<?= $args['counter'] ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= $args['counter'] ?>" data-bs-parent="#accordion">
		<div class="accordion-body"><?= $args['text'] ?></div>
	</div>
</div>