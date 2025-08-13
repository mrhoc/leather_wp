<?php
/**
 * Template Name: Homepage
 * 
 * @package Haravan
 */

get_header(); ?>

    <main>
        <section id="home-slider">
            <div class="home-slider-content">
                <h1>LEATHER GOODS</h1>
                <p>Đồ da thủ công - Tinh tế từng chi tiết</p>

            </div>
            <!-- <div class="item">
                <img src="" alt="images banner">
            </div> -->
        </section>
        <section id="collection-new" >
            <div class="container">
                <div class="top-title">
                    <h2 class="title-section">
                        <span> Bộ sưu tập mới nhất</span>
                    </h2>
                </div>
                <ul class="slick-slider-collect">
                    <?php
                    // Mảng slug category và dữ liệu hiển thị
                    $collections = [
                        [
                            'slug'  => 'for-men',
                            'badge' => 'NEW',
                            'img'   => 'close-up-engraving-art-tools-1-2048x1365.jpg',
                            'title' => 'FOR MEN',
                            'desc'  => 'Ví nam, clutch, túi đeo chéo...'
                        ],
                        [
                            'slug'  => 'for-women',
                            'badge' => 'HOT',
                            'img'   => 'banner_mobile2_large.jpg',
                            'title' => 'FOR WOMEN',
                            'desc'  => 'Túi xách, ví nữ, dòng đặc biệt...'
                        ],
                        [
                            'slug'  => 'accessory',
                            'badge' => 'NEW',
                            'img'   => 'modal-banner.jpg',
                            'title' => 'ACCESSORY',
                            'desc'  => 'Card holder, phonecase, dây đồng hồ...'
                        ],
                        [
                            'slug'  => 'new-arrivals',
                            'badge' => 'NEW',
                            'img'   => 'bg-flashs-sale.jpg',
                            'title' => 'NEW ARRIVALS',
                            'desc'  => 'Thiết kế mới cập nhật hằng tuần'
                        ],
                    ];

                    foreach ($collections as $col) :
                        $cat = get_category_by_slug($col['slug']);
                        if ($cat) {
                            $link = get_category_link($cat->term_id);
                        } else {
                            $link = '#'; // fallback nếu không tìm thấy category
                        }
                        ?>
                        <li class="item">
                            <a class="collect-card" href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($col['title']); ?>">
                                <span class="collect-badge"><?php echo esc_html($col['badge']); ?></span>
                                <div class="collect-media">
                                    <img class="collect-img" src="<?php echo get_template_directory_uri() . '/img/' . $col['img']; ?>" alt="<?php echo esc_attr($col['title']); ?>">
                                </div>
                                <div class="collect-overlay">
                                    <h3 class="collect-title"><?php echo esc_html($col['title']); ?></h3>
                                    <p class="collect-desc"><?php echo esc_html($col['desc']); ?></p>
                                    <span class="collect-action">Xem ngay</span>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>



            </div>
        </section>
        <section id="section-collection-tab"  data-include="section-collection-tab">
            <div class="container">
                <div class="top-title">
                    <h2 class="title-section">
                        <span>Sản phẩm nổi bật</span>
                    </h2>
                </div>

<!--                <ul class="nav nav-tabs" role="tablist" id="home-tab-col">-->
<!--                    <li role="presentation"><a class="active success-ajax" role="tab" data-toggle="tab"-->
<!--                                               data-url="/collections/for-men-1?view=home-tab" href="#tab-for-men">FOR MEN</a></li>-->
<!--                    <li role="presentation"><a role="tab" data-toggle="tab"-->
<!--                                               data-url="/collections/for-women?view=home-tab" href="#tab-for-women">FOR WOMEN</a></li>-->
<!--                    <li role="presentation"><a role="tab" data-toggle="tab"-->
<!--                                               data-url="/collections/card-holder?view=home-tab" href="#tab-accessory">ACCESSORY</a></li>-->
<!--                </ul>-->
                <div class="tab-result">
                    <div class="tab-pane show" id="tab-for-men">
                        <div class="d-flex d-flex-wrap row-left-list">
                            <?php
                            $args = [
                                'post_type'      => 'post', // hoặc 'post' nếu là bài viết thường
                                'posts_per_page' => 15,
                                'orderby'        => 'date',
                                'order'          => 'DESC',
                            ];
                            $query = new WP_Query($args);

                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    $product_id  = get_the_ID();
                                    $title       = get_the_title();
                                    $permalink   = get_permalink();
                                    $thumb_first = get_the_post_thumbnail_url($product_id, 'medium');
                                    $thumb_hover = get_the_post_thumbnail_url($product_id, 'medium'); // Có thể thay bằng ảnh hover riêng nếu có
                                    $price       = get_post_meta($product_id, '_price', true); // nếu là WooCommerce
                                    $price_fmt   = number_format((float)$price, 0, ',', '.').'₫';
                                    ?>
                                    <div class="d-flex-column col-lg-1 col-md-3 col-sm-4 col-xs-6 pd-right-0">
                                        <div class="product-block item">
                                            <div class="product-img has-hover">
                                                <a href="<?php echo esc_url($permalink); ?>" title="<?php echo esc_attr($title); ?>" class="image-resize">
                                                    <img class="lazyload dt-width-100 img-first" width="260" height="260"
                                                         src="<?php echo esc_url($thumb_first); ?>"
                                                         alt="<?php echo esc_attr($title); ?>" />
                                                    <img class="lazyload dt-width-100 img-hover hidden-xs" width="260" height="260"
                                                         src="<?php echo esc_url($thumb_hover); ?>"
                                                         alt="<?php echo esc_attr($title); ?>" />
                                                </a>
                                                <div class="product-icon-action">
                                                    <div class="quick-view">
                                                        <button href="javascript:void(0)" class="btn_quickview icon-quickview" data-url="<?php echo esc_url($permalink); ?>">
                                                            Xem nhanh
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-detail">
                                                <h3 class="pro-name">
                                                    <a href="<?php echo esc_url($permalink); ?>" title="<?php echo esc_attr($title); ?>">
                                                        <?php echo esc_html($title); ?>
                                                    </a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price">
                                                        <span><?php $price = format_vnd_price(get_post_meta(get_the_ID(), 'price', true));
                                                        if ($price) {
                                                            echo esc_html($price) . '₫';
                                                        }?>
                                                        </span>
                                                    </p>
                                                    <p><?php echo get_excerpt_limit_chars(100);?></p>
                                                </div>
                                                <ul class="list-variants-img d-flex d-flex-wrap"></ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<p>Không có sản phẩm nào.</p>';
                            endif;
                            ?>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-for-women"></div>
                    <div class="tab-pane" id="tab-accessory"></div>
                </div>

            </div>
        </section>

        <section id="about">
            <div class="container">
                <div class="top-title">
                    <h2 class="title-section">
                        <span> Về chúng tôi</span>
                    </h2>
                </div>
                <div>Chúng tôi là những người thợ thủ công đam mê, mang đến các sản phẩm da thật chất lượng cao, được chế tác tỉ mỉ từ khâu chọn nguyên liệu đến từng đường kim mũi chỉ. <br>Mỗi sản phẩm không chỉ bền đẹp theo thời gian, mà còn kể câu chuyện về sự tinh tế và giá trị thủ công truyền thống.</div>
            </div>
        </section>
        <section id="why">
            <div class="container">
                <div class="top-title">
                    <h2 class="title-section">
                        <span> Tại sao chọn chúng tôi?</span>
                    </h2>
                </div>
                <div class="why-content">
                    <ul>
                        <li><span>Chất lượng hàng đầu: </span>Sử dụng 100% da thật, chọn lọc kỹ lưỡng.</li>
                        <li><span>Thiết kế tinh tế: </span>Kết hợp giữa phong cách hiện đại và nét thủ công cổ điển.</li>
                        <li><span>Độ bền vượt trội: </span>Sản phẩm đồng hành cùng bạn qua nhiều năm.</li>
                        <li><span>Dịch vụ tận tâm:</span> Hỗ trợ nhanh chóng và bảo hành uy tín.</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>