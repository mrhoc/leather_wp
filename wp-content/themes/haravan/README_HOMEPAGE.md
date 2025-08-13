# Hướng dẫn sử dụng Homepage Template

## Tổng quan
File `homepage.php` đã được tạo lại với cấu trúc WordPress chuẩn, sử dụng `header.php` và `footer.php`, và tích hợp với WooCommerce để hiển thị sản phẩm từ WordPress admin.

## Tính năng chính

### 1. Hero Section
- Tiêu đề chính: "SU LEATHER"
- Phụ đề: "Đồ da thủ công cao cấp"
- Nút "Khám phá ngay" dẫn đến trang shop

### 2. Featured Products Section
- Hiển thị sản phẩm theo 3 danh mục: FOR MEN, FOR WOMEN, ACCESSORY
- Sử dụng tabs để chuyển đổi giữa các danh mục
- Mỗi sản phẩm hiển thị:
  - Hình ảnh sản phẩm
  - Tên sản phẩm
  - Giá sản phẩm
  - Nút "Thêm vào giỏ" và "Xem nhanh"

### 3. About Section
- Giới thiệu về thương hiệu
- Hình ảnh minh họa
- Nút "Tìm hiểu thêm"

## Cài đặt và sử dụng

### 1. Cài đặt WooCommerce (Khuyến nghị)
```bash
# Cài đặt WooCommerce plugin
# Hoặc sử dụng WordPress admin: Plugins > Add New > WooCommerce
```

### 2. Tạo sản phẩm trong WordPress Admin
1. Vào **Products > Add New**
2. Tạo sản phẩm với:
   - Tên sản phẩm
   - Mô tả
   - Giá
   - Hình ảnh
   - Danh mục: "FOR MEN", "FOR WOMEN", hoặc "ACCESSORY"

### 3. Tạo trang Homepage
1. Vào **Pages > Add New**
2. Đặt tiêu đề: "Homepage"
3. Chọn template: "Homepage" từ dropdown
4. Publish trang

### 4. Đặt làm trang chủ
1. Vào **Settings > Reading**
2. Chọn "A static page"
3. Homepage: chọn trang "Homepage" vừa tạo

## Cấu trúc file

```
haravan/
├── homepage.php          # Template trang chủ
├── style.css            # CSS styles
├── functions.php        # WordPress functions
├── header.php           # Header template
├── footer.php           # Footer template
└── images/              # Thư mục hình ảnh
    ├── placeholder.jpg  # Hình ảnh placeholder
    ├── heart.svg        # Icon yêu thích
    └── about-us.jpg     # Hình ảnh about section
```

## Tùy chỉnh

### 1. Thay đổi màu sắc
Chỉnh sửa CSS variables trong `style.css`:
```css
:root {
    --bgshop: #3a1f09;
    --colorshop: #3a1f09; 
    --colorshophover: #857469;
}
```

### 2. Thay đổi số lượng sản phẩm
Trong `homepage.php`, thay đổi `posts_per_page`:
```php
'posts_per_page' => 8, // Thay đổi số này
```

### 3. Thêm danh mục mới
1. Tạo category trong WooCommerce
2. Thêm tab mới trong HTML
3. Thêm query tương ứng

## Lưu ý quan trọng

1. **WooCommerce**: Template hoạt động tốt nhất với WooCommerce plugin
2. **Hình ảnh**: Đảm bảo sản phẩm có hình ảnh featured
3. **Danh mục**: Tạo các danh mục "FOR MEN", "FOR WOMEN", "ACCESSORY"
4. **Responsive**: Template đã được tối ưu cho mobile

## Troubleshooting

### Sản phẩm không hiển thị
- Kiểm tra WooCommerce đã được cài đặt
- Đảm bảo sản phẩm được publish
- Kiểm tra danh mục sản phẩm

### Lỗi AJAX
- Kiểm tra WordPress AJAX URL
- Đảm bảo WooCommerce cart hoạt động

### CSS không load
- Kiểm tra file `style.css` tồn tại
- Clear cache nếu sử dụng caching plugin

## Hỗ trợ

Nếu gặp vấn đề, hãy kiểm tra:
1. WordPress debug log
2. Browser console
3. WooCommerce status
4. Theme compatibility

