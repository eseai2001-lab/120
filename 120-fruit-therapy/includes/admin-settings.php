<?php
/**
 * Admin Settings for 120 Fruit Therapy Plugin
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add admin menu
 */
function ftp_add_admin_menu() {
    add_menu_page(
        '120 Fruit Therapy Settings',
        '120 Fruit Therapy',
        'manage_options',
        'ftp-settings',
        'ftp_settings_page',
        'dashicons-carrot',
        30
    );
}
add_action('admin_menu', 'ftp_add_admin_menu');

/**
 * Register settings
 */
function ftp_register_settings() {
    register_setting('ftp_settings_group', 'ftp_settings', 'ftp_sanitize_settings');
}
add_action('admin_init', 'ftp_register_settings');

/**
 * Sanitize settings
 */
function ftp_sanitize_settings($input) {
    $sanitized = array();
    
    if (isset($input['logo_url'])) {
        $sanitized['logo_url'] = esc_url_raw($input['logo_url']);
    }
    
    if (isset($input['hero_video_url'])) {
        $sanitized['hero_video_url'] = esc_url_raw($input['hero_video_url']);
    }
    
    if (isset($input['menu_page_url'])) {
        $sanitized['menu_page_url'] = esc_url_raw($input['menu_page_url']);
    }
    
    if (isset($input['special_plans_page_url'])) {
        $sanitized['special_plans_page_url'] = esc_url_raw($input['special_plans_page_url']);
    }
    
    if (isset($input['category_images']) && is_array($input['category_images'])) {
        $sanitized['category_images'] = array_map('esc_url_raw', $input['category_images']);
    }
    
    if (isset($input['plan_images']) && is_array($input['plan_images'])) {
        $sanitized['plan_images'] = array_map('esc_url_raw', $input['plan_images']);
    }
    
    return $sanitized;
}

/**
 * Enqueue admin scripts and styles
 */
function ftp_admin_scripts($hook) {
    if ($hook !== 'toplevel_page_ftp-settings') {
        return;
    }
    
    wp_enqueue_media();
    wp_enqueue_style('ftp-admin-style', FTP_ASSETS_URL . 'css/admin-settings.css', array(), FTP_VERSION);
    wp_enqueue_script('ftp-admin-script', FTP_ASSETS_URL . 'js/admin-settings.js', array('jquery'), FTP_VERSION, true);
}
add_action('admin_enqueue_scripts', 'ftp_admin_scripts');

/**
 * Settings page HTML
 */
function ftp_settings_page() {
    $settings = get_option('ftp_settings', array());
    $menu_items = ftp_get_menu_items();
    ?>
    <div class="wrap ftp-admin-wrap">
        <h1><span class="dashicons dashicons-carrot"></span> 120 Fruit Therapy Settings</h1>
        
        <form method="post" action="options.php">
            <?php settings_fields('ftp_settings_group'); ?>
            
            <div class="ftp-settings-section">
                <h2>General Settings</h2>
                
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="ftp_logo_url">Logo Image</label>
                        </th>
                        <td>
                            <div class="ftp-media-field">
                                <input type="text" 
                                       id="ftp_logo_url" 
                                       name="ftp_settings[logo_url]" 
                                       value="<?php echo esc_attr($settings['logo_url'] ?? ''); ?>" 
                                       class="regular-text ftp-media-url">
                                <button type="button" class="button ftp-media-upload" data-target="ftp_logo_url">
                                    Upload Image
                                </button>
                                <?php if (!empty($settings['logo_url'])) : ?>
                                <div class="ftp-image-preview">
                                    <img src="<?php echo esc_url($settings['logo_url']); ?>" alt="Logo Preview">
                                </div>
                                <?php endif; ?>
                            </div>
                            <p class="description">Upload or enter the URL of your logo image. Leave empty to use default.</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="ftp_hero_video_url">Hero Video</label>
                        </th>
                        <td>
                            <div class="ftp-media-field">
                                <input type="text" 
                                       id="ftp_hero_video_url" 
                                       name="ftp_settings[hero_video_url]" 
                                       value="<?php echo esc_attr($settings['hero_video_url'] ?? ''); ?>" 
                                       class="regular-text ftp-media-url">
                                <button type="button" class="button ftp-media-upload-video" data-target="ftp_hero_video_url">
                                    Upload Video
                                </button>
                            </div>
                            <p class="description">Upload or enter the URL of the hero section background video. Leave empty to use default.</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="ftp_menu_page_url">Full Menu Page URL</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="ftp_menu_page_url" 
                                   name="ftp_settings[menu_page_url]" 
                                   value="<?php echo esc_attr($settings['menu_page_url'] ?? ''); ?>" 
                                   class="regular-text">
                            <p class="description">Enter the URL of the page containing the [ftp_menu_full] shortcode. Used by the floating support button and menu links.</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="ftp_special_plans_page_url">Special Plans Page URL</label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="ftp_special_plans_page_url" 
                                   name="ftp_settings[special_plans_page_url]" 
                                   value="<?php echo esc_attr($settings['special_plans_page_url'] ?? ''); ?>" 
                                   class="regular-text">
                            <p class="description">Enter the URL of the page containing the [ftp_special_plans_full] shortcode.</p>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="ftp-settings-section">
                <h2>Menu Category Images</h2>
                <p class="description">Upload images for each menu category. These will appear as card backgrounds on the landing page.</p>
                
                <table class="form-table">
                    <?php foreach ($menu_items as $key => $category) : ?>
                    <tr>
                        <th scope="row">
                            <label for="ftp_cat_<?php echo esc_attr($key); ?>">
                                <?php echo esc_html($category['icon'] . ' ' . $category['title']); ?>
                            </label>
                        </th>
                        <td>
                            <div class="ftp-media-field">
                                <input type="text" 
                                       id="ftp_cat_<?php echo esc_attr($key); ?>" 
                                       name="ftp_settings[category_images][<?php echo esc_attr($key); ?>]" 
                                       value="<?php echo esc_attr(isset($settings['category_images'][$key]) ? $settings['category_images'][$key] : ''); ?>" 
                                       class="regular-text ftp-media-url">
                                <button type="button" class="button ftp-media-upload" data-target="ftp_cat_<?php echo esc_attr($key); ?>">
                                    Upload
                                </button>
                                <?php if (isset($settings['category_images'][$key]) && !empty($settings['category_images'][$key])) : ?>
                                <div class="ftp-image-preview">
                                    <img src="<?php echo esc_url($settings['category_images'][$key]); ?>" alt="<?php echo esc_attr($category['title']); ?>">
                                </div>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            
            <div class="ftp-settings-section">
                <h2>Special Plans Images</h2>
                <p class="description">Upload images for each wellness plan. These will appear as card backgrounds on the landing page.</p>
                
                <table class="form-table">
                    <?php 
                    $plans = ftp_get_special_plans();
                    foreach ($plans as $plan) : 
                        $plan_key = sanitize_title($plan['name']);
                    ?>
                    <tr>
                        <th scope="row">
                            <label for="ftp_plan_<?php echo esc_attr($plan_key); ?>">
                                <?php echo esc_html($plan['name']); ?>
                            </label>
                        </th>
                        <td>
                            <div class="ftp-media-field">
                                <input type="text" 
                                       id="ftp_plan_<?php echo esc_attr($plan_key); ?>" 
                                       name="ftp_settings[plan_images][<?php echo esc_attr($plan_key); ?>]" 
                                       value="<?php echo esc_attr(isset($settings['plan_images'][$plan_key]) ? $settings['plan_images'][$plan_key] : ''); ?>" 
                                       class="regular-text ftp-media-url">
                                <button type="button" class="button ftp-media-upload" data-target="ftp_plan_<?php echo esc_attr($plan_key); ?>">
                                    Upload
                                </button>
                                <?php if (isset($settings['plan_images'][$plan_key]) && !empty($settings['plan_images'][$plan_key])) : ?>
                                <div class="ftp-image-preview">
                                    <img src="<?php echo esc_url($settings['plan_images'][$plan_key]); ?>" alt="<?php echo esc_attr($plan['name']); ?>">
                                </div>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            
            <div class="ftp-settings-section">
                <h2>Shortcodes Reference</h2>
                <table class="widefat">
                    <thead>
                        <tr>
                            <th>Shortcode</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>[ftp_landing_page]</code></td>
                            <td>Full landing page with all sections</td>
                        </tr>
                        <tr>
                            <td><code>[ftp_menu_full]</code></td>
                            <td>Full menu page with all items and prices</td>
                        </tr>
                        <tr>
                            <td><code>[ftp_special_plans_full]</code></td>
                            <td>Full special plans page</td>
                        </tr>
                        <tr>
                            <td><code>[ftp_header]</code></td>
                            <td>Header only</td>
                        </tr>
                        <tr>
                            <td><code>[ftp_hero]</code></td>
                            <td>Hero section only</td>
                        </tr>
                        <tr>
                            <td><code>[ftp_menu_section]</code></td>
                            <td>Menu preview section</td>
                        </tr>
                        <tr>
                            <td><code>[ftp_footer]</code></td>
                            <td>Footer only</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <?php submit_button('Save Settings'); ?>
        </form>
    </div>
    <?php
}

/**
 * Get a setting value
 */
function ftp_get_setting($key, $default = '') {
    $settings = get_option('ftp_settings', array());
    return isset($settings[$key]) && !empty($settings[$key]) ? $settings[$key] : $default;
}

/**
 * Get category image
 */
function ftp_get_category_image($category_key) {
    $settings = get_option('ftp_settings', array());
    $images = isset($settings['category_images']) ? $settings['category_images'] : array();
    return isset($images[$category_key]) && !empty($images[$category_key]) ? $images[$category_key] : '';
}
