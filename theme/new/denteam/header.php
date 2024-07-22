<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="utf-8" />
  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <?php the_field('head_code_h', 'option') ?>

</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <?php the_field('body_code_h', 'option') ?>

  <main class="page-wrapper">
    <header class="header">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?php echo get_home_url(); ?>">

            <?php if ($field = get_field('logo', 'option')): ?>
              <?= wp_get_attachment_image($field['ID'], 'full') ?>
            <?php endif ?>

          </a>
          <div class="navbar-container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
              <div class="d-lg-none">
                <a class="navbar-brand" href="<?php echo get_home_url(); ?>">

                  <?php if ($field = get_field('logo', 'option')): ?>
                    <?= wp_get_attachment_image($field['ID'], 'full') ?>
                  <?php endif ?>

                  <?php if ($field = get_field('fixed_logo', 'option')): ?>
                    <?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'logo-fixed')) ?>
                  <?php endif ?>
                </a>
              </div>

              <?php 
              switch (get_locale()) {
                case 'nl-NL':
                $menu_id = 14;
                break;
                case 'en':
                $menu_id = 13;
                break;
                
                default:
                $menu_id = 72;
                break;
              }
              $menu = wp_get_nav_menu_items($menu_id); 
              ?>

              <?php if ($menu): ?>
                <ul class="navbar-nav">

                  <?php foreach ($menu as $item): ?>

                    <?php $child_menu = []; ?>
                    <?php foreach ($menu as $item_2): ?>
                      <?php if ($item_2->menu_item_parent == $item->ID) $child_menu[] = $item_2; ?>
                    <?php endforeach ?>

                    <?php if ($item->menu_item_parent === '0'): ?>
                      <li class="nav-item<?php if($child_menu) echo ' dropdown' ?>">
                        <a href="<?= $item->url ?>" class="nav-link<?php if($child_menu) echo ' dropdown-toggle' ?>" data-text="<?= $item->title ?>"<?php if($child_menu) echo ' role="button" data-bs-toggle="dropdown" aria-expanded="false"' ?><?php if($item->target) echo ' target="_blank"' ?>>
                          <?= $item->title ?>

                          <?php if ($child_menu): ?>
                            <svg viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 1L7 7L13 1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          <?php endif ?>

                        </a>

                        <?php if ($child_menu): ?>
                          <ul class="dropdown-menu">

                            <?php foreach ($child_menu as $item_2): ?>
                              <li>
                                <a href="<?= $item_2->url ?>" class="dropdown-item"<?php if($item_2->target) echo ' target="_blank"' ?>><?= $item_2->title ?></a>
                              </li>
                            <?php endforeach ?>

                          </ul>
                        <?php endif ?>

                      </li>
                    <?php endif ?>

                  <?php endforeach ?>

                </ul>
              <?php endif ?>

              <!-- <div class="header-languages">
                <a href="#"><img src="img/language-nl.svg" alt="" /><span>NL</span></a>
              </div> -->
              
              <div class="header-languages">
                <?php wp_nav_menu( array(
                  'theme_location'  => 'languages',
                  'container'       => '',
                  'items_wrap'      => '<ul class="languages-menu">%3$s</ul>'
                ) ); ?>
              </div>
            </div>

            <?php if ($field = get_field('cta', 'option')): ?>
              <div class="header-contact">
                <a href="<?= $field['url'] ?>" class="btn btn-secondary"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
              </div>
            <?php endif ?>

          </div>
        </div>
      </nav>
    </header>