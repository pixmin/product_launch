<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage themename
 */
get_header();
if (have_posts()):
    while(have_posts()):
        the_post();
        echo get_the_post_thumbnail() 
?>
<p class="trailer"><?php echo $post->post_content; ?></p>
<p class="release"><?php echo get_post_meta($post->ID, 'release_date', true); ?></p>

<?php
    endwhile;
endif;
get_template_part('inc/visitors-form');
get_footer();
?>
