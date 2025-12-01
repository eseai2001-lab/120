<?php
/**
 * Shortcodes for 120 Fruit Therapy Plugin
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register all shortcodes
 */
function ftp_register_shortcodes() {
    add_shortcode('ftp_landing_page', 'ftp_landing_page_shortcode');
    add_shortcode('ftp_hero', 'ftp_hero_shortcode');
    add_shortcode('ftp_menu_section', 'ftp_menu_section_shortcode');
    add_shortcode('ftp_menu_full', 'ftp_menu_full_shortcode');
    add_shortcode('ftp_special_plans_section', 'ftp_special_plans_section_shortcode');
    add_shortcode('ftp_special_plans_full', 'ftp_special_plans_full_shortcode');
    add_shortcode('ftp_gift_packages', 'ftp_gift_packages_shortcode');
    add_shortcode('ftp_wellness_events', 'ftp_wellness_events_shortcode');
    add_shortcode('ftp_special_offers', 'ftp_special_offers_shortcode');
    add_shortcode('ftp_mission', 'ftp_mission_shortcode');
    add_shortcode('ftp_stats', 'ftp_stats_shortcode');
    add_shortcode('ftp_contact', 'ftp_contact_shortcode');
    add_shortcode('ftp_map', 'ftp_map_shortcode');
    add_shortcode('ftp_header', 'ftp_header_shortcode');
    add_shortcode('ftp_footer', 'ftp_footer_shortcode');
}
add_action('init', 'ftp_register_shortcodes');

/**
 * Full landing page shortcode
 */
function ftp_landing_page_shortcode() {
    ob_start();
    include FTP_PLUGIN_DIR . 'templates/landing-page.php';
    return ob_get_clean();
}

/**
 * Header shortcode
 */
function ftp_header_shortcode() {
    $whatsapp_order_url = ftp_whatsapp_url(ftp_get_order_phone(), "Hello 120 Fruit Therapy! I would like to place an order. Please assist me with your menu options.");
    ob_start();
    ?>
    <header class="ftp-header" id="ftp-header">
        <div class="ftp-header-container">
            <div class="ftp-logo">
                <a href="#ftp-hero">
                    <img src="<?php echo esc_url(ftp_get_logo_url()); ?>" alt="120 Fruit Therapy Place" class="ftp-logo-img">
                </a>
            </div>
            <button class="ftp-mobile-menu-toggle" aria-label="Toggle menu">
                <span class="ftp-hamburger"></span>
            </button>
            <nav class="ftp-nav">
                <ul class="ftp-nav-list">
                    <li><a href="#ftp-hero" class="ftp-nav-link">Home</a></li>
                    <li><a href="#ftp-menu" class="ftp-nav-link">Menu</a></li>
                    <li><a href="#ftp-special-plans" class="ftp-nav-link">Special Plans</a></li>
                    <li><a href="#ftp-gift-packages" class="ftp-nav-link">Gift Packages</a></li>
                    <li><a href="#ftp-events" class="ftp-nav-link">Events</a></li>
                    <li><a href="#ftp-contact" class="ftp-nav-link">Contact</a></li>
                </ul>
                <a href="<?php echo esc_url($whatsapp_order_url); ?>" class="ftp-header-cta" target="_blank" rel="noopener">Order Now</a>
            </nav>
        </div>
    </header>
    <?php
    return ob_get_clean();
}

/**
 * Hero section shortcode
 */
function ftp_hero_shortcode() {
    $whatsapp_order_url = ftp_whatsapp_url(ftp_get_order_phone(), "Hello 120 Fruit Therapy! I would like to place an order. Please assist me with your menu options.");
    ob_start();
    ?>
    <section class="ftp-hero" id="ftp-hero">
        <div class="ftp-hero-video-container">
            <video class="ftp-hero-video" autoplay muted loop playsinline>
                <source src="<?php echo esc_url(ftp_get_hero_video_url()); ?>" type="video/mp4">
            </video>
            <div class="ftp-hero-overlay"></div>
        </div>
        <div class="ftp-hero-content">
            <h1 class="ftp-hero-title ftp-fade-in-up">Fruit Therapy &amp; Wellness</h1>
            <p class="ftp-hero-subtitle ftp-fade-in-up ftp-delay-1">Hygienically prepared fruits for optimal health</p>
            <p class="ftp-hero-text ftp-fade-in-up ftp-delay-2">Fresh fruit salads, parfaits, smoothies, mocktails and therapeutic wellness plans designed for your health journey.</p>
            <div class="ftp-hero-buttons ftp-fade-in-up ftp-delay-3">
                <a href="<?php echo esc_url($whatsapp_order_url); ?>" class="ftp-btn ftp-btn-primary" target="_blank" rel="noopener">
                    <span class="ftp-btn-icon">📱</span> Order via WhatsApp
                </a>
                <a href="#ftp-menu" class="ftp-btn ftp-btn-secondary">
                    <span class="ftp-btn-icon">📋</span> Explore Menu
                </a>
            </div>
        </div>
        <div class="ftp-hero-scroll-indicator">
            <span>Scroll Down</span>
            <div class="ftp-scroll-arrow"></div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Menu section shortcode (preview)
 * Shows category cards with image placeholders, title and description only
 */
function ftp_menu_section_shortcode() {
    $menu_items = ftp_get_menu_items();
    $settings = get_option('ftp_settings', array());
    $category_images = isset($settings['category_images']) ? $settings['category_images'] : array();
    $menu_page_url = ftp_get_menu_page_url();
    ob_start();
    ?>
    <section class="ftp-menu-section ftp-section" id="ftp-menu">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h2 class="ftp-section-title">Therapeutic Menu</h2>
                <p class="ftp-section-subtitle">Hygienically prepared fresh fruits crafted into delicious and nutritious creations for your wellness journey</p>
            </div>
            <div class="ftp-menu-grid">
                <?php foreach ($menu_items as $key => $category) : 
                    $image_url = isset($category_images[$key]) && !empty($category_images[$key]) ? $category_images[$key] : '';
                ?>
                <div class="ftp-menu-card ftp-fade-in-up" data-category="<?php echo esc_attr($key); ?>">
                    <div class="ftp-menu-card-image" <?php if ($image_url) : ?>style="background-image: url('<?php echo esc_url($image_url); ?>');"<?php endif; ?>>
                        <?php if (!$image_url) : ?>
                        <div class="ftp-menu-card-placeholder">
                            <span class="ftp-placeholder-icon"><?php echo esc_html($category['icon']); ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="ftp-menu-card-overlay"></div>
                    </div>
                    <div class="ftp-menu-card-content">
                        <h3 class="ftp-menu-card-title"><?php echo esc_html($category['title']); ?></h3>
                        <p class="ftp-menu-card-desc"><?php echo esc_html($category['description']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="ftp-section-cta ftp-fade-in-up">
                <a href="<?php echo esc_url($menu_page_url); ?>" class="ftp-btn ftp-btn-primary ftp-btn-large">View Full Menu</a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Full menu page shortcode
 */
function ftp_menu_full_shortcode() {
    ob_start();
    include FTP_PLUGIN_DIR . 'templates/menu-page.php';
    return ob_get_clean();
}

/**
 * Special plans section shortcode (preview)
 */
function ftp_special_plans_section_shortcode() {
    $plans = ftp_get_special_plans();
    ob_start();
    ?>
    <section class="ftp-special-plans-section ftp-section" id="ftp-special-plans">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h2 class="ftp-section-title">Special Wellness Plans</h2>
                <p class="ftp-section-subtitle">Customized therapeutic fruit plans designed to help you achieve your specific health and wellness goals</p>
            </div>
            <div class="ftp-plans-preview">
                <div class="ftp-plans-grid">
                    <?php foreach (array_slice($plans, 0, 6) as $plan) : ?>
                    <div class="ftp-plan-card ftp-fade-in-up">
                        <div class="ftp-plan-icon"><?php echo esc_html($plan['icon']); ?></div>
                        <h3 class="ftp-plan-title"><?php echo esc_html($plan['name']); ?></h3>
                        <p class="ftp-plan-desc"><?php echo esc_html($plan['description']); ?></p>
                        <?php 
                        $whatsapp_url = ftp_whatsapp_url(ftp_get_support_phone(), "Hello 120! I'm interested in your " . $plan['name'] . " wellness plan. Please provide more details about duration and pricing.");
                        ?>
                        <a href="<?php echo esc_url($whatsapp_url); ?>" class="ftp-btn ftp-btn-outline" target="_blank" rel="noopener">Learn More</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="ftp-section-cta ftp-fade-in-up">
                <a href="#ftp-plans-full" class="ftp-btn ftp-btn-primary ftp-btn-large">View All Special Plans</a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Full special plans page shortcode
 */
function ftp_special_plans_full_shortcode() {
    ob_start();
    include FTP_PLUGIN_DIR . 'templates/special-plans-page.php';
    return ob_get_clean();
}

/**
 * Gift packages shortcode
 */
function ftp_gift_packages_shortcode() {
    $packages = ftp_get_gift_packages();
    ob_start();
    ?>
    <section class="ftp-gift-packages ftp-section" id="ftp-gift-packages">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h2 class="ftp-section-title">120 Gift Packages</h2>
                <p class="ftp-section-subtitle">Gift someone you care about, you don't need a special day to make someone feel special</p>
            </div>
            <div class="ftp-packages-grid">
                <?php foreach ($packages as $package) : ?>
                <div class="ftp-package-card ftp-fade-in-up">
                    <h3 class="ftp-package-title"><?php echo esc_html($package['name']); ?></h3>
                    <ul class="ftp-package-features">
                        <?php foreach ($package['features'] as $feature) : ?>
                        <li><?php echo esc_html($feature); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php 
                    $whatsapp_url = ftp_whatsapp_url(ftp_get_support_phone(), "Hello 120! I want to make an enquiry about your " . $package['name'] . " package.");
                    ?>
                    <a href="<?php echo esc_url($whatsapp_url); ?>" class="ftp-btn ftp-btn-primary" target="_blank" rel="noopener">
                        Gift (<?php echo esc_html($package['price']); ?>)
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Wellness events shortcode
 */
function ftp_wellness_events_shortcode() {
    $events = ftp_get_wellness_events();
    ob_start();
    ?>
    <section class="ftp-wellness-events ftp-section" id="ftp-events">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h2 class="ftp-section-title">Wellness Events</h2>
                <p class="ftp-section-subtitle">Bring healthy, delicious fruit-based catering to your corporate events, wellness retreats, and special occasions</p>
            </div>
            <div class="ftp-events-grid">
                <?php foreach ($events as $key => $event) : ?>
                <div class="ftp-event-card ftp-fade-in-up">
                    <div class="ftp-event-icon"><?php echo esc_html($event['icon']); ?></div>
                    <h3 class="ftp-event-title"><?php echo esc_html($event['title']); ?></h3>
                    <p class="ftp-event-desc"><?php echo esc_html($event['description']); ?></p>
                    <ul class="ftp-event-services">
                        <?php foreach ($event['services'] as $service) : ?>
                        <li><?php echo esc_html($service); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php 
                    $whatsapp_url = ftp_whatsapp_url(ftp_get_support_phone(), "Hello 120! I would like to enquire about your " . $event['title'] . " services for my upcoming event.");
                    ?>
                    <a href="<?php echo esc_url($whatsapp_url); ?>" class="ftp-btn ftp-btn-outline" target="_blank" rel="noopener">Enquire Now</a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Special offers shortcode
 */
function ftp_special_offers_shortcode() {
    ob_start();
    ?>
    <section class="ftp-special-offers ftp-section" id="ftp-offers">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h2 class="ftp-section-title">Special Offers</h2>
                <p class="ftp-section-subtitle">Take advantage of our exclusive promotions and seasonal deals</p>
            </div>
            <div class="ftp-offers-grid">
                <div class="ftp-offer-card ftp-fade-in-up">
                    <div class="ftp-offer-badge">NEW</div>
                    <h3 class="ftp-offer-title">First Order Discount</h3>
                    <p class="ftp-offer-desc">Get 10% off your first order when you order via WhatsApp!</p>
                    <?php $whatsapp_url = ftp_whatsapp_url(ftp_get_order_phone(), "Hello 120! I'm a new customer and would like to claim my 10% first order discount."); ?>
                    <a href="<?php echo esc_url($whatsapp_url); ?>" class="ftp-btn ftp-btn-primary" target="_blank" rel="noopener">Claim Offer</a>
                </div>
                <div class="ftp-offer-card ftp-fade-in-up">
                    <div class="ftp-offer-badge">POPULAR</div>
                    <h3 class="ftp-offer-title">Wellness Plan Bundle</h3>
                    <p class="ftp-offer-desc">Subscribe to any 30-day plan and get a free smoothie of your choice!</p>
                    <?php $whatsapp_url = ftp_whatsapp_url(ftp_get_support_phone(), "Hello 120! I'm interested in the 30-day wellness plan bundle with free smoothie."); ?>
                    <a href="<?php echo esc_url($whatsapp_url); ?>" class="ftp-btn ftp-btn-primary" target="_blank" rel="noopener">Learn More</a>
                </div>
                <div class="ftp-offer-card ftp-fade-in-up">
                    <div class="ftp-offer-badge">LIMITED</div>
                    <h3 class="ftp-offer-title">Corporate Package Deal</h3>
                    <p class="ftp-offer-desc">Book corporate wellness catering for 20+ people and receive 15% discount!</p>
                    <?php $whatsapp_url = ftp_whatsapp_url(ftp_get_support_phone(), "Hello 120! I'm interested in the corporate package deal for my organization."); ?>
                    <a href="<?php echo esc_url($whatsapp_url); ?>" class="ftp-btn ftp-btn-primary" target="_blank" rel="noopener">Get Quote</a>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Mission section shortcode
 */
function ftp_mission_shortcode() {
    ob_start();
    ?>
    <section class="ftp-mission ftp-section" id="ftp-mission">
        <div class="ftp-mission-bg">
            <div class="ftp-floating-fruit ftp-fruit-1">🍎</div>
            <div class="ftp-floating-fruit ftp-fruit-2">🍊</div>
            <div class="ftp-floating-fruit ftp-fruit-3">🍇</div>
            <div class="ftp-floating-fruit ftp-fruit-4">🍓</div>
            <div class="ftp-floating-fruit ftp-fruit-5">🥝</div>
            <div class="ftp-floating-fruit ftp-fruit-6">🍍</div>
        </div>
        <div class="ftp-container">
            <div class="ftp-mission-content ftp-fade-in-up">
                <h2 class="ftp-section-title">Our Mission</h2>
                <p class="ftp-mission-text">
                    At 120 Fruit Therapy Place, we believe that optimal health begins with what we put into our bodies. 
                    Our mission is to make healthy eating accessible, delicious, and therapeutic through the power of 
                    hygienically prepared fresh fruits.
                </p>
                <p class="ftp-mission-text">
                    Our therapeutic wellness plans are designed by certified nutritionists to address specific health goals 
                    including weight management, stress relief, energy enhancement, and overall vitality. We believe that 
                    eating healthy should be a joyful experience that nourishes both body and soul.
                </p>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Statistics counter shortcode
 */
function ftp_stats_shortcode() {
    ob_start();
    ?>
    <section class="ftp-stats ftp-section" id="ftp-stats">
        <div class="ftp-container">
            <div class="ftp-stats-grid">
                <div class="ftp-stat-item ftp-fade-in-up">
                    <div class="ftp-stat-number" data-count="1">0</div>
                    <div class="ftp-stat-suffix">+</div>
                    <div class="ftp-stat-label">Years of Wellness</div>
                </div>
                <div class="ftp-stat-item ftp-fade-in-up">
                    <div class="ftp-stat-number" data-count="500">0</div>
                    <div class="ftp-stat-suffix">+</div>
                    <div class="ftp-stat-label">Happy Customers</div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Contact section shortcode
 */
function ftp_contact_shortcode() {
    ob_start();
    ?>
    <section class="ftp-contact ftp-section" id="ftp-contact">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h2 class="ftp-section-title">Start Your Wellness Journey</h2>
                <p class="ftp-section-subtitle">Ready to transform your health? Contact us to learn more about our therapeutic fruit offerings and wellness programs</p>
            </div>
            <div class="ftp-contact-grid">
                <div class="ftp-contact-card ftp-fade-in-up">
                    <div class="ftp-contact-icon">📞</div>
                    <h3 class="ftp-contact-title">Orders &amp; Deliveries</h3>
                    <p class="ftp-contact-number"><?php echo esc_html(ftp_get_order_phone()); ?></p>
                    <a href="tel:+234<?php echo esc_attr(substr(ftp_get_order_phone(), 1)); ?>" class="ftp-btn ftp-btn-outline">Call Now</a>
                </div>
                <div class="ftp-contact-card ftp-fade-in-up">
                    <div class="ftp-contact-icon">💬</div>
                    <h3 class="ftp-contact-title">Special Plan Support</h3>
                    <p class="ftp-contact-number">+234 904 214 6929</p>
                    <a href="tel:+2349042146929" class="ftp-btn ftp-btn-outline">Call Now</a>
                </div>
                <div class="ftp-contact-card ftp-fade-in-up">
                    <div class="ftp-contact-icon">📍</div>
                    <h3 class="ftp-contact-title">Visit Us</h3>
                    <p class="ftp-contact-address">Come experience our wellness sanctuary</p>
                    <p class="ftp-contact-location">University of Nigeria Nsukka, Marlima Building</p>
                    <a href="#ftp-map" class="ftp-btn ftp-btn-outline">View Map</a>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Map section shortcode
 */
function ftp_map_shortcode() {
    ob_start();
    ?>
    <section class="ftp-map ftp-section" id="ftp-map">
        <div class="ftp-map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.2954548847!2d7.4155387!3d6.8722839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1044959e2c2d4c1d%3A0x8c7b3e7c9a1e8f0a!2sUniversity%20of%20Nigeria%2C%20Nsukka!5e0!3m2!1sen!2sng!4v1701435600000!5m2!1sen!2sng"
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                title="120 Fruit Therapy Place - Marlima Building, University of Nigeria Nsukka">
            </iframe>
        </div>
        <div class="ftp-map-overlay">
            <div class="ftp-map-info">
                <h3>Find Us Here</h3>
                <p>📍 Marlima Building, University of Nigeria Nsukka, Enugu State, Nigeria</p>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Footer shortcode
 */
function ftp_footer_shortcode() {
    ob_start();
    ?>
    <footer class="ftp-footer" id="ftp-footer">
        <div class="ftp-container">
            <div class="ftp-footer-grid">
                <div class="ftp-footer-brand">
                    <img src="<?php echo esc_url(ftp_get_logo_url()); ?>" alt="120 Fruit Therapy Place" class="ftp-footer-logo">
                    <p class="ftp-footer-tagline">Health &amp; Wellness Through Fresh Fruits</p>
                </div>
                <div class="ftp-footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#ftp-hero">Home</a></li>
                        <li><a href="#ftp-menu">Menu</a></li>
                        <li><a href="#ftp-special-plans">Special Plans</a></li>
                        <li><a href="#ftp-gift-packages">Gift Packages</a></li>
                        <li><a href="#ftp-events">Events</a></li>
                    </ul>
                </div>
                <div class="ftp-footer-contact">
                    <h4>Contact</h4>
                    <p>Orders: <?php echo esc_html(ftp_get_order_phone()); ?></p>
                    <p>Support: <?php echo esc_html(ftp_get_support_phone()); ?></p>
                    <p>Marlima Building, UNN, Nsukka</p>
                </div>
                <div class="ftp-footer-social">
                    <h4>Follow Us</h4>
                    <div class="ftp-social-links">
                        <a href="#" class="ftp-social-link" aria-label="Facebook">📘</a>
                        <a href="#" class="ftp-social-link" aria-label="Instagram">📷</a>
                        <a href="#" class="ftp-social-link" aria-label="Twitter">🐦</a>
                        <a href="#" class="ftp-social-link" aria-label="WhatsApp">💬</a>
                    </div>
                </div>
            </div>
            <div class="ftp-footer-bottom">
                <p>&copy; <?php echo esc_html(date('Y')); ?> 120 Fruit Therapy Place. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- Floating Support Button - Links to Menu Page -->
    <div class="ftp-floating-support" id="ftp-floating-support">
        <div class="ftp-support-popup">Place your orders here</div>
        <a href="<?php echo esc_url(ftp_get_menu_page_url()); ?>" class="ftp-support-btn">
            <span class="ftp-support-icon">🛒</span>
        </a>
    </div>
    <?php
    return ob_get_clean();
}
