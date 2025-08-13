<?php
/**
 * The template for displaying archive pages
 *
 * @package Haravan
 */

get_header(); ?>

<div class="site-content">
    <main id="main" class="site-main">
        <?php if (have_posts()) : ?>
            <header class="page-header">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </header>

            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        
                        <div class="entry-meta">
                            <span class="posted-on">
                                <?php echo esc_html__('Posted on', 'haravan'); ?> 
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>
                            </span>
                            <span class="byline">
                                <?php echo esc_html__('by', 'haravan'); ?> 
                                <span class="author vcard">
                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                        <?php echo esc_html(get_the_author()); ?>
                                    </a>
                                </span>
                            </span>
                        </div>
                    </header>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="read-more">
                            <?php echo esc_html__('Read More', 'haravan'); ?>
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('Previous', 'haravan'),
                'next_text' => __('Next', 'haravan'),
            ));
            ?>

        <?php else : ?>
            <article class="no-results">
                <header class="entry-header">
                    <h1 class="entry-title"><?php echo esc_html__('Nothing Found', 'haravan'); ?></h1>
                </header>
                <div class="entry-content">
                    <p><?php echo esc_html__('It looks like nothing was found at this location. Maybe try a search?', 'haravan'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </article>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
