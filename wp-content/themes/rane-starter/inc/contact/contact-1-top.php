<?php
/**
 * Main contact page - top section
 */

// Company Details
$company_name_opt 	= get_field( 'company_name_opt', 'options' );
$company_addr_opt 	= get_field( 'company_addr_opt', 'options' );
$company_email_opt 	= get_field( 'company_email_opt', 'options' );
$company_tel_opt 	= get_field( 'company_tel_opt', 'options' );

// Socials
$facebook_link_opt 	= get_field( 'facebook_link_opt', 'options' );
$twitter_link_opt 	= get_field( 'twitter_link_opt', 'options' );
$instagram_link_opt = get_field( 'instagram_link_opt', 'options' );
$linkedin_link_opt 	= get_field( 'linkedin_link_opt', 'options' );

?>
<section class="section section-contact">
	<div class="container">

		<div class="section-contact__row">

			<div class="section-contact__col section-contact__col--form">

				<h2 class="site-title">
					Contact Form
				</h2>

				<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 1 ) ); ?>

			</div><!-- .section-contact__col--form -->


			<div class="section-contact__col section-contact__col--text">

				<h2 class="site-title">
					Contact Information
				</h2>

				<p>For any enquiries, please feel free to send an email or call us to discuss.</p>


				<div class="contact-card-wrap">


					<!-- Address -->
					<div class="contact-card contact-card--address">
						<div class="contact-card__icon-wrap">
							<span class="fa-stack fa-lg">
								<i class="fas fa-circle fa-stack-2x contact-card__icon-circle"></i>
								<i class="fas fa-location-dot fa-stack-1x fa-inverse contact-card__icon"></i>
							</span>
						</div>
						<div class="contact-card__text-wrap">
							<div class="contact-card__co-name"><?php echo $company_name_opt; ?></div>
							<div class="contact-card__addr"><?php echo $company_addr_opt; ?></div>
						</div>
					</div>

					<!-- Email -->
					<?php if( $company_email_opt ): ?>
					<div class="contact-card contact-card--email">
						<div class="contact-card__icon-wrap">
							<span class="fa-stack fa-lg">
								<i class="fas fa-circle fa-stack-2x contact-card__icon-circle"></i>
								<i class="fas fa-envelope fa-stack-1x fa-inverse contact-card__icon"></i>
							</span>
						</div>
						<div class="contact-card__text-wrap">
							<div class="contact-card__co-name">
								<a href="mailto:<?php echo $company_email_opt; ?>" class="contact-card__link"><?php echo $company_email_opt; ?></a>
							</div>
						</div>
					</div>
					<?php endif; ?>


					<!-- Tel -->
					<?php if( $company_tel_opt ): ?>
					<div class="contact-card contact-card--phone">
						<div class="contact-card__icon-wrap">
							<span class="fa-stack fa-lg">
								<i class="fas fa-circle fa-stack-2x contact-card__icon-circle"></i>
								<i class="fas fa-phone fa-stack-1x fa-inverse contact-card__icon"></i>
							</span>
						</div>
						<div class="contact-card__text-wrap">
							<div class="contact-card__co-name">
								<a href="tel:<?php echo $company_tel_opt; ?>" class="contact-card__link"><?php echo $company_tel_opt; ?></a>
							</div>
						</div>
					</div>
					<?php endif; ?>


					<?php // ================== Social Icons ================== ?>
					
					<ul class="social-icons">

						<?php if( $facebook_link_opt ): ?>
						<!-- Facebook -->
						<li class="social-icons__item">
							<a href="<?php echo $facebook_link_opt; ?>" class="social-icons__link social-icons__link--dark social-icons__link--lg" target="_blank">
								<i class="fa-brands fa-facebook"></i>
								<span class="screen-reader-text">
									Follow on Facebook
								</span>
							</a>
						</li>
						<?php endif; ?>

						<?php if( $twitter_link_opt ): ?>
						<!-- Twitter -->				
						<li class="social-icons__item">
							<a href="<?php echo $twitter_link_opt; ?>" class="social-icons__link social-icons__link--dark social-icons__link--lg" target="_blank">
								<i class="fa-brands fa-twitter"></i>
								<span class="screen-reader-text">
									Follow on Twitter
								</span>
							</a>
						</li>
						<?php endif; ?>

						<?php if( $instagram_link_opt ): ?>
						<!-- Instagram -->				
						<li class="social-icons__item">
							<a href="<?php echo $instagram_link_opt; ?>" class="social-icons__link social-icons__link--dark social-icons__link--lg" target="_blank">
								<i class="fa-brands fa-instagram"></i>
								<span class="screen-reader-text">
									Follow on Instagram
								</span>
							</a>
						</li>
						<?php endif; ?>


						<?php if( $linkedin_link_opt ): ?>
						<!-- LinkedIn -->				
						<li class="social-icons__item">
							<a href="<?php echo $linkedin_link_opt; ?>" class="social-icons__link social-icons__link--dark social-icons__link--lg" target="_blank">
								<i class="fa-brands fa-linkedin"></i>
								<span class="screen-reader-text">
									Follow on Linked In
								</span>
							</a>
						</li>
						<?php endif; ?>

					</ul>

				</div><!-- .contact-card-wrap -->
			</div><!-- .section-contact__col--text -->
	
		</div>
	</div><!-- .container -->
</section>