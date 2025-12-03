# 120 Fruit Therapy Landing Page Plugin

A luxury WordPress landing page plugin for **120 Fruit Therapy Place** - a wellness-focused fruit restaurant offering therapeutic fruit-based offerings.

## Features

- 🎨 Elegant dark theme with red accents
- 📱 Fully responsive design (desktop, tablet, mobile)
- 🎬 Hero section with video background and scroll effects
- 🛒 WhatsApp integration for easy ordering
- ✨ Smooth animations and scroll effects
- 📊 Animated statistics counters
- 🗺️ Google Maps integration
- 🍎 Floating fruit animations in mission section
- 📍 Floating support button

## Installation

1. Download the plugin folder `120-fruit-therapy`
2. Upload to your WordPress `wp-content/plugins/` directory
3. Activate the plugin through the WordPress admin panel
4. Use the shortcodes to display content on your pages

## Shortcodes

### Main Shortcodes

| Shortcode | Description |
|-----------|-------------|
| `[ftp_landing_page]` | Displays the complete landing page with all sections |
| `[ftp_menu_full]` | Displays the full menu page with all items |
| `[ftp_special_plans_full]` | Displays the full special plans page |

### Section Shortcodes

| Shortcode | Description |
|-----------|-------------|
| `[ftp_header]` | Navigation header with logo |
| `[ftp_hero]` | Hero section with video background |
| `[ftp_menu_section]` | Menu preview section |
| `[ftp_special_plans_section]` | Special plans preview section |
| `[ftp_gift_packages]` | Gift packages section |
| `[ftp_wellness_events]` | Wellness events section |
| `[ftp_special_offers]` | Special offers section |
| `[ftp_mission]` | Our mission section with floating fruits |
| `[ftp_stats]` | Statistics counter section |
| `[ftp_contact]` | Contact information section |
| `[ftp_map]` | Google Maps section |
| `[ftp_footer]` | Footer with links and contact info |

## Usage

### Full Landing Page

Create a new page in WordPress and add the shortcode:

```
[ftp_landing_page]
```

This will display all sections of the landing page in order.

### Menu Page

Create a separate page for the full menu:

```
[ftp_menu_full]
```

### Special Plans Page

Create a page for detailed wellness plans:

```
[ftp_special_plans_full]
```

### Individual Sections

You can also use individual section shortcodes to build custom pages:

```
[ftp_header]
[ftp_hero]
[ftp_menu_section]
[ftp_contact]
[ftp_footer]
```

## Color Palette

| Color | Hex Code | CSS Variable |
|-------|----------|--------------|
| Primary Red | `#FF0000` | `--ftp-primary-red` |
| White | `#FFFFFF` | `--ftp-white` |
| Black | `#000000` | `--ftp-black` |
| Deep Burgundy | `#1B0000` | `--ftp-dark-burgundy` |

## File Structure

```
120-fruit-therapy/
├── 120-fruit-therapy.php          # Main plugin file
├── README.md                       # This file
├── includes/
│   ├── shortcodes.php             # All shortcode definitions
│   ├── enqueue.php                # Script and style enqueueing
│   └── helpers.php                # Helper functions and data
├── assets/
│   ├── css/
│   │   ├── landing-page.css       # Main landing page styles
│   │   ├── menu-page.css          # Menu page specific styles
│   │   ├── special-plans-page.css # Special plans page styles
│   │   └── animations.css         # Animation styles
│   ├── js/
│   │   ├── animations.js          # Animation scripts
│   │   ├── scroll-effects.js      # Scroll behavior scripts
│   │   └── whatsapp.js            # WhatsApp integration
│   └── images/                    # Image assets (placeholder)
└── templates/
    ├── landing-page.php           # Landing page template
    ├── menu-page.php              # Full menu page template
    └── special-plans-page.php     # Special plans page template
```

## WhatsApp Numbers

- **Orders & Deliveries:** 07075887085
- **Special Plan Support:** 09042146929

## Customization

### CSS Variables

All colors can be customized using CSS variables. Add custom CSS to override:

```css
:root {
    --ftp-primary-red: #FF0000;
    --ftp-white: #FFFFFF;
    --ftp-black: #000000;
    --ftp-dark-burgundy: #1B0000;
}
```

### Scoped Styles

All CSS is scoped to the `.ftp-wrapper` class to prevent affecting other WordPress pages.

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome for Android)

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher

## Support

For support or custom development, contact:
- Phone: 07075887085
- WhatsApp: 09042146929
- Location: Marlima Building, University of Nigeria Nsukka

## License

GPL v2 or later

## Credits

- Design: 120 Fruit Therapy Place
- Development: Custom WordPress Plugin

---

© 2024 120 Fruit Therapy Place. All rights reserved.
