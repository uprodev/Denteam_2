<?php 

if(get_field('sections'))
    foreach(get_field('sections') as $index => $row) : ?>
        <?php if(is_array($row)): get_template_part( 'template-parts/sections/section', $row['acf_fc_layout'], $row ); endif;

        endforeach; ?>