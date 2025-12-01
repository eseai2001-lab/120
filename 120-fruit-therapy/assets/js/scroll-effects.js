/**
 * 120 Fruit Therapy - Scroll Effects Scripts
 */

(function() {
    'use strict';

    // Variables for scroll handling
    var lastScrollTop = 0;
    var ticking = false;
    var header = null;
    var heroVideo = null;

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        initElements();
        initMobileMenu();
        initSmoothScroll();
        initHeaderScrollEffect();
        initHeroVideoEffect();
        initMenuNavigation();
        initBackToTop();
    });

    /**
     * Initialize element references
     */
    function initElements() {
        header = document.getElementById('ftp-header');
        heroVideo = document.querySelector('.ftp-hero-video-container');
    }

    /**
     * Initialize mobile menu toggle
     */
    function initMobileMenu() {
        var toggle = document.querySelector('.ftp-mobile-menu-toggle');
        var nav = document.querySelector('.ftp-nav');
        
        if (!toggle || !nav) return;

        toggle.addEventListener('click', function() {
            nav.classList.toggle('active');
            this.classList.toggle('active');
            document.body.classList.toggle('ftp-menu-open');
        });

        // Close menu when clicking a link
        var navLinks = nav.querySelectorAll('.ftp-nav-link');
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                nav.classList.remove('active');
                toggle.classList.remove('active');
                document.body.classList.remove('ftp-menu-open');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!nav.contains(e.target) && !toggle.contains(e.target) && nav.classList.contains('active')) {
                nav.classList.remove('active');
                toggle.classList.remove('active');
                document.body.classList.remove('ftp-menu-open');
            }
        });
    }

    /**
     * Initialize smooth scrolling for anchor links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                var href = this.getAttribute('href');
                if (href === '#') return;
                
                var target = document.querySelector(href);
                if (!target) return;
                
                e.preventDefault();
                
                var headerHeight = header ? header.offsetHeight : 0;
                var targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            });
        });
    }

    /**
     * Initialize header scroll effect (hide/show on scroll)
     */
    function initHeaderScrollEffect() {
        if (!header) return;

        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    handleHeaderScroll();
                    ticking = false;
                });
                ticking = true;
            }
        });
    }

    /**
     * Handle header visibility on scroll
     */
    function handleHeaderScroll() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Add scrolled class for styling
        if (scrollTop > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        // Hide/show header based on scroll direction
        if (scrollTop > lastScrollTop && scrollTop > 200) {
            // Scrolling down
            header.classList.add('hidden');
            header.classList.remove('visible');
        } else {
            // Scrolling up
            header.classList.remove('hidden');
            header.classList.add('visible');
        }
        
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    }

    /**
     * Initialize hero video fade effect on scroll
     */
    function initHeroVideoEffect() {
        if (!heroVideo) return;

        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    handleHeroVideoScroll();
                    ticking = false;
                });
                ticking = true;
            }
        });
    }

    /**
     * Handle hero video fade on scroll
     */
    function handleHeroVideoScroll() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        var heroHeight = document.querySelector('.ftp-hero') ? document.querySelector('.ftp-hero').offsetHeight : window.innerHeight;
        
        // Calculate fade based on scroll position
        var fadeStart = heroHeight * 0.3;
        var fadeEnd = heroHeight * 0.8;
        
        if (scrollTop <= fadeStart) {
            heroVideo.style.opacity = '1';
            heroVideo.style.transform = 'scale(1)';
        } else if (scrollTop >= fadeEnd) {
            heroVideo.style.opacity = '0.3';
            heroVideo.style.transform = 'scale(1.05)';
        } else {
            var progress = (scrollTop - fadeStart) / (fadeEnd - fadeStart);
            var opacity = 1 - (progress * 0.7);
            var scale = 1 + (progress * 0.05);
            heroVideo.style.opacity = opacity;
            heroVideo.style.transform = 'scale(' + scale + ')';
        }
    }

    /**
     * Initialize menu category navigation
     */
    function initMenuNavigation() {
        var menuNavItems = document.querySelectorAll('.ftp-menu-nav-item');
        var menuCategories = document.querySelectorAll('.ftp-menu-category');
        
        if (!menuNavItems.length || !menuCategories.length) return;

        // Highlight active category on scroll
        window.addEventListener('scroll', function() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            var headerHeight = header ? header.offsetHeight : 0;
            
            menuCategories.forEach(function(category, index) {
                var rect = category.getBoundingClientRect();
                var offsetTop = rect.top + scrollTop - headerHeight - 100;
                
                if (scrollTop >= offsetTop && scrollTop < offsetTop + category.offsetHeight) {
                    menuNavItems.forEach(function(item) {
                        item.classList.remove('active');
                    });
                    if (menuNavItems[index]) {
                        menuNavItems[index].classList.add('active');
                    }
                }
            });
        });
    }

    /**
     * Initialize back to top button
     */
    function initBackToTop() {
        var backToTop = document.querySelector('.ftp-menu-back-top');
        
        if (!backToTop) return;

        window.addEventListener('scroll', function() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 500) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        backToTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    /**
     * Parallax effect for background elements
     */
    function initParallax() {
        var parallaxElements = document.querySelectorAll('.ftp-parallax');
        
        if (!parallaxElements.length) return;

        window.addEventListener('scroll', function() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            parallaxElements.forEach(function(element) {
                var speed = element.getAttribute('data-speed') || 0.5;
                var yPos = -(scrollTop * speed);
                element.style.transform = 'translate3d(0, ' + yPos + 'px, 0)';
            });
        });
    }

})();
