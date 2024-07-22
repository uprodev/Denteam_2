<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,700;1,200;1,300;1,400;1,700&display=swap" rel="stylesheet">

  <!-- <script data-cookieconsent="ignore">
      window.dataLayer = window.dataLayer || [];
      function gtag() {
          dataLayer.push(arguments);
      }
      gtag("consent", "default", {
          ad_personalization: "denied",
          ad_storage: "denied",
          ad_user_data: "denied",
          analytics_storage: "denied",
          functionality_storage: "denied",
          personalization_storage: "denied",
          security_storage: "granted",
          wait_for_update: 1000,
      });
      gtag("set", "ads_data_redaction", true);
      gtag("set", "url_passthrough", true);
  </script> -->

  <!-- Google Tag Manager -->
  <!-- <script data-cookieconsent="ignore">
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
              new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-T4DZ3VJ');
  </script> -->
  <!-- End Google Tag Manager -->

  <!-- <script id="Cookiebot"
          src="https://consent.cookiebot.com/uc.js"
          data-cbid="9959f61b-880f-4bb5-aa3e-3ddfe92f6b68"
          data-blockingmode="auto"
          type="text/javascript"
          data-consentmode-default="disabled"
          data-cookieconsent="ignore"
  ></script>
   -->
  <meta charset="utf-8" />
  <?php wp_head(); ?>
  
  <script data-cookieconsent="ignore" src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script data-cookieconsent="ignore" src="<?php echo  get_template_directory_uri() . '/js/main.js' ?>"></script>
  

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T4DZ3VJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <?php wp_body_open(); ?>
  <main id="scroll-container" class="page-wrapper" data-scroll-container>
    <header class="header" data-scroll data-scroll-offset="150" data-scroll-sticky data-scroll-target="#scroll-container">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <div class="nav-bar-inner">
            <a class="navbar-brand" href="<?php echo get_home_url(); ?>">

              <?php if ($field = get_field('logo', 'option')): ?>
                <?= wp_get_attachment_image($field['ID'], 'full') ?>
              <?php endif ?>

              <?php if ($field = get_field('fixed_logo', 'option')): ?>
                <?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'logo-fixed')) ?>
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
                $locale = ICL_LANGUAGE_CODE;
                switch ($locale) {
                  case 'en':
                  $header_menu_id = 'Header menu';
                  break;
                  case 'nl':
                  $header_menu_id = 'Header menu-NL';
                  break;
                  
                  default:
                    $header_menu_id = 'Header menu';
                  break;
                }
                $header_menu = wp_get_nav_menu_items(13);
                ?>

                <ul class="navbar-nav">
                  <?php wp_nav_menu( array( 'menu' => 'name of the menu' ) ); ?>

                  <div class="header-languages">
                    <?php wp_nav_menu( array(
                      'theme_location'  => 'languages',
                      'container'       => '',
                      'items_wrap'      => '<ul class="languages-menu">%3$s</ul>'
                    ) ); ?>
                  </div>
                </ul>               

                  <?php //if ($field = get_field('phone_number', 'option')): ?>
                    <!-- <div class="d-lg-none"> -->
                      <!-- <a href="tel:+<?php // echo preg_replace('/[^0-9]/', '', $field) ?>" class="contact-phone"> <img src="<?php //echo get_stylesheet_directory_uri() ?>/img/icons/telephone.svg" alt="" /><?php //echo $field ?></a> -->
                    <!-- </div> -->
                  <?php //endif ?>
                  
                </div>
                <div class="header-contact-btn">
                  <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testModal"><span><?php // _e('Matchtest', 'Denteam') ?></span></button> -->

                  <?php if ($field = get_field('cta', 'option')): ?>
                    <a href="<?= $field['url'] ?>" class="btn btn-secondary"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
                  <?php endif ?>
                  
                  <?php //if ($field = get_field('phone_number', 'option')): ?>
                    <!-- <a href="tel:+<?php //echo preg_replace('/[^0-9]/', '', $field) ?>" class="contact-phone"> <img src="<?php //echo get_stylesheet_directory_uri() ?>/img/icons/telephone.svg" alt="" /><?php //echo $field ?></a> -->
                  <?php //endif ?>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>