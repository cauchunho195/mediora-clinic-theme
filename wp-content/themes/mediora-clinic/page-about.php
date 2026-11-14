<?php
/**
 * Template Name: Về Chúng Tôi - Sejang
 * Description: Trang giới thiệu Viện Trẻ Hóa Sejang chuẩn xác theo mẫu phongkhammediora.vn/ve-chung-toi/
 *
 * @package Mediora_Clinic
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

if ( function_exists( 'elementor_load_plugin_textdomain' ) && class_exists( '\Elementor\Plugin' ) && \Elementor\Plugin::$instance->db->is_built_with_elementor( get_the_ID() ) ) :
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile;
else :

$assets_uri = get_template_directory_uri() . '/assets';
$clinic_name = function_exists( 'mediora_get_option' ) ? mediora_get_option( 'clinic_name', 'Viện Trẻ Hóa Sejang' ) : 'Viện Trẻ Hóa Sejang';
?>

<div class="subpage-content cy-page-about">
	<!-- 1. SECTION INTRO (Hero) -->
	<section class="cy-section cy-about-intro" aria-labelledby="cy-about-title">
		<div class="cy-stage" style="--sh:840">
			<h1 id="cy-about-title" class="screen-reader-text"><?php esc_html_e( 'Về chúng tôi', 'mediora-clinic' ); ?></h1>
			
			<div class="cy-fig ph cy-bg" data-ph="BG2 m1 · 1920×840" style="--x:0;--y:0;--w:1920;--h:840;--o:0">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/bg-hero.jpg' ); ?>" 
					alt="<?php echo esc_attr( $clinic_name ); ?>" 
					width="1920" 
					height="840" 
					fetchpriority="high">
			</div>

			<div class="cy-text is-center" style="--x:191;--y:202;--w:1537;--o:1">
				<p><?php echo esc_html( $clinic_name ); ?> định hướng chuyên sâu trong lĩnh vực trẻ hóa, ứng dụng các giải pháp thẩm mỹ dựa trên nền tảng y khoa và cá nhân hóa theo tình trạng của từng khách hàng. Mỗi liệu trình được xây dựng trên cơ sở thăm khám, đánh giá chuyên môn và chỉ định phù hợp, nhằm tối ưu hiệu quả cải thiện, đồng thời chú trọng an toàn trong quá trình thực hiện.</p>
				<p>Sejang đề cao quy trình chuyên môn chặt chẽ, tư vấn minh bạch và theo dõi sau dịch vụ, hướng đến kết quả trẻ hóa hài hòa, tự nhiên và phù hợp với đặc điểm riêng của mỗi khách hàng.</p>
			</div>

			<div class="cy-fig ph" data-ph="Text 2 · 1374×160" style="--x:273;--y:520;--w:1374;--h:160;--o:2">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/text-hero.png' ); ?>" 
					alt="Trẻ hóa tự nhiên – Chuẩn mực an toàn, tối ưu hiệu quả – Cá nhân hóa trong từng giải pháp" 
					width="1374" 
					height="160" 
					loading="lazy" 
					decoding="async">
			</div>
		</div>
	</section>

	<!-- 2. SECTION VISION, MISSION & 6 CORE VALUES -->
	<section class="cy-section cy-about-vision" aria-labelledby="cy-vision-title">
		<div class="cy-stage" style="--sh:2029">
			<h2 id="cy-vision-title" class="screen-reader-text"><?php esc_html_e( 'Tầm nhìn – Sứ mệnh và giá trị cốt lõi', 'mediora-clinic' ); ?></h2>
			
			<div class="cy-fig ph cy-bg" data-ph="BG2 m2 · 1920×2029" style="--x:0;--y:0;--w:1920;--h:2029;--o:0">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/bg-vision.webp' ); ?>" 
					alt="" 
					width="1920" 
					height="2029" 
					loading="lazy" 
					decoding="async">
			</div>

			<!-- Image Illustration -->
			<div class="cy-fig ph" data-ph="Minh họa · 657×653" style="--x:70;--y:433;--w:657;--h:653;--o:1">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/minh-hoa.png' ); ?>" 
					alt="<?php echo esc_attr( $clinic_name ); ?> – cơ sở vật chất và thiết bị hiện đại" 
					width="657" 
					height="653" 
					loading="lazy" 
					decoding="async">
			</div>

			<!-- Vision Badge & Text -->
			<div class="cy-fig ph cy-badge" data-ph="Tầm nhìn · 249×55" style="--x:835;--y:491;--w:249;--h:55;--o:2">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/tam-nhin.png' ); ?>" 
					alt="<?php esc_attr_e( 'Tầm nhìn', 'mediora-clinic' ); ?>" 
					width="249" 
					height="55" 
					loading="lazy" 
					decoding="async">
			</div>
			<div class="cy-text cy-vision-text" style="--x:835;--y:574;--w:959;--fs:30;--lh:1.1;--o:3">
				<p>Trở thành viện chuyên khoa thẩm mỹ định hướng chuyên sâu về trẻ hóa, phát triển trên nền tảng y khoa, công nghệ hiện đại và tư duy thẩm mỹ tiên tiến. <?php echo esc_html( $clinic_name ); ?> hướng đến xây dựng chuẩn mực chăm sóc sắc đẹp chuyên nghiệp, đề cao tính an toàn, minh bạch và chất lượng dịch vụ, đồng hành cùng khách hàng trên hành trình gìn giữ nét thanh xuân và tôn vinh vẻ đẹp tự nhiên.</p>
			</div>

			<!-- Mission Badge & Text -->
			<div class="cy-fig ph cy-badge" data-ph="Sứ mệnh · 249×55" style="--x:835;--y:801;--w:249;--h:55;--o:4">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/su-menh.png' ); ?>" 
					alt="<?php esc_attr_e( 'Sứ mệnh', 'mediora-clinic' ); ?>" 
					width="249" 
					height="55" 
					loading="lazy" 
					decoding="async">
			</div>
			<div class="cy-text cy-vision-text" style="--x:835;--y:884;--w:959;--fs:30;--lh:1.1;--o:5">
				<p>Mang đến các giải pháp thẩm mỹ và trẻ hóa được cá nhân hóa dựa trên tình trạng thực tế, đặc điểm riêng và nhu cầu của từng khách hàng. <?php echo esc_html( $clinic_name ); ?> chú trọng quy trình thăm khám, đánh giá chuyên môn, tư vấn minh bạch và theo dõi sau dịch vụ, giúp khách hàng hiểu rõ lựa chọn, an tâm trong quá trình chăm sóc và hướng đến kết quả hài hòa, phù hợp với nét đẹp riêng.</p>
			</div>

			<!-- Separator Line -->
			<div class="cy-fig ph cy-hide-mb" data-ph="Line · 1033×174" style="--x:443;--y:1086;--w:1033;--h:174;--o:0">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/line.png' ); ?>" 
					alt="" 
					width="1033" 
					height="174" 
					loading="lazy" 
					decoding="async">
			</div>

			<!-- Core Values Badge -->
			<div class="cy-fig ph cy-badge" data-ph="Giá trị cốt lõi · 317×55" style="--x:801;--y:1145;--w:317;--h:55;--o:6">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/gia-tri-cot-loi.png' ); ?>" 
					alt="<?php esc_attr_e( 'Giá trị cốt lõi', 'mediora-clinic' ); ?>" 
					width="317" 
					height="55" 
					loading="lazy" 
					decoding="async">
			</div>

			<!-- 6 Value Cards -->
			<div class="cy-fig ph cy-value" data-ph="01 CHUẨN MỰC Y KHOA · 505×213" style="--x:153;--y:1283;--w:505;--h:213;--o:7">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/value-01.png' ); ?>" 
					alt="Chuẩn mực y khoa – Mọi giải pháp bắt đầu từ thăm khám, đánh giá chuyên môn và chỉ định phù hợp." 
					width="505" 
					height="213" 
					loading="lazy" 
					decoding="async">
			</div>
			<div class="cy-fig ph cy-value" data-ph="02 CÁ NHÂN HÓA GIẢI PHÁP · 517×243" style="--x:701;--y:1283;--w:517;--h:243;--o:8">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/value-02.png' ); ?>" 
					alt="Cá nhân hóa giải pháp – Thấu hiểu đặc điểm riêng, nhu cầu và tình trạng của từng khách hàng để xây dựng liệu trình phù hợp." 
					width="517" 
					height="243" 
					loading="lazy" 
					decoding="async">
			</div>
			<div class="cy-fig ph cy-value" data-ph="03 MINH BẠCH TRONG TƯ VẤN · 545×242" style="--x:1231;--y:1283;--w:545;--h:242;--o:9">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/value-03.png' ); ?>" 
					alt="Minh bạch trong tư vấn – Thông tin rõ ràng về phương pháp, quy trình, kỳ vọng và các lưu ý liên quan đến dịch vụ." 
					width="545" 
					height="242" 
					loading="lazy" 
					decoding="async">
			</div>
			<div class="cy-fig ph cy-value" data-ph="04 AN TOÀN VÀ TRÁCH NHIỆM · 523×242" style="--x:153;--y:1600;--w:523;--h:242;--o:10">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/value-04.png' ); ?>" 
					alt="An toàn & trách nhiệm – Đề cao kiểm soát rủi ro, tuân thủ quy trình chuyên môn và theo dõi trong suốt quá trình chăm sóc." 
					width="523" 
					height="242" 
					loading="lazy" 
					decoding="async">
			</div>
			<div class="cy-fig ph cy-value" data-ph="05 THẨM MỸ TINH TẾ · 505×243" style="--x:701;--y:1599;--w:505;--h:243;--o:11">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/value-05.png' ); ?>" 
					alt="Thẩm mỹ tinh tế – Hướng đến vẻ đẹp hài hòa, tự nhiên, tôn trọng đường nét và nét riêng của mỗi người." 
					width="505" 
					height="243" 
					loading="lazy" 
					decoding="async">
			</div>
			<div class="cy-fig ph cy-value" data-ph="06 ĐỒNG HÀNH TẬN TÂM · 505×243" style="--x:1231;--y:1599;--w:505;--h:243;--o:12">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/value-06.png' ); ?>" 
					alt="Đồng hành tận tâm – Chú trọng trải nghiệm khách hàng, theo dõi sau dịch vụ và đồng hành trong hành trình chăm sóc sắc đẹp." 
					width="505" 
					height="243" 
					loading="lazy" 
					decoding="async">
			</div>

			<!-- Bottom Separator Line -->
			<div class="cy-fig ph cy-flip-y cy-hide-mb" data-ph="Line · 1033×174" style="--x:443;--y:1872;--w:1033;--h:174;--o:0">
				<img src="<?php echo esc_url( $assets_uri . '/img-about-us/line2.png' ); ?>" 
					alt="" 
					width="1033" 
					height="174" 
					loading="lazy" 
					decoding="async">
			</div>
		</div>
	</section>

	<!-- 3. SECTION REGISTRATION FORM (Tech Glow 4-Field UI) -->
	<section class="sec-register py-5" id="lien-he" aria-label="<?php esc_attr_e( 'Đăng ký tư vấn', 'mediora-clinic' ); ?>">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-8 col-xl-6 text-center">
					<?php
					get_template_part(
						'template-parts/booking-form',
						null,
						array(
							'source' => 'page-about',
						)
					);
					?>
				</div>
			</div>
		</div>
	</section>
</div>

<?php
endif;
get_footer();
