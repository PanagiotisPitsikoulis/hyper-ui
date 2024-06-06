<?php get_header(); ?>

<main role="main">
    <!-- section -->
    <section>

        <h1><?php _e('Latest Posts', 'textdomain'); ?></h1>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <!-- article -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <!-- post thumbnail -->
                    <?php if (has_post_thumbnail()) : // Check if thumbnail exists 
                    ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail(array(120, 120)); // Declare pixel size you need inside the array 
                            ?>
                        </a>
                    <?php endif; ?>
                    <!-- /post thumbnail -->

                    <!-- post title -->
                    <h2>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <!-- /post title -->

                    <!-- post details -->
                    <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                    <span class="author"><?php _e('Published by', 'textdomain'); ?> <?php the_author_posts_link(); ?></span>
                    <span class="comments"><?php if (comments_open(get_the_ID())) comments_popup_link(__('Leave your thoughts', 'textdomain'), __('1 Comment', 'textdomain'), __('% Comments', 'textdomain')); ?></span>
                    <!-- /post details -->

                    <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php 
                    ?>

                    <?php edit_post_link(); ?>

                </article>
                <!-- /article -->

            <?php endwhile; ?>

        <?php else : ?>

            <!-- article -->
            <article>
                <h2><?php _e('Sorry, nothing to display.', 'textdomain'); ?></h2>
            </article>
            <!-- /article -->

        <?php endif; ?>

    </section>
    <!-- /section -->
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>