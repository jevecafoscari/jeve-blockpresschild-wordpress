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


/**
 * Update the posts widget or portfolio widget query.
 *
 * @param \WP_Query $query The WordPress query instance.
 * @since 1.0.0
 */
function blog_query_callback($query)
{
    if ($_GET['selected_category']) {
        $tax_query = array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $_GET['selected_category'],
            )
        );

        $query->set('tax_query', $tax_query);
    }
}

add_action('elementor/query/blog_query_id', 'blog_query_callback');

if (!function_exists('write_log')) {

    function write_log($log)
    {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }

}