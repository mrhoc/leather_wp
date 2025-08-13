<?php
// Đăng ký Sidebar
add_action('widgets_init', function () {
    register_sidebar([
        'name'          => __('Sidebar Chính', 'textdomain'), // Tên hiển thị trong admin
        'id'            => 'main-sidebar',                    // ID duy nhất
        'description'   => __('Khu vực sidebar chính cho website', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">', // HTML mở trước widget
        'after_widget'  => '</div>',                            // HTML đóng sau widget
        'before_title'  => '<h3 class="widget-title">',         // HTML mở trước tiêu đề
        'after_title'   => '</h3>',                             // HTML đóng sau tiêu đề
    ]);
});
add_action('after_setup_theme', function () {
    register_nav_menus([
        'main-menu' => __('Menu Chính', 'textdomain'),
    ]);
});

class Custom_Submenu_Walker extends Walker_Nav_Menu {
    // Mở submenu
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);

        if ($depth === 0) {
            // Submenu cấp 1
            $output .= "\n$indent<div class=\"sub_top_menu\"><ul class=\"sub_menu_dropdown\">\n";
        } else {
            // Submenu cấp 2 trở lên
            $output .= "\n$indent<ul class=\"sub_menu_dropdown lv3\">\n";
        }
    }

    // Đóng submenu
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        if ($depth === 0) {
            $output .= "$indent</ul></div>\n";
        } else {
            $output .= "$indent</ul>\n";
        }
    }

    // Render từng item
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $class_names = join(' ', array_filter($classes));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        $atts = [];
        $atts['href'] = !empty($item->url) ? $item->url : '';
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = esc_attr($value);
                $attributes .= " $attr=\"$value\"";
            }
        }

        // Nếu có submenu, thêm icon
        $has_children = in_array('menu-item-has-children', $classes);
        $icon_html = $has_children ? '<i class="fa-chevron-down" aria-hidden="true"></i>' : '';

        $item_output = $args->before;
        $item_output .= "<a$attributes>" . $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after . $icon_html . "</a>";
        $item_output .= $args->after;

        $output .= $item_output;
    }
}

add_theme_support('post-thumbnails');

function format_vnd_price($price) {
    // Chuyển giá về số nguyên để tránh lỗi khi nhập có ký tự
    $price = (int) $price;

    // Format theo định dạng 1.900.000
    return number_format($price, 0, ',', '.');
}

function get_excerpt_limit_chars($char_limit = 100) {
    $excerpt = get_the_excerpt();
    $excerpt = strip_tags($excerpt); // bỏ HTML
    if (strlen($excerpt) > $char_limit) {
        $excerpt = mb_substr($excerpt, 0, $char_limit, 'UTF-8') . '...';
    }
    return $excerpt;
}

function my_custom_subscribe_form() {
    ob_start();

    // Nếu form submit
    if (isset($_POST['contact_email'])) {
        $email = sanitize_email($_POST['contact_email']);

        if (is_email($email)) {
            $to = get_option('admin_email'); // Email admin
            $subject = 'Có người đăng ký nhận bản tin';
            $message = "Email đăng ký: " . $email;
            $headers = array('Content-Type: text/html; charset=UTF-8');

            if (wp_mail($to, $subject, $message, $headers)) {
                echo '<p style="color:green;">✅ Đăng ký thành công! Cảm ơn bạn.</p>';
            } else {
                echo '<p style="color:red;">❌ Lỗi gửi email. Vui lòng thử lại.</p>';
            }
        } else {
            echo '<p style="color:red;">⚠️ Email không hợp lệ.</p>';
        }
    }
    ?>

    <!-- Form HTML -->
    <form method='post' class='contact-form'>
        <div class="form-group mb-0">
            <input type="hidden" name="contact_tags" value="khách hàng tiềm năng, bản tin" />
            <input type="email" required name="contact_email" placeholder="Email" />
        </div>
        <button class="btn" type="submit">Đăng ký</button>
    </form>

    <?php
    return ob_get_clean();
}
add_shortcode('custom_email_form', 'my_custom_subscribe_form');

