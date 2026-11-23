<?php
/**
 * Trình Quản Lý Hình Ảnh Toàn Trang - vientrehoaSejang
 * 
 * Cho phép Quản trị viên thay đổi TẤT CẢ hình ảnh trên toàn bộ website:
 * - Trang Chủ (Hero Banners, GMISS 6 Bước, Bác sĩ, Khách hàng, Cover)
 * - Trang Dịch Vụ (Mẫu 1 & 2, Tiêu đề, Lợi ích, Bác sĩ, Slider)
 * - Trang Về Chúng Tôi (Hero, Minh họa, Tầm nhìn, Sứ mệnh, 6 Giá trị)
 * - Trang Liên Hệ (Banner, Bìa)
 * - Header & Footer (Logo chính, Logo chân trang)
 *
 * @package Mediora_Clinic
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Định nghĩa từ điển toàn bộ hình ảnh trên Website
 */
function mediora_get_site_images_schema() {
	return array(
		'home' => array(
			'title'   => '🏠 Trang Chủ',
			'desc'    => 'Toàn bộ hình ảnh hiển thị trên Trang Chủ (Banners, Quy trình GMISS 6 bước, Video, Bác sĩ, Khách hàng thực tế)',
			'page_id' => 101,
			'items'   => array(
				'home_banner_1'       => array(
					'label'   => 'Banner 1 - Hero Slider đầu trang',
					'desc'    => 'Kích thước chuẩn: 1920 × 1080 px (Khuyên dùng JPG / WebP)',
					'default' => 'assets/imgs/m1-1-1.png',
				),
				'home_banner_2'       => array(
					'label'   => 'Banner 2 - Hero Slider đầu trang',
					'desc'    => 'Kích thước chuẩn: 1920 × 1080 px',
					'default' => 'assets/imgs/m1-2-1.png',
				),
				'home_banner_3'       => array(
					'label'   => 'Banner 3 - Hero Slider đầu trang',
					'desc'    => 'Kích thước chuẩn: 1920 × 1080 px',
					'default' => 'assets/imgs/m1-3-1.png',
				),
				'home_banner_4'       => array(
					'label'   => 'Banner 4 - Hero Slider đầu trang',
					'desc'    => 'Kích thước chuẩn: 1920 × 1080 px',
					'default' => 'assets/imgs/m1-4-1.png',
				),
				'home_gmiss_title'    => array(
					'label'   => 'Ảnh chữ tiêu đề Nâng Cơ GMISS (Chữ nghệ thuật mạ vàng)',
					'desc'    => 'Kích thước chuẩn: 805 × 282 px (Khuyên dùng PNG trong suốt)',
					'default' => 'assets/imgs/21.png',
				),
				'home_step_1'         => array(
					'label'   => 'Bước 1 GMISS - Thăm khám cùng bác sĩ',
					'desc'    => 'Kích thước: 408 × 265 px (PNG trong suốt hoặc JPG)',
					'default' => 'assets/imgs/step21.png',
				),
				'home_step_2'         => array(
					'label'   => 'Bước 2 GMISS - Quét chỉ số AI Factional',
					'desc'    => 'Kích thước: 408 × 265 px',
					'default' => 'assets/imgs/step22.png',
				),
				'home_step_3'         => array(
					'label'   => 'Bước 3 GMISS - Đo vẽ xác định vùng can thiệp',
					'desc'    => 'Kích thước: 408 × 265 px',
					'default' => 'assets/imgs/step23.png',
				),
				'home_step_4'         => array(
					'label'   => 'Bước 4 GMISS - Sát khuẩn Povidine chuẩn vô trùng',
					'desc'    => 'Kích thước: 408 × 265 px',
					'default' => 'assets/imgs/step24.png',
				),
				'home_step_5'         => array(
					'label'   => 'Bước 5 GMISS - Sử dụng sợi GMISS nâng kéo tầng SMAS',
					'desc'    => 'Kích thước: 408 × 265 px',
					'default' => 'assets/imgs/step25.png',
				),
				'home_step_6'         => array(
					'label'   => 'Bước 6 GMISS - Dặn dò sau điều trị & Chăm sóc',
					'desc'    => 'Kích thước: 408 × 265 px',
					'default' => 'assets/imgs/step26.png',
				),
				'home_video_poster'   => array(
					'label'   => 'Ảnh bìa Video TVC GMISS (Poster)',
					'desc'    => 'Kích thước chuẩn: 854 × 480 px hoặc 1920 × 1080 px',
					'default' => 'assets/imgs/bg_video.png',
				),
				'home_facility_frame' => array(
					'label'   => 'Khung mạ vàng Cơ sở vật chất 5 sao',
					'desc'    => 'Kích thước chuẩn: 1732 × 997 px (PNG viền hoàng gia)',
					'default' => 'assets/imgs/Frameline.png',
				),
				'home_doctor'         => array(
					'label'   => 'Ảnh Đội ngũ Bác sĩ chuyên khoa Phẫu thuật Tạo hình Thẩm mỹ',
					'desc'    => 'Kích thước chuẩn: 1583 × 762 px (PNG tách nền hoặc JPG sắc nét)',
					'default' => 'assets/imgs/doctor1.png',
				),
				'home_customer_1'     => array(
					'label'   => 'Khách hàng 1 - Diễn viên Ngân Quỳnh',
					'desc'    => 'Kích thước: 1846 × 966 px',
					'default' => 'assets/imgs/kh-ngan-quynh.png',
				),
				'home_customer_2'     => array(
					'label'   => 'Khách hàng 2 - Chị Hiền Phạm',
					'desc'    => 'Kích thước: 1846 × 966 px',
					'default' => 'assets/imgs/kh-hien-pham.png',
				),
				'home_customer_3'     => array(
					'label'   => 'Khách hàng 3 - Chị Vi Tường (36 tuổi)',
					'desc'    => 'Kích thước: 1846 × 966 px',
					'default' => 'assets/imgs/kh-vi-tuong.png',
				),
				'home_cover'          => array(
					'label'   => 'Ảnh bìa Form Đăng ký nhận ưu đãi (Cột trái)',
					'desc'    => 'Kích thước chuẩn: 1287 × 724 px',
					'default' => 'assets/imgs/cover.jpg',
				),
			),
		),
		'services' => array(
			'title'   => '✨ Trang Dịch Vụ',
			'desc'    => 'Toàn bộ hình ảnh Trang Dịch Vụ GMISS (2 Người mẫu đối xứng, 3 Khối lợi ích, Bác sĩ podium, 6 bước, Slider)',
			'page_id' => 103,
			'items'   => array(
				'services_bg_1'          => array(
					'label'   => 'Ảnh nền Section 1 (Intro Dịch vụ)',
					'desc'    => 'Kích thước chuẩn: 1920 × 1776 px (JPG/WebP)',
					'default' => 'assets/img-services/bg1.jpg',
				),
				'services_maintext'      => array(
					'label'   => 'Ảnh tiêu đề chính - NÂNG CƠ TRẺ HÓA GMISS',
					'desc'    => 'Kích thước: 1058 × 110 px (PNG chữ nghệ thuật mạ vàng)',
					'default' => 'assets/img-services/maintext.png',
				),
				'services_subtext'       => array(
					'label'   => 'Ảnh tiêu đề phụ - Nâng đỡ đường nét tôn vinh vẻ đẹp',
					'desc'    => 'Kích thước: 735 × 183 px (PNG trong suốt)',
					'default' => 'assets/img-services/subtext.png',
				),
				'services_model_1'       => array(
					'label'   => 'Ảnh Người mẫu 1 (Bên trái) - Tự căn tỷ lệ cân đối',
					'desc'    => 'Kích thước chuẩn: 580 × 850 px (Khuyên dùng PNG tách nền)',
					'default' => 'assets/img-services/mau-1.png',
				),
				'services_model_2'       => array(
					'label'   => 'Ảnh Người mẫu 2 (Bên phải) - Tự căn tỷ lệ cân đối',
					'desc'    => 'Kích thước chuẩn: 580 × 850 px (Khuyên dùng PNG tách nền)',
					'default' => 'assets/img-services/mau-2.png',
				),
				'services_benefit_1'     => array(
					'label'   => 'Khối lợi ích 1 - Nâng đỡ mô mềm, cải thiện sa trễ',
					'desc'    => 'Kích thước: 1101 × 267 px',
					'default' => 'assets/img-services/benefit-01.png',
				),
				'services_benefit_2'     => array(
					'label'   => 'Khối lợi ích 2 - Hỗ trợ cải thiện độ săn chắc của da',
					'desc'    => 'Kích thước: 1101 × 267 px',
					'default' => 'assets/img-services/benefit-02.png',
				),
				'services_benefit_3'     => array(
					'label'   => 'Khối lợi ích 3 - Cá nhân hóa giải pháp trẻ hóa',
					'desc'    => 'Kích thước: 1101 × 267 px',
					'default' => 'assets/img-services/benefit-03.png',
				),
				'services_bg_2'          => array(
					'label'   => 'Ảnh nền Section 2 (Quy trình 6 bước & Bác sĩ)',
					'desc'    => 'Kích thước: 1920 × 1458 px',
					'default' => 'assets/img-services/bg2.jpg',
				),
				'services_process_title' => array(
					'label'   => 'Ảnh tiêu đề Quy trình thực hiện GMISS',
					'desc'    => 'Kích thước: 1216 × 253 px (PNG trong suốt)',
					'default' => 'assets/img-services/process-title.png',
				),
				'services_doctor'        => array(
					'label'   => 'Ảnh Bác sĩ đứng bục Podium trung tâm',
					'desc'    => 'Kích thước chuẩn: 722 × 881 px (PNG tách nền chất lượng cao)',
					'default' => 'assets/img-services/podium-bs.png',
				),
				'services_step_1'        => array(
					'label'   => 'Bước 1 dịch vụ - Thăm khám chuyên sâu cùng Bác sĩ',
					'desc'    => 'Kích thước: 626 × 391 px',
					'default' => 'assets/img-services/step-01.png',
				),
				'services_step_2'        => array(
					'label'   => 'Bước 2 dịch vụ - Soi da đa tầng & phác đồ cá nhân hóa',
					'desc'    => 'Kích thước: 626 × 391 px',
					'default' => 'assets/img-services/step-02.png',
				),
				'services_step_3'        => array(
					'label'   => 'Bước 3 dịch vụ - Đo vẽ đánh dấu chính xác vùng can thiệp',
					'desc'    => 'Kích thước: 626 × 391 px',
					'default' => 'assets/img-services/step-03.png',
				),
				'services_step_4'        => array(
					'label'   => 'Bước 4 dịch vụ - Vô trùng 1 chiều chuẩn y khoa',
					'desc'    => 'Kích thước: 626 × 391 px',
					'default' => 'assets/img-services/step-04.png',
				),
				'services_step_5'        => array(
					'label'   => 'Bước 5 dịch vụ - Tiến hành nâng cơ bằng sợi GMISS',
					'desc'    => 'Kích thước: 626 × 391 px',
					'default' => 'assets/img-services/step-05.png',
				),
				'services_step_6'        => array(
					'label'   => 'Bước 6 dịch vụ - Dặn dò từ bác sĩ & theo dõi hậu phẫu',
					'desc'    => 'Kích thước: 626 × 391 px',
					'default' => 'assets/img-services/step-06.png',
				),
				'services_bg_journey'    => array(
					'label'   => 'Ảnh nền Section 3 (Hành trình khách hàng)',
					'desc'    => 'Kích thước: 1920 × 1000 px',
					'default' => 'assets/img-services/bg-journey.jpg',
				),
				'services_frame_line'    => array(
					'label'   => 'Khung viền mạ vàng Slider Hành trình',
					'desc'    => 'Kích thước: 1732 × 997 px (PNG viền hoàng gia)',
					'default' => 'assets/img-services/frame-line.png',
				),
				'services_journey_title' => array(
					'label'   => 'Ảnh chữ tiêu đề - Mỗi khách hàng một hành trình',
					'desc'    => 'Kích thước: 511 × 292 px (PNG chữ nghệ thuật)',
					'default' => 'assets/img-services/journey-title.png',
				),
				'services_journey_1'     => array(
					'label'   => 'Slider Khách hàng 1 (Trước & Sau - Diễn viên Ngân Quỳnh)',
					'desc'    => 'Kích thước chuẩn: 791 × 624 px',
					'default' => 'assets/img-services/ba-ngan-quynh.png',
				),
				'services_journey_2'     => array(
					'label'   => 'Slider Khách hàng 2 (Trước & Sau - Chị Thảo)',
					'desc'    => 'Kích thước chuẩn: 791 × 624 px',
					'default' => 'assets/img-services/ba-thao.png',
				),
				'services_btn_consult'   => array(
					'label'   => 'Ảnh Nút bấm - Nhận tư vấn ngay',
					'desc'    => 'Kích thước: 365 × 53 px (PNG nút bấm mạ vàng)',
					'default' => 'assets/img-services/btn-consult.png',
				),
			),
		),
		'about' => array(
			'title'   => '👑 Trang Về Chúng Tôi',
			'desc'    => 'Toàn bộ hình ảnh Trang Giới Thiệu (Hero, Minh họa CSVC, Tầm nhìn, Sứ mệnh, 6 Thẻ giá trị cốt lõi)',
			'page_id' => 102,
			'items'   => array(
				'about_bg_hero'         => array(
					'label'   => 'Ảnh nền Hero Banner đầu trang',
					'desc'    => 'Kích thước: 1920 × 840 px (JPG/WebP)',
					'default' => 'assets/img-about-us/bg-hero.jpg',
				),
				'about_text_hero'       => array(
					'label'   => 'Ảnh chữ nghệ thuật Hero Banner',
					'desc'    => 'Kích thước: 1374 × 160 px (PNG trong suốt)',
					'default' => 'assets/img-about-us/text-hero.png',
				),
				'about_bg_vision'       => array(
					'label'   => 'Ảnh nền Tầm nhìn & Sứ mệnh',
					'desc'    => 'Kích thước: 1920 × 2029 px',
					'default' => 'assets/img-about-us/bg-vision.webp',
				),
				'about_minh_hoa'        => array(
					'label'   => 'Ảnh minh họa Cơ sở vật chất & Thiết bị hiện đại',
					'desc'    => 'Kích thước: 657 × 653 px (PNG tách nền)',
					'default' => 'assets/img-about-us/minh-hoa.png',
				),
				'about_tam_nhin'        => array(
					'label'   => 'Huy hiệu Tầm Nhìn',
					'desc'    => 'Kích thước: 249 × 55 px (PNG trong suốt)',
					'default' => 'assets/img-about-us/tam-nhin.png',
				),
				'about_su_menh'         => array(
					'label'   => 'Huy hiệu Sứ Mệnh',
					'desc'    => 'Kích thước: 249 × 55 px (PNG trong suốt)',
					'default' => 'assets/img-about-us/su-menh.png',
				),
				'about_gia_tri_cot_loi' => array(
					'label'   => 'Huy hiệu Giá Trị Cốt Lõi',
					'desc'    => 'Kích thước: 317 × 55 px (PNG trong suốt)',
					'default' => 'assets/img-about-us/gia-tri-cot-loi.png',
				),
				'about_value_1'         => array(
					'label'   => 'Thẻ Giá trị 01 - CHUẨN MỰC Y KHOA',
					'desc'    => 'Kích thước: 505 × 213 px',
					'default' => 'assets/img-about-us/value-01.png',
				),
				'about_value_2'         => array(
					'label'   => 'Thẻ Giá trị 02 - CÁ NHÂN HÓA GIẢI PHÁP',
					'desc'    => 'Kích thước: 517 × 243 px',
					'default' => 'assets/img-about-us/value-02.png',
				),
				'about_value_3'         => array(
					'label'   => 'Thẻ Giá trị 03 - MINH BẠCH TRONG TƯ VẤN',
					'desc'    => 'Kích thước: 545 × 242 px',
					'default' => 'assets/img-about-us/value-03.png',
				),
				'about_value_4'         => array(
					'label'   => 'Thẻ Giá trị 04 - AN TOÀN VÀ TRÁCH NHIỆM',
					'desc'    => 'Kích thước: 523 × 242 px',
					'default' => 'assets/img-about-us/value-04.png',
				),
				'about_value_5'         => array(
					'label'   => 'Thẻ Giá trị 05 - THẨM MỸ TINH TẾ',
					'desc'    => 'Kích thước: 505 × 243 px',
					'default' => 'assets/img-about-us/value-05.png',
				),
				'about_value_6'         => array(
					'label'   => 'Thẻ Giá trị 06 - ĐỒNG HÀNH TẬN TÂM',
					'desc'    => 'Kích thước: 505 × 243 px',
					'default' => 'assets/img-about-us/value-06.png',
				),
			),
		),
		'contact' => array(
			'title'   => '📞 Trang Liên Hệ',
			'desc'    => 'Hình ảnh hiển thị trên Trang Liên Hệ & Cơ sở',
			'page_id' => 104,
			'items'   => array(
				'contact_banner_bg' => array(
					'label'   => 'Ảnh nền Banner đầu trang Liên Hệ',
					'desc'    => 'Kích thước: 1920 × 450 px',
					'default' => 'assets/imgs/bg_video.png',
				),
			),
		),
		'global' => array(
			'title'   => '🌐 Logo & Header / Footer',
			'desc'    => 'Logo nhận diện thương hiệu hiển thị cố định trên Đầu Trang (Header) và Chân Trang (Footer)',
			'page_id' => 0,
			'items'   => array(
				'site_logo'   => array(
					'label'   => 'Logo chính Website (Header)',
					'desc'    => 'Kích thước chuẩn: 382 × 75 px (SVG hoặc PNG trong suốt)',
					'default' => 'assets/imgs/Logo.svg',
				),
				'footer_logo' => array(
					'label'   => 'Logo Chân Trang (Footer)',
					'desc'    => 'Kích thước chuẩn: 461 × 104 px (SVG hoặc PNG trong suốt)',
					'default' => 'assets/imgs/logo-footer.svg',
				),
			),
		),
	);
}

/**
 * Hàm lấy URL ảnh thông minh với 3 lớp fallback:
 * 1. Post Meta của trang hiện tại (nếu có)
 * 2. Theme Option lưu tập trung
 * 3. File tài nguyên ảnh mặc định của Theme
 *
 * @param string $key Mã định danh ảnh (vd: home_banner_1, services_model_1)
 * @param string $default_relative Đường dẫn relative mặc định (tùy chọn)
 * @param int $post_id ID của post/page (tùy chọn)
 * @return string URL ảnh đầy đủ
 */
function mediora_get_image( $key, $default_relative = '', $post_id = 0 ) {
	$theme_uri = get_template_directory_uri();

	// 1. Thử lấy từ post meta nếu có ID hoặc đang ở trang Page
	if ( ! $post_id && is_singular( 'page' ) ) {
		$post_id = get_the_ID();
	}
	if ( $post_id ) {
		$val = get_post_meta( $post_id, '_mediora_' . $key, true );
		if ( ! empty( $val ) ) {
			return $val;
		}
	}

	// 2. Thử lấy từ Theme Option lưu tập trung
	$theme_images = get_option( 'mediora_theme_images', array() );
	if ( is_array( $theme_images ) && ! empty( $theme_images[ $key ] ) ) {
		return $theme_images[ $key ];
	}

	// 3. Tra cứu đường dẫn mặc định trong schema nếu chưa truyền vào
	if ( empty( $default_relative ) && function_exists( 'mediora_get_site_images_schema' ) ) {
		$schema = mediora_get_site_images_schema();
		foreach ( $schema as $sec ) {
			if ( isset( $sec['items'][ $key ]['default'] ) ) {
				$default_relative = $sec['items'][ $key ]['default'];
				break;
			}
		}
	}

	if ( ! empty( $default_relative ) ) {
		if ( 0 === strpos( $default_relative, 'http://' ) || 0 === strpos( $default_relative, 'https://' ) ) {
			return $default_relative;
		}
		return $theme_uri . '/' . ltrim( $default_relative, '/' );
	}

	return '';
}

/**
 * Thêm trang Quản Lý Hình Ảnh vào Menu WP Admin
 */
function mediora_register_image_manager_menu() {
	add_menu_page(
		'Quản Lý Hình Ảnh',
		'Quản Lý Hình Ảnh',
		'manage_options',
		'mediora-images',
		'mediora_render_images_admin_page',
		'dashicons-format-image',
		25
	);
}
add_action( 'admin_menu', 'mediora_register_image_manager_menu' );

/**
 * Load Media Uploader Scripts & Styles cho trang Quản Lý Hình Ảnh
 */
function mediora_image_manager_admin_assets( $hook ) {
	if ( 'toplevel_page_mediora-images' === $hook ) {
		wp_enqueue_media();
	}
}
add_action( 'admin_enqueue_scripts', 'mediora_image_manager_admin_assets' );

/**
 * Xử lý lưu form Quản Lý Hình Ảnh
 */
function mediora_handle_save_theme_images() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Bạn không có quyền thực hiện thao tác này.' );
	}

	check_admin_referer( 'mediora_save_images_action', 'mediora_save_images_nonce' );

	$submitted_images = isset( $_POST['mediora_img'] ) && is_array( $_POST['mediora_img'] ) ? $_POST['mediora_img'] : array();
	$sanitized_images = array();
	$schema           = mediora_get_site_images_schema();

	foreach ( $schema as $sec_key => $section ) {
		$page_id = ! empty( $section['page_id'] ) ? (int) $section['page_id'] : 0;
		foreach ( $section['items'] as $item_key => $item_data ) {
			$val = isset( $submitted_images[ $item_key ] ) ? esc_url_raw( trim( $submitted_images[ $item_key ] ) ) : '';
			$sanitized_images[ $item_key ] = $val;

			// Đồng bộ đồng thời vào Post Meta của Trang tương ứng
			if ( $page_id > 0 ) {
				if ( ! empty( $val ) ) {
					update_post_meta( $page_id, '_mediora_' . $item_key, $val );
				} else {
					delete_post_meta( $page_id, '_mediora_' . $item_key );
				}
			}
		}
	}

	update_option( 'mediora_theme_images', $sanitized_images );

	$active_tab = isset( $_POST['active_tab'] ) ? sanitize_key( $_POST['active_tab'] ) : 'home';
	wp_safe_redirect( admin_url( 'admin.php?page=mediora-images&tab=' . $active_tab . '&updated=1' ) );
	exit;
}
add_action( 'admin_post_mediora_save_theme_images', 'mediora_handle_save_theme_images' );

/**
 * Giao diện Trang Quản Lý Hình Ảnh Toàn Website
 */
function mediora_render_images_admin_page() {
	$schema     = mediora_get_site_images_schema();
	$active_tab = isset( $_GET['tab'] ) && isset( $schema[ $_GET['tab'] ] ) ? sanitize_key( $_GET['tab'] ) : 'home';
	$is_updated = isset( $_GET['updated'] );
	$theme_uri  = get_template_directory_uri();
	?>
	<div class="wrap mediora-img-manager-wrap">
		<h1 class="wp-heading-inline">🖼️ Quản Lý Hình Ảnh Toàn Bộ Website – vientrehoaSejang</h1>
		<hr class="wp-header-end">

		<?php if ( $is_updated ) : ?>
			<div class="notice notice-success is-dismissible" style="border-left-color: #d4af37; background: #fffcf0; padding: 12px 15px; margin: 15px 0;">
				<p><strong>✅ Đã lưu thành công tất cả hình ảnh!</strong> Giao diện website đã được cập nhật ngay lập tức.</p>
			</div>
		<?php endif; ?>

		<div class="mediora-notice-bar">
			<p>💡 <strong>Hướng dẫn:</strong> Bấm vào nút <strong>"Chọn / Tải ảnh lên"</strong> ở từng mục để đổi hình ảnh theo ý muốn. Bấm <strong>"Xóa (Mặc định)"</strong> để quay về ảnh gốc của theme. Đừng quên bấm nút <strong>"LƯU THAY ĐỔI"</strong> sau khi chỉnh sửa!</p>
		</div>

		<!-- Tab Navigation -->
		<nav class="nav-tab-wrapper mediora-tabs">
			<?php foreach ( $schema as $tab_key => $tab_data ) : ?>
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mediora-images&tab=' . $tab_key ) ); ?>" 
				   class="nav-tab <?php echo $tab_key === $active_tab ? 'nav-tab-active' : ''; ?>">
					<?php echo esc_html( $tab_data['title'] ); ?>
				</a>
			<?php endforeach; ?>
		</nav>

		<!-- Main Form -->
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="mediora-images-form">
			<input type="hidden" name="action" value="mediora_save_theme_images">
			<input type="hidden" name="active_tab" value="<?php echo esc_attr( $active_tab ); ?>">
			<?php wp_nonce_field( 'mediora_save_images_action', 'mediora_save_images_nonce' ); ?>

			<div class="tab-content-container">
				<?php 
				$current_section = $schema[ $active_tab ];
				?>
				<div class="tab-header-box">
					<h2><?php echo esc_html( $current_section['title'] ); ?></h2>
					<p class="tab-desc"><?php echo esc_html( $current_section['desc'] ); ?></p>
				</div>

				<div class="mediora-img-grid">
					<?php foreach ( $current_section['items'] as $item_key => $item ) : 
						$current_url = mediora_get_image( $item_key, $item['default'] );
						$raw_saved   = mediora_get_image( $item_key );
						$default_url = $theme_uri . '/' . ltrim( $item['default'], '/' );
					?>
						<div class="mediora-img-card" id="card-<?php echo esc_attr( $item_key ); ?>">
							<div class="mediora-card-header">
								<h3 class="mediora-img-title"><?php echo esc_html( $item['label'] ); ?></h3>
								<span class="mediora-img-hint"><?php echo esc_html( $item['desc'] ); ?></span>
							</div>

							<div class="mediora-preview-container">
								<div class="mediora-preview-box">
									<img src="<?php echo esc_url( $current_url ); ?>" 
									     alt="<?php echo esc_attr( $item['label'] ); ?>" 
									     id="preview-<?php echo esc_attr( $item_key ); ?>" 
									     data-default="<?php echo esc_url( $default_url ); ?>">
								</div>
							</div>

							<div class="mediora-card-controls">
								<input type="text" 
								       name="mediora_img[<?php echo esc_attr( $item_key ); ?>]" 
								       id="input-<?php echo esc_attr( $item_key ); ?>" 
								       value="<?php echo esc_attr( $raw_saved ); ?>" 
								       placeholder="Đang dùng ảnh gốc mặc định..." 
								       class="widefat mediora-url-input" 
								       readonly>
								
								<div class="mediora-btn-group">
									<button type="button" 
									        class="button button-primary mediora-btn-upload js-upload-btn" 
									        data-target-input="input-<?php echo esc_attr( $item_key ); ?>" 
									        data-target-preview="preview-<?php echo esc_attr( $item_key ); ?>">
										📁 Chọn / Tải ảnh lên
									</button>
									<button type="button" 
									        class="button mediora-btn-remove js-remove-btn" 
									        data-target-input="input-<?php echo esc_attr( $item_key ); ?>" 
									        data-target-preview="preview-<?php echo esc_attr( $item_key ); ?>"
									        data-default="<?php echo esc_url( $default_url ); ?>">
										↺ Xóa (Mặc định)
									</button>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<!-- Sticky Bottom Bar -->
			<div class="mediora-save-bar">
				<div class="save-bar-inner">
					<span>✨ Đang chỉnh sửa: <strong><?php echo esc_html( $current_section['title'] ); ?></strong></span>
					<button type="submit" class="button button-primary button-hero mediora-submit-btn">
						💾 LƯU TẤT CẢ THAY ĐỔI
					</button>
				</div>
			</div>
		</form>
	</div>

	<style>
		.mediora-img-manager-wrap {
			max-width: 1300px;
			margin: 20px 20px 80px 10px;
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
		}
		.mediora-notice-bar {
			background: #111722;
			color: #dcdcdc;
			border-left: 4px solid #d4af37;
			padding: 12px 18px;
			border-radius: 4px;
			margin-bottom: 20px;
			box-shadow: 0 4px 12px rgba(0,0,0,0.08);
		}
		.mediora-notice-bar strong { color: #f5cf6d; }
		.nav-tab-wrapper.mediora-tabs {
			margin-bottom: 0;
			border-bottom: 2px solid #d4af37;
			display: flex;
			flex-wrap: wrap;
			gap: 4px;
		}
		.mediora-tabs .nav-tab {
			font-size: 15px;
			font-weight: 600;
			padding: 10px 20px;
			background: #f0f0f1;
			border: 1px solid #ccd0d4;
			border-bottom: none;
			border-radius: 6px 6px 0 0;
			color: #3c434a;
			transition: all 0.2s ease;
		}
		.mediora-tabs .nav-tab:hover {
			background: #e6e6e6;
			color: #b38b22;
		}
		.mediora-tabs .nav-tab-active,
		.mediora-tabs .nav-tab-active:hover {
			background: #111722 !important;
			color: #f5cf6d !important;
			border-color: #d4af37 !important;
			border-bottom-color: #111722 !important;
		}
		.tab-content-container {
			background: #fff;
			border: 1px solid #ccd0d4;
			border-top: none;
			padding: 24px;
			border-radius: 0 0 8px 8px;
			box-shadow: 0 4px 16px rgba(0,0,0,0.04);
		}
		.tab-header-box {
			margin-bottom: 25px;
			padding-bottom: 15px;
			border-bottom: 1px dashed #dcdcde;
		}
		.tab-header-box h2 {
			font-size: 20px;
			color: #1d2327;
			margin: 0 0 6px 0;
		}
		.tab-desc {
			color: #646970;
			font-size: 14px;
			margin: 0;
		}
		.mediora-img-grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
			gap: 22px;
		}
		.mediora-img-card {
			background: #f8f9fa;
			border: 1px solid #e2e4e7;
			border-radius: 8px;
			padding: 16px;
			display: flex;
			flex-column: column;
			justify-content: space-between;
			transition: all 0.25s ease;
			box-shadow: 0 2px 6px rgba(0,0,0,0.03);
		}
		.mediora-img-card:hover {
			border-color: #d4af37;
			box-shadow: 0 6px 18px rgba(212,175,55,0.15);
		}
		.mediora-card-header {
			margin-bottom: 12px;
		}
		.mediora-img-title {
			font-size: 14px;
			font-weight: 700;
			color: #1d2327;
			margin: 0 0 4px 0;
			line-height: 1.4;
		}
		.mediora-img-hint {
			font-size: 12px;
			color: #8c8f94;
			display: block;
		}
		.mediora-preview-container {
			background: #111722;
			border-radius: 6px;
			padding: 10px;
			display: flex;
			align-items: center;
			justify-content: center;
			margin-bottom: 14px;
			min-height: 160px;
			border: 1px solid #232c3d;
		}
		.mediora-preview-box img {
			max-width: 100%;
			max-height: 150px;
			height: auto;
			object-fit: contain;
			display: block;
			border-radius: 4px;
		}
		.mediora-url-input {
			font-size: 12px !important;
			color: #646970 !important;
			background: #f0f0f1 !important;
			margin-bottom: 10px !important;
			padding: 4px 8px !important;
			border-radius: 4px !important;
		}
		.mediora-btn-group {
			display: flex;
			gap: 8px;
		}
		.mediora-btn-upload {
			background: #d4af37 !important;
			border-color: #b38b22 !important;
			color: #111722 !important;
			font-weight: 600 !important;
			flex: 1;
		}
		.mediora-btn-upload:hover {
			background: #f5cf6d !important;
			color: #000 !important;
		}
		.mediora-btn-remove {
			background: #f6f7f7 !important;
			color: #d63638 !important;
			border-color: #dcdcde !important;
		}
		.mediora-btn-remove:hover {
			background: #fbeaea !important;
			border-color: #d63638 !important;
		}
		.mediora-save-bar {
			position: sticky;
			bottom: 20px;
			z-index: 99;
			margin-top: 30px;
			background: #111722;
			border: 1px solid #d4af37;
			border-radius: 8px;
			padding: 14px 24px;
			box-shadow: 0 8px 30px rgba(0,0,0,0.3);
			color: #fff;
		}
		.save-bar-inner {
			display: flex;
			align-items: center;
			justify-content: space-between;
		}
		.save-bar-inner span {
			font-size: 15px;
		}
		.save-bar-inner strong {
			color: #f5cf6d;
		}
		.mediora-submit-btn {
			background: linear-gradient(135deg, #d4af37, #f5cf6d) !important;
			color: #111722 !important;
			border: none !important;
			font-weight: 700 !important;
			font-size: 15px !important;
			padding: 10px 28px !important;
			box-shadow: 0 4px 12px rgba(212,175,55,0.4) !important;
			cursor: pointer;
		}
		.mediora-submit-btn:hover {
			background: linear-gradient(135deg, #f5cf6d, #ffffff) !important;
			color: #000 !important;
			transform: translateY(-1px);
		}
	</style>

	<script>
	jQuery(document).ready(function($){
		// Open WP Media Library on click
		$('.js-upload-btn').on('click', function(e){
			e.preventDefault();
			var btn = $(this);
			var targetInputId = btn.data('target-input');
			var targetPreviewId = btn.data('target-preview');
			var customUploader = wp.media({
				title: 'Chọn hoặc tải ảnh lên',
				button: { text: 'Sử dụng ảnh này' },
				multiple: false
			}).on('select', function(){
				var attachment = customUploader.state().get('selection').first().toJSON();
				$('#' + targetInputId).val(attachment.url);
				$('#' + targetPreviewId).attr('src', attachment.url);
			}).open();
		});

		// Remove custom image / revert to default
		$('.js-remove-btn').on('click', function(e){
			e.preventDefault();
			var btn = $(this);
			var targetInputId = btn.data('target-input');
			var targetPreviewId = btn.data('target-preview');
			var defaultUrl = btn.data('default');
			$('#' + targetInputId).val('');
			$('#' + targetPreviewId).attr('src', defaultUrl);
		});
	});
	</script>
	<?php
}
