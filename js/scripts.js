/**
 * Rock Brazil Theme - Main JavaScript
 * 
 * @package RockBrazil
 * @version 1.0.0
 */

(function($) {
    'use strict';

    // ==========================================
    // 1. MATRIX BACKGROUND EFFECT
    // ==========================================
    function initMatrixBackground() {
        const canvas = document.getElementById('matrix-bg');
        if (!canvas) return;

        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const chars = '01アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲン🎸🤘⚡💀';
        const fontSize = 14;
        const columns = Math.floor(canvas.width / fontSize);
        const drops = Array(columns).fill(1);

        function drawMatrix() {
            ctx.fillStyle = 'rgba(10, 14, 39, 0.05)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            ctx.fillStyle = '#8a2be2';
            ctx.font = fontSize + 'px monospace';

            for (let i = 0; i < drops.length; i++) {
                const text = chars[Math.floor(Math.random() * chars.length)];
                ctx.fillText(text, i * fontSize, drops[i] * fontSize);

                if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
                    drops[i] = 0;
                }
                drops[i]++;
            }
        }

        const matrixInterval = setInterval(drawMatrix, 50);

        // Resize handler
        window.addEventListener('resize', function() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });

        // Cleanup on page unload
        window.addEventListener('beforeunload', function() {
            clearInterval(matrixInterval);
        });
    }

    // ==========================================
    // 2. MOBILE MENU
    // ==========================================
    function initMobileMenu() {
        const mobileToggle = $('.mobile-menu-toggle, .menu-toggle');
        const mobileOverlay = $('.mobile-menu-overlay');
        const mobileClose = $('.mobile-menu-close');

        mobileToggle.on('click', function(e) {
            e.preventDefault();
            mobileOverlay.addClass('active');
            $('body').css('overflow', 'hidden');
        });

        mobileClose.on('click', function() {
            mobileOverlay.removeClass('active');
            $('body').css('overflow', '');
        });

        // Close on overlay click
        mobileOverlay.on('click', function(e) {
            if ($(e.target).is('.mobile-menu-overlay')) {
                $(this).removeClass('active');
                $('body').css('overflow', '');
            }
        });

        // Close on ESC key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && mobileOverlay.hasClass('active')) {
                mobileOverlay.removeClass('active');
                $('body').css('overflow', '');
            }
        });
    }

    // ==========================================
    // 3. BACK TO TOP BUTTON
    // ==========================================
    function initBackToTop() {
        const backToTopBtn = $('#back-to-top');
        
        if (backToTopBtn.length) {
            $(window).on('scroll', function() {
                if ($(window).scrollTop() > 300) {
                    backToTopBtn.addClass('visible');
                } else {
                    backToTopBtn.removeClass('visible');
                }
            });

            backToTopBtn.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 800, 'swing');
            });
        }
    }

    // ==========================================
    // 4. SMOOTH SCROLL FOR ANCHOR LINKS
    // ==========================================
    function initSmoothScroll() {
        $('a[href^="#"]').not('[href="#"]').on('click', function(e) {
            const target = $(this.hash);
            
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800, 'swing');
            }
        });
    }

    // ==========================================
    // 5. SLIDER FUNCTIONALITY
    // ==========================================
    function initSlider() {
        let currentSlide = 0;
        const slides = $('.slide');
        const dots = $('.slider-dot');
        const totalSlides = slides.length;

        if (totalSlides === 0) return;

        function showSlide(index) {
            slides.removeClass('active');
            dots.removeClass('active');
            
            slides.eq(index).addClass('active');
            dots.eq(index).addClass('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        // Auto advance
        const sliderInterval = setInterval(nextSlide, 5000);

        // Dot click handlers
        dots.on('click', function() {
            const slideIndex = $(this).data('slide');
            currentSlide = slideIndex;
            showSlide(currentSlide);
            
            // Reset interval
            clearInterval(sliderInterval);
            setInterval(nextSlide, 5000);
        });

        // Keyboard navigation
        $(document).on('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                showSlide(currentSlide);
            } else if (e.key === 'ArrowRight') {
                nextSlide();
            }
        });
    }

    // ==========================================
    // 6. LAZY LOAD IMAGES
    // ==========================================
    function initLazyLoad() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        const src = img.getAttribute('data-src');
                        
                        if (src) {
                            img.src = src;
                            img.removeAttribute('data-src');
                            img.classList.add('loaded');
                        }
                        
                        observer.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    // ==========================================
    // 7. SCROLL ANIMATIONS
    // ==========================================
    function initScrollAnimations() {
        if ('IntersectionObserver' in window) {
            const animationObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            // Elements to animate
            const elementsToAnimate = document.querySelectorAll(
                '.news-card, .blog-post-item, .timeline-item, .sidebar-widget'
            );

            elementsToAnimate.forEach(function(element) {
                element.style.opacity = '0';
                element.style.transform = 'translateY(30px)';
                element.style.transition = 'all 0.6s ease';
                animationObserver.observe(element);
            });
        }
    }

    // ==========================================
    // 8. AJAX LOAD MORE POSTS
    // ==========================================
    function initLoadMorePosts() {
        let page = 2;
        let loading = false;

        $('.load-more-btn').on('click', function(e) {
            e.preventDefault();
            
            if (loading) return;
            
            const button = $(this);
            const originalText = button.text();
            
            loading = true;
            button.text('⚡ Carregando... ⚡').css('opacity', '0.6');

            $.ajax({
                url: rockBrazilVars.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'load_more_posts',
                    page: page,
                    nonce: rockBrazilVars.nonce
                },
                success: function(response) {
                    if (response.success && response.data.posts.length > 0) {
                        // Append posts (você pode customizar o HTML aqui)
                        response.data.posts.forEach(function(post) {
                            // Adicione seu HTML de card aqui
                            console.log('Post carregado:', post.title);
                        });

                        page++;

                        if (!response.data.has_more) {
                            button.text('🎸 Não há mais posts 🎸').prop('disabled', true);
                        } else {
                            button.text(originalText).css('opacity', '1');
                        }
                    }
                    loading = false;
                },
                error: function() {
                    button.text('❌ Erro ao carregar').css('opacity', '1');
                    loading = false;
                }
            });
        });
    }

    // ==========================================
    // 9. SEARCH ENHANCEMENT
    // ==========================================
    function initSearchEnhancement() {
        const searchInput = $('.search-field');
        
        searchInput.on('focus', function() {
            $(this).parent().addClass('search-focused');
        });

        searchInput.on('blur', function() {
            $(this).parent().removeClass('search-focused');
        });

        // Auto-focus on search shortcut (Ctrl/Cmd + K)
        $(document).on('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                searchInput.first().focus();
            }
        });
    }

    // ==========================================
    // 10. COMMENTS ENHANCEMENTS
    // ==========================================
    function initCommentsEnhancements() {
        // Add reply button animation
        $('.comment-reply-link').on('click', function() {
            $(this).addClass('clicked');
            setTimeout(() => {
                $(this).removeClass('clicked');
            }, 300);
        });

        // Character counter for comment textarea
        const commentTextarea = $('#comment');
        if (commentTextarea.length) {
            const maxLength = 1000;
            const counter = $('<div class="comment-counter"></div>');
            commentTextarea.after(counter);

            commentTextarea.on('input', function() {
                const length = $(this).val().length;
                counter.text(length + '/' + maxLength + ' caracteres');
                
                if (length > maxLength * 0.9) {
                    counter.css('color', '#ff4444');
                } else {
                    counter.css('color', '#8a2be2');
                }
            });
        }
    }

    // ==========================================
    // 11. STICKY HEADER
    // ==========================================
    function initStickyHeader() {
        let lastScroll = 0;
        const header = $('.site-header');
        
        $(window).on('scroll', function() {
            const currentScroll = $(window).scrollTop();
            
            if (currentScroll > 100) {
                header.addClass('scrolled');
                
                if (currentScroll > lastScroll) {
                    // Scrolling down
                    header.addClass('hide');
                } else {
                    // Scrolling up
                    header.removeClass('hide');
                }
            } else {
                header.removeClass('scrolled hide');
            }
            
            lastScroll = currentScroll;
        });
    }

    // ==========================================
    // 12. SHARE BUTTONS
    // ==========================================
    function initShareButtons() {
        $('.share-btn').on('click', function(e) {
            const href = $(this).attr('href');
            
            // If it's a social share link, open in popup
            if (href && (href.includes('facebook.com') || 
                        href.includes('twitter.com') || 
                        href.includes('linkedin.com'))) {
                e.preventDefault();
                window.open(href, 'share', 'width=600,height=400');
            }
        });
    }

    // ==========================================
    // 13. COOKIE CONSENT (Optional)
    // ==========================================
    function initCookieConsent() {
        // Implementação básica de cookie consent
        if (!localStorage.getItem('cookieConsent')) {
            // Você pode adicionar um banner de cookies aqui
            console.log('Cookie consent não aceito ainda');
        }
    }

    // ==========================================
    // 14. PERFORMANCE MONITORING
    // ==========================================
    function initPerformanceMonitoring() {
        if (window.performance && window.console) {
            const perfData = window.performance.timing;
            const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
            
            console.log('%c⚡ Performance Stats', 'color: #00ff41; font-size: 16px; font-weight: bold;');
            console.log('Page Load Time: ' + (pageLoadTime / 1000).toFixed(2) + 's');
        }
    }

    // ==========================================
    // 15. EASTER EGGS & CONSOLE ART
    // ==========================================
    function initEasterEggs() {
        console.log('%c🤘 ROCK BRAZIL 🤘', 'font-size: 30px; color: #00ff41; text-shadow: 0 0 10px rgba(0,255,65,0.8); font-weight: bold;');
        console.log('%cSalve, desenvolvedor rockeiro! 🎸', 'font-size: 16px; color: #8a2be2;');
        console.log('%cGostou do código? Contribua no GitHub!', 'font-size: 12px; color: #00ff41;');
        console.log('%cTeclas de atalho:\n• Ctrl/Cmd + K = Busca\n• Esc = Fechar menu mobile\n• ← → = Navegar slider', 'font-size: 11px; color: #b0b0b0;');

        // Konami Code Easter Egg (↑ ↑ ↓ ↓ ← → ← → B A)
        let konamiCode = [];
        const konamiSequence = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];
        
        $(document).on('keydown', function(e) {
            konamiCode.push(e.keyCode);
            konamiCode = konamiCode.slice(-10);
            
            if (konamiCode.toString() === konamiSequence.toString()) {
                console.log('%c🎸 EASTER EGG ATIVADO! ROCK ON! 🤘', 'font-size: 20px; color: #ff00ff; animation: blink 1s infinite;');
                $('body').addClass('konami-activated');
                // Adicione algum efeito visual aqui
            }
        });
    }

    // ==========================================
    // INITIALIZATION
    // ==========================================
    $(document).ready(function() {
        console.log('%c🎸 Rock Brazil Theme Loading...', 'color: #8a2be2; font-size: 14px;');

        // Initialize all features
        initMatrixBackground();
        initMobileMenu();
        initBackToTop();
        initSmoothScroll();
        initSlider();
        initLazyLoad();
        initScrollAnimations();
        initLoadMorePosts();
        initSearchEnhancement();
        initCommentsEnhancements();
        initStickyHeader();
        initShareButtons();
        initCookieConsent();
        initPerformanceMonitoring();
        initEasterEggs();

        console.log('%c✅ Rock Brazil Theme Loaded!', 'color: #00ff41; font-size: 14px; font-weight: bold;');
    });

    // Window load event
    $(window).on('load', function() {
        // Remove loading class if exists
        $('body').removeClass('loading');
        
        // Trigger custom event
        $(document).trigger('rockBrazilLoaded');
    });

})(jQuery);

/**
 * Vanilla JS fallbacks (if jQuery is not available)
 */
if (typeof jQuery === 'undefined') {
    console.warn('jQuery not loaded. Some features may not work properly.');
    
    // Basic matrix effect fallback
    window.addEventListener('DOMContentLoaded', function() {
        const canvas = document.getElementById('matrix-bg');
        if (canvas) {
            // Simplified matrix effect without jQuery
            console.log('Matrix effect initialized (vanilla JS fallback)');
        }
    });
}