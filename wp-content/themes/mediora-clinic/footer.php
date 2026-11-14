<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #primary and #page div and all content after.
 *
 * @package Mediora_Clinic
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hotline       = mediora_get_option( 'hotline', '0988.226.951' );
$hotline_tel   = mediora_clean_phone( $hotline );
$footer_city   = mediora_get_option( 'footer_city', 'Hồ Chí Minh:' );
$address       = mediora_get_option( 'address', "257 - 259 Nguyễn Đình Chiểu,\nPhường Bàn Cờ, TP. HCM" );
$license_title = mediora_get_option( 'license_title', 'Giấy cấp phép Viện Trẻ Hóa Sejang TP. Hồ Chí Minh' );
$license_p1    = mediora_get_option(
	'license_p1',
	"Viện Trẻ Hóa Sejang<br>MST: 0319600033/ HCM-GPHĐ do SỞ Y TẾ THÀNH PHỐ HỒ CHÍ MINH cấp."
);
$license_p2    = mediora_get_option(
	'license_p2',
	"Bác sĩ phụ trách chuyên môn Lê Quốc Anh<br>Số GPHN: 044323/BYT- CCHN"
);
$license_p3    = mediora_get_option(
	'license_p3',
	"Bác sĩ phụ trách chuyên môn Hoàng Thanh Tùng<br>Số GPHN: 002879/ĐNAI- GPHN"
);

$social_fb     = mediora_get_option( 'social_facebook', 'https://www.facebook.com/pkcktmmediora' );
$social_zalo   = mediora_get_option( 'social_zalo', 'https://zalo.me/636737550228660397' );
$social_tiktok = mediora_get_option( 'social_tiktok', 'https://www.tiktok.com/@phongkhammediora' );
$social_mess   = mediora_get_option( 'social_messenger', 'https://m.me/pkcktmmediora' );
?>

	</main><!-- #primary -->

	<!-- Site Footer -->
	<footer id="colophon" class="site-footer">
		<div class="container-fluid footer-wrap">
			<!-- Footer Logo -->
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo" rel="home">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/imgs/logo-footer.svg' ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="461" height="104" loading="lazy">
			</a>

			<div class="row footer-row">
				<!-- Column 1: Address & Hotline -->
				<div class="col-12 col-md-6 col-xl footer-col footer-col--addr">
					<h3 class="footer-city f-tit text-linear m-0">
						<span class="footer-gps">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/imgs/gps.png' ); ?>" alt="GPS" width="28" height="40" loading="lazy">
						</span>
						<span><?php echo esc_html( $footer_city ); ?></span>
					</h3>
					<p class="footer-text footer-address">
						<?php echo nl2br( esc_html( $address ) ); ?>
					</p>
					<a href="<?php echo esc_url( 'tel:' . $hotline_tel ); ?>" class="footer-phone" aria-label="<?php echo esc_attr( sprintf( __( 'Gọi hotline %s', 'mediora-clinic' ), $hotline ) ); ?>">
						<span class="footer-phone__btn">
							<svg class="footer-phone__icon" viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
								<path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
							</svg>
							<span class="footer-phone__number"><?php echo esc_html( $hotline ); ?></span>
						</span>
					</a>
				</div>

				<!-- Column 2: Medical Licensing & Accreditation -->
				<div class="col-12 col-md-6 col-xl-auto footer-col footer-col--license">
					<h3 class="footer-title f-tit text-linear m-0">
						<?php echo esc_html( $license_title ); ?>
					</h3>
					<div class="footer-text">
						<p><?php echo wp_kses_post( $license_p1 ); ?></p>
						<p><?php echo wp_kses_post( $license_p2 ); ?></p>
						<p><?php echo wp_kses_post( $license_p3 ); ?></p>
					</div>
				</div>

				<!-- Column 3: Social Channels & Contact -->
				<div class="col-12 col-xl-auto footer-col footer-col--social">
					<ul class="footer-social list-unstyled m-0">
						<?php if ( ! empty( $social_zalo ) ) : ?>
							<li>
								<a class="footer-social__item" href="<?php echo esc_url( $social_zalo ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Zalo Sejang', 'mediora-clinic' ); ?>">
									<img class="footer-social__icon" src="<?php echo esc_url( get_template_directory_uri() . '/assets/imgs/ic-zalo-footer.png' ); ?>" alt="Zalo" width="72" height="72" loading="lazy">
									<span class="footer-social__text text-linear"><?php esc_html_e( 'Viện Trẻ Hóa Sejang', 'mediora-clinic' ); ?></span>
								</a>
							</li>
						<?php endif; ?>

						<?php if ( ! empty( $social_fb ) ) : ?>
							<li>
								<a class="footer-social__item" href="<?php echo esc_url( $social_fb ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Facebook Sejang', 'mediora-clinic' ); ?>">
									<img class="footer-social__icon" src="<?php echo esc_url( get_template_directory_uri() . '/assets/imgs/ic-fb.png' ); ?>" alt="Facebook" width="72" height="73" loading="lazy">
									<span class="footer-social__text text-linear"><?php esc_html_e( 'Viện Trẻ Hóa Chuyên Khoa Sejang', 'mediora-clinic' ); ?></span>
								</a>
							</li>
						<?php endif; ?>

						<?php if ( ! empty( $social_tiktok ) ) : ?>
							<li>
								<a class="footer-social__item" href="<?php echo esc_url( $social_tiktok ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'TikTok Sejang', 'mediora-clinic' ); ?>">
									<img class="footer-social__icon" src="<?php echo esc_url( get_template_directory_uri() . '/assets/imgs/ic-tiktok.png' ); ?>" alt="TikTok" width="72" height="72" loading="lazy">
									<span class="footer-social__text text-linear"><?php esc_html_e( 'Bác Sĩ Hoàng Tùng - Trẻ Hóa Sejang', 'mediora-clinic' ); ?></span>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

	<!-- Floating Quick Contact Widget -->
	<aside class="float-contact" aria-label="<?php esc_attr_e( 'Liên hệ nhanh', 'mediora-clinic' ); ?>">
		<?php if ( ! empty( $social_zalo ) ) : ?>
			<a href="<?php echo esc_url( $social_zalo ); ?>" target="_blank" rel="noopener noreferrer" class="fc-item" aria-label="<?php esc_attr_e( 'Chat Zalo', 'mediora-clinic' ); ?>">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/imgs/ic-zalo.png' ); ?>" alt="Zalo" width="39" height="39">
			</a>
		<?php endif; ?>

		<a href="#popupConsult" id="btnFloatCalendar" class="fc-item" data-bs-toggle="modal" data-bs-target="#popupConsult" aria-label="<?php esc_attr_e( 'Đặt lịch tư vấn', 'mediora-clinic' ); ?>" role="button">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/imgs/ic-calendar.png' ); ?>" alt="<?php esc_attr_e( 'Lịch', 'mediora-clinic' ); ?>" width="39" height="39">
		</a>

		<span class="fc-divider" aria-hidden="true"></span>

		<a href="<?php echo esc_url( 'tel:' . $hotline_tel ); ?>" class="fc-item" aria-label="<?php esc_attr_e( 'Gọi hotline', 'mediora-clinic' ); ?>">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/imgs/ic-phone.png' ); ?>" alt="<?php esc_attr_e( 'Hotline', 'mediora-clinic' ); ?>" width="39" height="39">
		</a>
	</aside>

	<!-- Global Consultation Booking Modal (Popup Centered) -->
	<div class="modal fade" id="popupConsult" tabindex="-1" aria-labelledby="popupConsultLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content position-relative p-0 border-0 bg-transparent">
				<button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="<?php esc_attr_e( 'Đóng', 'mediora-clinic' ); ?>" style="top: 8px; right: 8px; z-index: 1060; background-color: rgba(0,0,0,0.65); padding: 8px;"></button>
				
				<?php
				get_template_part(
					'template-parts/booking-form',
					null,
					array(
						'source'   => 'modal-popup',
						'is_modal' => true,
					)
				);
				?>
			</div>
		</div>
	</div>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
