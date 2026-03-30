<?php
/**
 * Site Top Bar
 */

// Vars
$company_email_opt = get_field( 'company_email_opt', 'option' );
$company_tel_opt = get_field( 'company_tel_opt', 'option' );
$cta_topbar_txt_opt = get_field( 'cta_topbar_txt_opt', 'option' );
$cta_topbar_link_opt = get_field( 'cta_topbar_link_opt', 'option' );

?>
<div class="top-bar">
	<div class="container">
		<div class="top-bar__row">

			<div class="top-bar__col top-bar__col--contact">
				
				<span class="top-bar__item">
					<i class="fa-solid fa-phone"></i>
					<a href="tel:<?php echo $company_tel_opt; ?>">
						<?php echo $company_tel_opt; ?>
					</a>
				</span>

				<span class="top-bar__item">
					<i class="fa-solid fa-envelope"></i>
					<a href="mailto:<?php echo $company_email_opt; ?>">
						<?php echo $company_email_opt; ?>
					</a>
				</span>

			</div>


			<div class="top-bar__col top-bar__col--cta">
				<a href="<?php echo $cta_topbar_link_opt; ?>" class="top-bar__cta-btn">
					<?php echo $cta_topbar_txt_opt; ?>
				</a>
			</div>

		</div>	
	</div>
</div>