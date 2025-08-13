<?php get_header(); ?>

<main>
    <nav class="breadcrumb">
        <div class="container">
            <a href="<?php echo home_url(); ?>">Trang chủ</a>
            <span>/</span>
            <?php
            $categories = get_the_category();
            if (!empty($categories)) {
                $cat_link = get_category_link($categories[0]->term_id);
                echo '<a href="' . esc_url($cat_link) . '">' . esc_html($categories[0]->name) . '</a>';
                echo '<span>/</span>';
            }
            ?>
            <span><?php the_title(); ?></span>
        </div>
    </nav>

    <section id="product-detail">
        <div class="container product-detail-wrap">
            <div class="product-gallery">
                <div class="product-media-main slider-for">
                    <?php
                    // Nếu bạn có custom field "price"
                    $gallery = get_post_meta(get_the_ID(), 'gallery', true);
                    if ($gallery) {
                        echo do_shortcode($gallery); // Thực thi shortcode để hiển thị ảnh
                    }
                    else{
                        echo '<img src="' . esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')) . '" alt="' . esc_attr(get_the_title()) . '">';
                    }
                    ?>

                </div>
            </div>


        </div>

        <div class="container product-extra" id="specs">
            <div class="product-tabs">
                <button class="tab-link active" data-target="#tab-desc">Thông tin sản phẩm</button>

            </div>
            <div class="tab-contents">
                <div class="tab-panel show" id="tab-desc">
                    <h1><?php the_title()?></h1>
                    <div class="product-price">
                        <?php
                        $price = format_vnd_price(get_post_meta(get_the_ID(), 'price', true));
                        if ($price) {
                            echo esc_html($price) . '₫';
                        }
                        ?>
                    </div>

                    <?php the_content(); ?>
                </div>


            </div>
        </div>
    </section>

    <!-- Related Products Section -->
    <section id="related-products">
        <div class="container">
            <div class="top-title">
                <div class="title-section">
                    <h2><span>Sản phẩm liên quan</span></h2>
                </div>
            </div>
            
            <ul class="related-products-grid">
                <?php
                // Lấy danh mục của sản phẩm hiện tại
                $categories = get_the_category();
                if (!empty($categories)) {
                    $category_ids = array();
                    foreach ($categories as $category) {
                        $category_ids[] = $category->term_id;
                    }
                    
                    // Lấy sản phẩm liên quan cùng danh mục
                    $related_products = new WP_Query(array(
                        'category__in' => $category_ids,
                        'post__not_in' => array(get_the_ID()),
                        'posts_per_page' => 8,
                        'orderby' => 'rand',
                        'post_type' => 'post'
                    ));
                    
                    if ($related_products->have_posts()) {
                        while ($related_products->have_posts()) {
                            $related_products->the_post();
                            ?>
                            <li>
                                <a href="<?php the_permalink(); ?>" class="related-product-card">
                                    <div class="related-product-media">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium', array('class' => 'related-product-img')); ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder.jpg" alt="<?php the_title(); ?>" class="related-product-img">
                                        <?php endif; ?>
                                        
                                        <?php
                                        // Hiển thị badge nếu có
                                        $price = get_post_meta(get_the_ID(), 'price', true);
                                        if ($price) {
                                            echo '<span class="related-product-badge">Có sẵn</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="related-product-info">
                                        <h3 class="related-product-title"><?php the_title(); ?></h3>
                                        <?php if ($price) : ?>
                                            <p class="related-product-price"><?php echo format_vnd_price($price); ?>₫</p>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        wp_reset_postdata();
                    } else {
                        // Nếu không có sản phẩm cùng category, hiển thị thông báo
                        echo '<li class="no-related-products" style="grid-column: 1 / -1; text-align: center; padding: 40px 20px; color: #8c827a; font-style: italic;">';
                        echo 'Không có sản phẩm liên quan trong danh mục này.';
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </div>
    </section>
</main>

<?php get_footer(); ?>
