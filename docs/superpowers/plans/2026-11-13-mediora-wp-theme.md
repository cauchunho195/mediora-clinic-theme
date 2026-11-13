# Mediora Clinic WordPress Theme Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Xây dựng bộ WordPress Theme cao cấp `mediora-clinic` hoàn chỉnh, độc lập, tối ưu tốc độ và chuẩn SEO, tái hiện phong cách và trải nghiệm của website https://phongkhammediora.vn/.

**Architecture:** Sử dụng kiến trúc Custom WordPress Theme tuân thủ WordPress Theme Handbook (PHP, HTML5, CSS3/Bootstrap Grid, Vanilla JS + Swiper). Tích hợp WordPress Customizer cho cấu hình động, CPT cho Dịch vụ & Bác sĩ, và hỗ trợ Contact Form 7/WPForms kèm Fallback AJAX Booking Form.

**Tech Stack:** PHP 7.4 - 8.3+, WordPress 6.x, Bootstrap 5 Grid, Swiper JS, CSS3 Gold Metallic Gradients.

**Spec:** [docs/superpowers/specs/2026-11-13-mediora-wp-theme-design.md](file:///c:/Code/TMV/docs/superpowers/specs/2026-11-13-mediora-wp-theme-design.md)

## Global Constraints
- Theme folder: `wp-content/themes/mediora-clinic/`
- Color scheme: Dark luxury background (`#0b0f14`), Metallic Gold accent (`#d4af37`), White/Silver text (`#ffffff`, `#cfd5db`).
- Code style: WordPress Coding Standards (WPCS) for PHP, modular functions, no unescaped user inputs (`esc_html`, `esc_url`, `wp_kses_post`), security nonces on AJAX.
- Zero external page builders: No dependency on Elementor or WPBakery.

---

### Task 1: Khởi tạo Cấu trúc Theme & Assets Giao diện (CSS/JS/Graphics)

**Files:**
- Create: `wp-content/themes/mediora-clinic/style.css`
- Create: `wp-content/themes/mediora-clinic/functions.php`
- Create: `wp-content/themes/mediora-clinic/assets/css/bootstrap-grid.min.css`
- Create: `wp-content/themes/mediora-clinic/assets/css/swiper-bundle.min.css`
- Create: `wp-content/themes/mediora-clinic/assets/css/theme-style.css`
- Create: `wp-content/themes/mediora-clinic/assets/js/swiper-bundle.min.js`
- Create: `wp-content/themes/mediora-clinic/assets/js/theme-main.js`
- Create: `wp-content/themes/mediora-clinic/assets/imgs/` (Logo SVG, icons, frameline mạ vàng, cover ảnh)

**Interfaces:**
- Produces: `mediora_scripts()` enqueue styles/scripts, `mediora_theme_setup()` supports title-tag, post-thumbnails, menus.

- [ ] **Step 1: Khởi tạo `style.css` với đầy đủ metadata chuẩn WordPress**
- [ ] **Step 2: Viết `functions.php` nạp các script và style cần thiết (Bootstrap Grid, Swiper, Theme CSS, Theme JS, Google Fonts)**
- [ ] **Step 3: Tạo file CSS `theme-style.css` định nghĩa toàn bộ biến CSS root, màu vàng kim (metallic gold), typography, header, mobile drawer, và footer**
- [ ] **Step 4: Tạo file JS `theme-main.js` xử lý mobile nav toggle, video lazy-load/intersection observer, và smooth scroll**
- [ ] **Step 5: Tải hoặc khởi tạo toàn bộ assets đồ họa chuẩn (Logo SVG, GPS icon, Frameline mạ vàng, ảnh minh họa chất lượng cao)**
- [ ] **Step 6: Kiểm tra cú pháp PHP bằng `php -l functions.php`**
- [ ] **Step 7: Commit Task 1**

---

### Task 2: Header, Footer & Global Navigation

**Files:**
- Create: `wp-content/themes/mediora-clinic/header.php`
- Create: `wp-content/themes/mediora-clinic/footer.php`
- Create: `wp-content/themes/mediora-clinic/index.php`
- Create: `wp-content/themes/mediora-clinic/404.php`

**Interfaces:**
- Consumes: Customizer settings (`mediora_get_option()`), Menu `primary_menu`.
- Produces: Standard `get_header()`, `get_footer()`.

- [ ] **Step 1: Xây dựng `header.php` bao gồm doctype HTML5, thẻ meta viewport, logo tùy biến (hoặc default SVG), menu chính responsive, nút gọi Hotline dạng pill mạ vàng, nút CTA "Đăng ký tư vấn", và Mobile Drawer Offcanvas**
- [ ] **Step 2: Xây dựng `footer.php` bao gồm logo footer, thông tin địa chỉ, hotline, giấy phép Sở Y Tế, liên kết mạng xã hội và bản quyền `wp_footer()`**
- [ ] **Step 3: Xây dựng `index.php` chuẩn mực cho fallback loop**
- [ ] **Step 4: Xây dựng `404.php` với phong cách Luxury dark & gold thông báo không tìm thấy trang kèm nút quay về trang chủ**
- [ ] **Step 5: Kiểm tra cú pháp PHP các file vừa tạo**
- [ ] **Step 6: Commit Task 2**

---

### Task 3: Trang Chủ Landing Page Hoàn Chỉnh (`front-page.php`)

**Files:**
- Create: `wp-content/themes/mediora-clinic/front-page.php`
- Modify: `wp-content/themes/mediora-clinic/assets/css/theme-style.css`
- Modify: `wp-content/themes/mediora-clinic/assets/js/theme-main.js`

**Interfaces:**
- Consumes: Customizer options (Hotline, Video CSVC, Giấy phép), Swiper JS.
- Produces: Complete high-converting landing page matching Mediora.

- [ ] **Step 1: Xây dựng Section Hero / Intro (`sec-intro`) với tiêu đề và triết lý thẩm mỹ chuẩn mực**
- [ ] **Step 2: Xây dựng Section Dịch vụ chủ đạo GMISS (`sec-gmiss`) với đồ họa quy trình 6 bước chuẩn y khoa kèm video minh họa**
- [ ] **Step 3: Xây dựng Section Cơ sở vật chất 5 sao (`sec-facility`) với khung viền vàng kim loại lồng video thực tế, lazy-load khi cuộn**
- [ ] **Step 4: Xây dựng Section Đội ngũ Bác sĩ chuyên khoa (`sec-doctor`) với chân dung bác sĩ và danh hiệu chuyên môn**
- [ ] **Step 5: Xây dựng Section Hiệu quả khách hàng (`sec-result`) với Swiper carousel mượt mà trên desktop và mobile**
- [ ] **Step 6: Kiểm tra cú pháp và layout responsive**
- [ ] **Step 7: Commit Task 3**

---

### Task 4: Form Đăng Ký Tư Vấn & Xử Lý AJAX Booking (`sec-register` & `ajax-booking.php`)

**Files:**
- Create: `wp-content/themes/mediora-clinic/inc/ajax-booking.php`
- Modify: `wp-content/themes/mediora-clinic/front-page.php` (tích hợp Section `sec-register`)
- Modify: `wp-content/themes/mediora-clinic/assets/css/theme-style.css` (style cho form CF7, WPForms và built-in form)
- Modify: `wp-content/themes/mediora-clinic/assets/js/theme-main.js` (xử lý submit AJAX)

**Interfaces:**
- Consumes: `wp_ajax_nopriv_mediora_booking`, `wp_ajax_mediora_booking`.
- Produces: JSON response `{ success: true, message: '...' }`, gửi email thông báo tới Admin.

- [ ] **Step 1: Viết `inc/ajax-booking.php` kiểm tra nonce, làm sạch dữ liệu (sanitize), xác thực số điện thoại và gửi mail qua `wp_mail`**
- [ ] **Step 2: Thêm Section `sec-register` vào `front-page.php` hỗ trợ cả 2 chế độ: Shortcode (CF7/WPForms) hoặc Form Built-in**
- [ ] **Step 3: Viết JS AJAX trong `theme-main.js` xử lý submit, hiển thị trạng thái loading và modal popup cảm ơn sang trọng**
- [ ] **Step 4: Kiểm tra PHP syntax và kiểm tra endpoint AJAX**
- [ ] **Step 5: Commit Task 4**

---

### Task 5: Module Quản Trị Customizer & Custom Post Types

**Files:**
- Create: `wp-content/themes/mediora-clinic/inc/customizer.php`
- Create: `wp-content/themes/mediora-clinic/inc/post-types.php`
- Create: `wp-content/themes/mediora-clinic/inc/template-tags.php`
- Modify: `wp-content/themes/mediora-clinic/functions.php` (include các module)

**Interfaces:**
- Produces: Customizer panels/sections/settings, CPT `service` & `doctor`, helper functions.

- [ ] **Step 1: Viết `inc/customizer.php` đăng ký các control trực quan: Hotline, Zalo, Địa chỉ, Số Giấy phép, URL Video CSVC, Form Shortcode, Social links**
- [ ] **Step 2: Viết `inc/post-types.php` đăng ký Custom Post Type `service` và `doctor` với icon Dashicons và hỗ trợ taxonomy**
- [ ] **Step 3: Viết `inc/template-tags.php` chứa các hàm tiện ích lấy setting có giá trị fallback mặc định và render schema JSON-LD**
- [ ] **Step 4: Nạp các file trên vào `functions.php`**
- [ ] **Step 5: Kiểm tra cú pháp PHP**
- [ ] **Step 6: Commit Task 5**

---

### Task 6: Xây Dựng Các Template Trang Con (Subpages)

**Files:**
- Create: `wp-content/themes/mediora-clinic/page.php`
- Create: `wp-content/themes/mediora-clinic/page-about.php`
- Create: `wp-content/themes/mediora-clinic/page-services.php`
- Create: `wp-content/themes/mediora-clinic/page-contact.php`
- Create: `wp-content/themes/mediora-clinic/single.php`
- Create: `wp-content/themes/mediora-clinic/archive.php`

**Interfaces:**
- Consumes: CPT `service`, `doctor`, bài viết mặc định.
- Produces: Full subpages experience with breadcrumbs, luxury banners, and CTA boxes.

- [ ] **Step 1: Xây dựng `page.php` cho trang tĩnh thông thường**
- [ ] **Step 2: Xây dựng `page-about.php` (Về chúng tôi) với khối Lịch sử hình thành, Tầm nhìn - Sứ mệnh, Đội ngũ cố vấn y khoa**
- [ ] **Step 3: Xây dựng `page-services.php` (Danh mục Dịch vụ) hiển thị danh sách các dịch vụ phẫu thuật / thẩm mỹ nội khoa với bảng giá và quy trình**
- [ ] **Step 4: Xây dựng `page-contact.php` (Liên hệ) với Google Maps iframe, thông tin đặt hẹn và form liên hệ**
- [ ] **Step 5: Xây dựng `single.php` và `archive.php` cho chuyên mục Kiến thức làm đẹp / Tin tức y khoa**
- [ ] **Step 6: Kiểm tra cú pháp PHP toàn bộ các template**
- [ ] **Step 7: Commit Task 6**

---

### Task 7: Dữ Liệu Mẫu (Demo Data), Tài Liệu Hướng Dẫn & Kiểm Thử Toàn Diện

**Files:**
- Create: `wp-content/themes/mediora-clinic/demo-data/sample-data.xml`
- Create: `wp-content/themes/mediora-clinic/README.md`
- Create: `wp-content/themes/mediora-clinic/screenshot.png` (ảnh preview 1200x900)

- [ ] **Step 1: Tạo file XML dữ liệu mẫu `sample-data.xml` chứa sẵn các trang chính (Trang chủ, Về chúng tôi, Dịch vụ, Liên hệ) và bài viết demo**
- [ ] **Step 2: Tạo ảnh `screenshot.png` chuẩn kích thước hiển thị trong mục Giao diện của WordPress**
- [ ] **Step 3: Viết tài liệu `README.md` chi tiết bằng tiếng Việt: cách cài đặt theme qua WP Admin, cách import demo data, cách cấu hình Customizer và Contact Form**
- [ ] **Step 4: Kiểm thử toàn diện cú pháp PHP (`php -l` trên toàn bộ file .php)**
- [ ] **Step 5: Kiểm tra tính toàn vẹn của CSS, JS, responsive và các liên kết**
- [ ] **Step 6: Commit Task 7 và đóng gói**
