<?php
/**
 * Bộ Quản Lý Bảng Điều Khiển Trực Quan (Meta Boxes) Cho Các Trang:
 * 1. Trang Chủ (front-page.php / post 101)
 * 2. Trang Dịch Vụ (page-services.php / post 103)
 * 3. Trang Về Chúng Tôi (page-about.php / post 102)
 * 4. Trang Liên Hệ (page-contact.php / post 104)
 *
 * @package Mediora_Clinic
 * @version 1.5.0
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

	// 1. Meta Box Trang Dịch Vụ
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

	// 2. Meta Box Trang Chủ
	if ( 101 === $post_id || 'trang-chu' === $slug || (int) get_option( 'page_on_front' ) === $post_id ) {
		add_meta_box(
			'mediora_home_settings_mb',
			'🏠 Bảng Điều Khiển Nội Dung & Hình Ảnh – Trang Chủ (vientrehoaSejang)',
			'mediora_render_home_meta_box',
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
		.mediora-mb-wrap { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; margin: 10px 0; }
		.mediora-mb-section { background: #ffffff; border: 1px solid #e2d9cf; border-left: 4px solid #704A2F; border-radius: 6px; padding: 16px 20px; margin-bottom: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
		.mediora-mb-title { font-size: 15px; font-weight: 700; color: #704A2F; margin: 0 0 14px 0; padding-bottom: 8px; border-bottom: 1px dashed #e5dacd; }
		.mediora-mb-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 16px; margin-bottom: 15px; }
		.mediora-img-box { background: #faf6f0; border: 1px solid #ebd9c8; border-radius: 6px; padding: 12px; text-align: center; }
		.mediora-img-box label { display: block; font-weight: 600; color: #3A2618; margin-bottom: 6px; text-align: left; font-size: 13px; }
		.mediora-img-preview { width: 100%; height: 160px; background: #efe7dc; border-radius: 4px; overflow: hidden; display: flex; align-items: center; justify-content: center; margin-bottom: 10px; border: 1px dashed #cbb69d; }
		.mediora-img-preview img { max-width: 100%; max-height: 100%; object-fit: contain; display: block; }
		.mediora-btn-upload { background: #704A2F !important; color: #ffffff !important; border-color: #55341c !important; font-weight: 600 !important; margin-right: 6px !important; }
		.mediora-btn-upload:hover { background: #875b3b !important; color: #ffffff !important; }
		.mediora-btn-remove { color: #a00 !important; border-color: #ccc !important; }
		.mediora-field-text { margin-top: 12px; text-align: left; }
		.mediora-field-text label { display: block; font-weight: 600; margin-bottom: 5px; color: #3A2618; font-size: 13px; }
		.mediora-field-text textarea, .mediora-field-text input[type="text"], .mediora-field-text input[type="url"] { width: 100%; border: 1px solid #d0c2b2; border-radius: 4px; padding: 8px 10px; background: #fff; box-sizing: border-box; }
		.mediora-hint { font-size: 12px; color: #776251; margin-top: 5px; line-height: 1.4; }
	</style>
	<script>
	jQuery(document).ready(function($){
		$(document).on('click', '.mediora-btn-upload', function(e){
			e.preventDefault();
			var target = $(this).data('target');
			var frame = wp.media({
				title: 'Chọn hoặc tải ảnh lên',
				button: { text: 'Sử dụng ảnh này' },
				multiple: false
			});
			frame.on('select', function(){
				var attachment = frame.state().get('selection').first().toJSON();
				$('#input_' + target).val(attachment.url);
				$('#preview_' + target + ' img').attr('src', attachment.url);
				$('.mediora-btn-remove[data-target="' + target + '"]').show();
			});
			frame.open();
		});

		$(document).on('click', '.mediora-btn-remove', function(e){
			e.preventDefault();
			var target = $(this).data('target');
			var def = $(this).data('default') || '';
			$('#input_' + target).val('');
			$('#preview_' + target + ' img').attr('src', def);
			$(this).hide();
		});
	});
	</script>
	<?php
}

/* ==========================================================================
   1. GIAO DIỆN META BOX TRANG DỊCH VỤ
   ========================================================================== */
function mediora_render_services_meta_box( $post ) {
	wp_nonce_field( 'mediora_save_page_meta', 'mediora_page_meta_nonce' );
	mediora_render_mb_styles();
	$assets_uri = get_template_directory_uri() . '/assets/img-services';

	$m1 = get_post_meta( $post->ID, '_mediora_services_model_1', true );
	$m2 = get_post_meta( $post->ID, '_mediora_services_model_2', true );
	$desc = get_post_meta( $post->ID, '_mediora_services_desc', true );
	if ( empty( $desc ) ) {
		$desc = 'Nâng cơ trẻ hóa bằng sợi sinh học GMISS là giải pháp thẩm mỹ hướng đến cải thiện tình trạng mô mềm sa trễ, hỗ trợ nâng đỡ đường nét và cải thiện độ săn chắc của làn da. Tại vientrehoaSejang, mỗi liệu trình được xây dựng dựa trên tình trạng lão hóa, cấu trúc khuôn mặt và nhu cầu riêng của khách hàng, với định hướng trẻ hóa hài hòa, tự nhiên.';
	}
	$bs = get_post_meta( $post->ID, '_mediora_services_doctor', true );
	$j1 = get_post_meta( $post->ID, '_mediora_services_journey_1', true );
	$j2 = get_post_meta( $post->ID, '_mediora_services_journey_2', true );
	$j_desc = get_post_meta( $post->ID, '_mediora_services_journey_desc', true );
	if ( empty( $j_desc ) ) {
		$j_desc = 'Mỗi hành trình là một dấu ấn riêng, được xây dựng từ sự thấu hiểu, chuyên môn và giải pháp trẻ hóa cá nhân hóa tại vientrehoaSejang.';
	}
	?>
	<div class="mediora-mb-wrap">
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🌟 PHẦN 1: HÌNH ẢNH NGƯỜI MẪU 2 BÊN & MÔ TẢ GIỚI THIỆU</h3>
			<div class="mediora-mb-grid">
				<div class="mediora-img-box">
					<label>Ảnh Người Mẫu Bên Trái (Model Left):</label>
					<div class="mediora-img-preview" id="preview_model_1">
						<img src="<?php echo esc_url( $m1 ? $m1 : $assets_uri . '/mau-1.png' ); ?>" alt="Mẫu 1">
					</div>
					<input type="hidden" name="mediora_services_model_1" id="input_model_1" value="<?php echo esc_attr( $m1 ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="model_1">📷 Chọn ảnh / Tải lên</button>
					<button type="button" class="button mediora-btn-remove" data-target="model_1" data-default="<?php echo esc_url( $assets_uri . '/mau-1.png' ); ?>" <?php echo empty( $m1 ) ? 'style="display:none;"' : ''; ?>>Khôi phục mặc định</button>
				</div>
				<div class="mediora-img-box">
					<label>Ảnh Người Mẫu Bên Phải (Model Right):</label>
					<div class="mediora-img-preview" id="preview_model_2">
						<img src="<?php echo esc_url( $m2 ? $m2 : $assets_uri . '/mau-2.png' ); ?>" alt="Mẫu 2">
					</div>
					<input type="hidden" name="mediora_services_model_2" id="input_model_2" value="<?php echo esc_attr( $m2 ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="model_2">📷 Chọn ảnh / Tải lên</button>
					<button type="button" class="button mediora-btn-remove" data-target="model_2" data-default="<?php echo esc_url( $assets_uri . '/mau-2.png' ); ?>" <?php echo empty( $m2 ) ? 'style="display:none;"' : ''; ?>>Khôi phục mặc định</button>
				</div>
			</div>
			<div class="mediora-field-text">
				<label for="mediora_services_desc">Đoạn văn bản mô tả dịch vụ:</label>
				<textarea id="mediora_services_desc" name="mediora_services_desc" rows="3"><?php echo esc_textarea( $desc ); ?></textarea>
			</div>
		</div>

		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🩺 PHẦN 2: QUY TRÌNH 6 BƯỚC & BÁC SĨ</h3>
			<div class="mediora-mb-grid" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
				<div class="mediora-img-box">
					<label>Ảnh Bác Sĩ:</label>
					<div class="mediora-img-preview" id="preview_doctor">
						<img src="<?php echo esc_url( $bs ? $bs : $assets_uri . '/podium-bs.png' ); ?>" alt="Bác sĩ">
					</div>
					<input type="hidden" name="mediora_services_doctor" id="input_doctor" value="<?php echo esc_attr( $bs ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="doctor">📷 Chọn ảnh</button>
				</div>
				<?php for ( $i = 1; $i <= 6; $i++ ) : 
					$step_v = get_post_meta( $post->ID, '_mediora_services_step_' . $i, true );
					$def_s = $assets_uri . '/step-0' . $i . '.png';
				?>
				<div class="mediora-img-box">
					<label>Bước <?php echo $i; ?>:</label>
					<div class="mediora-img-preview" id="preview_step_<?php echo $i; ?>">
						<img src="<?php echo esc_url( $step_v ? $step_v : $def_s ); ?>" alt="Bước <?php echo $i; ?>">
					</div>
					<input type="hidden" name="mediora_services_step_<?php echo $i; ?>" id="input_step_<?php echo $i; ?>" value="<?php echo esc_attr( $step_v ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="step_<?php echo $i; ?>">📷 Thay ảnh</button>
				</div>
				<?php endfor; ?>
			</div>
		</div>

		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">✨ PHẦN 3: HÀNH TRÌNH KHÁCH HÀNG (SLIDER TRƯỚC / SAU)</h3>
			<div class="mediora-mb-grid">
				<div class="mediora-img-box">
					<label>Khách Hàng 1 (Nghệ sĩ Ngân Quỳnh):</label>
					<div class="mediora-img-preview" id="preview_j1">
						<img src="<?php echo esc_url( $j1 ? $j1 : $assets_uri . '/ba-ngan-quynh.png' ); ?>" alt="Khách 1">
					</div>
					<input type="hidden" name="mediora_services_journey_1" id="input_j1" value="<?php echo esc_attr( $j1 ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="j1">📷 Thay ảnh</button>
				</div>
				<div class="mediora-img-box">
					<label>Khách Hàng 2 (Chị Thảo):</label>
					<div class="mediora-img-preview" id="preview_j2">
						<img src="<?php echo esc_url( $j2 ? $j2 : $assets_uri . '/ba-thao.png' ); ?>" alt="Khách 2">
					</div>
					<input type="hidden" name="mediora_services_journey_2" id="input_j2" value="<?php echo esc_attr( $j2 ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="j2">📷 Thay ảnh</button>
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
   2. GIAO DIỆN META BOX TRANG CHỦ
   ========================================================================== */
function mediora_render_home_meta_box( $post ) {
	wp_nonce_field( 'mediora_save_page_meta', 'mediora_page_meta_nonce' );
	mediora_render_mb_styles();
	$theme_uri = get_template_directory_uri();

	$banner1 = get_post_meta( $post->ID, '_mediora_home_banner_1', true );
	$banner2 = get_post_meta( $post->ID, '_mediora_home_banner_2', true );
	$banner3 = get_post_meta( $post->ID, '_mediora_home_banner_3', true );
	$banner4 = get_post_meta( $post->ID, '_mediora_home_banner_4', true );

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

	$cover = get_post_meta( $post->ID, '_mediora_home_register_cover', true );
	?>
	<div class="mediora-mb-wrap">
		<!-- Hero Banners -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🖼️ PHẦN 1: BANNER SLIDER ĐẦU TRANG CHỦ</h3>
			<div class="mediora-mb-grid" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
				<?php for ( $b = 1; $b <= 4; $b++ ) : 
					$b_val = ${'banner' . $b};
					$b_def = $theme_uri . '/assets/imgs/m1-' . $b . '-1.png';
				?>
				<div class="mediora-img-box">
					<label>Banner Slide <?php echo $b; ?>:</label>
					<div class="mediora-img-preview" id="preview_banner_<?php echo $b; ?>">
						<img src="<?php echo esc_url( $b_val ? $b_val : $b_def ); ?>" alt="Banner <?php echo $b; ?>">
					</div>
					<input type="hidden" name="mediora_home_banner_<?php echo $b; ?>" id="input_banner_<?php echo $b; ?>" value="<?php echo esc_attr( $b_val ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="banner_<?php echo $b; ?>">📷 Thay banner</button>
				</div>
				<?php endfor; ?>
			</div>
		</div>

		<!-- Intro Text -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">✍️ PHẦN 2: ĐOẠN VĂN BẢN TRIẾT LÝ THẨM MỸ (GIỚI THIỆU TRANG CHỦ)</h3>
			<div class="mediora-field-text">
				<textarea name="mediora_home_intro_text" rows="4"><?php echo esc_textarea( $intro ); ?></textarea>
			</div>
		</div>

		<!-- Videos & Cover -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🎬 PHẦN 3: VIDEO & ẢNH BÌA ĐĂNG KÝ TƯ VẤN</h3>
			<div class="mediora-field-text mb-3">
				<label>Link Video TVC GMISS (file .mp4):</label>
				<input type="url" name="mediora_home_gmiss_video" value="<?php echo esc_attr( $vid_gmiss ); ?>">
			</div>
			<div class="mediora-field-text mb-3">
				<label>Link Video Cơ Sở Vật Chất 5 Sao (file .mp4):</label>
				<input type="url" name="mediora_home_facility_video" value="<?php echo esc_attr( $vid_facility ); ?>">
			</div>
			<div class="mediora-img-box mt-3" style="max-width: 400px;">
				<label>Ảnh bìa khung Đăng ký tư vấn:</label>
				<div class="mediora-img-preview" id="preview_reg_cover">
					<img src="<?php echo esc_url( $cover ? $cover : $theme_uri . '/assets/imgs/cover.jpg' ); ?>" alt="Ảnh bìa tư vấn">
				</div>
				<input type="hidden" name="mediora_home_register_cover" id="input_reg_cover" value="<?php echo esc_attr( $cover ); ?>">
				<button type="button" class="button mediora-btn-upload" data-target="reg_cover">📷 Thay ảnh bìa</button>
			</div>
		</div>
	</div>
	<?php
}

/* ==========================================================================
   3. GIAO DIỆN META BOX TRANG VỀ CHÚNG TÔI
   ========================================================================== */
function mediora_render_about_meta_box( $post ) {
	wp_nonce_field( 'mediora_save_page_meta', 'mediora_page_meta_nonce' );
	mediora_render_mb_styles();
	$theme_uri = get_template_directory_uri();

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
		$vision = 'Trở thành hệ thống viện trẻ hóa hàng đầu, định hình chuẩn mực thẩm mỹ y khoa an toàn, bền vững và tôn vinh vẻ đẹp tự nhiên của phụ nữ Á Đông.';
	}

	$mission = get_post_meta( $post->ID, '_mediora_about_mission', true );
	if ( empty( $mission ) ) {
		$mission = 'Cung cấp các giải pháp trẻ hóa cá nhân hóa, kết hợp công nghệ y khoa tối tân và y đức chuẩn mực để đồng hành cùng thanh xuân của khách hàng.';
	}
	?>
	<div class="mediora-mb-wrap">
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🌟 PHẦN 1: ĐOẠN VĂN BẢN GIỚI THIỆU CHUNG (ĐẦU TRANG)</h3>
			<div class="mediora-field-text mb-3">
				<label>Đoạn văn 1:</label>
				<textarea name="mediora_about_p1" rows="3"><?php echo esc_textarea( $p1 ); ?></textarea>
			</div>
			<div class="mediora-field-text">
				<label>Đoạn văn 2:</label>
				<textarea name="mediora_about_p2" rows="3"><?php echo esc_textarea( $p2 ); ?></textarea>
			</div>
		</div>

		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🎯 PHẦN 2: TẦM NHÌN & SỨ MỆNH</h3>
			<div class="mediora-field-text mb-3">
				<label>Tầm nhìn (Vision):</label>
				<textarea name="mediora_about_vision" rows="2"><?php echo esc_textarea( $vision ); ?></textarea>
			</div>
			<div class="mediora-field-text">
				<label>Sứ mệnh (Mission):</label>
				<textarea name="mediora_about_mission" rows="2"><?php echo esc_textarea( $mission ); ?></textarea>
			</div>
		</div>
	</div>
	<?php
}

/* ==========================================================================
   4. GIAO DIỆN META BOX TRANG LIÊN HỆ
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
		$hours = '08:00 - 20:00 hàng ngày (Cả Thứ 7, Chủ Nhật & Lễ Tết)';
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
   LƯU DỮ LIỆU TẤT CẢ CÁC META BOX
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
		// Dịch Vụ
		'_mediora_services_model_1'       => 'mediora_services_model_1',
		'_mediora_services_model_2'       => 'mediora_services_model_2',
		'_mediora_services_desc'          => 'mediora_services_desc',
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

		// Trang Chủ
		'_mediora_home_banner_1'          => 'mediora_home_banner_1',
		'_mediora_home_banner_2'          => 'mediora_home_banner_2',
		'_mediora_home_banner_3'          => 'mediora_home_banner_3',
		'_mediora_home_banner_4'          => 'mediora_home_banner_4',
		'_mediora_home_intro_text'        => 'mediora_home_intro_text',
		'_mediora_home_gmiss_video'       => 'mediora_home_gmiss_video',
		'_mediora_home_facility_video'    => 'mediora_home_facility_video',
		'_mediora_home_register_cover'    => 'mediora_home_register_cover',

		// Về Chúng Tôi
		'_mediora_about_p1'               => 'mediora_about_p1',
		'_mediora_about_p2'               => 'mediora_about_p2',
		'_mediora_about_vision'           => 'mediora_about_vision',
		'_mediora_about_mission'          => 'mediora_about_mission',

		// Liên Hệ
		'_mediora_contact_clinic_name'    => 'mediora_contact_clinic_name',
		'_mediora_contact_address'        => 'mediora_contact_address',
		'_mediora_contact_hotline'        => 'mediora_contact_hotline',
		'_mediora_contact_hours'          => 'mediora_contact_hours',
		'_mediora_contact_maps_url'       => 'mediora_contact_maps_url',
	);

	foreach ( $all_fields as $meta_key => $post_key ) {
		if ( isset( $_POST[ $post_key ] ) ) {
			if ( strpos( $meta_key, 'desc' ) !== false || strpos( $meta_key, 'intro' ) !== false || strpos( $meta_key, 'p1' ) !== false || strpos( $meta_key, 'p2' ) !== false || strpos( $meta_key, 'vision' ) !== false || strpos( $meta_key, 'mission' ) !== false ) {
				update_post_meta( $post_id, $meta_key, sanitize_textarea_field( wp_unslash( $_POST[ $post_key ] ) ) );
			} elseif ( strpos( $meta_key, 'url' ) !== false || strpos( $meta_key, 'video' ) !== false || strpos( $meta_key, 'banner' ) !== false || strpos( $meta_key, 'cover' ) !== false || strpos( $meta_key, 'model' ) !== false || strpos( $meta_key, 'step' ) !== false || strpos( $meta_key, 'journey' ) !== false || strpos( $meta_key, 'doctor' ) !== false ) {
				update_post_meta( $post_id, $meta_key, esc_url_raw( wp_unslash( $_POST[ $post_key ] ) ) );
			} else {
				update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $post_key ] ) ) );
			}
		}
	}
}
add_action( 'save_post', 'mediora_save_all_page_meta' );
