# Thiết Kế Kiến Trúc: WordPress Theme Phòng Khám Thẩm Mỹ (Mẫu Mediora)

- **Tên dự án:** Mediora Clinic WordPress Theme (`mediora-clinic`)
- **Ngày lập:** 13/11/2026
- **Tình trạng:** Đã thông qua thiết kế sơ bộ (Approved Design)
- **Mục tiêu:** Xây dựng bộ WordPress Theme cao cấp, độc lập, tối ưu hiệu năng và chuẩn SEO, tái hiện phong cách và trải nghiệm của website https://phongkhammediora.vn/.

---

## 1. Tổng Quan Kiến Trúc & Yêu Cầu Kỹ Thuật

### 1.1 Mục tiêu kỹ thuật
- **Nền tảng:** WordPress 6.x trở lên, tương thích PHP 7.4 – 8.3+.
- **Loại hình:** Custom WordPress Theme độc lập (Standalone Classic/Hybrid Theme), không phụ thuộc vào các Page Builder nặng như Elementor hay WPBakery.
- **Hiệu năng:** Điểm Google PageSpeed > 90 trên Desktop, thời gian tải trang < 1.5s. Hỗ trợ lazy-loading ảnh và video.
- **Responsive:** Hiển thị mượt mà trên Mobile (>= 360px), Tablet và Desktop (đến màn hình 2K/4K).
- **Chuẩn SEO Y Tế:** Cấu trúc thẻ Heading (H1-H4), Schema JSON-LD `MedicalBusiness` / `MedicalClinic`, thẻ OpenGraph và chuẩn điều hướng ngữ nghĩa HTML5.

### 1.2 Bảng màu & Typography (Luxury Aesthetic)
- **Background:** `#0b0f14` kết hợp `#111822` và gradient chiều sâu.
- **Accent Gold Gradient:** `linear-gradient(135deg, #d4af37 0%, #f3e5ab 50%, #aa771c 100%)`.
- **Text:** `#ffffff` (tiêu đề), `#cfd5db` (đoạn văn), `#d4af37` (nhấn mạnh).
- **Fonts:** Display/Serif hiện đại cho Headings + Sans-serif (Montserrat/Be Vietnam Pro/Inter) cho Body text.

---

## 2. Cấu Trúc File & Thư Mục Theme

```
wp-content/themes/mediora-clinic/
├── style.css                      # Khai báo metadata theme và style căn bản
├── screenshot.png                 # Ảnh đại diện hiển thị trong WP Admin Themes
├── functions.php                  # Nạp các module, enqueue scripts/styles, theme setup
├── index.php                      # Fallback template
├── header.php                     # Header: Topbar/Navigation/Logo/CTA/Mobile Drawer
├── footer.php                     # Footer: Giấy phép Sở Y Tế, Địa chỉ, Hotline, Social
├── front-page.php                 # Trang chủ Landing Page hoàn chỉnh
├── page.php                       # Template trang tĩnh tiêu chuẩn
├── page-about.php                 # Template trang "Về chúng tôi"
├── page-services.php              # Template trang "Dịch vụ"
├── page-contact.php               # Template trang "Liên hệ"
├── single.php                     # Template chi tiết bài viết (Single Post)
├── single-service.php             # Template chi tiết dịch vụ
├── archive.php                    # Template danh sách bài viết / tin tức
├── 404.php                        # Trang báo lỗi 404
│
├── inc/
│   ├── customizer.php             # Cấu hình WordPress Customizer (Logo, Hotline, Giấy phép, Video...)
│   ├── post-types.php             # Khai báo Custom Post Type: 'service', 'doctor'
│   ├── ajax-booking.php           # Xử lý gửi form đăng ký tư vấn qua AJAX & email admin
│   └── template-tags.php          # Helper functions format hotline, render schema...
│
├── assets/
│   ├── css/
│   │   ├── bootstrap-grid.min.css # Hệ thống lưới 12 cột responsive
│   │   ├── swiper-bundle.min.css  # CSS cho carousel khách hàng
│   │   └── theme-style.css        # Toàn bộ CSS phong cách luxury Mediora
│   ├── js/
│   │   ├── swiper-bundle.min.js   # JS Carousel
│   │   └── theme-main.js          # Xử lý mobile menu, video lazy load, ajax form booking
│   └── imgs/                      # Thư viện ảnh, vector SVG, khung mạ vàng, icon demo
│
└── demo-data/
    └── sample-data.xml            # Dữ liệu demo import nhanh qua Tools -> Import
```

---

## 3. Chi Tiết Các Khối Chức Năng Trang Chủ (`front-page.php`)

1. **Header & Navigation:**
   - Logo SVG độ nét cao.
   - Menu desktop & Mobile Drawer (Offcanvas) mượt mà.
   - Nút Hotline mạ vàng có hiệu ứng rung nhẹ (pulse).
   - Nút "Đăng ký tư vấn" kích hoạt cuộn mượt xuống Form hoặc mở Modal Popup.

2. **Hero & Khối Giới Thiệu (`sec-intro`):**
   - Định vị thương hiệu: Phòng khám Chuyên khoa Thẩm mỹ tiêu chuẩn quốc tế.
   - Khối triết lý điều trị cá nhân hóa và quy trình chuẩn y khoa.

3. **Dịch vụ Chủ Đạo & Quy Trình 6 Bước (`sec-gmiss`):**
   - Tiêu đề nghệ thuật và mô tả công nghệ trẻ hóa / nâng cơ.
   - 6 bước quy trình trực quan (Thăm khám bác sĩ chuyên khoa -> Quét chỉ số AI -> Hội chẩn phác đồ -> Vô cảm vô khuẩn -> Thực hiện thủ thuật -> Chăm sóc hậu phẫu).
   - Video / Visual minh họa trực quan.

4. **Cơ Sở Vật Chất 5 Sao (`sec-facility`):**
   - Khung viền mạ kim loại vàng (`Frameline.png`).
   - Video trình diễn không gian phòng khám 5 sao, tự động play câm (muted/loop/playsinline), có lazy-load khi người dùng cuộn đến để tối ưu dữ liệu mạng.

5. **Đội Ngũ Bác Sĩ Chuyên Khoa (`sec-doctor`):**
   - Trình diễn hình ảnh bác sĩ phẫu thuật tạo hình thẩm mỹ đầu ngành, số chứng chỉ hành nghề, học vị.

6. **Hiệu Quả Khách Hàng / Case Study (`sec-result`):**
   - Swiper slider hiển thị kết quả trước & sau, cảm nhận của nghệ sĩ / khách hàng thực tế.

7. **Form Đăng Ký Tư Vấn & Nhận Ưu Đãi (`sec-register`):**
   - Hỗ trợ Contact Form 7 / WPForms thông qua Shortcode cấu hình trong Customizer.
   - Tích hợp sẵn AJAX Built-in Form dự phòng (gửi trực tiếp đến email quản trị viên, thông báo popup thành công không reload trang).
   - Các trường thu thập: Họ và tên, Số điện thoại, Tình trạng/Dịch vụ quan tâm, Khung giờ tư vấn mong muốn.

8. **Footer Chuẩn Quy Định Y Tế (`site-footer`):**
   - Tên cơ sở y tế đầy đủ, cơ quan cấp phép (Sở Y Tế TP.HCM).
   - Địa chỉ phòng khám, số điện thoại hotline, email.
   - Liên kết mạng xã hội (Facebook, TikTok, Zalo, YouTube).

---

## 4. Quản Trị Hệ Thống Trong WordPress Admin

### 4.1 Customizer Settings (`Giao diện -> Tùy biến`)
- **Phần Thông Tin Phòng Khám:**
  - Tên phòng khám, Hotline hiển thị, Hotline quay số (`tel:`).
  - Địa chỉ phòng khám, Thông tin Giấy phép hoạt động Sở Y Tế.
  - Link Zalo, Fanpage Facebook, Kênh TikTok, YouTube.
- **Phần Media & Video:**
  - URL Video cơ sở vật chất (hỗ trợ link MP4 hoặc CDN).
  - Tải lên ảnh bìa Form đăng ký tư vấn.
- **Phần Form Đăng Ký:**
  - Ô nhập Shortcode (Contact Form 7 / WPForms).

### 4.2 Custom Post Types
- `service`: Quản lý danh mục và bài chi tiết dịch vụ thẩm mỹ.
- `doctor`: Quản lý danh sách bác sĩ chuyên khoa.

---

## 5. Kế Hoạch Kiểm Thử & Nghiệm Thu (Testing & Acceptance Criteria)
1. **Kiểm tra tương thích WordPress:** Kích hoạt theme trên WP mới không phát sinh warning/error PHP.
2. **Kiểm tra giao diện:** Khớp bố cục và phong cách màu sắc sang trọng của Mediora.
3. **Kiểm tra tương thích thiết bị:** Chạy mượt mà trên iPhone, Android, iPad và Desktop.
4. **Kiểm tra chức năng Form:** Gửi dữ liệu qua AJAX và kiểm tra nhận thông báo thành công.
5. **Kiểm tra tải trang:** Video CSVC chỉ tải khi cần (lazy-load), không làm chậm thời gian First Contentful Paint.
