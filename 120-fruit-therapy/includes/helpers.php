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
 * Get the special plan menu page URL
 * 
 * @return string Special plan menu page URL
 */
function ftp_get_special_plan_menu_page_url() {
    $settings = get_option('ftp_settings', array());
    return !empty($settings['special_plan_menu_page_url']) ? $settings['special_plan_menu_page_url'] : '#ftp-special-plan-menu';
}

/**
 * Get special plan menu image URL for a specific category
 * 
 * @param string $category_key The category key (e.g., 'weight_loss', 'weight_gain', 'libido', 'weight_maintenance')
 * @return string Image URL or empty string
 */
function ftp_get_special_plan_menu_image($category_key) {
    $settings = get_option('ftp_settings', array());
    if (isset($settings['special_plan_menu_images']) && isset($settings['special_plan_menu_images'][$category_key])) {
        return $settings['special_plan_menu_images'][$category_key];
    }
    return '';
}

/**
 * Get menu items data
 * Updated with actual menu items from 120 Fruit Therapy Place
 */
function ftp_get_menu_items() {
    return array(
        'fruit_salads' => array(
            'title' => 'Fruit Salads',
            'icon' => '🥗',
            'description' => 'Fresh seasonal fruits, carefully selected and hygienically prepared with natural dressings and superfoods',
            'items' => array(
                array('name' => 'Throne Feast Fruit Salad', 'price' => '₦11,000', 'description' => 'Greek Yoghurt, Strawberry, Blueberry, Granola, Almond, Banana, Grapes, Coconut, Peanuts, Cashew Nuts, Honey, Pumpkin Seed, Raisin, Apple (1000ml)'),
                array('name' => 'Premium Fruit Salad', 'price' => '₦9,000', 'description' => 'Strawberry, Blueberry, Granola, Almond, Dates, Banana, Watermelon, Cucumber, Pawpaw, Pineapple, Grapes, Coconut, Groundnuts, Peanuts, Cashew Nuts, Honey, Evaporated Milk, Condensed Milk, Milk Powder (1000ml)'),
                array('name' => 'Mini Premium Fruit Salad', 'price' => '₦5,500', 'description' => 'Strawberry, Blueberry, Granola, Almond, Dates, Banana, Watermelon, Cucumber, Pawpaw, Pineapple, Grapes, Coconut, Groundnuts, Peanuts, Cashew Nuts, Honey, Evaporated Milk, Condensed Milk, Milk Powder (750ml)'),
                array('name' => 'Standard Fruit Salad', 'price' => '₦7,000', 'description' => 'Dates, Banana, Watermelon, Cucumber, Pawpaw, Pineapple, Apple, Grape, Coconut, Groundnut, Peanuts, Cashew nuts, Honey, Condensed Milk, Milk Powder (1000ml)'),
                array('name' => 'Mini Standard Fruit Salad', 'price' => '₦4,500', 'description' => 'Dates, Banana, Watermelon, Cucumber, Pawpaw, Pineapple, Apple, Grape, Coconut, Groundnut, Peanuts, Cashew nuts, Honey, Condensed Milk, Milk Powder (750ml)'),
                array('name' => 'Watermelon Salad', 'price' => '₦3,500', 'description' => 'Watermelon, Milk, Granola (750ml)'),
            )
        ),
        'parfaits' => array(
            'title' => 'Parfaits',
            'icon' => '🍨',
            'description' => 'Layered parfaits with fresh fruits, granola, and creamy Greek yogurt',
            'items' => array(
                array('name' => 'Premium Parfait', 'price' => '₦8,500', 'description' => 'Greek Yoghurt, Blueberry, Granola, Chocolate, Strawberry, Cashew Nuts, Coconuts, Grapes, Banana, Raisin, Almond, Groundnuts, Sprinkles'),
                array('name' => 'Standard Parfait', 'price' => '₦7,000', 'description' => 'Greek Yoghurt, Granola, Chocolate, Cashew Nuts, Coconuts, Grape, Banana, Raisin, Groundnut (550ml)'),
                array('name' => 'Mini Standard Parfait', 'price' => '₦4,000', 'description' => 'Greek Yoghurt, Granola, Cashew Nuts, Coconuts, Grape, Groundnut (300ml)'),
                array('name' => 'Nut Parfait', 'price' => '₦6,500', 'description' => 'Greek Yoghurt, Cashew Nuts, Coconut, Groundnut, Peanut, Almond (550ml)'),
                array('name' => 'Cake Parfait', 'price' => '₦7,500', 'description' => 'Greek Yoghurt, Banana Chocolate Cake, Red Velvet Cake (550ml)'),
                array('name' => 'Fruit Parfait', 'price' => '₦4,000', 'description' => 'Greek Yoghurt, Granola, Banana, Grape, Apple, Groundnut (300ml)'),
            )
        ),
        'tigernut_drinks' => array(
            'title' => 'Tiger Nut Milk',
            'icon' => '🥜',
            'description' => 'Traditional Nigerian tigernut drinks - Lactose and Sugar Free',
            'items' => array(
                array('name' => 'Tiger Nut Milk', 'price' => '₦3,000', 'description' => 'Tiger Nut, Almond, Coconut, Date - Lactose and Sugar Free (500ml)'),
            )
        ),
        'milkshakes' => array(
            'title' => 'Milkshakes',
            'icon' => '🥛',
            'description' => 'Creamy milkshakes made with Greek yogurt and premium ingredients',
            'items' => array(
                array('name' => 'Standard Milk Shake', 'price' => '₦6,500', 'description' => 'Greek Yoghurt, Milk, Whipped cream, Sprinkles, Cherry, Raisin, Dates (550ml)'),
                array('name' => 'Mini Standard Milk Shake', 'price' => '₦3,500', 'description' => 'Greek Yoghurt, Milk, Sprinkles, Raisin (300ml)'),
                array('name' => 'Chocolate Milk Shake', 'price' => '₦7,000', 'description' => 'Chocolate, Greek Yoghurt, Milk, Whipped Cream, Sprinkles, Cherry, Raisin, Dates (550ml)'),
                array('name' => 'Strawberry Milk Shake', 'price' => '₦7,500', 'description' => 'Strawberry, Greek Yoghurt, Milk, Whipped Cream, Sprinkles, Cherry, Raisin, Dates (550ml)'),
            )
        ),
        'fruit_juices' => array(
            'title' => 'Fresh Juices (Cold Pressed)',
            'icon' => '🧃',
            'description' => 'Freshly cold pressed fruit juices with no added sugar',
            'items' => array(
                array('name' => 'Watermelon Fruit Juice', 'price' => '₦3,500', 'description' => 'Watermelon, Lemon - Cold Pressed (500ml)'),
                array('name' => 'Tropical Blend Fruit Juice', 'price' => '₦4,500', 'description' => 'Watermelon, Pineapple, Orange - Cold Pressed (500ml)'),
                array('name' => 'Pine-Ginger Blast Fruit Juice', 'price' => '₦4,500', 'description' => 'Pineapple, Ginger - Cold Pressed (500ml)'),
            )
        ),
        'mocktails' => array(
            'title' => 'Mocktails',
            'icon' => '🍹',
            'description' => 'Refreshing fruit-based mocktails with natural ingredients',
            'items' => array(
                array('name' => 'Mocktail', 'price' => '₦2,500', 'description' => 'Watermelon, Orange, Lemon (500ml)'),
            )
        ),
        'fruit_cakes' => array(
            'title' => 'Fruit Cake',
            'icon' => '🍰',
            'description' => 'Healthy fruit cakes - Margarine, Butter and Sugar Free',
            'items' => array(
                array('name' => 'Fruit Cake', 'price' => '₦5,000', 'description' => 'Banana, Chocolate, Egg, Peanut butter, Oatmeal, Raisin, Cocoa, Cinnamon, Coconut, Cashew Nut, Honey - Margarine, Butter and Sugar Free'),
            )
        ),
        'frappuccinos' => array(
            'title' => 'Frappuccinos',
            'icon' => '☕',
            'description' => 'Creamy blended coffee drinks with premium ingredients',
            'items' => array(
                array('name' => 'Frappuccino', 'price' => '₦6,000', 'description' => 'Milk, Caramel, Coffee, Whipped cream (500ml)'),
                array('name' => 'Chocolate Frappuccino', 'price' => '₦6,500', 'description' => 'Chocolate, Milk, Caramel, Coffee, Whipped cream (500ml)'),
            )
        ),
        'slushies' => array(
            'title' => 'Slushies',
            'icon' => '🧊',
            'description' => 'Refreshing frozen fruit slushies',
            'items' => array(
                array('name' => 'Slushie Watermelon', 'price' => '₦2,500', 'description' => 'Watermelon, Lime, Honey (500ml)'),
                array('name' => 'Slushie Pineapple', 'price' => '₦3,500', 'description' => 'Pineapple, Milk, Honey (500ml)'),
            )
        ),
        'smoothies' => array(
            'title' => 'Smoothies',
            'icon' => '🥤',
            'description' => 'Nutrient-packed smoothies with fresh fruits and natural supplements',
            'items' => array(
                array('name' => 'Premium Smoothie', 'price' => '₦6,500', 'description' => 'Yoghurt, Strawberry, Milk, Granola, Honey, Banana, Cashew Nuts, Groundnuts (500ml)'),
                array('name' => 'Standard Smoothie', 'price' => '₦4,000', 'description' => 'Milk, Watermelon, Honey, Banana, Groundnuts'),
                array('name' => 'Golden Cream Blend', 'price' => '₦2,500', 'description' => 'Banana, Milk (500ml)'),
            )
        ),
    );
}

/**
 * Get special plan menu categories data for landing page preview
 * Categories: Weight Loss, Weight Gain, Libido, Weight Maintenance
 */
function ftp_get_special_plan_categories() {
    return array(
        'weight_loss' => array(
            'title' => 'Weight Loss',
            'icon' => '🍎',
            'description' => 'Carefully crafted fruit salads and smoothies designed to boost metabolism and support healthy weight loss'
        ),
        'weight_gain' => array(
            'title' => 'Weight Gain',
            'icon' => '💪',
            'description' => 'Nutrient-dense fruit combinations with healthy calories to support muscle growth and healthy weight gain'
        ),
        'libido' => array(
            'title' => 'Libido',
            'icon' => '❤️',
            'description' => 'Natural aphrodisiac smoothies to enhance vitality and intimate wellness'
        ),
        'weight_maintenance' => array(
            'title' => 'Weight Maintenance',
            'icon' => '⚖️',
            'description' => 'Balanced fruit salads and smoothies to help maintain your ideal weight naturally'
        ),
    );
}

/**
 * Get special plan menu items data
 * Updated with actual items from user-provided menu
 */
function ftp_get_special_plan_menu_items() {
    return array(
        'weight_loss' => array(
            'title' => 'Weight Loss',
            'icon' => '🍎',
            'description' => 'Carefully crafted fruit salads and smoothies designed to boost metabolism and support healthy weight loss',
            'items' => array(
                array('name' => 'Weight Loss Fruit Salad', 'price' => '₦6,500', 'description' => 'Blueberry, Apple, Cucumber, Pawpaw, Pineapple, Watermelon, Lemon, Chia Seed, Almond, Cashew Nuts, Groundnuts (1000ml)'),
                array('name' => 'Weight Loss Smoothie', 'price' => '₦4,500', 'description' => 'Pineapple, Ginger, Apples, Cucumber, Lemon, Chia seed (475ml)'),
            )
        ),
        'weight_gain' => array(
            'title' => 'Weight Gain',
            'icon' => '💪',
            'description' => 'Nutrient-dense fruit combinations with healthy calories to support muscle growth and healthy weight gain',
            'items' => array(
                array('name' => 'Weight Gain Fruit Salad', 'price' => '₦9,500', 'description' => 'Grapes, Raisin, Dates, Egg, Banana, Coconuts, Pumpkin Seeds, Cashew Nuts, Peanuts, Condensed Milk, Evaporated Milk, Milk Powder, Honey (1000ml)'),
                array('name' => 'Weight Gain Smoothie (Premium)', 'price' => '₦8,500', 'description' => 'Peanut Butter, Banana, Oats, Whey Protein Powder, Sunflower Seed, Dates, Milk (475ml)'),
                array('name' => 'Weight Gain Smoothie (Standard)', 'price' => '₦6,000', 'description' => 'Banana, Oats, Greek Yoghurt, Sunflower Seed, Dates, Milk (475ml)'),
            )
        ),
        'libido' => array(
            'title' => 'Libido',
            'icon' => '❤️',
            'description' => 'Natural aphrodisiac smoothies to enhance vitality and intimate wellness',
            'items' => array(
                array('name' => 'Libido Smoothie', 'price' => '₦6,500', 'description' => 'Maca, Tigernut, Dates, Almond, Coconuts, Watermelon, Banana, Sunflower Seed, Honey, Cinnamon (475ml)'),
            )
        ),
        'weight_maintenance' => array(
            'title' => 'Weight Maintenance',
            'icon' => '⚖️',
            'description' => 'Balanced fruit salads and smoothies to help maintain your ideal weight naturally',
            'items' => array(
                array('name' => 'Weight Maintenance Fruit Salad', 'price' => '₦8,000', 'description' => 'Apple, Pineapple, Watermelon, Cucumber, Grapes, Greek Yogurt, Almonds, Flax seeds, Honey (1000ml)'),
                array('name' => 'Weight Maintenance Smoothie', 'price' => '₦6,500', 'description' => 'Apple, Banana, Pineapple, Oat, Greek Yoghurt, Flax seed, Honey (475ml)'),
            )
        ),
    );
}

/**
 * Get special wellness plans data (for subscription plans with durations)
 * Original wellness programs with duration and pricing
 */
function ftp_get_special_plans() {
    return array(
        'weight_loss' => array(
            'name' => 'Weight Loss',
            'icon' => '🍎',
            'description' => 'Carefully curated low-calorie, high-fiber fruit combinations to boost metabolism and support healthy weight loss.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦25,000'),
                array('duration' => '14 Days', 'price' => '₦45,000'),
                array('duration' => '30 Days', 'price' => '₦80,000'),
            )
        ),
        'weight_gain' => array(
            'name' => 'Weight Gain',
            'icon' => '💪',
            'description' => 'Nutrient-dense, calorie-rich fruit combinations with healthy fats to support muscle growth and healthy weight gain.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦25,000'),
                array('duration' => '14 Days', 'price' => '₦45,000'),
                array('duration' => '30 Days', 'price' => '₦80,000'),
            )
        ),
        'clear_skin' => array(
            'name' => 'Clear Skin + Glow',
            'icon' => '✨',
            'description' => 'Antioxidant-rich fruits packed with vitamins A, C, and E to promote radiant, healthy skin from within.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦20,000'),
                array('duration' => '14 Days', 'price' => '₦35,000'),
                array('duration' => '30 Days', 'price' => '₦60,000'),
            )
        ),
        'libido' => array(
            'name' => 'Libido',
            'icon' => '❤️',
            'description' => 'Natural aphrodisiac fruits to enhance vitality and intimate wellness.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦30,000'),
                array('duration' => '14 Days', 'price' => '₦55,000'),
            )
        ),
        'energy_boost' => array(
            'name' => 'Energy Boost',
            'icon' => '⚡',
            'description' => 'High-energy fruits with natural sugars and B-vitamins to keep you energized throughout the day.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦20,000'),
                array('duration' => '14 Days', 'price' => '₦35,000'),
            )
        ),
        'stress_relief' => array(
            'name' => 'Stress Relief',
            'icon' => '🧘',
            'description' => 'Calming fruits rich in magnesium and potassium to help manage stress and promote relaxation.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦20,000'),
                array('duration' => '14 Days', 'price' => '₦35,000'),
            )
        ),
        'mental_focus' => array(
            'name' => 'Mental Focus',
            'icon' => '🧠',
            'description' => 'Brain-boosting fruits with omega fatty acids and antioxidants to enhance concentration and mental clarity.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦20,000'),
                array('duration' => '14 Days', 'price' => '₦35,000'),
            )
        ),
        'immune_booster' => array(
            'name' => 'Immune Booster',
            'icon' => '🛡️',
            'description' => 'Vitamin C and zinc-rich fruits to strengthen your immune system and protect against illness.',
            'plans' => array(
                array('duration' => '7 Days', 'price' => '₦25,000'),
                array('duration' => '14 Days', 'price' => '₦45,000'),
            )
        ),
        'detox' => array(
            'name' => 'Detoxification',
            'icon' => '🌿',
            'description' => 'Cleansing fruits to support liver function and help eliminate toxins from your body.',
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
