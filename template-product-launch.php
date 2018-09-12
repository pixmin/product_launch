<?php
/*
Template Name: Product Launch
*/

get_header();

if (have_posts()): 
    while(have_posts()):
        the_post();

        $category_id = 8; // Product Launch
        $category = get_category($category_id);
        $args = array('category' => $category_id);
        $posts = get_posts($args);

        foreach ($posts as $post) {

            setup_postdata($post);
            echo get_the_post_thumbnail();

            ?>
            <article class='large'>
                <p class="trailer"><?php echo $post->post_content; ?></p>
                <p class="release">Lancement prévu le: <?php echo get_post_meta($post->ID, 'release_date', true); ?></p>
            </article>
            <?php

        }

    endwhile;
endif;

get_template_part('inc/visitors-form');

get_footer();
