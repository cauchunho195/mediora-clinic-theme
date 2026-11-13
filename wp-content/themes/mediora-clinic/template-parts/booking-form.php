<?php
/**
 * Template part for displaying the Consultation Booking Form
 *
 * 4-Field Tech Glow Consultation Form matching Sejang Clinic UI:
 * - Họ tên
 * - Số điện thoại
 * - Tình trạng của bạn
 * - Thời gian liên hệ phù hợp
 * - Nút: NHẬN TƯ VẤN
 * - Floating side action dock (Zalo, Calendar, Phone, Messenger)
 *
 * @package Mediora_Clinic
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 1. Check Customizer Shortcode
$custom_shortcode = function_exists( 'mediora_get_option' ) ? mediora_get_option( 'booking_shortcode', '' ) : '';
if ( ! empty( $custom_shortcode ) ) {
	echo '<div class="mediora-booking-form-custom wp-form-luxury-wrap">';
	echo do_shortcode( wp_kses_post( $custom_shortcode ) );
	echo '</div>';
	return;
}

// 2. Form configuration parameters
$theme_uri     = get_template_directory_uri();
$form_source   = ! empty( $args['source'] ) ? esc_attr( $args['source'] ) : 'landing-register';
$hotline       = function_exists( 'mediora_get_option' ) ? mediora_get_option( 'hotline', '0988.226.951' ) : '0988.226.951';
$hotline_clean = function_exists( 'mediora_clean_phone' ) ? mediora_clean_phone( $hotline ) : '0988226951';
$zalo_url      = function_exists( 'mediora_get_option' ) ? mediora_get_option( 'social_zalo', 'https://zalo.me/0988226951' ) : 'https://zalo.me/0988226951';
$mess_url      = function_exists( 'mediora_get_option' ) ? mediora_get_option( 'social_messenger', 'https://m.me/vientrehoasejang' ) : 'https://m.me/vientrehoasejang';
$unique_id     = 'form-' . esc_attr( $form_source ) . '-' . wp_rand( 100, 999 );
?>

<div class="tech-form-wrapper">
	<!-- Tech Glow Frame Container -->
	<div class="tech-glow-box">
		<!-- Tech Corner Accents -->
		<span class="tech-corner tech-corner--tl" aria-hidden="true"></span>
		<span class="tech-corner tech-corner--tr" aria-hidden="true"></span>
		<span class="tech-corner tech-corner--bl" aria-hidden="true"></span>
		<span class="tech-corner tech-corner--br" aria-hidden="true"></span>

		<!-- Tech Scale / Meter on left edge -->
		<div class="tech-meter-left" aria-hidden="true">
			<span></span><span></span><span></span><span></span><span></span>
			<span></span><span></span><span></span><span></span><span></span>
			<span></span><span></span><span></span><span></span><span></span>
		</div>

		<!-- Title -->
		<div class="tech-form-header text-center">
			<h3 class="tech-form-title m-0">
				<span>ĐĂNG KÝ</span>
				<span class="tech-form-subtitle">NHẬN ƯU ĐÃI</span>
			</h3>
		</div>

		<!-- Form with 4 requested fields -->
		<form class="mediora-booking-form js-mediora-booking-form tech-consult-form needs-validation"
			id="<?php echo esc_attr( $unique_id ); ?>"
			method="post"
			action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>"
			novalidate>

			<div class="tech-form-body">
				<!-- Field 1: Họ tên -->
				<div class="tech-field-group">
					<label class="visually-hidden" for="<?php echo esc_attr( $unique_id ); ?>-name">
						<?php esc_html_e( 'Họ tên', 'mediora-clinic' ); ?>
					</label>
					<input type="text"
						class="tech-input form-control"
						id="<?php echo esc_attr( $unique_id ); ?>-name"
						name="fullname"
						placeholder="<?php esc_attr_e( 'Họ tên', 'mediora-clinic' ); ?>"
						required
						autocomplete="name"
						maxlength="80">
					<div class="invalid-feedback">
						<?php esc_html_e( 'Vui lòng nhập họ tên.', 'mediora-clinic' ); ?>
					</div>
				</div>

				<!-- Field 2: Số điện thoại -->
				<div class="tech-field-group">
					<label class="visually-hidden" for="<?php echo esc_attr( $unique_id ); ?>-phone">
						<?php esc_html_e( 'Số điện thoại', 'mediora-clinic' ); ?>
					</label>
					<input type="tel"
						class="tech-input form-control"
						id="<?php echo esc_attr( $unique_id ); ?>-phone"
						name="phone"
						placeholder="<?php esc_attr_e( 'Số điện thoại', 'mediora-clinic' ); ?>"
						required
						pattern="^(0|\+84)[0-9]{9,11}$"
						inputmode="tel"
						autocomplete="tel"
						maxlength="15">
					<div class="invalid-feedback">
						<?php esc_html_e( 'Số điện thoại chưa đúng (VD: 0988 226 951).', 'mediora-clinic' ); ?>
					</div>
				</div>

				<!-- Field 3: Tình trạng của bạn -->
				<div class="tech-field-group">
					<label class="visually-hidden" for="<?php echo esc_attr( $unique_id ); ?>-condition">
						<?php esc_html_e( 'Tình trạng của bạn', 'mediora-clinic' ); ?>
					</label>
					<input type="text"
						class="tech-input form-control"
						id="<?php echo esc_attr( $unique_id ); ?>-condition"
						name="condition"
						placeholder="<?php esc_attr_e( 'Tình trạng của bạn', 'mediora-clinic' ); ?>"
						maxlength="200">
				</div>

				<!-- Field 4: Thời gian liên hệ phù hợp -->
				<div class="tech-field-group">
					<label class="visually-hidden" for="<?php echo esc_attr( $unique_id ); ?>-time">
						<?php esc_html_e( 'Thời gian liên hệ phù hợp', 'mediora-clinic' ); ?>
					</label>
					<input type="text"
						class="tech-input form-control"
						id="<?php echo esc_attr( $unique_id ); ?>-time"
						name="preferred_time"
						placeholder="<?php esc_attr_e( 'Thời gian liên hệ phù hợp', 'mediora-clinic' ); ?>"
						maxlength="100">
				</div>
			</div>

			<!-- Anti-spam Honeypot fields -->
			<div class="cf-hp" aria-hidden="true" style="position:absolute; left:-9999px; width:1px; height:1px; overflow:hidden;">
				<label for="<?php echo esc_attr( $unique_id ); ?>-hp-web"><?php esc_html_e( 'Website', 'mediora-clinic' ); ?></label>
				<input type="text" id="<?php echo esc_attr( $unique_id ); ?>-hp-web" name="website" tabindex="-1" autocomplete="off">
				<input type="text" name="extra_field" tabindex="-1" autocomplete="off">
			</div>

			<!-- Hidden Security & Nonce Fields -->
			<?php wp_nonce_field( 'mediora_booking_nonce', 'mediora_booking_security' ); ?>
			<input type="hidden" name="action" value="mediora_submit_booking">
			<input type="hidden" name="nonce" value="<?php echo esc_attr( wp_create_nonce( 'mediora_booking_nonce' ) ); ?>">
			<input type="hidden" name="source" value="<?php echo esc_attr( $form_source ); ?>">

			<!-- Submit Button: NHẬN TƯ VẤN -->
			<div class="tech-btn-wrap text-center mt-3">
				<button type="submit" class="btn btn-tech-submit">
					<span class="btn-text"><?php esc_html_e( 'NHẬN TƯ VẤN', 'mediora-clinic' ); ?></span>
					<span class="spinner-border spinner-border-sm ms-2" role="status" aria-hidden="true" style="display:none;"></span>
				</button>
			</div>

			<!-- Feedback status message box -->
			<div class="form-msg mt-3" role="status" aria-live="polite"></div>
		</form>
	</div>

	<!-- Floating Side Action Dock (Zalo, Calendar, Phone, Messenger) -->
	<aside class="tech-side-dock" aria-label="<?php esc_attr_e( 'Kênh hỗ trợ nhanh', 'mediora-clinic' ); ?>">
		<a href="<?php echo esc_url( $zalo_url ); ?>" class="dock-btn dock-btn--zalo" target="_blank" rel="noopener noreferrer" title="Chat Zalo">
			<span class="dock-text">Zalo</span>
		</a>
		<a href="#lien-he" class="dock-btn dock-btn--calendar" title="Đặt lịch khám">
			<svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
				<path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2zm-7 5h5v5h-5z"/>
			</svg>
		</a>
		<a href="tel:<?php echo esc_attr( $hotline_clean ); ?>" class="dock-btn dock-btn--phone" title="Gọi Hotline <?php echo esc_attr( $hotline ); ?>">
			<svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
				<path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
			</svg>
		</a>
		<a href="<?php echo esc_url( $mess_url ); ?>" class="dock-btn dock-btn--mess" target="_blank" rel="noopener noreferrer" title="Chat Facebook Messenger">
			<svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
				<path d="M12 2C6.48 2 2 6.03 2 11c0 2.85 1.47 5.4 3.77 7.02V22l3.82-2.1c.78.22 1.59.34 2.41.34 5.52 0 10-4.03 10-9s-4.48-9-10-9zm1.06 12.14l-2.58-2.75-5.04 2.75 5.54-5.88 2.65 2.75 4.97-2.75-5.54 5.88z"/>
			</svg>
		</a>
	</aside>
</div>
