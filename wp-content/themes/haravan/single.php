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
</main>

<?php get_footer(); ?>
