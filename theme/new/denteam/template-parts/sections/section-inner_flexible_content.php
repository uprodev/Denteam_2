<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

  <?php if ($blocks): ?>
   <section class="details text-block<?php if($is_overlap) echo ' overlap-top' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
    <div class="container-fluid">

      <?php 
      foreach ($blocks as $item):

        switch ($item['acf_fc_layout']) {

          case 'image_block':
          ?>

          <?php if ($item['image']): ?>
            <div class="details-content<?php if($item['container_width'] == 'Big') echo ' block-wide' ?>">
              <figure>
                <?= wp_get_attachment_image($item['image']['ID'], 'full') ?>

                <?php if ($item['text']): ?>
                  <figcaption><?= $item['text'] ?></figcaption>
                <?php endif ?>
                
              </figure>
            </div>
          <?php endif ?>                

          <?php 
          break;

          case 'list_items_block':
          ?>

          <?php if (is_array($item['items']) && checkArrayForValues($item['items'])): ?>
          <div class="details-content<?php if($item['container_width'] == 'Big') echo ' block-wide'; if($item['is_white_spacing_top']) echo ' pt-4'; if($item['is_white_spacing_bottom']) echo ' pb-4'; ?>">

            <?php if ($item['title']): ?>
              <h3><?= $item['title'] ?></h3>
            <?php endif ?>
            
            <ul>

              <?php foreach ($item['items'] as $item_2): ?>

                <?php if ($item_2['text_link'] == 'Text' && $item_2['text']): ?>
                  <li><?= $item_2['text'] ?></li>
                <?php endif ?>

                <?php if ($item_2['text_link'] == 'Link' && $item_2['link']): ?>
                  <li>
                    <a href="<?= $item_2['link']['url'] ?>"<?php if($item_2['link']['target']) echo ' target="_blank"' ?>><?= $item_2['link']['title'] ?></a>
                  </li>
                <?php endif ?>
                
              <?php endforeach ?>
              
            </ul>
          </div> 
        <?php endif ?>             

        <?php 
        break;

        case 'text_block':
        ?>

        <?php if ($item['text']): ?>
          <div class="details-content<?php if($item['container_width'] == 'Big') echo ' block-wide'; if($item['is_white_spacing_top']) echo ' pt-4'; if($item['is_white_spacing_bottom']) echo ' pb-4'; ?>"><?= $item['text'] ?></div>
        <?php endif ?>                

        <?php 
        break;

        case 'quote_block':
        ?>

        <div class="details-content<?php if($item['container_width'] == 'Big') echo ' block-wide'; if($item['is_white_spacing_top']) echo ' pt-4'; if($item['is_white_spacing_bottom']) echo ' pb-4'; ?>">
          <div class="quote-wrapper">
            <div class="quote-text">

              <?php if ($item['quote']): ?>
                <blockquote><?= $item['quote'] ?></blockquote>
              <?php endif ?>

              <?php if ($item['name']): ?>
                <div class="quote-name"><?= $item['name'] ?></div>
              <?php endif ?>

              <?php if ($item['function']): ?>
                <div class="quote-position"><?= $item['function'] ?></div>
              <?php endif ?>

            </div>

            <?php if ($item['image']): ?>
              <figure class="quote-image d-none d-md-block">
                <?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
              </figure>
            <?php endif ?>

          </div>
        </div>                

        <?php 
        break;

        case 'call_to_action_block':
        ?>

        <div class="details-content<?php if($item['container_width'] == 'Big') echo ' block-wide'; if($item['is_white_spacing_top']) echo ' pt-4'; if($item['is_white_spacing_bottom']) echo ' pb-4'; ?>">
          <div class="cta-help">
            <div class="cta-help-inner">

              <?php if ($item['image']): ?>
                <div class="image d-none d-lg-block">
                  <?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
                </div>
              <?php endif ?>

              <div class="text">

                <?php if ($item['title']): ?>
                  <h3><?= $item['title'] ?></h3>
                <?php endif ?>

                <?= $item['text'] ?>

                <?php if ($item['button']): ?>
                  <a href="<?= $item['button']['url'] ?>" class="tn btn-primary"<?php if($item['button']['target']) echo ' target="_blank"' ?>><span><?= $item['button']['title'] ?></span><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/arrow-btn.svg" alt="" /></a>
                <?php endif ?>

              </div>
            </div>
          </div>
        </div>                

        <?php 
        break;

        case 'related_cards_block':
        ?>

        <?php if($item['related_cards']): ?>

          <div class="details-content block-wide<?php if($item['is_white_spacing_top']) echo ' pt-4'; if($item['is_white_spacing_bottom']) echo ' pb-4'; ?>">

            <?php if ($item['title']): ?>
              <div class="text-center">
                <h2 class="h4"><?= $item['title'] ?></h2>
              </div>
            <?php endif ?>
            
            <div class="cards-list cards-list-02">
              <div class="cards-slider">
                <div class="swiper-wrapper">

                  <?php foreach($item['related_cards'] as $post): 

                    global $post;
                    setup_postdata($post); ?>
                    <div class="swiper-slide">
                      <?php get_template_part('parts/content', 'news') ?>
                    </div>
                  <?php endforeach; ?>

                  <?php wp_reset_postdata(); ?>

                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>

            <?php if ($item['button']): ?>
              <div class="text-center d-none d-lg-block">
                <a href="<?= $item['button']['url'] ?>" class="content-link"<?php if($item['button']['target']) echo ' target="_blank"' ?>><?= $item['button']['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt=""></a>
              </div>
            <?php endif ?>
            
          </div> 

        <?php endif; ?>              

        <?php 
        break;

        default:
        break;

      }

    endforeach ?>

  </div>
</section>
<?php endif ?>

<?php endif; ?>