<?php get_header(); ?>

<main>
    <?php
    // Lấy thông tin category hiện tại
    $category = get_queried_object();
    $cat_name = single_cat_title('', false);
    $cat_description = category_description();
    ?>

    <section class="collection-hero" style="padding-bottom: 0!important;">
        <div class="container hero-inner">
            <div class="hero-text">
                <h1><?php echo esc_html($cat_name); ?></h1>
                <?php if ($cat_description): ?>
                    <p><?php echo wp_kses_post($cat_description); ?></p>
                <?php endif; ?>
            </div>
<!--            <div class="hero-media">-->
<!--                --><?php
//                // Nếu bạn muốn có ảnh đại diện riêng cho category, dùng plugin hoặc custom field
//                // Tạm thời mình để ảnh tĩnh
//                ?>
<!--                <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/close-up-engraving-art-tools-1-2048x1365.jpg" alt="--><?php //echo esc_attr($cat_name); ?><!--">-->
<!--            </div>-->
        </div>
    </section>

    <section id="collection-grid" class="collection-grid">
        <div class="container">
<!--            <div class="top-title">-->
<!--                <h2 class="title-section"><span>Sản phẩm trong bộ sưu tập</span></h2>-->
<!--            </div>-->

            <?php if (have_posts()): ?>
                <ul class="products-grid">
                    <?php while (have_posts()): the_post(); ?>
                        <li class="product-card">
                            <a href="<?php the_permalink(); ?>" class="card-link">
                                <div class="card-media">
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title_attribute(); ?>">
                                </div>
                                <div class="card-info">
                                    <h3 class="card-title"><?php the_title(); ?></h3>
                                    <div class="card-price">
                                        <?php
                                        // Nếu bạn có custom field "price"
                                        $price = format_vnd_price(get_post_meta(get_the_ID(), 'price', true));
                                        if ($price) {
                                            echo esc_html($price) . '₫';
                                        }
                                        ?>
                                    </div>
                                    <div class="card-txt">
                                        <?php echo get_excerpt_limit_chars(100);?>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>

                <div class="pagination">
                    <?php
                    the_posts_pagination([
                        'prev_text' => __('« Trước'),
                        'next_text' => __('Tiếp »'),
                    ]);
                    ?>
                </div>
            <?php else: ?>
                <p>Không có sản phẩm nào trong bộ sưu tập này.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
