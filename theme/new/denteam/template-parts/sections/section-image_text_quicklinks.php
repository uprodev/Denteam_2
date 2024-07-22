<?php 
if($args):
	foreach($args as $key=>$arg) $$key = $arg; ?>
    <section class="image-text-quicklinks"<?php if($id) echo ' id="' . $id . '"' ?>>
        <div class="top-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-left">
                        <?php if($image): ?>
                            <figure>
                                <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
                            </figure>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-right">
                        <div class="inner-content">
                            <?php if($title): ?>
                                <h2 class="h1 section-title"><?= $title; ?></h2>
                            <?php endif; ?>
                            <?php if($description): ?>
                                <div class="description"><?= $description; ?></div>
                            <?php endif; ?>
                            <?php if($quicklinks):?>
                                <ul class="quicklinks">
                                    <?php foreach($quicklinks as $link): ?>
                                    <?php 
                                        if( $link ) {
                                            // var_dump($link);
                                            $link_url = $link['link']['url'];
                                            $link_title = $link['link']['title'];
                                            $link_target = $link['link']['target'] ? $link['link']['target'] : '_self';
                                        }
                                    ?>
                                        <?php if($link ): ?>
                                            <li class="quicklink">
                                                <a class='link' href='<?php echo esc_url($link_url); ?>' target='<?php echo esc_attr($link_target); ?>'><?php echo esc_html($link_title); ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if($optional_image): ?>
            <div class="bottom-content">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12">
                            <figure>
                                <img src="<?= $optional_image['url']; ?>" alt="<?= $optional_image['alt']; ?>">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </section>
<?php endif; ?>