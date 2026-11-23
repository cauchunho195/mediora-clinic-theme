<?php
/**
 * The template for displaying the front page / landing page
 *
 * Recreates the complete Mediora Clinic luxury landing page experience:
 * - Hero Banner Slider (Swiper)
 * - Philosophy / Aesthetic Introduction (sec-intro)
 * - GMISS Bio-Thread Lifting 6-Step Medical Procedure & Video Demo (sec-gmiss)
 * - 5-Star Luxury Medical Facilities with Golden Frame & Lazy-load Video (sec-facility)
 * - Specialist Medical Doctors & Surgeons Banner (sec-doctor)
 * - Real Customer Case Studies & Celebrities Swiper Slider (sec-result)
 * - Special Consultation Registration & Appointment Booking Block (sec-register)
 *
 * @package Mediora_Clinic
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$theme_uri  = get_template_directory_uri();
$front_id   = (int) get_option( 'page_on_front', get_the_ID() );

// Lấy dữ liệu video từ Meta Box hoặc fallback
$custom_facility_vid = get_post_meta( $front_id, '_mediora_home_facility_video', true );
$facility_video_url  = ! empty( $custom_facility_vid ) ? $custom_facility_vid : mediora_get_option( 'facility_video_url', 'https://d1b6kbmv97kzjg.cloudfront.net/wp-content/uploads/2026/11/CSVC.mp4' );

$custom_gmiss_vid    = get_post_meta( $front_id, '_mediora_home_gmiss_video', true );
$gmiss_video_url     = ! empty( $custom_gmiss_vid ) ? $custom_gmiss_vid : mediora_get_option( 'gmiss_video_url', 'https://d1b6kbmv97kzjg.cloudfront.net/wp-content/uploads/2026/11/tvc.mp4' );

// Lấy đoạn văn bản triết lý thẩm mỹ
$custom_intro        = get_post_meta( $front_id, '_mediora_home_intro_text', true );
$intro_text_default  = 'Viện Trẻ Hóa Sejang (vientrehoaSejang) định hướng phát triển theo tiêu chuẩn thẩm mỹ chuyên nghiệp, kết hợp nền tảng chuyên môn y khoa, công nghệ hiện đại và chiến lược cá nhân hóa trong từng chỉ định. Điểm khác biệt của Sejang nằm ở tư duy thẩm mỹ tổng thể, quy trình thực hiện chuẩn hóa và sự theo sát xuyên suốt hành trình khách hàng, hướng đến kết quả hài hòa, tự nhiên và tôn vinh vẻ đẹp thanh xuân của mỗi người.';
$intro_text          = ! empty( $custom_intro ) ? $custom_intro : mediora_get_option( 'intro_text', $intro_text_default );

// Lấy 4 banner
$banners = array();
for ( $b = 1; $b <= 4; $b++ ) {
	$banners[ $b ] = mediora_get_image( 'home_banner_' . $b, 'assets/imgs/m1-' . $b . '-1.png', $front_id );
}

$register_cover   = mediora_get_image( 'home_cover', 'assets/imgs/cover.jpg', $front_id );
$gmiss_title_img  = mediora_get_image( 'home_gmiss_title', 'assets/imgs/21.png', $front_id );
$video_poster     = mediora_get_image( 'home_video_poster', 'assets/imgs/bg_video.png', $front_id );
$facility_frame   = mediora_get_image( 'home_facility_frame', 'assets/imgs/Frameline.png', $front_id );
$doctor_img       = mediora_get_image( 'home_doctor', 'assets/imgs/doctor1.png', $front_id );
$customer_1       = mediora_get_image( 'home_customer_1', 'assets/imgs/kh-ngan-quynh.png', $front_id );
$customer_2       = mediora_get_image( 'home_customer_2', 'assets/imgs/kh-hien-pham.png', $front_id );
$customer_3       = mediora_get_image( 'home_customer_3', 'assets/imgs/kh-vi-tuong.png', $front_id );

$step_imgs = array();
$step_alts = array();
$default_step_alts = array(
	1 => 'Bước 1: Thăm khám cùng bác sĩ – thăm khám chuyên sâu cùng bác sĩ chuyên khoa tạo hình thẩm mỹ',
	2 => 'Bước 2: Quét chỉ số AI Factional – soi da các lớp, xác định mức độ lão hóa, đưa ra phác đồ cá nhân hóa',
	3 => 'Bước 3: Đo vẽ, xác định vùng can thiệp',
	4 => 'Bước 4: Sát khuẩn bằng Povidine',
	5 => 'Bước 5: Sử dụng sợi GMISS nâng kéo toàn bộ vùng cơ, mỡ ở tầng SMAS',
	6 => 'Bước 6: Dặn dò sau điều trị',
);
for ( $s = 1; $s <= 6; $s++ ) {
	$step_imgs[ $s ] = mediora_get_image( 'home_step_' . $s, 'assets/imgs/step2' . $s . '.png', $front_id );
	$custom_alt = get_post_meta( $front_id, '_mediora_home_step_' . $s . '_text', true );
	$step_alts[ $s ] = ! empty( $custom_alt ) ? $custom_alt : $default_step_alts[ $s ];
}

// Tên & chức danh 3 khách hàng
$cust_1_name = get_post_meta( $front_id, '_mediora_home_cust_1_name', true );
$cust_1_name = ! empty( $cust_1_name ) ? $cust_1_name : 'Diễn viên Ngân Quỳnh';

$cust_2_name = get_post_meta( $front_id, '_mediora_home_cust_2_name', true );
$cust_2_name = ! empty( $cust_2_name ) ? $cust_2_name : 'Khách hàng Hiền Phạm';

$cust_3_name = get_post_meta( $front_id, '_mediora_home_cust_3_name', true );
$cust_3_name = ! empty( $cust_3_name ) ? $cust_3_name : 'Khách hàng Vi Tường 36 tuổi';
?>

<!-- 1. Hero Banner Slider -->
<section class="sec-hero hero" aria-label="<?php esc_attr_e( 'Banner vientrehoaSejang', 'mediora-clinic' ); ?>">
	<div class="swiper hero-slider">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<picture>
					<source media="(max-width: 767.98px)" srcset="<?php echo esc_url( $banners[1] ); ?>">
					<img src="<?php echo esc_url( $banners[1] ); ?>" alt="<?php esc_attr_e( 'Viện Trẻ Hóa Sejang - Định chuẩn vẻ đẹp thanh xuân', 'mediora-clinic' ); ?>" width="1920" height="800" fetchpriority="high">
				</picture>
			</div>
			<div class="swiper-slide">
				<picture>
					<source media="(max-width: 767.98px)" srcset="<?php echo esc_url( $banners[2] ); ?>">
					<img src="<?php echo esc_url( $banners[2] ); ?>" alt="<?php esc_attr_e( 'Công nghệ nâng cơ trẻ hóa bằng sợi sinh học GMISS độc quyền', 'mediora-clinic' ); ?>" width="1920" height="800" loading="lazy">
				</picture>
			</div>
			<div class="swiper-slide">
				<picture>
					<source media="(max-width: 767.98px)" srcset="<?php echo esc_url( $banners[3] ); ?>">
					<img src="<?php echo esc_url( $banners[3] ); ?>" alt="<?php esc_attr_e( 'Không gian phòng khám thẩm mỹ 5 sao chuẩn y khoa', 'mediora-clinic' ); ?>" width="1920" height="800" loading="lazy">
				</picture>
			</div>
			<div class="swiper-slide">
				<picture>
					<source media="(max-width: 767.98px)" srcset="<?php echo esc_url( $banners[4] ); ?>">
					<img src="<?php echo esc_url( $banners[4] ); ?>" alt="<?php esc_attr_e( 'Đội ngũ bác sĩ chuyên khoa phẫu thuật tạo hình thẩm mỹ', 'mediora-clinic' ); ?>" width="1920" height="800" loading="lazy">
				</picture>
			</div>
		</div>
		<!-- Hero Slider Pagination Indicators -->
		<div class="hero-pagination swiper-pagination"></div>
	</div>
</section>

<!-- 2. Hero / Triết Lý Thẩm Mỹ (sec-intro) -->
<section class="sec-intro" id="gioi-thieu" aria-label="<?php esc_attr_e( 'Triết lý thẩm mỹ MEDIORA', 'mediora-clinic' ); ?>">
	<div class="container-fluid wrap">
		<h2 class="visually-hidden"><?php esc_html_e( 'Giới thiệu Triết lý Thẩm mỹ MEDIORA', 'mediora-clinic' ); ?></h2>
		<div class="row justify-content-center">
			<div class="col-12">
				<p class="intro-text">
					<?php echo esc_html( $intro_text ); ?>
				</p>
			</div>
		</div>
	</div>
</section>

<!-- 3. Dịch Vụ Chủ Đạo GMISS (sec-gmiss) -->
<section class="sec-gmiss" id="dich-vu" aria-label="<?php esc_attr_e( 'Dịch vụ nâng cơ GMISS', 'mediora-clinic' ); ?>">
	<div class="container-fluid wrap">
		<div class="row gx-4 gx-xl-5 gy-4 d-flex rowsec4 align-items-end mflex-column">
			<!-- Cột trái: Tiêu đề nghệ thuật + 6 bước quy trình y khoa -->
			<div class="col-xl-6">
				<h2 class="gmiss-title m-0">
					<img src="<?php echo esc_url( $gmiss_title_img ); ?>" alt="<?php esc_attr_e( 'Nâng cơ trẻ hóa bằng sợi sinh học GMISS – Kỷ nguyên nâng cơ trẻ hóa bằng sợi sinh học – Định hình đường nét, tôn vinh vẻ đẹp thanh xuân', 'mediora-clinic' ); ?>" width="805" height="282" loading="lazy">
				</h2>

				<ol class="row row-cols-1 row-cols-sm-2 g-3 steps list-unstyled m-0">
					<?php for ( $s = 1; $s <= 6; $s++ ) : ?>
					<li class="col">
						<img src="<?php echo esc_url( $step_imgs[ $s ] ); ?>" alt="<?php echo esc_attr( $step_alts[ $s ] ); ?>" width="408" height="265" loading="lazy">
					</li>
					<?php endfor; ?>
				</ol>
			</div>

			<!-- Cột phải: Video demo visual trực quan -->
			<div class="col-xl-6">
				<div class="gmiss-video-wrapper">
					<video class="w-100 gmiss-video" controls autoplay muted playsinline loop poster="<?php echo esc_url( $video_poster ); ?>" preload="none">
						<source src="<?php echo esc_url( $gmiss_video_url ); ?>" type="video/mp4">
						<?php esc_html_e( 'Trình duyệt của bạn không hỗ trợ phát thẻ video.', 'mediora-clinic' ); ?>
					</video>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- 4. Cơ Sở Vật Chất 5 Sao (sec-facility) -->
<section class="sec-facility" id="co-so-vat-chat" aria-label="<?php esc_attr_e( 'Cơ sở vật chất 5 sao', 'mediora-clinic' ); ?>">
	<div class="container-fluid wrap">
		<h2 class="visually-hidden"><?php esc_html_e( 'Cơ Sở Vật Chất 5 Sao MEDIORA', 'mediora-clinic' ); ?></h2>
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="facility-frame">
					<video class="facility-video js-facility-video"
						muted loop playsinline
						preload="none"
						data-src-pc="<?php echo esc_url( $facility_video_url ); ?>"
						data-src-mb="<?php echo esc_url( $facility_video_url ); ?>">
						<?php esc_html_e( 'Trình duyệt của bạn không hỗ trợ phát thẻ video.', 'mediora-clinic' ); ?>
					</video>
					<img class="facility-frame__line" src="<?php echo esc_url( $facility_frame ); ?>" alt="<?php esc_attr_e( 'Khung mạ vàng 5 sao cơ sở vật chất MEDIORA', 'mediora-clinic' ); ?>" width="1732" height="997" aria-hidden="true" loading="lazy">
				</div>
			</div>
		</div>
	</div>
</section>

<!-- 5. Đội Ngũ Bác Sĩ Chuyên Khoa (sec-doctor) -->
<section class="sec-doctor" id="bac-si" aria-label="<?php esc_attr_e( 'Đội ngũ bác sĩ chuyên khoa', 'mediora-clinic' ); ?>">
	<div class="container-fluid wrap">
		<h2 class="visually-hidden"><?php esc_html_e( 'Đội ngũ Bác sĩ Chuyên khoa Phẫu thuật Tạo hình Thẩm mỹ MEDIORA', 'mediora-clinic' ); ?></h2>
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="ph ratio-doctor" data-ph="<?php esc_attr_e( 'BÁC SĨ · 1583×762', 'mediora-clinic' ); ?>">
					<img src="<?php echo esc_url( $doctor_img ); ?>" alt="<?php esc_attr_e( 'Đội ngũ bác sĩ chuyên khoa phẫu thuật tạo hình thẩm mỹ MEDIORA', 'mediora-clinic' ); ?>" width="1583" height="762" loading="lazy">
				</div>
			</div>
		</div>
	</div>
</section>

<!-- 6. Hiệu Quả Khách Hàng & Người Nổi Tiếng (sec-result) -->
<section class="sec-result" id="cau-chuyen" aria-label="<?php esc_attr_e( 'Hiệu quả khách hàng & Người nổi tiếng', 'mediora-clinic' ); ?>">
	<div class="container-fluid wrap-wide">
		<h2 class="visually-hidden"><?php esc_html_e( 'Khách hàng thực tế và Người nổi tiếng tại MEDIORA', 'mediora-clinic' ); ?></h2>
		<div class="swiper result-slider">
			<div class="swiper-wrapper">
				<!-- Case 1: Khách hàng 1 -->
				<div class="swiper-slide">
					<div class="ph ratio-result" data-ph="<?php echo esc_attr( $cust_1_name ); ?>">
						<img src="<?php echo esc_url( $customer_1 ); ?>" alt="<?php echo esc_attr( $cust_1_name ); ?>" width="1846" height="966" loading="lazy">
					</div>
				</div>

				<!-- Case 2: Khách hàng 2 -->
				<div class="swiper-slide">
					<div class="ph ratio-result" data-ph="<?php echo esc_attr( $cust_2_name ); ?>">
						<img src="<?php echo esc_url( $customer_2 ); ?>" alt="<?php echo esc_attr( $cust_2_name ); ?>" width="1846" height="966" loading="lazy">
					</div>
				</div>

				<!-- Case 3: Khách hàng 3 -->
				<div class="swiper-slide">
					<div class="ph ratio-result" data-ph="<?php echo esc_attr( $cust_3_name ); ?>">
						<img src="<?php echo esc_url( $customer_3 ); ?>" alt="<?php echo esc_attr( $cust_3_name ); ?>" width="1846" height="966" loading="lazy">
					</div>
				</div>
			</div>

			<!-- Nút điều hướng prev / next -->
			<button class="arrow-btn prev-btn arrow-prev result-prev" type="button" aria-label="<?php esc_attr_e( 'Khách hàng trước', 'mediora-clinic' ); ?>">
				<img src="<?php echo esc_url( $theme_uri . '/assets/imgs/arrow.png' ); ?>" alt="" width="24" height="24" aria-hidden="true">
			</button>
			<button class="arrow-btn next-btn arrow-next result-next" type="button" aria-label="<?php esc_attr_e( 'Khách hàng tiếp theo', 'mediora-clinic' ); ?>">
				<img src="<?php echo esc_url( $theme_uri . '/assets/imgs/arrow.png' ); ?>" alt="" width="24" height="24" aria-hidden="true">
			</button>

			<!-- Bullet Pagination Indicators -->
			<div class="result-pagination swiper-pagination"></div>
		</div>
	</div>
</section>

<!-- 7. Khối Đăng Ký Tư Vấn & Nhận Ưu Đãi (sec-register) -->
<section class="sec-register" id="lien-he" aria-label="<?php esc_attr_e( 'Đăng ký nhận ưu đãi tư vấn', 'mediora-clinic' ); ?>">
	<div class="row g-0">
		<!-- Cột trái: Ảnh bìa cover.jpg -->
		<div class="col-12 col-lg-8">
			<div class="ph register-cover" data-ph="<?php esc_attr_e( 'Bìa tư vấn vientrehoaSejang · 1287×724', 'mediora-clinic' ); ?>">
				<img src="<?php echo esc_url( $register_cover ); ?>" alt="<?php esc_attr_e( 'Viện Trẻ Hóa Sejang – Tư vấn nâng cơ trẻ hóa chuyên sâu', 'mediora-clinic' ); ?>" width="1287" height="724" loading="lazy">
			</div>
		</div>

		<!-- Cột phải: Tiêu đề nghệ thuật & Form tư vấn trực tuyến -->
		<div class="col-12 col-lg-4 register-side d-flex align-items-center justify-content-center">
			<?php
			get_template_part(
				'template-parts/booking-form',
				null,
				array(
					'source'         => 'landing-register',
					'show_title_img' => true,
				)
			);
			?>
		</div>
	</div>
</section>

<?php
get_footer();
