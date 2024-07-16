<?php if(get_field('sections')): ?>

    <?php foreach (get_field('sections') as $row): ?>

        <?php if ($row['acf_fc_layout'] == 'flexible_content_section' || $row['acf_fc_layout'] == 'content_section'): ?>

            <?php foreach($row['sections'] as $row_2) : ?>

                <?php get_template_part( 'template-parts/sections/section', $row_2['acf_fc_layout'], $row_2 ); ?>

            <?php endforeach ?>

        <?php endif ?>
        
    <?php endforeach ?>
    
    <?php endif ?>