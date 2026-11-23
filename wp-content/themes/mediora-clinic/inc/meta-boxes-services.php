<?php
/**
 * Meta Box Quản Lý Nội Dung & Hình Ảnh Trang Dịch Vụ
 *
 * Cho phép Quản trị viên thay đổi hình ảnh và văn bản của Trang Dịch Vụ
 * trực quan, dễ dàng mà không cần phải can thiệp vào mã code.
 *
 * @package Mediora_Clinic
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Đăng ký Meta Box cho Trang Dịch Vụ
 */
function mediora_register_services_meta_box() {
	global $post;
	if ( ! $post ) {
		return;
	}

	// Chỉ hiển thị trên trang Dịch Vụ (dùng template page-services.php hoặc có slug 'dich-vu')
	$template = get_post_meta( $post->ID, '_wp_page_template', true );
	if ( 'page-services.php' === $template || 'dich-vu' === $post->post_name || 103 === (int) $post->ID ) {
		add_meta_box(
			'mediora_services_settings_mb',
			'✨ Bảng Điều Khiển Hình Ảnh & Nội Dung – Trang Dịch Vụ (vientrehoaSejang)',
			'mediora_render_services_meta_box',
			'page',
			'normal',
			'high'
		);
	}
}
add_action( 'add_meta_boxes', 'mediora_register_services_meta_box' );

/**
 * Enqueue Media Scripts & Styles trong Admin
 */
function mediora_services_admin_scripts( $hook ) {
	if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
		return;
	}

	global $post;
	if ( ! $post || 'page' !== $post->post_type ) {
		return;
	}

	$template = get_post_meta( $post->ID, '_wp_page_template', true );
	if ( 'page-services.php' === $template || 'dich-vu' === $post->post_name || 103 === (int) $post->ID ) {
		wp_enqueue_media();
		wp_enqueue_style( 'wp-color-picker' );
	}
}
add_action( 'admin_enqueue_scripts', 'mediora_services_admin_scripts' );

/**
 * Render giao diện Meta Box
 */
function mediora_render_services_meta_box( $post ) {
	wp_nonce_field( 'mediora_save_services_meta', 'mediora_services_meta_nonce' );

	$assets_uri = get_template_directory_uri() . '/assets/img-services';

	// Section 1
	$m1 = get_post_meta( $post->ID, '_mediora_services_model_1', true );
	$m2 = get_post_meta( $post->ID, '_mediora_services_model_2', true );
	$desc = get_post_meta( $post->ID, '_mediora_services_desc', true );
	if ( empty( $desc ) ) {
		$desc = 'Nâng cơ trẻ hóa bằng sợi sinh học GMISS là giải pháp thẩm mỹ hướng đến cải thiện tình trạng mô mềm sa trễ, hỗ trợ nâng đỡ đường nét và cải thiện độ săn chắc của làn da. Tại vientrehoaSejang, mỗi liệu trình được xây dựng dựa trên tình trạng lão hóa, cấu trúc khuôn mặt và nhu cầu riêng của khách hàng, với định hướng trẻ hóa hài hòa, tự nhiên.';
	}

	// Section 2
	$bs = get_post_meta( $post->ID, '_mediora_services_doctor', true );
	$s1 = get_post_meta( $post->ID, '_mediora_services_step_1', true );
	$s2 = get_post_meta( $post->ID, '_mediora_services_step_2', true );
	$s3 = get_post_meta( $post->ID, '_mediora_services_step_3', true );
	$s4 = get_post_meta( $post->ID, '_mediora_services_step_4', true );
	$s5 = get_post_meta( $post->ID, '_mediora_services_step_5', true );
	$s6 = get_post_meta( $post->ID, '_mediora_services_step_6', true );

	// Section 3
	$j1 = get_post_meta( $post->ID, '_mediora_services_journey_1', true );
	$j2 = get_post_meta( $post->ID, '_mediora_services_journey_2', true );
	$j_desc = get_post_meta( $post->ID, '_mediora_services_journey_desc', true );
	if ( empty( $j_desc ) ) {
		$j_desc = 'Mỗi hành trình là một dấu ấn riêng, được xây dựng từ sự thấu hiểu, chuyên môn và giải pháp trẻ hóa cá nhân hóa tại vientrehoaSejang.';
	}
	?>
	<style>
		.mediora-mb-wrap {
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
			margin: 10px 0;
		}
		.mediora-mb-section {
			background: #ffffff;
			border: 1px solid #e2d9cf;
			border-left: 4px solid #704A2F;
			border-radius: 6px;
			padding: 16px 20px;
			margin-bottom: 20px;
			box-shadow: 0 1px 3px rgba(0,0,0,0.05);
		}
		.mediora-mb-title {
			font-size: 16px;
			font-weight: 700;
			color: #704A2F;
			margin: 0 0 14px 0;
			padding-bottom: 8px;
			border-bottom: 1px dashed #e5dacd;
			display: flex;
			align-items: center;
			gap: 8px;
		}
		.mediora-mb-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
			gap: 20px;
			margin-bottom: 15px;
		}
		.mediora-img-box {
			background: #faf6f0;
			border: 1px solid #ebd9c8;
			border-radius: 6px;
			padding: 14px;
			text-align: center;
		}
		.mediora-img-box label {
			display: block;
			font-weight: 600;
			color: #3A2618;
			margin-bottom: 8px;
			text-align: left;
		}
		.mediora-img-preview {
			width: 100%;
			height: 200px;
			background: #efe7dc;
			border-radius: 4px;
			overflow: hidden;
			display: flex;
			align-items: center;
			justify-content: center;
			margin-bottom: 10px;
			border: 1px dashed #cbb69d;
		}
		.mediora-img-preview img {
			max-width: 100%;
			max-height: 100%;
			object-fit: contain;
			display: block;
		}
		.mediora-btn-upload {
			background: #704A2F !important;
			color: #ffffff !important;
			border-color: #55341c !important;
			font-weight: 600 !important;
			margin-right: 6px !important;
		}
		.mediora-btn-upload:hover {
			background: #875b3b !important;
			color: #ffffff !important;
		}
		.mediora-btn-remove {
			color: #a00 !important;
			border-color: #ccc !important;
		}
		.mediora-btn-remove:hover {
			background: #ffebe8 !important;
			border-color: #a00 !important;
		}
		.mediora-field-text {
			margin-top: 10px;
			text-align: left;
		}
		.mediora-field-text label {
			display: block;
			font-weight: 600;
			margin-bottom: 5px;
			color: #3A2618;
		}
		.mediora-field-text textarea, .mediora-field-text input {
			width: 100%;
			border: 1px solid #d0c2b2;
			border-radius: 4px;
			padding: 8px 10px;
			background: #fff;
		}
		.mediora-hint {
			font-size: 12px;
			color: #776251;
			margin-top: 5px;
			line-height: 1.4;
		}
	</style>

	<div class="mediora-mb-wrap">
		<!-- SECTION 1 -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🌟 PHẦN 1: HÌNH ẢNH NGƯỜI MẪU 2 BÊN & MÔ TẢ GIỚI THIỆU</h3>
			
			<div class="mediora-mb-grid">
				<!-- Mẫu Trái -->
				<div class="mediora-img-box">
					<label>Ảnh Người Mẫu Bên Trái (Model Left):</label>
					<div class="mediora-img-preview" id="preview_model_1">
						<img src="<?php echo esc_url( $m1 ? $m1 : $assets_uri . '/mau-1.png' ); ?>" alt="Mẫu 1">
					</div>
					<input type="hidden" name="mediora_services_model_1" id="input_model_1" value="<?php echo esc_attr( $m1 ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="model_1">📷 Chọn ảnh / Tải lên</button>
					<button type="button" class="button mediora-btn-remove" data-target="model_1" data-default="<?php echo esc_url( $assets_uri . '/mau-1.png' ); ?>" <?php echo empty( $m1 ) ? 'style="display:none;"' : ''; ?>>Khôi phục mặc định</button>
					<p class="mediora-hint">Gợi ý: Ảnh chân dung tỉ lệ 2:3 hoặc 580×850px tách nền PNG.</p>
				</div>

				<!-- Mẫu Phải -->
				<div class="mediora-img-box">
					<label>Ảnh Người Mẫu Bên Phải (Model Right):</label>
					<div class="mediora-img-preview" id="preview_model_2">
						<img src="<?php echo esc_url( $m2 ? $m2 : $assets_uri . '/mau-2.png' ); ?>" alt="Mẫu 2">
					</div>
					<input type="hidden" name="mediora_services_model_2" id="input_model_2" value="<?php echo esc_attr( $m2 ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="model_2">📷 Chọn ảnh / Tải lên</button>
					<button type="button" class="button mediora-btn-remove" data-target="model_2" data-default="<?php echo esc_url( $assets_uri . '/mau-2.png' ); ?>" <?php echo empty( $m2 ) ? 'style="display:none;"' : ''; ?>>Khôi phục mặc định</button>
					<p class="mediora-hint">Gợi ý: Hệ thống sẽ tự động căn đối xứng tuyệt đối với Mẫu Bên Trái.</p>
				</div>
			</div>

			<div class="mediora-field-text">
				<label for="mediora_services_desc">Nội dung đoạn văn mô tả dịch vụ:</label>
				<textarea id="mediora_services_desc" name="mediora_services_desc" rows="4"><?php echo esc_textarea( $desc ); ?></textarea>
			</div>
		</div>

		<!-- SECTION 2 -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">🩺 PHẦN 2: HÌNH ẢNH QUY TRÌNH (6 BƯỚC & BÁC SĨ)</h3>
			
			<div class="mediora-mb-grid" style="grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));">
				<!-- Bác sĩ -->
				<div class="mediora-img-box">
					<label>Ảnh Bác Sĩ Chuyên Khoa:</label>
					<div class="mediora-img-preview" id="preview_doctor">
						<img src="<?php echo esc_url( $bs ? $bs : $assets_uri . '/podium-bs.png' ); ?>" alt="Bác sĩ">
					</div>
					<input type="hidden" name="mediora_services_doctor" id="input_doctor" value="<?php echo esc_attr( $bs ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="doctor">📷 Chọn ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="doctor" data-default="<?php echo esc_url( $assets_uri . '/podium-bs.png' ); ?>" <?php echo empty( $bs ) ? 'style="display:none;"' : ''; ?>>Mặc định</button>
				</div>

				<!-- 6 Bước -->
				<?php for ( $i = 1; $i <= 6; $i++ ) : 
					$val = ${'s' . $i};
					$def = $assets_uri . '/step-0' . $i . '.png';
				?>
				<div class="mediora-img-box">
					<label>Bước <?php echo $i; ?>:</label>
					<div class="mediora-img-preview" id="preview_step_<?php echo $i; ?>">
						<img src="<?php echo esc_url( $val ? $val : $def ); ?>" alt="Bước <?php echo $i; ?>">
					</div>
					<input type="hidden" name="mediora_services_step_<?php echo $i; ?>" id="input_step_<?php echo $i; ?>" value="<?php echo esc_attr( $val ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="step_<?php echo $i; ?>">📷 Thay ảnh</button>
					<button type="button" class="button mediora-btn-remove" data-target="step_<?php echo $i; ?>" data-default="<?php echo esc_url( $def ); ?>" <?php echo empty( $val ) ? 'style="display:none;"' : ''; ?>>Mặc định</button>
				</div>
				<?php endfor; ?>
			</div>
		</div>

		<!-- SECTION 3 -->
		<div class="mediora-mb-section">
			<h3 class="mediora-mb-title">✨ PHẦN 3: HÀNH TRÌNH KHÁCH HÀNG (SLIDER TRƯỚC / SAU)</h3>
			
			<div class="mediora-mb-grid">
				<!-- Khách 1 -->
				<div class="mediora-img-box">
					<label>Ảnh Khách Hàng 1 (Nghệ sĩ Ngân Quỳnh):</label>
					<div class="mediora-img-preview" id="preview_journey_1">
						<img src="<?php echo esc_url( $j1 ? $j1 : $assets_uri . '/ba-ngan-quynh.png' ); ?>" alt="Khách 1">
					</div>
					<input type="hidden" name="mediora_services_journey_1" id="input_journey_1" value="<?php echo esc_attr( $j1 ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="journey_1">📷 Chọn ảnh / Tải lên</button>
					<button type="button" class="button mediora-btn-remove" data-target="journey_1" data-default="<?php echo esc_url( $assets_uri . '/ba-ngan-quynh.png' ); ?>" <?php echo empty( $j1 ) ? 'style="display:none;"' : ''; ?>>Khôi phục mặc định</button>
				</div>

				<!-- Khách 2 -->
				<div class="mediora-img-box">
					<label>Ảnh Khách Hàng 2 (Chị Thảo):</label>
					<div class="mediora-img-preview" id="preview_journey_2">
						<img src="<?php echo esc_url( $j2 ? $j2 : $assets_uri . '/ba-thao.png' ); ?>" alt="Khách 2">
					</div>
					<input type="hidden" name="mediora_services_journey_2" id="input_journey_2" value="<?php echo esc_attr( $j2 ); ?>">
					<button type="button" class="button mediora-btn-upload" data-target="journey_2">📷 Chọn ảnh / Tải lên</button>
					<button type="button" class="button mediora-btn-remove" data-target="journey_2" data-default="<?php echo esc_url( $assets_uri . '/ba-thao.png' ); ?>" <?php echo empty( $j2 ) ? 'style="display:none;"' : ''; ?>>Khôi phục mặc định</button>
				</div>
			</div>

			<div class="mediora-field-text">
				<label for="mediora_services_journey_desc">Nội dung mô tả hành trình:</label>
				<textarea id="mediora_services_journey_desc" name="mediora_services_journey_desc" rows="3"><?php echo esc_textarea( $j_desc ); ?></textarea>
			</div>
		</div>
	</div>

	<script>
	jQuery(document).ready(function($){
		// Click Chọn ảnh
		$('.mediora-btn-upload').on('click', function(e){
			e.preventDefault();
			var target = $(this).data('target');
			var frame = wp.media({
				title: 'Chọn hoặc tải ảnh lên cho trang Dịch Vụ',
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

		// Click Khôi phục mặc định
		$('.mediora-btn-remove').on('click', function(e){
			e.preventDefault();
			var target = $(this).data('target');
			var def = $(this).data('default');
			$('#input_' + target).val('');
			$('#preview_' + target + ' img').attr('src', def);
			$(this).hide();
		});
	});
	</script>
	<?php
}

/**
 * Lưu dữ liệu Meta Box
 */
function mediora_save_services_meta( $post_id ) {
	if ( ! isset( $_POST['mediora_services_meta_nonce'] ) || ! wp_verify_nonce( $_POST['mediora_services_meta_nonce'], 'mediora_save_services_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return;
	}

	$fields = array(
		'_mediora_services_model_1'      => 'mediora_services_model_1',
		'_mediora_services_model_2'      => 'mediora_services_model_2',
		'_mediora_services_desc'         => 'mediora_services_desc',
		'_mediora_services_doctor'       => 'mediora_services_doctor',
		'_mediora_services_step_1'       => 'mediora_services_step_1',
		'_mediora_services_step_2'       => 'mediora_services_step_2',
		'_mediora_services_step_3'       => 'mediora_services_step_3',
		'_mediora_services_step_4'       => 'mediora_services_step_4',
		'_mediora_services_step_5'       => 'mediora_services_step_5',
		'_mediora_services_step_6'       => 'mediora_services_step_6',
		'_mediora_services_journey_1'    => 'mediora_services_journey_1',
		'_mediora_services_journey_2'    => 'mediora_services_journey_2',
		'_mediora_services_journey_desc' => 'mediora_services_journey_desc',
	);

	foreach ( $fields as $meta_key => $post_key ) {
		if ( isset( $_POST[ $post_key ] ) ) {
			if ( strpos( $meta_key, '_desc' ) !== false ) {
				update_post_meta( $post_id, $meta_key, sanitize_textarea_field( wp_unslash( $_POST[ $post_key ] ) ) );
			} else {
				update_post_meta( $post_id, $meta_key, esc_url_raw( wp_unslash( $_POST[ $post_key ] ) ) );
			}
		}
	}
}
add_action( 'save_post', 'mediora_save_services_meta' );
