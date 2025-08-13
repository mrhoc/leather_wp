<?php
/**
 * The template for displaying search results pages
 *

 */

get_header(); ?>

<main>
    <nav class="breadcrumb">
        <div class="container">
            <a href="<?php echo home_url(); ?>">Trang chủ</a>
            <span>/</span>
            <span>Kết quả tìm kiếm</span>
        </div>
    </nav>

    <section id="search-results">
        <div class="container">
            <div class="top-title">
                <div class="title-section">
                    <h1><span>Kết quả tìm kiếm</span></h1>
                </div>
            </div>
            
            <?php
            $search_query = get_search_query();
            if (!empty($search_query)) {
                echo '<div class="search-info">';
                echo '<p>Tìm kiếm cho: <strong>"' . esc_html($search_query) . '"</strong></p>';
                echo '</div>';
            }
            ?>

            <div class="search-results-content">
                <?php
                // Lấy từ khóa tìm kiếm
                $search_query = get_search_query();
                
                // Tìm kiếm trong posts với %s
                $search_args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 12,
                    's' => $search_query,
                    'meta_query' => array(
                        'relation' => 'OR',
                        array(
                            'key' => 'price',
                            'compare' => 'EXISTS'
                        ),
                        array(
                            'key' => 'price',
                            'compare' => 'NOT EXISTS'
                        )
                    )
                );
                
                $search_query_obj = new WP_Query($search_args);
                
                if ($search_query_obj->have_posts()) : ?>
                    <div class="search-stats">
                        <p>Tìm thấy <strong><?php echo $search_query_obj->found_posts; ?></strong> kết quả</p>
                    </div>
                    
                    <ul class="search-products-grid">
                        <?php while ($search_query_obj->have_posts()) : $search_query_obj->the_post(); ?>
                            <li class="search-product-item">
                                <a href="<?php the_permalink(); ?>" class="search-product-card">
                                    <div class="search-product-media">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium', array('class' => 'search-product-img')); ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder.jpg" alt="<?php the_title(); ?>" class="search-product-img">
                                        <?php endif; ?>
                                        
                                        <?php
                                        // Hiển thị badge nếu có giá
                                        $price = get_post_meta(get_the_ID(), 'price', true);
                                        if ($price) {
                                            echo '<span class="search-product-badge">Có sẵn</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="search-product-info">
                                        <h3 class="search-product-title"><?php the_title(); ?></h3>
                                        <?php if ($price) : ?>
                                            <p class="search-product-price"><?php echo format_vnd_price($price); ?>₫</p>
                                        <?php endif; ?>
                                        <div class="search-product-excerpt">
                                            <?php echo get_excerpt_limit_chars(80); ?>
                                        </div>
                                        <div class="search-product-category">
                                            <?php
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                echo '<span>Danh mục: ' . esc_html($categories[0]->name) . '</span>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                    
                    <!-- Pagination -->
                    <div class="search-pagination">
                        <?php
                        $big = 999999999;
                        echo paginate_links(array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $search_query_obj->max_num_pages,
                            'prev_text' => '&laquo; Trước',
                            'next_text' => 'Sau &raquo;',
                            'type' => 'list'
                        ));
                        ?>
                    </div>
                    
                <?php else : ?>
                    <div class="no-search-results">
                        <div class="no-results-icon">
                            <i class="fa fa-search" style="font-size: 48px; color: #ccc;"></i>
                        </div>
                        <h3>Không tìm thấy kết quả</h3>
                        <p>Không có sản phẩm nào phù hợp với từ khóa "<strong><?php echo esc_html($search_query); ?></strong>"</p>
                        <div class="no-results-suggestions">
                            <h4>Gợi ý tìm kiếm:</h4>
                            <ul>
                                <li>Kiểm tra chính tả của từ khóa</li>
                                <li>Thử từ khóa khác</li>
                                <li>Thử từ khóa ngắn hơn</li>
                                <li>Thử từ khóa chung hơn</li>
                            </ul>
                        </div>
                        <div class="no-results-actions">
                            <a href="<?php echo home_url(); ?>" class="btn btn-primary" style="color: #ffffff!important;display:flex;justify-content: center">Về trang chủ</a>

                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
