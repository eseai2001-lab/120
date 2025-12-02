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
 * Updated with actual menu items from 120Menu images
 */
function ftp_get_menu_items() {
    return array(
        'fruit_salads' => array(
            'title' => 'Fruit Salads',
            'icon' => '🥗',
            'description' => 'Fresh seasonal fruits, carefully selected and hygienically prepared with natural dressings and superfoods',
            'items' => array(
                array('name' => 'Fruit Salad Small', 'price' => '₦2,000', 'description' => 'Small portion of fresh mixed fruits'),
                array('name' => 'Fruit Salad Medium', 'price' => '₦3,000', 'description' => 'Medium portion of fresh mixed fruits'),
                array('name' => 'Fruit Salad Large', 'price' => '₦5,000', 'description' => 'Large portion of fresh mixed fruits'),
                array('name' => 'Fruit Salad Family', 'price' => '₦8,000', 'description' => 'Family size portion of fresh mixed fruits'),
            )
        ),
        'smoothies' => array(
            'title' => 'Smoothies',
            'icon' => '🥤',
            'description' => 'Nutrient-packed smoothies with fresh fruits, superfoods, and natural supplements for optimal health',
            'items' => array(
                array('name' => 'Banana Smoothie', 'price' => '₦1,500', 'description' => 'Creamy banana smoothie'),
                array('name' => 'Mango Smoothie', 'price' => '₦2,000', 'description' => 'Fresh mango smoothie'),
                array('name' => 'Strawberry Smoothie', 'price' => '₦2,500', 'description' => 'Fresh strawberry smoothie'),
                array('name' => 'Mixed Berry Smoothie', 'price' => '₦3,000', 'description' => 'Blend of fresh berries'),
                array('name' => 'Green Detox Smoothie', 'price' => '₦2,500', 'description' => 'Spinach, apple, ginger blend'),
                array('name' => 'Tropical Smoothie', 'price' => '₦2,500', 'description' => 'Tropical fruit blend'),
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
                array('name' => 'Berry Parfait', 'price' => '₦4,000', 'description' => 'Mixed berries with yogurt'),
                array('name' => 'Tropical Parfait', 'price' => '₦4,500', 'description' => 'Tropical fruits with coconut'),
            )
        ),
        'fruit_juices' => array(
            'title' => 'Fresh Juices',
            'icon' => '🧃',
            'description' => 'Freshly squeezed fruit juices with no added sugar',
            'items' => array(
                array('name' => 'Orange Juice', 'price' => '₦1,000', 'description' => 'Fresh squeezed orange'),
                array('name' => 'Pineapple Juice', 'price' => '₦1,000', 'description' => 'Fresh pineapple juice'),
                array('name' => 'Watermelon Juice', 'price' => '₦1,000', 'description' => 'Cool watermelon juice'),
                array('name' => 'Apple Juice', 'price' => '₦1,200', 'description' => 'Fresh apple juice'),
                array('name' => 'Carrot Juice', 'price' => '₦1,000', 'description' => 'Fresh carrot juice'),
                array('name' => 'Mixed Juice', 'price' => '₦1,500', 'description' => 'Blend of fresh fruits'),
            )
        ),
        'mocktails' => array(
            'title' => 'Mocktails',
            'icon' => '🍹',
            'description' => 'Refreshing fruit-based mocktails with natural ingredients, herbs, and therapeutic benefits',
            'items' => array(
                array('name' => 'Virgin Mojito', 'price' => '₦2,500', 'description' => 'Lime, mint, and soda'),
                array('name' => 'Pina Colada', 'price' => '₦3,000', 'description' => 'Pineapple and coconut'),
                array('name' => 'Strawberry Daiquiri', 'price' => '₦3,000', 'description' => 'Strawberry blend'),
                array('name' => 'Tropical Sunset', 'price' => '₦3,500', 'description' => 'Tropical fruit medley'),
                array('name' => 'Berry Blast', 'price' => '₦3,000', 'description' => 'Mixed berry mocktail'),
            )
        ),
        'milkshakes' => array(
            'title' => 'Milkshakes',
            'icon' => '🥛',
            'description' => 'Creamy milkshakes made with fresh fruits and premium ice cream',
            'items' => array(
                array('name' => 'Vanilla Milkshake', 'price' => '₦2,000', 'description' => 'Classic vanilla shake'),
                array('name' => 'Chocolate Milkshake', 'price' => '₦2,500', 'description' => 'Rich chocolate shake'),
                array('name' => 'Strawberry Milkshake', 'price' => '₦2,500', 'description' => 'Fresh strawberry shake'),
                array('name' => 'Banana Milkshake', 'price' => '₦2,000', 'description' => 'Creamy banana shake'),
                array('name' => 'Oreo Milkshake', 'price' => '₦3,000', 'description' => 'Oreo cookie shake'),
            )
        ),
        'tigernut_drinks' => array(
            'title' => 'Tigernut Drinks (Kunu Aya)',
            'icon' => '🥜',
            'description' => 'Traditional Nigerian tigernut drinks with health benefits',
            'items' => array(
                array('name' => 'Plain Tigernut', 'price' => '₦1,000', 'description' => 'Pure tigernut milk'),
                array('name' => 'Tigernut with Dates', 'price' => '₦1,500', 'description' => 'Sweetened with dates'),
                array('name' => 'Tigernut with Coconut', 'price' => '₦1,500', 'description' => 'With coconut flavor'),
                array('name' => 'Spiced Tigernut', 'price' => '₦1,500', 'description' => 'With ginger and spices'),
            )
        ),
        'yogurt_bowls' => array(
            'title' => 'Yogurt Bowls',
            'icon' => '🥣',
            'description' => 'Healthy yogurt bowls topped with fresh fruits and granola',
            'items' => array(
                array('name' => 'Plain Yogurt Bowl', 'price' => '₦2,000', 'description' => 'Greek yogurt with toppings'),
                array('name' => 'Fruit Yogurt Bowl', 'price' => '₦2,500', 'description' => 'Yogurt with fresh fruits'),
                array('name' => 'Granola Yogurt Bowl', 'price' => '₦3,000', 'description' => 'Yogurt with granola and honey'),
                array('name' => 'Acai Bowl', 'price' => '₦4,000', 'description' => 'Acai berry bowl with toppings'),
            )
        ),
        'fresh_fruits' => array(
            'title' => 'Fresh Cut Fruits',
            'icon' => '🍓',
            'description' => 'Freshly cut seasonal fruits ready to enjoy',
            'items' => array(
                array('name' => 'Watermelon Cup', 'price' => '₦500', 'description' => 'Fresh cut watermelon'),
                array('name' => 'Pineapple Cup', 'price' => '₦500', 'description' => 'Fresh cut pineapple'),
                array('name' => 'Pawpaw Cup', 'price' => '₦500', 'description' => 'Fresh cut pawpaw'),
                array('name' => 'Mixed Fruit Cup', 'price' => '₦1,000', 'description' => 'Assorted fresh fruits'),
            )
        ),
        'special_drinks' => array(
            'title' => 'Special Drinks',
            'icon' => '🍵',
            'description' => 'Special healthy drinks and beverages',
            'items' => array(
                array('name' => 'Zobo Drink', 'price' => '₦500', 'description' => 'Traditional hibiscus drink'),
                array('name' => 'Ginger Shot', 'price' => '₦500', 'description' => 'Concentrated ginger wellness shot'),
                array('name' => 'Lemon Ginger', 'price' => '₦800', 'description' => 'Lemon and ginger blend'),
                array('name' => 'Detox Water', 'price' => '₦800', 'description' => 'Infused detox water'),
                array('name' => 'Green Juice', 'price' => '₦1,500', 'description' => 'Vegetable and fruit blend'),
            )
        ),
    );
}

/**
 * Get special wellness plans data
 * Updated with actual plans from 120Menu images
 */
function ftp_get_special_plans() {
    return array(
        array(
            'name' => 'Weight Loss Plan',
            'icon' => '🍎',
            'description' => 'Carefully crafted fruit combinations designed to boost metabolism, reduce cravings, and support healthy weight management.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦25,000'),
                array('duration' => '14 Days', 'price' => '₦45,000'),
                array('duration' => '30 Days', 'price' => '₦80,000'),
            )
        ),
        array(
            'name' => 'Weight Gain Plan',
            'icon' => '💪',
            'description' => 'Nutrient-dense fruit plans with healthy calories to support muscle growth and healthy weight gain.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦25,000'),
                array('duration' => '14 Days', 'price' => '₦45,000'),
                array('duration' => '30 Days', 'price' => '₦80,000'),
            )
        ),
        array(
            'name' => 'Clear Skin & Glow Plan',
            'icon' => '✨',
            'description' => 'Antioxidant-rich fruits that nourish your skin from within for a natural, healthy glow.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦20,000'),
                array('duration' => '14 Days', 'price' => '₦35,000'),
                array('duration' => '30 Days', 'price' => '₦60,000'),
            )
        ),
        array(
            'name' => 'Libido Enhancement Plan',
            'icon' => '❤️',
            'description' => 'Natural aphrodisiac fruits to enhance vitality and intimate wellness.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦30,000'),
                array('duration' => '14 Days', 'price' => '₦55,000'),
            )
        ),
        array(
            'name' => 'Energy Boost Plan',
            'icon' => '⚡',
            'description' => 'High-energy fruit combinations to keep you active and energized throughout the day.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦20,000'),
                array('duration' => '14 Days', 'price' => '₦35,000'),
            )
        ),
        array(
            'name' => 'Stress Relief Plan',
            'icon' => '🧘',
            'description' => 'Calming fruit blends with natural stress-reducing properties to help you relax and unwind.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦20,000'),
                array('duration' => '14 Days', 'price' => '₦35,000'),
            )
        ),
        array(
            'name' => 'Mental Focus Plan',
            'icon' => '🎯',
            'description' => 'Brain-boosting fruits to enhance concentration, memory, and mental clarity for peak performance.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦20,000'),
                array('duration' => '14 Days', 'price' => '₦35,000'),
            )
        ),
        array(
            'name' => 'Immune Booster Plan',
            'icon' => '🛡️',
            'description' => 'Vitamin C and antioxidant-rich fruit combinations to strengthen your immune system naturally.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦25,000'),
                array('duration' => '14 Days', 'price' => '₦45,000'),
            )
        ),
        array(
            'name' => 'Detox & Cleanse Plan',
            'icon' => '🌿',
            'description' => 'Cleansing fruit plans to flush toxins, improve digestion, and rejuvenate your body systems.',
            'plans' => array(
                array('duration' => '3 Days', 'price' => '₦15,000'),
                array('duration' => '7 Days', 'price' => '₦30,000'),
                array('duration' => '14 Days', 'price' => '₦55,000'),
            )
        ),
        array(
            'name' => 'Fertility Support Plan',
            'icon' => '🌸',
            'description' => 'Specially curated fruits rich in folate and essential nutrients to support reproductive health.',
            'plans' => array(
                array('duration' => '14 Days', 'price' => '₦40,000'),
                array('duration' => '30 Days', 'price' => '₦75,000'),
            )
        ),
        array(
            'name' => 'Diabetes Management Plan',
            'icon' => '🍇',
            'description' => 'Low glycemic fruits carefully selected to help manage blood sugar levels naturally.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦25,000'),
                array('duration' => '14 Days', 'price' => '₦45,000'),
                array('duration' => '30 Days', 'price' => '₦80,000'),
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
