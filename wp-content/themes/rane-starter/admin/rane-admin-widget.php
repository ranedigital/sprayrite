<?php
/**
 * RANE Admin Dashboard Widget
 */

// Register the RANE dashboard widget and move it to the top
function rane_register_dashboard_widget() {
    wp_add_dashboard_widget(
        'rane_theme_widget', // Widget ID
        'RANE Theme Information', // Widget Title
        'rane_dashboard_widget_content' // Callback function for content
    );

    // Move the widget to the top
    global $wp_meta_boxes;
    $dashboard = &$wp_meta_boxes['dashboard']['normal']['core'];
    
    if (isset($dashboard['rane_theme_widget'])) {
        $rane_widget = $dashboard['rane_theme_widget'];
        unset($dashboard['rane_theme_widget']);
        $dashboard = array_merge(['rane_theme_widget' => $rane_widget], $dashboard);
    }
}
add_action('wp_dashboard_setup', 'rane_register_dashboard_widget');

// Widget Content
function rane_dashboard_widget_content() {
    $developer_name = '(Name of Developer)'; // Change this dynamically if needed

    ?>
    <div id="rane_theme_widget">
        <div class="postbox-header">
            <h2 class="hndle ui-sortable-handle">Welcome to RANE Digital 🚀</h2>
        </div>
        <div class="inside">
            <p><strong>🥷 Your Coding Expert:</strong> 
                <?php 
                if ($developer_name === '(Name of Developer)') {
                    echo '<span style="color: red; font-weight: bold;">[Dev: Please add your name in /admin/rane-admin-widget.php]</span>';
                } else {
                    echo esc_html($developer_name);
                }
                ?>
            </p>
            <p>If you need help or have any issues, reach out to us:</p>
            <ul class="rane-contact-list">
                <li>
                    <strong>🧰 General Support: </strong>
                    <a style="margin-left:5px" href="mailto:hello@makeitrane.com"> hello@makeitrane.com</a>
                </li>
                <li>
                    <strong>➕ Additional Services: </strong>
                    <a style="margin-left:5px" href="mailto:sales@makeitrane.com"> sales@makeitrane.com</a>
                </li>
                <li>
                    <strong>🛟 Emergencies: </strong>
                    <a style="margin-left:5px" href="mailto:support@makeitrane.com"> support@makeitrane.com</a>
                </li>
            </ul>
            <div class="rane-services-box">
                <p>
                    <strong>Looking for more ways to grow your business?</strong><br>
                    Explore our expert <strong>SEO</strong>, <strong>PPC</strong>, and <strong>Social Media Marketing</strong> services to take your online presence to the next level.
                </p>
            </div>
            <p class="rane-footer">
                Thank you for choosing <strong>RANE Digital</strong>.<br>
                Let's grow your online presence!
            </p>
        </div>
    </div>
    <?php
}

// Enqueue styles for the widget
function rane_enqueue_dashboard_widget_styles() {
    wp_enqueue_style('rane-dashboard-widget-styles', get_template_directory_uri() . '/admin/rane-dashboard-widget.css');
}
add_action('admin_enqueue_scripts', 'rane_enqueue_dashboard_widget_styles');
