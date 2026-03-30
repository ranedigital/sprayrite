
<?php
/**
 * Main footer section
 */

// Vars
$ftr_opts_logo = (get_field('company_logo_ftr_opt','options')) ? get_field('company_logo_ftr_opt','options') : get_field('company_logo_opt','options');
$ftr_opts_logo_url = $ftr_opts_logo[ 'url' ];

$site_name = get_field( 'company_name_opt', 'options' );
$ftr_opts_desc = get_field( 'company_blurb_opt', 'options' );

$ftr_opts_address = get_field( 'company_addr_opt', 'options' );
$ftr_opts_tel = get_field( 'company_tel_opt', 'options' );
$ftr_opts_email = get_field( 'company_email_opt', 'options' );

$ftr_opts_facebook = get_field( 'facebook_link_opt', 'options' );
$ftr_opts_twit = get_field( 'twitter_link_opt', 'options' );
$ftr_opts_insta = get_field( 'instagram_link_opt', 'options' );
$ftr_opts_linkedin = get_field( 'linkedin_link_opt', 'options' );

// Footer Nav
$nav_args = array(
	"menu" => "Main Navigation", // The menu to show
	"container" => false, // remove wrapping container
	"menu_class" => "footer-browse-nav" // set class of UL
);

?>
<footer id="colophon" class="site-footer">
	<div class="site-footer-main">
		<div class="container">
			<div class="site-footer-main__row">

				<!-- Column 1: Logo & Description -->
				<div class="site-footer-main__col site-footer-main__col--blurb">

					<img src="<?php echo $ftr_opts_logo_url; ?>" alt="<?php echo $site_name; ?>" class="site-footer__logo">

					<p class="site-footer__blurb">
						<?php echo $ftr_opts_desc; ?>
					</p>		

				</div><!-- .site-footer-main__col -->


				<!-- Column 2: Main Navigation -->
				<div class="site-footer-main__col site-footer-main__col--links">

					<h2 class="site-footer__title">
						Quick Links
					</h2>

					<div class="footer-nav-wrap footer-nav-wrap--browse">
						<?php wp_nav_menu($nav_args); ?>
					</div>

				</div><!-- .site-footer-main__col -->


				<!-- Column 3: Contact Details -->
				<div class="site-footer-main__col site-footer-main__col--contact">

					<h2 class="site-footer__title">
						Location
					</h2>

					<div class="site-footer__addr">
						<?php echo $ftr_opts_address; ?>
					</div>					

				</div><!-- .site-footer-main__col -->


				<!-- Column 4: Legal Menu Links -->
				<div class="site-footer-main__col site-footer-main__col--legal">

					<h2 class="site-footer__title">
						Contact Details
					</h2>

					<div class="site-footer__link-wrap site-footer__link-wrap--tel">
						<a href="tel:<?php echo $ftr_opts_tel; ?>" class="site-footer__link site-footer__link--tel">
							<?php echo $ftr_opts_tel; ?>
						</a>
					</div>

					<div class="site-footer__link-wrap site-footer__link-wrap--email">
						<a href="mailto:<?php echo $ftr_opts_email; ?>" class="site-footer__link site-footer__link--email">
							<?php echo $ftr_opts_email; ?>
						</a>
					</div>					
					

					<ul class="social-icons">

						<?php if( $ftr_opts_facebook ): ?>
						<li class="social-icons__item">
							<a href="<?php echo $ftr_opts_facebook; ?>" class="social-icons__link" target="_blank">
								<i class="fa-brands fa-facebook"></i>
								<span class="screen-reader-text">
									Follow on Facebook
								</span>
							</a>
						</li>
						<?php endif; ?>

						<?php if( $ftr_opts_twit ): ?>
						<li class="social-icons__item">
							<a href="<?php echo $ftr_opts_twit; ?>" class="social-icons__link" target="_blank">
								<i class="fa-brands fa-twitter"></i>
								<span class="screen-reader-text">
									Follow on Instagram
								</span>
							</a>
						</li>
						<?php endif; ?>


						<?php if( $ftr_opts_insta ): ?>
						<li class="social-icons__item">
							<a href="<?php echo $ftr_opts_insta; ?>" class="social-icons__link" target="_blank">
								<i class="fa-brands fa-instagram"></i>
								<span class="screen-reader-text">
									Follow on Instagram
								</span>
							</a>
						</li>
						<?php endif; ?>


						<?php if( $ftr_opts_linkedin ): ?>
						<li class="social-icons__item">
							<a href="<?php echo $ftr_opts_linkedin; ?>" class="social-icons__link" target="_blank">
								<i class="fa-brands fa-linkedin"></i>
								<span class="screen-reader-text">
									Follow on Instagram
								</span>
							</a>
						</li>
						<?php endif; ?>




					</ul>

				</div><!-- .site-footer-main__col -->
				
			</div>		
		</div>
	</div>

	<div class="site-info">
		<div class="container">
			<p class="site-info__text">
				<span class="site-info__copyright">Copyright &copy; <?php echo date('Y'); ?> <?php echo $site_name; ?></span>	
				<span class="site-info__designby">Website by <a href="https://makeitrane.com" target="_blank" rel="nofollow">RANE Digital</a></span>			
			</p>
		</div>
	</div>
</footer>