<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>

    <?php if ($title || $description || $contact_image || $contact_title || $telephone || $email || $form_select): ?>
        <section class="contact-info-form-section 
            <?php 
                if(isset($background_color)) echo $background_color; 
                if(isset($background_color_top)) echo  ' ' . $background_color_top; 
                if(isset($background_color_bot)) echo ' ' . $background_color_bot;
                if(isset($spacing_top) && ($spacing_top == true)) echo ' pt-0';
                if(isset($spacing_bot) && ($spacing_bot == true)) echo ' pb-0';
            ?> 
        "<?php if($id) echo ' id="' . $id . '"' ?>>

            <!-- Denteam form -->
            <div class="container-fluid">
                <div class="denteam-card">
                    
                    <!-- Row -->
                    <div class="row">
                        
                        <div class="col-lg-5 col-left">
                            <?php if($title): ?>
                                <h3 class="section-title"><?= $title; ?></h3>
                            <?php endif; ?>
                            <?php if($description): ?>
                                <div class="inner-text"><?= $description; ?></div>
                            <?php endif; ?>

                            <div class="contact-info">
                                <?php if($contact_image): ?>
                                    <figure class="contact-image">
                                        <img src="<?= $contact_image['url']; ?>" alt="<?= $contact_image['alt']; ?>">
                                    </figure>
                                <?php endif; ?>
                                <div class="contact-inner">
                                    <?php if($contact_title): ?>
                                        <h5 class="contact-title"><?= $contact_title; ?></h5>
                                    <?php endif; ?>
                                    <?php if($telephone || $email): ?>
                                        <div class="links">
                                            <?php 
                                                if($telephone) {
                                                    $telephone_url = $telephone['url'];
                                                    $telephone_title = $telephone['title'];
                                                    $telephone_target = $telephone['target'] ? $telephone['target'] : '_self';
                                                }
                                                if( $email ) {
                                                    $email_url = $email['url'];
                                                    $email_title = $email['title'];
                                                    $email_target = $email['target'] ? $email['target'] : '_self';
                                                }
                                            ?>
                                    
                                            <?php if($telephone): ?>
                                                <div class="telephone"><span>T</span>
                                                    <a href='<?php echo esc_url( $telephone_url ); ?>' target='<?php echo esc_attr( $telephone_target ); ?>'><?php echo esc_html( $telephone_title ); ?></a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if($email): ?>
                                                <div class="email"><span>E</span>
                                                    <a href='<?php echo esc_url( $email_url ); ?>' target='<?php echo esc_attr( $email_target ); ?>'><?php echo esc_html( $email_title ); ?></a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-right">
                            <div class="form-wrapper">	

                            </div>
                        </div>

                    </div>
                    <!-- End Row -->

                </div>
            </div>
            <!-- /Denteam form block -->

            <!-- Optional link -->
            <?php if (!empty($link_below)): ?>
				<div class="text-center">
					<a href="<?= $link_below['url'] ?>" class="content-link"<?php if($link_below['target']) echo ' target="_blank"' ?>><?= $link_below['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
				</div>
			<?php endif ?>
            <!-- /Optional link -->


            <!-- Cards -->
            <div class="cards-list extra-cards cards-list-01">
                <?php if(isset($section_title)): ?>
                    <div class="container-fluid">
                        <h3 class="h4 section-title text-center mb-5"><?= $section_title; ?></h3>
                    </div>
                <?php endif; ?>

                <div class="container-fluid">
                    <div class="cards-slider">
                        <div class="swiper-wrapper">

                            <?php if (isset($show_posts) && ($show_posts == 'Custom')): ?>
                                <?php
                                if($treatments): ?>

                                    <?php 
                                    foreach($treatments as $post): 
                                        setup_postdata($post); 
                                        ?>
                                        <div class="swiper-slide">
                                            <?php get_template_part('parts/content', 'full-bg-card'); ?>
                                        </div>
                                        <?php 
                                    endforeach; 
                                    wp_reset_postdata(); 
                                    ?>
                                <?php endif; 
                                ?>
                            <?php else: ?>
                                <?php 
                                $wp_query = new WP_Query(array('post_type' => 'behandeling', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 3, 'suppress_filters'=>false, 'paged' => get_query_var('paged')));
                                while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                                    <div class="swiper-slide">
                                        <?php get_template_part('parts/content', 'full-bg-card'); ?>
                                    </div>
                                    <?php 
                                endwhile; 
                                wp_reset_query(); 
                                ?>
                            <?php endif ?>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                    <?php if (isset($link)): ?>
                        <div class="text-center">
                            <a href="<?= $link['url'] ?>" class="content-link"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icons/triangle.svg" alt="" /></a>
                        </div>
                    <?php endif ?>

                </div>
            </div>
            <!-- /Cards -->

        </section>
    <?php endif ?>
<?php endif; ?>