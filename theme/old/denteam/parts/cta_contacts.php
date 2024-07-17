<?php if ($form = get_field('form_contact_element', 'option')): ?>
  <section class="cta-contacts">
    <div class="container-fluid">
      <div class="cta-contacts-inner">

        <?php if ($title = get_field('title_contact_element', 'option')): ?>
          <div class="title">
            <h3><?= $title ?></h3>
          </div>
        <?php endif ?>

        <div class="form">
          <?= do_shortcode('[contact-form-7 id="' . $form . '"]') ?>
        </div>

        <?php if ($image = get_field('image_contact_element', 'option')): ?>
          <div class="image d-none d-lg-block">
            <?= wp_get_attachment_image($image['ID'], 'full') ?>
          </div>
        <?php endif ?>

      </div>
    </div>
  </section>
<?php endif ?>