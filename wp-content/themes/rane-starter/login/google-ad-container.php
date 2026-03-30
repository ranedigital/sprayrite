  <div id="google-ad-container">
        <!-- Static Header -->
        <div class="ad-header">
            <span class="ad-sponsored">Explore Our Services</span>
        </div>
        <div class="ad-header">
            <img src="<?php echo get_template_directory_uri(); ?>/login/site-logo.gif" alt="RANE logo" class="ad-logo">
			<span class="ad-web-address">makeitrane.com</br>
            <a href="https://makeitrane.com">https://makeitrane.com</a>
        </span>
        </div>
        
        <?php
        // Fetch rotating content from an external URL
        $response = wp_remote_get('https://makeitrane.com/wp-login-screen/explore-our-services.html');

        if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
            echo wp_kses_post(wp_remote_retrieve_body($response));
        } else {
            echo '<div class="ad-item"><p></p></div>';
        }
        ?>
    </div>