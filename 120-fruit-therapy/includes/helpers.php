<?php
/**
 * Helper functions for 120 Fruit Therapy Plugin
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get the logo URL
 * Uses settings if available, otherwise falls back to default
 * 
 * @return string Logo URL
 */
function ftp_get_logo_url() {
    // Check if we have a setting for logo
    $settings = get_option('ftp_settings', array());
    if (!empty($settings['logo_url'])) {
        return $settings['logo_url'];
    }
    
    // Default logo path - assets are in repository root alongside plugin folder
    $logo_url = FTP_PLUGIN_URL . '../Navy and Pink Modern Online Store Logo.webp';
    
    // Allow the URL to be filtered for custom installations
    return apply_filters('ftp_logo_url', $logo_url);
}

/**
 * Get the hero video URL
 * 
 * @return string Video URL
 */
function ftp_get_hero_video_url() {
    // Check if we have a setting for video
    $settings = get_option('ftp_settings', array());
    if (!empty($settings['hero_video_url'])) {
        return $settings['hero_video_url'];
    }
    
    // Default video path - assets are in repository root alongside plugin folder
    $video_url = FTP_PLUGIN_URL . '../motion2Fast_Realistic_video_a_rich_parfait_spilling_from_a_cur_0.mp4';
    
    // Allow the URL to be filtered for custom installations
    return apply_filters('ftp_hero_video_url', $video_url);
}

/**
 * Get the menu page URL for floating button
 * 
 * @return string Menu page URL
 */
function ftp_get_menu_page_url() {
    $settings = get_option('ftp_settings', array());
    return !empty($settings['menu_page_url']) ? $settings['menu_page_url'] : '#ftp-menu-full';
}

/**
 * Get the special plans page URL
 * 
 * @return string Special plans page URL
 */
function ftp_get_special_plans_page_url() {
    $settings = get_option('ftp_settings', array());
    return !empty($settings['special_plans_page_url']) ? $settings['special_plans_page_url'] : '#ftp-special-plans';
}

/**
 * Get menu items data
 */
function ftp_get_menu_items() {
    return array(
        'fruit_salads' => array(
            'title' => 'Fruit Salads',
            'icon' => '🥗',
            'description' => 'Fresh seasonal fruits, carefully selected and hygienically prepared with natural dressings and superfoods',
            'items' => array(
                array('name' => 'Mixed Fruit Salad', 'price' => '₦2,500', 'description' => 'A delicious blend of seasonal fruits'),
                array('name' => 'Tropical Paradise', 'price' => '₦3,000', 'description' => 'Exotic tropical fruits with coconut'),
                array('name' => 'Berry Bliss', 'price' => '₦3,500', 'description' => 'Mixed berries with honey drizzle'),
            )
        ),
        'smoothies' => array(
            'title' => 'Smoothies',
            'icon' => '🥤',
            'description' => 'Nutrient-packed smoothies with fresh fruits, superfoods, and natural supplements for optimal health',
            'items' => array(
                array('name' => 'Green Detox', 'price' => '₦2,000', 'description' => 'Spinach, apple, ginger blend'),
                array('name' => 'Mango Tango', 'price' => '₦2,500', 'description' => 'Fresh mango with yogurt'),
                array('name' => 'Berry Blast', 'price' => '₦2,500', 'description' => 'Mixed berries smoothie'),
            )
        ),
        'parfaits' => array(
            'title' => 'Parfaits',
            'icon' => '🍨',
            'description' => 'Layered parfaits with fresh fruits, granola, and creamy yogurt',
            'items' => array(
                array('name' => 'Classic Parfait', 'price' => '₦3,000', 'description' => 'Yogurt, fruits, and granola'),
                array('name' => 'Granola Parfait', 'price' => '₦3,500', 'description' => 'Extra granola with honey'),
                array('name' => 'Protein Parfait', 'price' => '₦4,000', 'description' => 'High protein with nuts'),
            )
        ),
        'fruit_juices' => array(
            'title' => 'Fruit Juices',
            'icon' => '🧃',
            'description' => 'Freshly squeezed fruit juices with no added sugar',
            'items' => array(
                array('name' => 'Fresh Orange', 'price' => '₦1,500', 'description' => 'Pure orange juice'),
                array('name' => 'Pineapple Punch', 'price' => '₦1,800', 'description' => 'Pineapple with mint'),
                array('name' => 'Watermelon Refresh', 'price' => '₦1,500', 'description' => 'Cool watermelon juice'),
            )
        ),
        'mocktails' => array(
            'title' => 'Mocktails',
            'icon' => '🍹',
            'description' => 'Refreshing fruit-based mocktails with natural ingredients, herbs, and therapeutic benefits',
            'items' => array(
                array('name' => 'Virgin Mojito', 'price' => '₦2,500', 'description' => 'Lime, mint, and soda'),
                array('name' => 'Sunset Breeze', 'price' => '₦2,800', 'description' => 'Orange and passion fruit'),
                array('name' => 'Tropical Storm', 'price' => '₦3,000', 'description' => 'Mixed tropical blend'),
            )
        ),
        'milkshakes' => array(
            'title' => 'Milkshakes',
            'icon' => '🥛',
            'description' => 'Creamy milkshakes made with fresh fruits and premium ice cream',
            'items' => array(
                array('name' => 'Strawberry Dream', 'price' => '₦2,500', 'description' => 'Fresh strawberry shake'),
                array('name' => 'Chocolate Banana', 'price' => '₦2,800', 'description' => 'Rich chocolate and banana'),
                array('name' => 'Vanilla Berry', 'price' => '₦2,500', 'description' => 'Vanilla with mixed berries'),
            )
        ),
        'tigernut_milk' => array(
            'title' => 'Tigernut Milk',
            'icon' => '🥜',
            'description' => 'Traditional Nigerian tigernut drinks with health benefits',
            'items' => array(
                array('name' => 'Classic Tigernut', 'price' => '₦2,000', 'description' => 'Pure tigernut milk'),
                array('name' => 'Spiced Tigernut', 'price' => '₦2,500', 'description' => 'With dates and ginger'),
                array('name' => 'Tigernut Smoothie', 'price' => '₦3,000', 'description' => 'Blended with fruits'),
            )
        ),
        'fruit_cakes' => array(
            'title' => 'Fruit Cakes',
            'icon' => '🎂',
            'description' => 'Delicious cakes topped with fresh seasonal fruits',
            'items' => array(
                array('name' => 'Fruit Cake Slice', 'price' => '₦2,000', 'description' => 'Single serving slice'),
                array('name' => 'Whole Fruit Cake', 'price' => '₦15,000', 'description' => 'Full cake for parties'),
            )
        ),
        'frappuccinos' => array(
            'title' => 'Frappuccinos',
            'icon' => '☕',
            'description' => 'Blended iced coffee drinks with fruit flavors',
            'items' => array(
                array('name' => 'Caramel Frappe', 'price' => '₦3,000', 'description' => 'Caramel coffee blend'),
                array('name' => 'Mocha Frappe', 'price' => '₦3,000', 'description' => 'Chocolate coffee blend'),
                array('name' => 'Vanilla Frappe', 'price' => '₦2,800', 'description' => 'Vanilla coffee blend'),
            )
        ),
        'slushies' => array(
            'title' => 'Slushies',
            'icon' => '🧊',
            'description' => 'Refreshing frozen fruit drinks perfect for hot days',
            'items' => array(
                array('name' => 'Blue Lagoon', 'price' => '₦2,000', 'description' => 'Blue curacao flavored'),
                array('name' => 'Strawberry Slush', 'price' => '₦2,000', 'description' => 'Strawberry ice blend'),
                array('name' => 'Mango Slush', 'price' => '₦2,000', 'description' => 'Mango ice blend'),
            )
        ),
    );
}

/**
 * Get special wellness plans data
 */
function ftp_get_special_plans() {
    return array(
        array(
            'name' => 'Weight Loss',
            'icon' => '🍎',
            'description' => 'Carefully crafted fruit combinations designed to boost metabolism, reduce cravings, and support healthy weight management.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦25,000'),
                array('duration' => '14 Days', 'price' => '₦45,000'),
                array('duration' => '30 Days', 'price' => '₦80,000'),
            )
        ),
        array(
            'name' => 'Weight Gain',
            'icon' => '💪',
            'description' => 'Nutrient-dense fruit plans with healthy calories to support muscle growth and healthy weight gain.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦25,000'),
                array('duration' => '14 Days', 'price' => '₦45,000'),
                array('duration' => '30 Days', 'price' => '₦80,000'),
            )
        ),
        array(
            'name' => 'Clear Skin + Glow',
            'icon' => '✨',
            'description' => 'Antioxidant-rich fruits that nourish your skin from within for a natural, healthy glow.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦20,000'),
                array('duration' => '14 Days', 'price' => '₦35,000'),
                array('duration' => '30 Days', 'price' => '₦60,000'),
            )
        ),
        array(
            'name' => 'Libido',
            'icon' => '❤️',
            'description' => 'Natural aphrodisiac fruits to enhance vitality and intimate wellness.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦30,000'),
                array('duration' => '14 Days', 'price' => '₦55,000'),
            )
        ),
        array(
            'name' => 'Energy Boost',
            'icon' => '⚡',
            'description' => 'High-energy fruit combinations to keep you active and energized throughout the day.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦20,000'),
                array('duration' => '14 Days', 'price' => '₦35,000'),
            )
        ),
        array(
            'name' => 'Stress Relief',
            'icon' => '🧘',
            'description' => 'Calming fruit blends with natural stress-reducing properties to help you relax.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦20,000'),
                array('duration' => '14 Days', 'price' => '₦35,000'),
            )
        ),
        array(
            'name' => 'Focus',
            'icon' => '🎯',
            'description' => 'Brain-boosting fruits to enhance concentration, memory, and mental clarity.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦20,000'),
                array('duration' => '14 Days', 'price' => '₦35,000'),
            )
        ),
        array(
            'name' => 'Immune Function',
            'icon' => '🛡️',
            'description' => 'Vitamin-rich fruit combinations to strengthen your immune system naturally.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦25,000'),
                array('duration' => '14 Days', 'price' => '₦45,000'),
            )
        ),
        array(
            'name' => 'Detoxification',
            'icon' => '🌿',
            'description' => 'Cleansing fruit plans to flush toxins and rejuvenate your body systems.',
            'plans' => array(
                array('duration' => '3 Days', 'price' => '₦15,000'),
                array('duration' => '7 Days', 'price' => '₦30,000'),
                array('duration' => '14 Days', 'price' => '₦55,000'),
            )
        ),
    );
}

/**
 * Get gift packages data
 */
function ftp_get_gift_packages() {
    return array(
        array(
            'name' => 'Classic Package',
            'price' => '₦30,000',
            'features' => array(
                '2 Exclusive Meals',
                '2 Premium Meals',
                'Free Deliveries',
                'Crafted Care/Love Notes',
                'Customized Care/Love Items'
            )
        ),
        array(
            'name' => 'Crystal Package',
            'price' => '₦50,000',
            'features' => array(
                '2 Exclusive Meals',
                '2 Premium Meals',
                '4 Special Plan Meals',
                'Free Deliveries',
                'Crafted Care/Love Notes',
                'Customized Care/Love Items'
            )
        ),
        array(
            'name' => 'Silver Package',
            'price' => '₦90,000',
            'features' => array(
                '2 Exclusive Meals',
                '2 Premium Meals',
                '8 Special Plan Meals',
                'Free Deliveries',
                'Crafted Care/Love Notes',
                'Customized Care/Love Items'
            )
        ),
        array(
            'name' => 'Gold Package',
            'price' => '₦120,000',
            'features' => array(
                '4 Exclusive Meals',
                '3 Premium Meals',
                '8 Special Plan Meals',
                'Free Deliveries',
                'Crafted Care/Love Notes',
                'Customized Care/Love Items'
            )
        ),
        array(
            'name' => 'Platinum Package',
            'price' => '₦160,000',
            'features' => array(
                '7 Exclusive Meals',
                '4 Premium Meals',
                '8 Special Plan Meals',
                '1 Special Request Meal',
                'Free Deliveries',
                'Crafted Care/Love Notes',
                'Customized Care/Love Items'
            )
        ),
        array(
            'name' => 'Diamond Package',
            'price' => '₦200,000',
            'features' => array(
                '2 Exclusive Meals',
                '2 Premium Meals',
                '8 Special Plan Meals',
                '2 Special Request Meals',
                'Free Deliveries',
                'Crafted Care/Love Notes',
                'Customized Care/Love Items'
            )
        ),
    );
}

/**
 * Get wellness events data
 */
function ftp_get_wellness_events() {
    return array(
        'corporate' => array(
            'title' => 'Corporate Wellness',
            'icon' => '🏢',
            'description' => 'Bring healthy, delicious fruit-based catering to your workplace.',
            'services' => array(
                'Team wellness sessions',
                'Office fruit delivery subscriptions',
                'Wellness workshops',
                'Corporate health programs',
                'Meeting refreshments'
            )
        ),
        'special' => array(
            'title' => 'Special Events',
            'icon' => '🎉',
            'description' => 'Make your special occasions healthier and more memorable.',
            'services' => array(
                'Weddings',
                'Birthday parties',
                'Baby showers',
                'Corporate retreats',
                'Anniversary celebrations'
            )
        ),
    );
}

/**
 * Generate WhatsApp URL
 */
function ftp_whatsapp_url($phone, $message) {
    // Convert Nigerian numbers to international format
    $phone = preg_replace('/^0/', '234', $phone);
    $phone = preg_replace('/[^0-9]/', '', $phone);
    $encoded_message = rawurlencode($message);
    return "https://wa.me/{$phone}?text={$encoded_message}";
}

/**
 * Get order WhatsApp number
 */
function ftp_get_order_phone() {
    return '07075887085';
}

/**
 * Get support WhatsApp number
 */
function ftp_get_support_phone() {
    return '09042146929';
}

/**
 * Escape and sanitize output
 */
function ftp_esc($text) {
    return esc_html($text);
}
