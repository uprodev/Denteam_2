  <?php if (($form = get_field('form_contact_element', 'option')) && (get_field('is_footer_contact_section') || is_404())): ?>
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

<footer class="footer footer--with-cta">
  <div class="container-fluid">

    <?php if( have_rows('social_media', 'option') ): ?>
      <?php while( have_rows('social_media', 'option') ): the_row(); ?>

        <div class="socials">

          <?php if ($field = get_sub_field('title')): ?>
            <div class="h4"><?= $field ?></div>
          <?php endif ?>

          <?php if( have_rows('image_and_link') ): ?>

            <ul>

              <?php while( have_rows('image_and_link') ): the_row(); ?>

                <?php if ($field = get_sub_field('image')): ?>
                  <li>
                    <a href="<?php the_sub_field('link') ?>" target="_blank" title="<?= explode(".com", explode("www.", get_sub_field('link'))[1])[0]; ?>">
                      <?= wp_get_attachment_image($field['ID'], 'full') ?>
                    </a>
                  </li>
                <?php endif ?>

              <?php endwhile; ?>

            </ul>

          <?php endif; ?>

        </div>

      <?php endwhile; ?>
    <?php endif; ?>

    <div class="row">
      <div class="col-md-6 col-lg-4">

        <?php if ($field = get_field('footer_logo', 'option')): ?>
          <div class="f-logo d-none d-lg-block">
            <a href="<?php echo get_home_url(); ?>">
              <?= wp_get_attachment_image($field['ID'], 'full') ?>
            </a>
          </div>
        <?php endif ?>

        <address>
          <p>

            <?php if ($field = get_field('footer_column_1', 'option')['column_title']): ?>
              <strong><?= $field ?></strong><br />
            <?php endif ?>

            <?php if ($field = get_field('footer_column_1', 'option')['address']): ?>
              <?= $field ?>
            <?php endif ?>

          </p>
        </address>
        <div class="f-contacts">

          <?php if ($field = get_field('footer_column_1', 'option')['email']): ?>
            <p>
              <a href="maito:<?= $field ?>"> <span>E:</span><?= $field ?></a>
            </p>
          <?php endif ?>

          <?php if ($field = get_field('footer_column_1', 'option')['telephone']): ?>
            <p>
              <a href="tel:+<?= preg_replace('/[^0-9]/', '', $field) ?>"> <span>T:</span><?= $field ?></a>
            </p>
          <?php endif ?>

        </div>
      </div>
      <div class="col-md-6 col-lg-8">
        <div class="row">
          <div class="col-lg-4">
            <nav class="f-nav">

              <?php if( have_rows('footer_column_2', 'option') ): ?>
                <?php while( have_rows('footer_column_2', 'option') ): the_row(); ?>

                  <?php if ($field = get_sub_field('column_title')): ?>
                    <div class="f-nav-title"><?= $field ?></div>
                  <?php endif ?>

                  <?php if( have_rows('menu_items') ): ?>

                    <ul>

                      <?php while( have_rows('menu_items') ): the_row(); ?>

                        <?php if ($field = get_sub_field('link')): ?>
                          <li>
                            <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
                          </li>
                        <?php endif ?>

                      <?php endwhile; ?>

                    </ul>

                  <?php endif; ?>

                <?php endwhile; ?>
              <?php endif; ?>

            </nav>
          </div>
          <div class="col-lg-4">
            <nav class="f-nav">

              <?php if( have_rows('footer_column_3', 'option') ): ?>
                <?php while( have_rows('footer_column_3', 'option') ): the_row(); ?>

                  <?php if ($field = get_sub_field('column_title')): ?>
                    <div class="f-nav-title"><?= $field ?></div>
                  <?php endif ?>

                  <?php if( have_rows('menu_items') ): ?>

                    <ul>

                      <?php while( have_rows('menu_items') ): the_row(); ?>

                        <?php if ($field = get_sub_field('link')): ?>
                          <li>
                            <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
                          </li>
                        <?php endif ?>

                      <?php endwhile; ?>

                    </ul>

                  <?php endif; ?>

                <?php endwhile; ?>
              <?php endif; ?>

            </nav>
          </div>
          <div class="col-lg-4">
            <nav class="f-nav">

              <?php if( have_rows('footer_column_4', 'option') ): ?>
                <?php while( have_rows('footer_column_4', 'option') ): the_row(); ?>

                  <?php if ($field = get_sub_field('column_title')): ?>
                    <div class="f-nav-title"><?= $field ?></div>
                  <?php endif ?>

                  <?php if( have_rows('menu_items') ): ?>

                    <ul>

                      <?php while( have_rows('menu_items') ): the_row(); ?>

                        <?php if ($field = get_sub_field('link')): ?>
                          <li>
                            <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
                          </li>
                        <?php endif ?>

                      <?php endwhile; ?>

                    </ul>

                  <?php endif; ?>

                <?php endwhile; ?>
              <?php endif; ?>

            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if( have_rows('footer_bottom_menu', 'option') ): ?>
    <?php while( have_rows('footer_bottom_menu', 'option') ): the_row(); ?>

      <?php if( have_rows('menu_items') ): ?>

        <div class="f-bottom">
          <div class="container-fluid">
            <ul>

              <?php while( have_rows('menu_items') ): the_row(); ?>

                <?php if ($field = get_sub_field('link')): ?>
                  <li>
                    <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
                  </li>
                <?php endif ?>

              <?php endwhile; ?>

            </ul>
          </div>
        </div>

      <?php endif; ?>

    <?php endwhile; ?>
  <?php endif; ?>

</footer>

<?php if ($link = get_field('link_fixed', 'option')): ?>
  <div class="contact-block-fixed" data-scroll data-scroll-sticky data-scroll-target="#scroll-container">
    
      <div class="close-button"><i class="fa-solid fa-xmark"></i></div>

      <?php if ($image = get_field('image_fixed', 'option')): ?>
        <figure>
          <?= wp_get_attachment_image($image['ID'], 'full') ?>
        </figure>
      <?php endif ?>

      <?php if ($title = get_field('title_fixed', 'option')): ?>
        <h4><?= $title ?></h4>
      <?php endif ?>

    <a href="<?= $link['url'] ?>"<?php if($link['target']) echo ' target="_blank"' ?>>
      <div class="subtitle"><?= $link['title'] ?></div>
    </a>
  </div>
<?php endif ?>

</main>

<?php if ($field = get_field('quiz_modal', 'option')): ?>
  <div class="modal fade" id="testModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><?php _e('close', 'Denteam') ?></button>
        <div class="modal-body">
          <?= do_shortcode($field) ?>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>

<?php if ($field = get_field('form_modal', 'option')): ?>
  <div class="modal fade" id="applyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><?php _e('close', 'Denteam') ?></button>
        <?= do_shortcode('[contact-form-7 id="' . $field . '" html_class="modal-body"]') ?>
        <script>
        jQuery(document).ready(function($) {
         $("#location option").remove();
         <?php
          $options = '<option value="">'.__('Welke locatie?', 'Denteam').'</option>';
          while(have_rows('form_locations')): the_row();
            $loc = get_sub_field('location');
            $options.='<option value="'.$loc.'">'.$loc.'</option>';
          endwhile;
        ?>
        $('#location').append('<?= $options ?>');
        $("#hours option").remove();
         <?php
          $options = '<option value="">'.__('Aantal uren', 'Denteam').'</option>';
          while(have_rows('form_hours')): the_row();
            $hours = get_sub_field('hours');
            $options.='<option value="'.$hours.'">'.$hours.'</option>';
          endwhile;
        ?>
        $('#hours').append('<?= $options ?>');
        });
        </script>
      </div>
    </div>
  </div>
<?php endif ?>

<?php if (is_array(get_field('sections')[0]) && get_field('sections')[0]['sections']): ?>
  <?php foreach (get_field('sections')[0]['sections'] as $row): ?>
    <?php if ($row['acf_fc_layout'] == 'video_element' && $row['video'] && $row['link']): ?>
      <div class="modal modal-video fade" id="<?= mb_substr($row['link']['url'], 1) ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><?= _e('close', 'Denteam') ?></button>
            <div class="modal-body">
              <div class="video-wrapper" style="padding-top: 0px!important;">
                <?php if ($row['video_type'] == "file" && $row['video']): ?>
                  <div class="video-wrapper">
                    <video src="<?= $row['video']['url'] ?>"></video>
                    <button type="button" class="video-play"></button>
                  </div>
                  <?php elseif($row['video_link']):?>
                    <iframe style="aspect-ratio:16/9" src="<?= str_replace("watch?v=", "embed/", $row['video_link']); ?>" title="Video" width="100%" frameborder="0"></iframe>
                <?php endif;?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif ?>
  <?php endforeach ?>
<?php endif ?>

<?php wp_footer(); ?>
<script>
jQuery(document).ready(function($) {
  // setTimeout(function() {
    $(".map .images_wrap img").attr("alt", "<?= __('Kaart van Nederland', 'denteam') ?>");
    $(".pins_image").each(function() {
      $(this).attr("alt", $(this).parent().data('html').replace(/<\/?[^>]+(>|$)/g, "").replace('Bekijk praktijk', ''));
    });
  // }, 500);
});
</script>
</body>
</html>