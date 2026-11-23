<?php
/**
 * Bộ Quản Lý Bảng Điều Khiển Trực Quan (Meta Boxes) Cho Các Trang:
 * 1. Trang Chủ (front-page.php / post 101)
 * 2. Trang Dịch Vụ (page-services.php / post 103)
 * 3. Trang Về Chúng Tôi (page-about.php / post 102)
 * 4. Trang Liên Hệ (page-contact.php / post 104)
 *
 * @package Mediora_Clinic
 * @version 2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Đăng ký Meta Boxes cho các trang
 */
function mediora_register_all_page_meta_boxes() {
	global $post;
	if ( ! $post || 'page' !== $post->post_type ) {
		return;
	}

	$post_id  = (int) $post->ID;
	$template = get_post_meta( $post_id, '_wp_page_template', true );
	$slug     = $post->post_name;

	// 1. Meta Box Trang Chủ
	if ( 101 === $post_id || 'trang-chu' === $slug || (int) get_option( 'page_on_front' ) === $post_id ) {
		add_meta_box(
			'mediora_home_settings_mb',
			'🏠 Bảng Điều Khiển Toàn Diện – Trang Chủ (vientrehoaSejang)',
			'mediora_render_home_meta_box',
			'page',
			'normal',
			'high'
		);
	}

	// 2. Meta Box Trang Dịch Vụ
	if ( 'page-services.php' === $template || 'dich-vu' === $slug || 103 === $post_id ) {
		add_meta_box(
			'mediora_services_settings_mb',
			'✨ Bảng Điều Khiển Hình Ảnh & Nội Dung – Trang Dịch Vụ (vientrehoaSejang)',
			'mediora_render_services_meta_box',
			'page',
			'normal',
			'high'
		);
	}

	// 3. Meta Box Trang Về Chúng Tôi
	if ( 'page-about.php' === $template || 've-chung-toi' === $slug || 102 === $post_id ) {
		add_meta_box(
			'mediora_about_settings_mb',
			'👑 Bảng Điều Khiển Nội Dung & Hình Ảnh – Về Chúng Tôi (vientrehoaSejang)',
			'mediora_render_about_meta_box',
			'page',
			'normal',
			'high'
		);
	}

	// 4. Meta Box Trang Liên Hệ
	if ( 'page-contact.php' === $template || 'lien-he' === $slug || 104 === $post_id ) {
		add_meta_box(
			'mediora_contact_settings_mb',
			'📞 Bảng Điều Khiển Thông Tin – Trang Liên Hệ (vientrehoaSejang)',
			'mediora_render_contact_meta_box',
			'page',
			'normal',
			'high'
		);
	}
}
add_action( 'add_meta_boxes', 'mediora_register_all_page_meta_boxes' );

/**
 * Enqueue Media Scripts trong Admin
 */
function mediora_all_admin_scripts( $hook ) {
	if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
		return;
	}
	global $post;
	if ( ! $post || 'page' !== $post->post_type ) {
		return;
	}
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'mediora_all_admin_scripts' );

/**
 * Common Styles & Scripts cho Meta Boxes
 */
function mediora_render_mb_styles() {
	?>
	<style>
		.mediora-mb-banner {
			background: #111722;
			color: #fff;
			border: 1px solid #d4af37;
			border-radius: 6px;
			padding: 14px 18px;
			margin-bottom: 20px;
			display: flex;
			justify-content: space-between;
			align-items: center;
			gap: 15px;
		}
		.mediora-mb-banner a.button {
			background: #d4af37 !important;
			border-color: #b38b22 !important;
			color: #111722 !important;
			font-weight: 700 !important;
			white-space: nowrap;
		}
		.mediora-mb-banner a.button:hover {
			background: #f5cf6d !important;
			color: #000 !important;
		}
		.mediora-mb-wrap {
			font-family: inherit;
		}
		.mediora-mb-section {
			background: #fff;
			border: 1px solid #ccd0d4;
			border-radius: 6px;
			padding: 16px 20px;
			margin-bottom: 22px;
		}
		.mediora-mb-title {
			font-size: 15px;
			font-weight: 700;
			color: #1d2327;
			margin: 0 0 14px 0;
			padding-bottom: 8px;
			border-bottom: 2px solid #d4af37;
		}
		.mediora-mb-grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
			gap: 16px;
			margin-bottom: 16px;
		}
		.mediora-img-box {
			background: #f8f9fa;
			border: 1px solid #e2e4e7;
			border-radius: 6px;
			padding: 12px;
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}
		.mediora-img-box label {
			font-weight: 600;
			font-size: 13px;
			color: #2c3338;
			margin-bottom: 4px;
			display: block;
		}
		.mediora-img-box .img-hint {
			font-size: 11px;
			color: #8c8f94;
			margin-bottom: 8px;
			display: block;
		}
		.mediora-img-preview {
			width: 100%;
			height: 140px;
			background: #111722;
			border: 1px dashed #c3c4c7;
			border-radius: 4px;
			display: flex;
			align-items: center;
			justify-content: center;
			margin-bottom: 10px;
			overflow: hidden;
		}
		.mediora-img-preview img {
			max-width: 100%;
			max-height: 100%;
			object-fit: contain;
		}
		.mediora-field-text {
			margin-top: 12px;
		}
		.mediora-field-text label {
			font-weight: 600;
			display: block;
			margin-bottom: 4px;
			font-size: 13px;
		}
		.mediora-field-text textarea,
		.mediora-field-text input {
			width: 100%;
			border: 1px solid #8c8f94;
			border-radius: 4px;
			padding: 6px 10px;
		}
		.mediora-btn-upload {
			background: #d4af37 !important;
			color: #111722 !important;
			border-color: #b38b22 !important;
			font-weight: 600 !important;
			margin-top: 4px;
		}
		.mediora-btn-upload:hover {
			background: #f5cf6d !important;
			color: #000 !important;
		}
		.mediora-btn-remove {
			background: #f6f7f7 !important;
			color: #d63638 !important;
			border-color: #dcdcde !important;
			margin-top: 4px;
		}
	</style>
	<script>
	jQuery(document).ready(function($){
		$('.mediora-btn-upload').on('click', function(e){
			e.preventDefault();
			var btn = $(this);
			var target = btn.data('target');
			var customUploader = wp.media({
				title: 'Chọn hoặc tải ảnh lên',
				button: { text: 'Sử dụng ảnh này' },
				multiple: false
			}).on('select', function(){
				var attachment = customUploader.state().get('selection').first().toJSON();
				$('#input_' + target).val(attachment.url);
				$('#preview_' + target + ' img').attr('src', attachment.url);
				btn.siblings('.mediora-btn-remove').show();
			}).open();
		});

		$('.mediora-btn-remove').on('click', function(e){
			e.preventDefault();
			var btn = $(this);
			var target = btn.data('target');
			var defaultImg = btn.data('default');
			$('#input_' + target).val('');
			$('#preview_' + target + ' img').attr('src', defaultImg);
			btn.hide();
		});
	});
	</script>
	<?php
}

/* ==========================================================================
   1. GIAO DIỆN META BOX TRANG CHỦ (post 101) - ĐẦY ĐỦ 7 PHẦN
   ========================================================================== */
function mediora_render_home_meta_box( $post ) {
	wp_nonce_field( 'mediora_save_page_meta', 'mediora_page_meta_nonce' );
	mediora_render_mb_styles();
	$theme_uri = get_template_directory_uri();

	$intro = get_post_meta( $post->ID, '_mediora_home_intro_text', true );
	if ( empty( $intro ) ) {
		$intro = mediora_get_option( 'intro_text', 'Viện Trẻ Hóa Sejang (vientrehoaSejang) định hướng phát triển theo tiêu chuẩn thẩm mỹ chuyên nghiệp, kết hợp nền tảng chuyên môn y khoa, công nghệ hiện đại và chiến lược cá nhân hóa trong từng chỉ định. Điểm khác biệt của Sejang nằm ở tư duy thẩm mỹ tổng thể, quy trình thực hiện chuẩn hóa và sự theo sát xuyên suốt hành trình khách hàng, hướng đến kết quả hài hòa, tự nhiên và tôn vinh vẻ đẹp thanh xuân của mỗi người.' );
	}

	$vid_gmiss = get_post_meta( $post->ID, '_mediora_home_gmiss_video', true );
	if ( empty( $vid_gmiss ) ) {
		$vid_gmiss = mediora_get_option( 'gmiss_video_url', 'https://d1b6kbmv97kzjg.cloudfront.net/wp-content/uploads/2026/11/tvc.mp4' );
	}

	$vid_facility = get_post_meta( $post->ID, '_mediora_home_facility_video', true );
	if ( empty( $vid_facility ) ) {
		$vid_facility = mediora_get_option( 'facility_video_url', 'https://d1b6kbmv97kzjg.cloudfront.net/wp-content/uploads/2026/11/CSVC.mp4' );
	}

	$default_step_alts = array(
		1 => 'Bước 1: Thăm khám cùng bác sĩ – thăm khám chuyên sâu cùng bác sĩ chuyên khoa tạo hình thẩm mỹ',
		2 => 'Bước 2: Quét chỉ số AI Factional – soi da các lớp, xác định mức độ lão hóa, đưa ra phác đồ cá nhân hóa',
		3 => 'Bước 3: Đo vẽ, xác định vùng can thiệp',
		4 => 'Bước 4: Sát khuẩn bằng Povidine',
		5 => 'Bước 5: Sử dụng sợi GMISS nâng kéo toàn bộ vùng cơ, mỡ ở tầng SMAS',
		6 => 'Bước 6: Dặn dò sau điều trị',
	);

	$cust_1_name = get_post_meta( $post->ID, '_mediora_home_cust_1_name', true ) ?: 'Diễn viên Ngân Quỳnh';
	$cust_2_name = get_post_meta( $post->ID, '_mediora_home_cust_2_name', true ) ?: 'Khách hàng Hiền Phạm';
	$cust_3_name = get_post_meta( $post->ID, '_mediora_home_cust_3_name', true ) ?: 'Khách hàng Vi Tường 36 tuổi';
	?>
	<div class="mediora-mb-wrap">
		<div class="mediora-mb-banner">
			<div>
				<strong style="color:#f5cf6d; font-size:14px;">🖼️ Quản Lý Hình Ảnh Website Tập Trung:</strong>
				<p style="margin:4px 0 0; color:#dcdcdc; font-size:13px;">Bạn cũng có thể xem và chỉnh sửa tất cả hình ảnh toàn trang tại trang <strong>Quản Lý Hình Ảnh</strong>.</p>
			</div>
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=mediora-images&tab=home' ) ); ?>" class="button">Mở Quản Lý Hình Ảnh Trang Chủ ➔</a>
		</div>

		<!-- PHẦN 1: HERO BANNERS -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🖼️ PHẦN 1: BANNER SLIDER ĐẦU TRANG CHỦ (HERO BANNERS)</h3>
			<div class="mediora-mb-grid">
				<?php for ( $b = 1; $b <= 4; $b++ ) : 
					$b_key = 'home_banner_' . $b;
					$b_val = mediora_get_image( $b_key, 'assets/imgs/m1-' . $b . '-1.png', $post->ID );
					$b_def = $theme_uri . '/assets/imgs/m1-' . $b . '-1.png';
				?>
				<div class="mediora-img-box">
					<label>Banner Slide <?php echo $b; ?>:</label>
					<span class="img-hint">Kích thước chuẩn: 1920 × 1080 px</span>
					<div class="mediora-img-preview" id="preview_<?php echo $b_key; ?>">
						<img src="<?php echo esc_url( $b_val ); ?>" alt="Banner <?php echo $b; ?>">
					</div>
					<input type="hidden" name="mediora_<?php echo $b_key; ?>" id="input_<?php echo $b_key; ?>" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_' . $b_key, true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="<?php echo $b_key; ?>">📁 Thay banner</button>
					<button type="button" class="button mediora-btn-remove" data-target="<?php echo $b_key; ?>" data-default="<?php echo esc_url( $b_def ); ?>">↺ Mặc định</button>
				</div>
				<?php endfor; ?>
			</div>
		</div>

		<!-- PHẦN 2: TRIẾT LÝ THẨM MỸ -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">✍️ PHẦN 2: ĐOẠN VĂN BẢN TRIẾT LÝ THẨM MỸ (GIỚI THIỆU TRANG CHỦ)</h3>
			<div class="mediora-field-text">
				<label>Nội dung triết lý thẩm mỹ:</label>
				<textarea name="mediora_home_intro_text" rows="4"><?php echo esc_textarea( $intro ); ?></textarea>
			</div>
		</div>

		<!-- PHẦN 3: DỊCH VỤ CHỦ ĐẠO GMISS & QUY TRÌNH 6 BƯỚC -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">✨ PHẦN 3: DỊCH VỤ CHỦ ĐẠO GMISS – 6 BƯỚC QUY TRÌNH & VIDEO TVC</h3>
			
			<!-- Ảnh chữ nghệ thuật GMISS & Video Poster -->
			<div class="mediora-mb-grid">
				<?php 
				$gmiss_tit = mediora_get_image( 'home_gmiss_title', 'assets/imgs/21.png', $post->ID );
				$vid_post  = mediora_get_image( 'home_video_poster', 'assets/imgs/bg_video.png', $post->ID );
				?>
				<div class="mediora-img-box">
					<label>Ảnh chữ tiêu đề Nâng Cơ GMISS:</label>
					<span class="img-hint">805 × 282 px (Chữ mạ vàng nghệ thuật)</span>
					<div class="mediora-img-preview" id="preview_home_gmiss_title">
						<img src="<?php echo esc_url( $gmiss_tit ); ?>" alt="Tiêu đề GMISS">
					</div>
					<input type="hidden" name="mediora_home_gmiss_title" id="input_home_gmiss_title" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_home_gmiss_title', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="home_gmiss_title">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="home_gmiss_title" data-default="<?php echo esc_url( $theme_uri . '/assets/imgs/21.png' ); ?>">↺ Mặc định</button>
				</div>

				<div class="mediora-img-box">
					<label>Ảnh bìa Video TVC GMISS (Poster):</label>
					<span class="img-hint">854 × 480 px hoặc 1920 × 1080 px</span>
					<div class="mediora-img-preview" id="preview_home_video_poster">
						<img src="<?php echo esc_url( $vid_post ); ?>" alt="Poster video">
					</div>
					<input type="hidden" name="mediora_home_video_poster" id="input_home_video_poster" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_home_video_poster', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="home_video_poster">📁 Thay poster</button>
					<button type="button" class="button mediora-btn-remove" data-target="home_video_poster" data-default="<?php echo esc_url( $theme_uri . '/assets/imgs/bg_video.png' ); ?>">↺ Mặc định</button>
				</div>
			</div>

			<div class="mediora-field-text mb-4">
				<label>Link Video TVC GMISS (file .mp4):</label>
				<input type="url" name="mediora_home_gmiss_video" value="<?php echo esc_attr( $vid_gmiss ); ?>">
			</div>

			<h4 style="font-size: 14px; font-weight: 700; color: #1d2327; margin: 18px 0 10px; border-top: 1px dashed #dcdcde; padding-top: 15px;">
				🩺 6 Bước Quy Trình Y Khoa Nâng Cơ GMISS:
			</h4>
			<div class="mediora-mb-grid">
				<?php for ( $s = 1; $s <= 6; $s++ ) : 
					$s_key = 'home_step_' . $s;
					$s_url = mediora_get_image( $s_key, 'assets/imgs/step2' . $s . '.png', $post->ID );
					$s_def = $theme_uri . '/assets/imgs/step2' . $s . '.png';
					$s_txt = get_post_meta( $post->ID, '_mediora_home_step_' . $s . '_text', true ) ?: $default_step_alts[ $s ];
				?>
				<div class="mediora-img-box">
					<label>Bước <?php echo $s; ?> GMISS:</label>
					<span class="img-hint">Kích thước: 408 × 265 px</span>
					<div class="mediora-img-preview" id="preview_<?php echo $s_key; ?>">
						<img src="<?php echo esc_url( $s_url ); ?>" alt="Bước <?php echo $s; ?>">
					</div>
					<input type="hidden" name="mediora_<?php echo $s_key; ?>" id="input_<?php echo $s_key; ?>" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_' . $s_key, true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="<?php echo $s_key; ?>">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="<?php echo $s_key; ?>" data-default="<?php echo esc_url( $s_def ); ?>">↺ Mặc định</button>
					
					<div class="mediora-field-text" style="margin-top: 8px;">
						<input type="text" name="mediora_home_step_<?php echo $s; ?>_text" value="<?php echo esc_attr( $s_txt ); ?>" placeholder="Mô tả bước <?php echo $s; ?>...">
					</div>
				</div>
				<?php endfor; ?>
			</div>
		</div>

		<!-- PHẦN 4: CƠ SỞ VẬT CHẤT 5 SAO -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🏛️ PHẦN 4: CƠ SỞ VẬT CHẤT 5 SAO</h3>
			<div class="mediora-field-text mb-3">
				<label>Link Video Cơ Sở Vật Chất 5 Sao (file .mp4):</label>
				<input type="url" name="mediora_home_facility_video" value="<?php echo esc_attr( $vid_facility ); ?>">
			</div>
			<div class="mediora-img-box mt-3" style="max-width: 400px;">
				<?php 
				$frame_url = mediora_get_image( 'home_facility_frame', 'assets/imgs/Frameline.png', $post->ID );
				?>
				<label>Khung viền mạ vàng 5 sao cơ sở vật chất:</label>
				<span class="img-hint">1732 × 997 px (PNG viền hoàng gia)</span>
				<div class="mediora-img-preview" id="preview_home_facility_frame">
					<img src="<?php echo esc_url( $frame_url ); ?>" alt="Khung mạ vàng">
				</div>
				<input type="hidden" name="mediora_home_facility_frame" id="input_home_facility_frame" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_home_facility_frame', true ) ); ?>">
				<button type="button" class="button mediora-btn-upload" data-target="home_facility_frame">📁 Thay khung</button>
				<button type="button" class="button mediora-btn-remove" data-target="home_facility_frame" data-default="<?php echo esc_url( $theme_uri . '/assets/imgs/Frameline.png' ); ?>">↺ Mặc định</button>
			</div>
		</div>

		<!-- PHẦN 5: ĐỘI NGŨ BÁC SĨ CHUYÊN KHOA -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">👨‍⚕️ PHẦN 5: ĐỘI NGŨ BÁC SĨ CHUYÊN KHOA PHẪU THUẬT TẠO HÌNH</h3>
			<div class="mediora-img-box" style="max-width: 500px;">
				<?php 
				$doc = mediora_get_image( 'home_doctor', 'assets/imgs/doctor1.png', $post->ID );
				?>
				<label>Ảnh Đội ngũ Bác sĩ chuyên khoa MEDIORA / Sejang:</label>
				<span class="img-hint">1583 × 762 px (PNG tách nền hoặc JPG sắc nét)</span>
				<div class="mediora-img-preview" id="preview_home_doctor">
					<img src="<?php echo esc_url( $doc ); ?>" alt="Bác sĩ">
				</div>
				<input type="hidden" name="mediora_home_doctor" id="input_home_doctor" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_home_doctor', true ) ); ?>">
				<button type="button" class="button mediora-btn-upload" data-target="home_doctor">📁 Thay ảnh bác sĩ</button>
				<button type="button" class="button mediora-btn-remove" data-target="home_doctor" data-default="<?php echo esc_url( $theme_uri . '/assets/imgs/doctor1.png' ); ?>">↺ Mặc định</button>
			</div>
		</div>

		<!-- PHẦN 6: KHÁCH HÀNG THỰC TẾ & NGƯỜI NỔI TIẾNG -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">⭐ PHẦN 6: HIỆU QUẢ KHÁCH HÀNG & NGƯỜI NỔI TIẾNG (SLIDER 3 CASE STUDY)</h3>
			<div class="mediora-mb-grid">
				<?php 
				$c1 = mediora_get_image( 'home_customer_1', 'assets/imgs/kh-ngan-quynh.png', $post->ID );
				$c2 = mediora_get_image( 'home_customer_2', 'assets/imgs/kh-hien-pham.png', $post->ID );
				$c3 = mediora_get_image( 'home_customer_3', 'assets/imgs/kh-vi-tuong.png', $post->ID );
				?>
				<div class="mediora-img-box">
					<label>Khách hàng 1 (Nghệ sĩ Ngân Quỳnh):</label>
					<span class="img-hint">1846 × 966 px</span>
					<div class="mediora-img-preview" id="preview_home_customer_1">
						<img src="<?php echo esc_url( $c1 ); ?>" alt="Khách 1">
					</div>
					<input type="hidden" name="mediora_home_customer_1" id="input_home_customer_1" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_home_customer_1', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="home_customer_1">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="home_customer_1" data-default="<?php echo esc_url( $theme_uri . '/assets/imgs/kh-ngan-quynh.png' ); ?>">↺ Mặc định</button>
					<div class="mediora-field-text">
						<input type="text" name="mediora_home_cust_1_name" value="<?php echo esc_attr( $cust_1_name ); ?>" placeholder="Tên khách hàng 1...">
					</div>
				</div>

				<div class="mediora-img-box">
					<label>Khách hàng 2 (Chị Hiền Phạm):</label>
					<span class="img-hint">1846 × 966 px</span>
					<div class="mediora-img-preview" id="preview_home_customer_2">
						<img src="<?php echo esc_url( $c2 ); ?>" alt="Khách 2">
					</div>
					<input type="hidden" name="mediora_home_customer_2" id="input_home_customer_2" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_home_customer_2', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="home_customer_2">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="home_customer_2" data-default="<?php echo esc_url( $theme_uri . '/assets/imgs/kh-hien-pham.png' ); ?>">↺ Mặc định</button>
					<div class="mediora-field-text">
						<input type="text" name="mediora_home_cust_2_name" value="<?php echo esc_attr( $cust_2_name ); ?>" placeholder="Tên khách hàng 2...">
					</div>
				</div>

				<div class="mediora-img-box">
					<label>Khách hàng 3 (Chị Vi Tường):</label>
					<span class="img-hint">1846 × 966 px</span>
					<div class="mediora-img-preview" id="preview_home_customer_3">
						<img src="<?php echo esc_url( $c3 ); ?>" alt="Khách 3">
					</div>
					<input type="hidden" name="mediora_home_customer_3" id="input_home_customer_3" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_home_customer_3', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="home_customer_3">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="home_customer_3" data-default="<?php echo esc_url( $theme_uri . '/assets/imgs/kh-vi-tuong.png' ); ?>">↺ Mặc định</button>
					<div class="mediora-field-text">
						<input type="text" name="mediora_home_cust_3_name" value="<?php echo esc_attr( $cust_3_name ); ?>" placeholder="Tên khách hàng 3...">
					</div>
				</div>
			</div>
		</div>

		<!-- PHẦN 7: KHỐI ĐĂNG KÝ TƯ VẤN & NHẬN ƯU ĐÃI -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🎁 PHẦN 7: KHỐI ĐĂNG KÝ NHẬN ƯU ĐÃI TƯ VẤN (COVER FORM)</h3>
			<div class="mediora-img-box" style="max-width: 450px;">
				<?php 
				$cov = mediora_get_image( 'home_cover', 'assets/imgs/cover.jpg', $post->ID );
				?>
				<label>Ảnh bìa khung Đăng ký nhận ưu đãi (Cột trái):</label>
				<span class="img-hint">1287 × 724 px</span>
				<div class="mediora-img-preview" id="preview_home_cover">
					<img src="<?php echo esc_url( $cov ); ?>" alt="Ảnh bìa tư vấn">
				</div>
				<input type="hidden" name="mediora_home_cover" id="input_home_cover" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_home_cover', true ) ); ?>">
				<button type="button" class="button mediora-btn-upload" data-target="home_cover">📁 Thay ảnh bìa</button>
				<button type="button" class="button mediora-btn-remove" data-target="home_cover" data-default="<?php echo esc_url( $theme_uri . '/assets/imgs/cover.jpg' ); ?>">↺ Mặc định</button>
			</div>
		</div>
	</div>
	<?php
}

/* ==========================================================================
   2. GIAO DIỆN META BOX TRANG DỊCH VỤ (post 103)
   ========================================================================== */
function mediora_render_services_meta_box( $post ) {
	wp_nonce_field( 'mediora_save_page_meta', 'mediora_page_meta_nonce' );
	mediora_render_mb_styles();
	$theme_uri  = get_template_directory_uri();
	$assets_uri = $theme_uri . '/assets/img-services';

	$desc = get_post_meta( $post->ID, '_mediora_services_desc', true );
	if ( empty( $desc ) ) {
		$desc = 'Nâng cơ trẻ hóa bằng sợi sinh học GMISS là giải pháp thẩm mỹ hướng đến cải thiện tình trạng mô mềm sa trễ, hỗ trợ nâng đỡ đường nét và cải thiện độ săn chắc của làn da. Tại vientrehoaSejang, mỗi liệu trình được xây dựng dựa trên tình trạng lão hóa, cấu trúc khuôn mặt và nhu cầu riêng của khách hàng, với định hướng trẻ hóa hài hòa, tự nhiên.';
	}
	$j_desc = get_post_meta( $post->ID, '_mediora_services_journey_desc', true );
	if ( empty( $j_desc ) ) {
		$j_desc = 'Mỗi hành trình là một dấu ấn riêng, được xây dựng từ sự thấu hiểu, chuyên môn và giải pháp trẻ hóa cá nhân hóa tại vientrehoaSejang.';
	}
	?>
	<div class="mediora-mb-wrap">
		<div class="mediora-mb-banner">
			<div>
				<strong style="color:#f5cf6d; font-size:14px;">🖼️ Quản Lý Hình Ảnh Website Tập Trung:</strong>
				<p style="margin:4px 0 0; color:#dcdcdc; font-size:13px;">Bạn cũng có thể xem và chỉnh sửa tất cả hình ảnh toàn trang tại trang <strong>Quản Lý Hình Ảnh</strong>.</p>
			</div>
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=mediora-images&tab=services' ) ); ?>" class="button">Mở Quản Lý Hình Ảnh Dịch Vụ ➔</a>
		</div>

		<!-- Section 1 -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🌟 PHẦN 1: HÌNH ẢNH NGƯỜI MẪU 2 BÊN, LỢI ÍCH & NỘI DUNG GIỚI THIỆU</h3>
			<div class="mediora-mb-grid">
				<?php 
				$m1 = mediora_get_image( 'services_model_1', 'assets/img-services/mau-1.png', $post->ID );
				$m2 = mediora_get_image( 'services_model_2', 'assets/img-services/mau-2.png', $post->ID );
				$b1 = mediora_get_image( 'services_benefit_1', 'assets/img-services/benefit-01.png', $post->ID );
				$b2 = mediora_get_image( 'services_benefit_2', 'assets/img-services/benefit-02.png', $post->ID );
				$b3 = mediora_get_image( 'services_benefit_3', 'assets/img-services/benefit-03.png', $post->ID );
				?>
				<div class="mediora-img-box">
					<label>Ảnh Người Mẫu Trái (Model Left):</label>
					<span class="img-hint">580 × 850 px (Tự căn tỷ lệ cân đối)</span>
					<div class="mediora-img-preview" id="preview_services_model_1">
						<img src="<?php echo esc_url( $m1 ); ?>" alt="Mẫu 1">
					</div>
					<input type="hidden" name="mediora_services_model_1" id="input_services_model_1" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_services_model_1', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="services_model_1">📁 Chọn / Tải ảnh lên</button>
					<button type="button" class="button mediora-btn-remove" data-target="services_model_1" data-default="<?php echo esc_url( $assets_uri . '/mau-1.png' ); ?>">↺ Mặc định</button>
				</div>
				<div class="mediora-img-box">
					<label>Ảnh Người Mẫu Phải (Model Right):</label>
					<span class="img-hint">580 × 850 px (Tự căn tỷ lệ cân đối)</span>
					<div class="mediora-img-preview" id="preview_services_model_2">
						<img src="<?php echo esc_url( $m2 ); ?>" alt="Mẫu 2">
					</div>
					<input type="hidden" name="mediora_services_model_2" id="input_services_model_2" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_services_model_2', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="services_model_2">📁 Chọn / Tải ảnh lên</button>
					<button type="button" class="button mediora-btn-remove" data-target="services_model_2" data-default="<?php echo esc_url( $assets_uri . '/mau-2.png' ); ?>">↺ Mặc định</button>
				</div>
				<div class="mediora-img-box">
					<label>Khối Lợi Ích 1 (Nâng đỡ mô mềm):</label>
					<span class="img-hint">1101 × 267 px</span>
					<div class="mediora-img-preview" id="preview_services_benefit_1">
						<img src="<?php echo esc_url( $b1 ); ?>" alt="Lợi ích 1">
					</div>
					<input type="hidden" name="mediora_services_benefit_1" id="input_services_benefit_1" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_services_benefit_1', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="services_benefit_1">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="services_benefit_1" data-default="<?php echo esc_url( $assets_uri . '/benefit-01.png' ); ?>">↺ Mặc định</button>
				</div>
				<div class="mediora-img-box">
					<label>Khối Lợi Ích 2 (Độ săn chắc của da):</label>
					<span class="img-hint">1101 × 267 px</span>
					<div class="mediora-img-preview" id="preview_services_benefit_2">
						<img src="<?php echo esc_url( $b2 ); ?>" alt="Lợi ích 2">
					</div>
					<input type="hidden" name="mediora_services_benefit_2" id="input_services_benefit_2" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_services_benefit_2', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="services_benefit_2">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="services_benefit_2" data-default="<?php echo esc_url( $assets_uri . '/benefit-02.png' ); ?>">↺ Mặc định</button>
				</div>
				<div class="mediora-img-box">
					<label>Khối Lợi Ích 3 (Cá nhân hóa):</label>
					<span class="img-hint">1101 × 267 px</span>
					<div class="mediora-img-preview" id="preview_services_benefit_3">
						<img src="<?php echo esc_url( $b3 ); ?>" alt="Lợi ích 3">
					</div>
					<input type="hidden" name="mediora_services_benefit_3" id="input_services_benefit_3" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_services_benefit_3', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="services_benefit_3">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="services_benefit_3" data-default="<?php echo esc_url( $assets_uri . '/benefit-03.png' ); ?>">↺ Mặc định</button>
				</div>
			</div>
			<div class="mediora-field-text">
				<label for="mediora_services_desc">Đoạn văn bản mô tả dịch vụ:</label>
				<textarea id="mediora_services_desc" name="mediora_services_desc" rows="3"><?php echo esc_textarea( $desc ); ?></textarea>
			</div>
		</div>

		<!-- Section 2: Quy trình & Bác sĩ -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🩺 PHẦN 2: QUY TRÌNH 6 BƯỚC & BÁC SĨ</h3>
			<div class="mediora-mb-grid">
				<?php 
				$bs = mediora_get_image( 'services_doctor', 'assets/img-services/podium-bs.png', $post->ID );
				?>
				<div class="mediora-img-box">
					<label>Ảnh Bác Sĩ (Podium đứng bục):</label>
					<span class="img-hint">722 × 881 px (PNG tách nền)</span>
					<div class="mediora-img-preview" id="preview_services_doctor">
						<img src="<?php echo esc_url( $bs ); ?>" alt="Bác sĩ">
					</div>
					<input type="hidden" name="mediora_services_doctor" id="input_services_doctor" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_services_doctor', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="services_doctor">📁 Chọn ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="services_doctor" data-default="<?php echo esc_url( $assets_uri . '/podium-bs.png' ); ?>">↺ Mặc định</button>
				</div>
				<?php for ( $i = 1; $i <= 6; $i++ ) : 
					$s_key = 'services_step_' . $i;
					$s_url = mediora_get_image( $s_key, 'assets/img-services/step-0' . $i . '.png', $post->ID );
					$def_s = $assets_uri . '/step-0' . $i . '.png';
				?>
				<div class="mediora-img-box">
					<label>Bước <?php echo $i; ?> dịch vụ:</label>
					<span class="img-hint">626 × 391 px</span>
					<div class="mediora-img-preview" id="preview_<?php echo $s_key; ?>">
						<img src="<?php echo esc_url( $s_url ); ?>" alt="Bước <?php echo $i; ?>">
					</div>
					<input type="hidden" name="mediora_<?php echo $s_key; ?>" id="input_<?php echo $s_key; ?>" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_' . $s_key, true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="<?php echo $s_key; ?>">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="<?php echo $s_key; ?>" data-default="<?php echo esc_url( $def_s ); ?>">↺ Mặc định</button>
				</div>
				<?php endfor; ?>
			</div>
		</div>

		<!-- Section 3: Slider khách hàng -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">✨ PHẦN 3: HÀNH TRÌNH KHÁCH HÀNG (SLIDER TRƯỚC / SAU)</h3>
			<div class="mediora-mb-grid">
				<?php 
				$j1 = mediora_get_image( 'services_journey_1', 'assets/img-services/ba-ngan-quynh.png', $post->ID );
				$j2 = mediora_get_image( 'services_journey_2', 'assets/img-services/ba-thao.png', $post->ID );
				?>
				<div class="mediora-img-box">
					<label>Khách Hàng 1 (Nghệ sĩ Ngân Quỳnh):</label>
					<span class="img-hint">791 × 624 px</span>
					<div class="mediora-img-preview" id="preview_services_journey_1">
						<img src="<?php echo esc_url( $j1 ); ?>" alt="Khách 1">
					</div>
					<input type="hidden" name="mediora_services_journey_1" id="input_services_journey_1" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_services_journey_1', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="services_journey_1">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="services_journey_1" data-default="<?php echo esc_url( $assets_uri . '/ba-ngan-quynh.png' ); ?>">↺ Mặc định</button>
				</div>
				<div class="mediora-img-box">
					<label>Khách Hàng 2 (Chị Thảo):</label>
					<span class="img-hint">791 × 624 px</span>
					<div class="mediora-img-preview" id="preview_services_journey_2">
						<img src="<?php echo esc_url( $j2 ); ?>" alt="Khách 2">
					</div>
					<input type="hidden" name="mediora_services_journey_2" id="input_services_journey_2" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_services_journey_2', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="services_journey_2">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="services_journey_2" data-default="<?php echo esc_url( $assets_uri . '/ba-thao.png' ); ?>">↺ Mặc định</button>
				</div>
			</div>
			<div class="mediora-field-text">
				<label for="mediora_services_journey_desc">Mô tả hành trình khách hàng:</label>
				<textarea id="mediora_services_journey_desc" name="mediora_services_journey_desc" rows="2"><?php echo esc_textarea( $j_desc ); ?></textarea>
			</div>
		</div>
	</div>
	<?php
}

/* ==========================================================================
   3. GIAO DIỆN META BOX TRANG VỀ CHÚNG TÔI (post 102)
   ========================================================================== */
function mediora_render_about_meta_box( $post ) {
	wp_nonce_field( 'mediora_save_page_meta', 'mediora_page_meta_nonce' );
	mediora_render_mb_styles();
	$theme_uri  = get_template_directory_uri();
	$assets_uri = $theme_uri . '/assets/img-about-us';

	$p1 = get_post_meta( $post->ID, '_mediora_about_p1', true );
	if ( empty( $p1 ) ) {
		$p1 = 'vientrehoaSejang định hướng chuyên sâu trong lĩnh vực trẻ hóa, ứng dụng các giải pháp thẩm mỹ dựa trên nền tảng y khoa và cá nhân hóa theo tình trạng của từng khách hàng. Mỗi liệu trình được xây dựng trên cơ sở thăm khám, đánh giá chuyên môn và chỉ định phù hợp, nhằm tối ưu hiệu quả cải thiện, đồng thời chú trọng an toàn trong quá trình thực hiện.';
	}
	$p2 = get_post_meta( $post->ID, '_mediora_about_p2', true );
	if ( empty( $p2 ) ) {
		$p2 = 'Sejang đề cao quy trình chuyên môn chặt chẽ, tư vấn minh bạch và theo dõi sau dịch vụ, hướng đến kết quả trẻ hóa hài hòa, tự nhiên và phù hợp với đặc điểm riêng của mỗi khách hàng.';
	}
	$vision = get_post_meta( $post->ID, '_mediora_about_vision', true );
	if ( empty( $vision ) ) {
		$vision = 'Trở thành viện chuyên khoa thẩm mỹ định hướng chuyên sâu về trẻ hóa, phát triển trên nền tảng y khoa, công nghệ hiện đại và tư duy thẩm mỹ tiên tiến. vientrehoaSejang hướng đến xây dựng chuẩn mực chăm sóc sắc đẹp chuyên nghiệp, đề cao tính an toàn, minh bạch và chất lượng dịch vụ, đồng hành cùng khách hàng trên hành trình gìn giữ nét thanh xuân và tôn vinh vẻ đẹp tự nhiên.';
	}
	$mission = get_post_meta( $post->ID, '_mediora_about_mission', true );
	if ( empty( $mission ) ) {
		$mission = 'Mang đến các giải pháp thẩm mỹ và trẻ hóa được cá nhân hóa dựa trên tình trạng thực tế, đặc điểm riêng và nhu cầu của từng khách hàng. vientrehoaSejang chú trọng quy trình thăm khám, đánh giá chuyên môn, tư vấn minh bạch và theo dõi sau dịch vụ, giúp khách hàng hiểu rõ lựa chọn, an tâm trong quá trình chăm sóc và hướng đến kết quả hài hòa, phù hợp với nét đẹp riêng.';
	}
	?>
	<div class="mediora-mb-wrap">
		<div class="mediora-mb-banner">
			<div>
				<strong style="color:#f5cf6d; font-size:14px;">🖼️ Quản Lý Hình Ảnh Website Tập Trung:</strong>
				<p style="margin:4px 0 0; color:#dcdcdc; font-size:13px;">Bạn cũng có thể xem và chỉnh sửa tất cả hình ảnh toàn trang tại trang <strong>Quản Lý Hình Ảnh</strong>.</p>
			</div>
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=mediora-images&tab=about' ) ); ?>" class="button">Mở Quản Lý Hình Ảnh Giới Thiệu ➔</a>
		</div>

		<!-- Văn bản giới thiệu -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">👑 PHẦN 1: ĐOẠN VĂN BẢN GIỚI THIỆU VIỆN TRẺ HÓA SEJANG</h3>
			<div class="mediora-field-text mb-3">
				<label>Đoạn văn bản 1 (Mở đầu triết lý y khoa):</label>
				<textarea name="mediora_about_p1" rows="3"><?php echo esc_textarea( $p1 ); ?></textarea>
			</div>
			<div class="mediora-field-text">
				<label>Đoạn văn bản 2 (Quy trình chuyên môn & cam kết):</label>
				<textarea name="mediora_about_p2" rows="3"><?php echo esc_textarea( $p2 ); ?></textarea>
			</div>
		</div>

		<!-- Tầm nhìn & Sứ mệnh -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🎯 PHẦN 2: TẦM NHÌN & SỨ MỆNH</h3>
			<div class="mediora-field-text mb-3">
				<label>Nội dung Tầm Nhìn:</label>
				<textarea name="mediora_about_vision" rows="3"><?php echo esc_textarea( $vision ); ?></textarea>
			</div>
			<div class="mediora-field-text">
				<label>Nội dung Sứ Mệnh:</label>
				<textarea name="mediora_about_mission" rows="3"><?php echo esc_textarea( $mission ); ?></textarea>
			</div>
		</div>

		<!-- Hình ảnh minh họa CSVC & Nền -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🏛️ PHẦN 3: HÌNH ẢNH HERO, MINH HỌA & 6 GIÁ TRỊ CỐT LÕI</h3>
			<div class="mediora-mb-grid">
				<?php 
				$ab_hero = mediora_get_image( 'about_bg_hero', 'assets/img-about-us/bg-hero.jpg', $post->ID );
				$ab_txt  = mediora_get_image( 'about_text_hero', 'assets/img-about-us/text-hero.png', $post->ID );
				$ab_mh   = mediora_get_image( 'about_minh_hoa', 'assets/img-about-us/minh-hoa.png', $post->ID );
				?>
				<div class="mediora-img-box">
					<label>Ảnh nền Hero Banner:</label>
					<span class="img-hint">1920 × 840 px</span>
					<div class="mediora-img-preview" id="preview_about_bg_hero">
						<img src="<?php echo esc_url( $ab_hero ); ?>" alt="Hero BG">
					</div>
					<input type="hidden" name="mediora_about_bg_hero" id="input_about_bg_hero" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_about_bg_hero', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="about_bg_hero">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="about_bg_hero" data-default="<?php echo esc_url( $assets_uri . '/bg-hero.jpg' ); ?>">↺ Mặc định</button>
				</div>

				<div class="mediora-img-box">
					<label>Ảnh chữ nghệ thuật Hero Banner:</label>
					<span class="img-hint">1374 × 160 px (PNG trong suốt)</span>
					<div class="mediora-img-preview" id="preview_about_text_hero">
						<img src="<?php echo esc_url( $ab_txt ); ?>" alt="Hero Text">
					</div>
					<input type="hidden" name="mediora_about_text_hero" id="input_about_text_hero" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_about_text_hero', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="about_text_hero">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="about_text_hero" data-default="<?php echo esc_url( $assets_uri . '/text-hero.png' ); ?>">↺ Mặc định</button>
				</div>

				<div class="mediora-img-box">
					<label>Ảnh Minh Họa Cơ Sở Vật Chất:</label>
					<span class="img-hint">657 × 653 px (PNG tách nền)</span>
					<div class="mediora-img-preview" id="preview_about_minh_hoa">
						<img src="<?php echo esc_url( $ab_mh ); ?>" alt="Minh họa CSVC">
					</div>
					<input type="hidden" name="mediora_about_minh_hoa" id="input_about_minh_hoa" value="<?php echo esc_attr( get_post_meta( $post->ID, '_mediora_about_minh_hoa', true ) ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="about_minh_hoa">📁 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="about_minh_hoa" data-default="<?php echo esc_url( $assets_uri . '/minh-hoa.png' ); ?>">↺ Mặc định</button>
				</div>
			</div>
		</div>
	</div>
	<?php
}

/* ==========================================================================
   4. GIAO DIỆN META BOX TRANG LIÊN HỆ (post 104)
   ========================================================================== */
function mediora_render_contact_meta_box( $post ) {
	wp_nonce_field( 'mediora_save_page_meta', 'mediora_page_meta_nonce' );
	mediora_render_mb_styles();

	$clinic_name = get_post_meta( $post->ID, '_mediora_contact_clinic_name', true );
	if ( empty( $clinic_name ) ) {
		$clinic_name = mediora_get_option( 'clinic_name', 'Viện Trẻ Hóa Chuyên Khoa vientrehoaSejang' );
	}

	$address = get_post_meta( $post->ID, '_mediora_contact_address', true );
	if ( empty( $address ) ) {
		$address = mediora_get_option( 'clinic_address', '257 - 259 Nguyễn Đình Chiểu, Phường Bàn Cờ, Quận 3, TP. Hồ Chí Minh' );
	}

	$hotline = get_post_meta( $post->ID, '_mediora_contact_hotline', true );
	if ( empty( $hotline ) ) {
		$hotline = mediora_get_option( 'hotline', '0988.226.951' );
	}

	$hours = get_post_meta( $post->ID, '_mediora_contact_hours', true );
	if ( empty( $hours ) ) {
		$hours = '08:00 - 20:00 hằng ngày';
	}

	$maps = get_post_meta( $post->ID, '_mediora_contact_maps_url', true );
	if ( empty( $maps ) ) {
		$maps = mediora_get_option( 'google_maps_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4975619551465!2d106.6853637!3d10.7719712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f2324905155%3A0xe54ef99eb24a7cf5!2zMjU3IC0gMjU5IE5ndXnhu4VuIMSQw6xuaCBDaGnhu4N1LCBQaMaw4budbmcgNSwgUXXhuq1uIDMsIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2svn!4v1715000000000!5m2!1svi!2svn' );
	}
	?>
	<div class="mediora-mb-wrap">
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">📍 THÔNG TIN LIÊN HỆ & CƠ SỞ</h3>
			<div class="mediora-field-text mb-3">
				<label>Tên cơ sở / Viện thẩm mỹ:</label>
				<input type="text" name="mediora_contact_clinic_name" value="<?php echo esc_attr( $clinic_name ); ?>">
			</div>
			<div class="mediora-field-text mb-3">
				<label>Địa chỉ cơ sở:</label>
				<input type="text" name="mediora_contact_address" value="<?php echo esc_attr( $address ); ?>">
			</div>
			<div class="mediora-field-text mb-3">
				<label>Hotline tư vấn & CSKH 24/7:</label>
				<input type="text" name="mediora_contact_hotline" value="<?php echo esc_attr( $hotline ); ?>">
			</div>
			<div class="mediora-field-text mb-3">
				<label>Thời gian mở cửa & tiếp đón:</label>
				<input type="text" name="mediora_contact_hours" value="<?php echo esc_attr( $hours ); ?>">
			</div>
			<div class="mediora-field-text">
				<label>Link nhúng bản đồ Google Maps (Embed URL):</label>
				<input type="url" name="mediora_contact_maps_url" value="<?php echo esc_attr( $maps ); ?>">
			</div>
		</div>
	</div>
	<?php
}

/* ==========================================================================
   LƯU DỮ LIỆU TẤT CẢ CÁC META BOX (VÀ ĐỒNG BỘ VỚI THEME OPTIONS TẬP TRUNG)
   ========================================================================== */
function mediora_save_all_page_meta( $post_id ) {
	if ( ! isset( $_POST['mediora_page_meta_nonce'] ) || ! wp_verify_nonce( $_POST['mediora_page_meta_nonce'], 'mediora_save_page_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return;
	}

	$all_fields = array(
		// Trang Chủ
		'_mediora_home_banner_1'          => 'mediora_home_banner_1',
		'_mediora_home_banner_2'          => 'mediora_home_banner_2',
		'_mediora_home_banner_3'          => 'mediora_home_banner_3',
		'_mediora_home_banner_4'          => 'mediora_home_banner_4',
		'_mediora_home_intro_text'        => 'mediora_home_intro_text',
		'_mediora_home_gmiss_title'       => 'mediora_home_gmiss_title',
		'_mediora_home_video_poster'      => 'mediora_home_video_poster',
		'_mediora_home_gmiss_video'       => 'mediora_home_gmiss_video',
		'_mediora_home_facility_video'    => 'mediora_home_facility_video',
		'_mediora_home_facility_frame'    => 'mediora_home_facility_frame',
		'_mediora_home_doctor'            => 'mediora_home_doctor',
		'_mediora_home_customer_1'        => 'mediora_home_customer_1',
		'_mediora_home_customer_2'        => 'mediora_home_customer_2',
		'_mediora_home_customer_3'        => 'mediora_home_customer_3',
		'_mediora_home_cust_1_name'       => 'mediora_home_cust_1_name',
		'_mediora_home_cust_2_name'       => 'mediora_home_cust_2_name',
		'_mediora_home_cust_3_name'       => 'mediora_home_cust_3_name',
		'_mediora_home_cover'             => 'mediora_home_cover',

		// 6 bước GMISS Trang Chủ
		'_mediora_home_step_1'            => 'mediora_home_step_1',
		'_mediora_home_step_2'            => 'mediora_home_step_2',
		'_mediora_home_step_3'            => 'mediora_home_step_3',
		'_mediora_home_step_4'            => 'mediora_home_step_4',
		'_mediora_home_step_5'            => 'mediora_home_step_5',
		'_mediora_home_step_6'            => 'mediora_home_step_6',
		'_mediora_home_step_1_text'       => 'mediora_home_step_1_text',
		'_mediora_home_step_2_text'       => 'mediora_home_step_2_text',
		'_mediora_home_step_3_text'       => 'mediora_home_step_3_text',
		'_mediora_home_step_4_text'       => 'mediora_home_step_4_text',
		'_mediora_home_step_5_text'       => 'mediora_home_step_5_text',
		'_mediora_home_step_6_text'       => 'mediora_home_step_6_text',

		// Dịch Vụ
		'_mediora_services_model_1'       => 'mediora_services_model_1',
		'_mediora_services_model_2'       => 'mediora_services_model_2',
		'_mediora_services_desc'          => 'mediora_services_desc',
		'_mediora_services_benefit_1'     => 'mediora_services_benefit_1',
		'_mediora_services_benefit_2'     => 'mediora_services_benefit_2',
		'_mediora_services_benefit_3'     => 'mediora_services_benefit_3',
		'_mediora_services_doctor'        => 'mediora_services_doctor',
		'_mediora_services_step_1'        => 'mediora_services_step_1',
		'_mediora_services_step_2'        => 'mediora_services_step_2',
		'_mediora_services_step_3'        => 'mediora_services_step_3',
		'_mediora_services_step_4'        => 'mediora_services_step_4',
		'_mediora_services_step_5'        => 'mediora_services_step_5',
		'_mediora_services_step_6'        => 'mediora_services_step_6',
		'_mediora_services_journey_1'     => 'mediora_services_journey_1',
		'_mediora_services_journey_2'     => 'mediora_services_journey_2',
		'_mediora_services_journey_desc'  => 'mediora_services_journey_desc',

		// Về Chúng Tôi
		'_mediora_about_p1'               => 'mediora_about_p1',
		'_mediora_about_p2'               => 'mediora_about_p2',
		'_mediora_about_vision'           => 'mediora_about_vision',
		'_mediora_about_mission'          => 'mediora_about_mission',
		'_mediora_about_bg_hero'          => 'mediora_about_bg_hero',
		'_mediora_about_text_hero'        => 'mediora_about_text_hero',
		'_mediora_about_minh_hoa'         => 'mediora_about_minh_hoa',

		// Liên Hệ
		'_mediora_contact_clinic_name'    => 'mediora_contact_clinic_name',
		'_mediora_contact_address'        => 'mediora_contact_address',
		'_mediora_contact_hotline'        => 'mediora_contact_hotline',
		'_mediora_contact_hours'          => 'mediora_contact_hours',
		'_mediora_contact_maps_url'       => 'mediora_contact_maps_url',
	);

	$theme_images = get_option( 'mediora_theme_images', array() );
	if ( ! is_array( $theme_images ) ) {
		$theme_images = array();
	}

	foreach ( $all_fields as $meta_key => $post_key ) {
		if ( isset( $_POST[ $post_key ] ) ) {
			$val = wp_unslash( $_POST[ $post_key ] );
			if ( strpos( $meta_key, 'desc' ) !== false || strpos( $meta_key, 'intro' ) !== false || strpos( $meta_key, 'p1' ) !== false || strpos( $meta_key, 'p2' ) !== false || strpos( $meta_key, 'vision' ) !== false || strpos( $meta_key, 'mission' ) !== false ) {
				update_post_meta( $post_id, $meta_key, sanitize_textarea_field( $val ) );
			} elseif ( strpos( $meta_key, 'url' ) !== false || strpos( $meta_key, 'video' ) !== false || strpos( $meta_key, 'banner' ) !== false || strpos( $meta_key, 'cover' ) !== false || strpos( $meta_key, 'model' ) !== false || strpos( $meta_key, 'step' ) !== false && strpos( $meta_key, '_text' ) === false || strpos( $meta_key, 'journey' ) !== false && strpos( $meta_key, '_desc' ) === false || strpos( $meta_key, 'doctor' ) !== false || strpos( $meta_key, 'customer' ) !== false || strpos( $meta_key, 'minh_hoa' ) !== false || strpos( $meta_key, 'hero' ) !== false || strpos( $meta_key, 'benefit' ) !== false || strpos( $meta_key, 'frame' ) !== false || strpos( $meta_key, 'title' ) !== false && strpos( $meta_key, 'clinic' ) === false ) {
				$clean_url = esc_url_raw( trim( $val ) );
				if ( ! empty( $clean_url ) ) {
					update_post_meta( $post_id, $meta_key, $clean_url );
				} else {
					delete_post_meta( $post_id, $meta_key );
				}
				// Đồng bộ vào option tập trung
				$opt_key = ltrim( $meta_key, '_' );
				$opt_key = preg_replace( '/^mediora_/', '', $opt_key );
				$theme_images[ $opt_key ] = $clean_url;
			} else {
				update_post_meta( $post_id, $meta_key, sanitize_text_field( $val ) );
			}
		}
	}

	update_option( 'mediora_theme_images', $theme_images );
}
add_action( 'save_post', 'mediora_save_all_page_meta' );
