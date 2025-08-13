<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Haravan
 */

get_header(); ?>

<div class="site-content">
    <main id="main" class="site-main">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'haravan'); ?></h1>
            </header>

            <div class="page-content">
                <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'haravan'); ?></p>

                <?php get_search_form(); ?>

                <div class="widget-area">
                    <div class="widget">
                        <h2 class="widget-title"><?php esc_html_e('Most Used Categories', 'haravan'); ?></h2>
                        <ul>
                            <?php
                            wp_list_categories(array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'number'     => 10,
                            ));
                            ?>
                        </ul>
                    </div>

                    <div class="widget">
                        <h2 class="widget-title"><?php esc_html_e('Recent Posts', 'haravan'); ?></h2>
                        <ul>
                            <?php
                            wp_get_archives(array(
                                'type'  => 'postbypost',
                                'limit' => 10,
                            ));
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>
