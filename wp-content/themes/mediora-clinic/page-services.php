<?php
/**
 * Template Name: Dịch Vụ - Sejang
 * Description: Trang dịch vụ Viện Trẻ Hóa Sejang chuẩn xác theo mẫu phongkhammediora.vn/dich-vu/
 *
 * @package Mediora_Clinic
 * @version 1.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$assets_uri  = get_template_directory_uri() . '/assets';
$clinic_name = function_exists( 'mediora_get_option' ) ? mediora_get_option( 'clinic_name', 'vientrehoaSejang' ) : 'vientrehoaSejang';
?>

<div class="subpage-content cy-services">
	<!-- 1. SECTION SERVICES INTRO -->
	<section class="cy-section cy-services-intro" aria-labelledby="cy-services-title">
		<div class="cy-stage" style="--sh:1776">
			<h1 id="cy-services-title" class="screen-reader-text"><?php esc_html_e( 'Nâng cơ trẻ hóa bằng sợi sinh học GMISS', 'mediora-clinic' ); ?></h1>
			
			<div class="cy-fig ph cy-bg" data-ph="BG3 m1 · 1920×1776" style="--x:0;--y:0;--w:1920;--h:1776;--o:0">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/bg1.jpg' ); ?>" alt="" width="1920" height="1776" fetchpriority="high">
			</div>

			<div class="cy-fig ph" data-ph="Maintext · 1058×110" style="--x:431;--y:78;--w:1058;--h:110;--o:1">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/maintext.png' ); ?>" alt="Nâng cơ trẻ hóa bằng sợi sinh học GMISS" fetchpriority="high" width="1058" height="110">
			</div>

			<div class="cy-fig ph cy-hide-mb" data-ph="Mẫu 1 · 619×836" style="--x:0;--y:188;--w:619;--h:836;--o:0">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/mau-1.png' ); ?>" alt="Khách hàng <?php echo esc_attr( $clinic_name ); ?>" fetchpriority="high" width="619" height="836">
			</div>

			<div class="cy-fig ph cy-hide-mb" data-ph="Mẫu 2 · 774×853" style="--x:1178;--y:188;--w:774;--h:853;--o:0">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/mau-2.png' ); ?>" alt="Khách hàng <?php echo esc_attr( $clinic_name ); ?>" fetchpriority="high" width="774" height="853">
			</div>

			<div class="cy-fig ph" data-ph="Subtext 1 · 735×183" style="--x:592;--y:263;--w:735;--h:183;--o:2">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/subtext.png' ); ?>" alt="Nâng đỡ đường nét – Tôn vinh vẻ đẹp tự nhiên" width="735" height="183" loading="lazy" decoding="async">
			</div>

			<div class="cy-text" style="--x:617;--y:468;--w:685;--o:3">
				<p>Nâng cơ trẻ hóa bằng sợi sinh học GMISS là giải pháp thẩm mỹ hướng đến cải thiện tình trạng mô mềm sa trễ, hỗ trợ nâng đỡ đường nét và cải thiện độ săn chắc của làn da. Tại <?php echo esc_html( $clinic_name ); ?>, mỗi liệu trình được xây dựng dựa trên tình trạng lão hóa, cấu trúc khuôn mặt và nhu cầu riêng của khách hàng, với định hướng trẻ hóa hài hòa, tự nhiên.</p>
			</div>

			<div class="cy-fig ph" data-ph="NÂNG ĐỠ MÔ MỀM – CẢI THIỆN TÌNH TRẠNG SA TRỄ · 1101×267" style="--x:409;--y:857;--w:1101;--h:267;--o:4">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/benefit-01.png' ); ?>" alt="Nâng đỡ mô mềm – cải thiện tình trạng sa trễ" width="1101" height="267" loading="lazy" decoding="async">
			</div>

			<div class="cy-fig ph" data-ph="HỖ TRỢ CẢI THIỆN ĐỘ SĂN CHẮC CỦA DA · 1101×267" style="--x:409;--y:1146;--w:1101;--h:267;--o:5">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/benefit-02.png' ); ?>" alt="Hỗ trợ cải thiện độ săn chắc của da" width="1101" height="267" loading="lazy" decoding="async">
			</div>

			<div class="cy-fig ph" data-ph="CÁ NHÂN HÓA GIẢI PHÁP TRẺ HÓA · 1101×267" style="--x:409;--y:1435;--w:1101;--h:267;--o:6">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/benefit-03.png' ); ?>" alt="Cá nhân hóa giải pháp trẻ hóa" width="1101" height="267" loading="lazy" decoding="async">
			</div>
		</div>
	</section>

	<!-- 2. SECTION SERVICES PROCESS (6 Steps & Doctor Podium) -->
	<section class="cy-section cy-services-process" aria-labelledby="cy-process-title">
		<div class="cy-stage" style="--sh:1458">
			<h2 id="cy-process-title" class="screen-reader-text"><?php esc_html_e( 'Quy trình nâng cơ trẻ hóa bằng sợi sinh học GMISS', 'mediora-clinic' ); ?></h2>
			
			<div class="cy-fig ph cy-bg" data-ph="BG3 m2 · 1920×1458" style="--x:0;--y:0;--w:1920;--h:1458;--o:0">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/bg2.jpg' ); ?>" alt="" width="1920" height="1458" loading="lazy" decoding="async">
			</div>

			<div class="cy-fig ph" data-ph="NÂNG CƠ TRẺ HÓA BẰNG SỢI SINH HỌC GMISS · 1216×253" style="--x:352;--y:65;--w:1216;--h:253;--o:1">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/process-title.png' ); ?>" alt="Quy trình nâng cơ trẻ hóa bằng sợi sinh học GMISS" width="1216" height="253" loading="lazy" decoding="async">
			</div>

			<div class="cy-fig ph cy-doctor" data-ph="podium BS · 722×881" style="--x:573;--y:409;--w:722;--h:881;--o:2">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/podium-bs.png' ); ?>" alt="Bác sĩ chuyên khoa tạo hình thẩm mỹ – <?php echo esc_attr( $clinic_name ); ?>" width="722" height="881" loading="lazy" decoding="async">
			</div>

			<div class="cy-fig ph cy-step" data-ph="B1 · 626×391" style="--x:141;--y:337;--w:626;--h:391;--o:3">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/step-01.png' ); ?>" alt="Bước 1: Thăm khám chuyên sâu cùng bác sĩ chuyên khoa tạo hình thẩm mỹ" width="626" height="391" loading="lazy" decoding="async">
			</div>

			<div class="cy-fig ph cy-step" data-ph="B2 · 626×391" style="--x:29;--y:677;--w:626;--h:391;--o:4">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/step-02.png' ); ?>" alt="Bước 2: Soi da các lớp, xác định mức độ lão hóa theo cấp độ tuổi và đưa ra phác đồ cá nhân hóa" width="626" height="391" loading="lazy" decoding="async">
			</div>

			<div class="cy-fig ph cy-step" data-ph="B3 · 626×391" style="--x:141;--y:1012;--w:626;--h:391;--o:5">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/step-03.png' ); ?>" alt="Bước 3: Bác sĩ đo vẽ, đánh dấu chính xác vị trí cần can thiệp" width="626" height="391" loading="lazy" decoding="async">
			</div>

			<div class="cy-fig ph cy-step is-under" data-ph="B4 · 626×391" style="--x:1127;--y:337;--w:626;--h:391;--o:6">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/step-04.png' ); ?>" alt="Bước 4: Làm sạch, sát khuẩn vùng can thiệp vô trùng 1 chiều" width="626" height="391" loading="lazy" decoding="async">
			</div>

			<div class="cy-fig ph cy-step" data-ph="B5 · 626×391" style="--x:1265;--y:677;--w:626;--h:391;--o:7">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/step-05.png' ); ?>" alt="Bước 5: Bác sĩ tiến hành sử dụng sợi GMISS nâng kéo toàn bộ vùng cơ" width="626" height="391" loading="lazy" decoding="async">
			</div>

			<div class="cy-fig ph cy-step" data-ph="B6 · 626×391" style="--x:1127;--y:1012;--w:626;--h:391;--o:8">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/step-06.png' ); ?>" alt="Bước 6: Khách hàng nghe dặn dò từ bác sĩ và theo dõi hậu phẫu" width="626" height="391" loading="lazy" decoding="async">
			</div>
		</div>
	</section>

	<!-- 3. SECTION CUSTOMER JOURNEY (Slider) -->
	<section class="cy-section cy-services-journey" aria-labelledby="cy-journey-title">
		<div class="cy-stage" style="--sh:1038">
			<h2 id="cy-journey-title" class="screen-reader-text"><?php esc_html_e( 'Mỗi khách hàng một hành trình trẻ hóa riêng', 'mediora-clinic' ); ?></h2>
			
			<div class="cy-fig ph cy-bg" data-ph="BG3 m3 · 1920×1000" style="--x:0;--y:38;--w:1920;--h:1000;--o:0">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/bg-journey.jpg' ); ?>" alt="" width="1920" height="1000" loading="eager" fetchpriority="high">
			</div>

			<div class="cy-fig ph cy-frame cy-hide-mb" data-ph="Frame line · 1732×997" style="--x:94;--y:0;--w:1732;--h:997;--o:0">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/frame-line.png' ); ?>" alt="" width="1732" height="997" loading="eager">
			</div>

			<!-- Customer Transformation Slider -->
			<div class="cy-box cy-journey-slider carousel slide" id="journeyCarousel" data-bs-ride="carousel" data-bs-interval="5000" style="--x:272;--y:184;--w:791;--h:624;--o:4">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="ph" data-ph="Mẫu Ngân Quỳnh · 791×624">
							<img src="<?php echo esc_url( $assets_uri . '/img-services/ba-ngan-quynh.png' ); ?>" alt="Trước và sau trẻ hóa – nghệ sĩ Ngân Quỳnh" width="791" height="624" loading="lazy">
						</div>
					</div>
					<div class="carousel-item">
						<div class="ph" data-ph="Mẫu Thảo · 791×624">
							<img src="<?php echo esc_url( $assets_uri . '/img-services/ba-thao.png' ); ?>" alt="Trước và sau trẻ hóa – chị Thảo" width="791" height="624" loading="lazy">
						</div>
					</div>
				</div>

				<button class="cy-arrow cy-arrow-prev" type="button" data-bs-target="#journeyCarousel" data-bs-slide="prev" aria-label="<?php esc_attr_e( 'Ảnh trước', 'mediora-clinic' ); ?>">
					<img src="<?php echo esc_url( $assets_uri . '/imgs/arrow.png' ); ?>" alt="" width="48" height="48">
				</button>
				<button class="cy-arrow cy-arrow-next" type="button" data-bs-target="#journeyCarousel" data-bs-slide="next" aria-label="<?php esc_attr_e( 'Ảnh tiếp', 'mediora-clinic' ); ?>">
					<img src="<?php echo esc_url( $assets_uri . '/imgs/arrow.png' ); ?>" alt="" width="48" height="48">
				</button>
			</div>

			<div class="cy-fig ph" data-ph="MỖI KHÁCH HÀNG MỘT HÀNH TRÌNH TRẺ HÓA RIÊNG · 511×292" style="--x:1136;--y:175;--w:511;--h:292;--o:1">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/journey-title.png' ); ?>" alt="Mỗi khách hàng – một hành trình trẻ hóa riêng" width="511" height="292" loading="lazy" decoding="async">
			</div>

			<div class="cy-text is-center is-white" style="--x:1131;--y:498;--w:522;--o:2">
				<p>Mỗi hành trình là một dấu ấn riêng, được xây dựng từ sự thấu hiểu, chuyên môn và giải pháp trẻ hóa cá nhân hóa tại <?php echo esc_html( $clinic_name ); ?>.</p>
			</div>

			<span aria-hidden="true" class="cy-rule cy-hide-mb" style="--x:1259;--y:705;--w:266"></span>

			<button class="cy-fig ph cy-btn-consult" data-bs-target="#popupConsult" data-bs-toggle="modal" data-ph="Nhận tư vấn ngay · 365×53" style="--x:1209;--y:755;--w:365;--h:53;--o:3" type="button">
				<img src="<?php echo esc_url( $assets_uri . '/img-services/btn-consult.png' ); ?>" alt="<?php esc_attr_e( 'Nhận tư vấn ngay', 'mediora-clinic' ); ?>" width="365" height="53" loading="lazy">
			</button>
		</div>
	</section>
</div>

<?php
get_footer();
