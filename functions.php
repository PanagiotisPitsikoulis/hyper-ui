<?php
function html5wp_excerpt($type = 'html5wp_index')
{
    if ($type == 'html5wp_index') {
        $length = 55; // Define the word length of index excerpts
    } else {
        $length = 40; // Define the word length of other excerpts
    }

    the_excerpt_max_charlength($length);
}

function the_excerpt_max_charlength($charlength)
{
    $excerpt = get_the_excerpt();
    $charlength++;

    if (mb_strlen($excerpt) > $charlength) {
        $subex = mb_substr($excerpt, 0, $charlength - 5);
        $exwords = explode(' ', $subex);
        $excut = - (mb_strlen($exwords[count($exwords) - 1]));
        if ($excut < 0) {
            echo mb_substr($subex, 0, $excut);
        } else {
            echo $subex;
        }
        echo '[...]';
    } else {
        echo $excerpt;
    }
}
?>

<?php
function my_custom_theme_enqueue_styles()
{
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/style.css', array(), null);
}
add_action('wp_enqueue_scripts', 'my_custom_theme_enqueue_styles');
?>