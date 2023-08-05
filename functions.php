<?php
function childtheme_parent_styles()
{
    wp_enqueue_style("desktop", get_template_directory_uri() . "/style.css");

    # wp_enqueue_script('js-animal', get_stylesheet_directory_uri() . '/js/animal.js', '', '', true);

    if (is_page("contattaci")) {
        wp_enqueue_script('js-background', get_stylesheet_directory_uri() . '/js/animated-background.js', '', '', true);
    }
}

add_action("wp_enqueue_scripts", "childtheme_parent_styles");
