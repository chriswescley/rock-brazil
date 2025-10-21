<?php
/**
 * Page Template
 * Rock Brazil WordPress Theme
 * 
 * @package RockBrazil
 */

get_header();
?>

<style>
    /* Page Specific Styles */
    .page-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 40px;
        position: relative;
        z-index: 2;
    }

    .page-header {
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        padding: 60px 40px;
        text-align: center;
        margin-bottom: 40px;
        box-shadow: 0 0 40px rgba(138, 43, 226, 0.3);
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(138, 43, 226, 0.2) 0%, transparent 70%);
        animation: pulse-glow 3s ease-in-out infinite;
    }

    @keyframes pulse-glow {
        0%, 100% { 
            transform: translate(-50%, -50%) scale(1);
            opacity: 0.5;
        }
        50% { 
            transform: translate(-50%, -50%) scale(1.1);
            opacity: 1;
        }
    }

    .page-header-content {
        position: relative;
        z-index: 2;
    }

    .page-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 3.5rem;
        color: #00ff41;
        text-shadow: 0 0 30px rgba(0, 255, 65, 0.8);
        margin-bottom: 15px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 3px;
    }

    .page-meta {
        color: #8a2be2;
        font-size: 14px;
        margin-top: 15px;
    }

    .page-content-wrapper {
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        padding: 60px;
        box-shadow: 0 0 30px rgba(138, 43, 226, 0.2);
        line-height: 1.8;
    }

    .page-content {
        color: #e0e0e0;
        font-size: 18px;
    }

    .page-content h1,
    .page-content h2,
    .page-content h3,
    .page-content h4,
    .page-content h5,
    .page-content h6 {
        font-family: 'Orbitron', sans-serif;
        color: #00ff41;
        text-shadow: 0 0 10px rgba(0, 255, 65, 0.6);
        margin-top: 40px;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .page-content h2 {
        font-size: 2rem;
        border-bottom: 2px solid #8a2be2;
        padding-bottom: 15px;
    }

    .page-content h3 {
        font-size: 1.5rem;
        color: #8a2be2;
    }

    .page-content p {
        margin-bottom: 25px;
        line-height: 1.9;
    }

    .page-content a {
        color: #00ff41;
        text-decoration: none;
        border-bottom: 1px solid transparent;
        transition: all 0.3s ease;
    }

    .page-content a:hover {
        border-bottom-color: #00ff41;
        text-shadow: 0 0 10px rgba(0, 255, 65, 0.6);
    }

    .page-content ul,
    .page-content ol {
        margin: 25px 0;
        padding-left: 40px;
    }

    .page-content li {
        margin-bottom: 15px;
        line-height: 1.8;
    }

    .page-content img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        border: 2px solid #8a2be2;
        margin: 30px 0;
        box-shadow: 0 0 20px rgba(138, 43, 226, 0.3);
    }

    .page-content blockquote {
        background: rgba(138, 43, 226, 0.1);
        border-left: 4px solid #8a2be2;
        padding: 25px 30px;
        margin: 30px 0;
        border-radius: 8px;
        font-style: italic;
        color: #b0b0b0;
    }

    .page-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 30px 0;
    }

    .page-content table th,
    .page-content table td {
        padding: 15px;
        border: 1px solid #8a2be2;
        text-align: left;
    }

    .page-content table th {
        background: rgba(138, 43, 226, 0.3);
        color: #00ff41;
        font-weight: bold;
    }

    .page-content table tr:hover {
        background: rgba(138, 43, 226, 0.1);
    }

    .page-content code {
        background: rgba(0, 0, 0, 0.5);
        border: 1px solid #8a2be2;
        padding: 2px 6px;
        border-radius: 4px;
        font-family: 'Courier New', monospace;
        color: #00ff41;
        font-size: 0.9em;
    }

    .page-content pre {
        background: rgba(0, 0, 0, 0.5);
        border: 2px solid #8a2be2;
        padding: 20px;
        border-radius: 8px;
        overflow-x: auto;
        margin: 30px 0;
    }

    .page-content pre code {
        background: none;
        border: none;
        padding: 0;
    }

    .page-content hr {
        border: none;
        border-top: 2px solid #8a2be2;
        margin: 40px 0;
    }

    .page-content strong,
    .page-content b {
        color: #00ff41;
        font-weight: 700;
    }

    /* Breadcrumbs */
    .page-breadcrumbs {
        max-width: 1200px;
        margin: 20px auto;
        padding: 0 40px;
        font-size: 14px;
        color: #8a2be2;
    }

    .page-breadcrumbs a {
        color: #00ff41;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .page-breadcrumbs a:hover {
        text-shadow: 0 0 10px rgba(0, 255, 65, 0.6);
    }

    /* Comments Section (if enabled) */
    .page-comments {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 40px;
    }

    /* Back to Top visible on pages */
    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #8a2be2 0%, #6a1bb2 100%);
        border: 2px solid #00ff41;
        border-radius: 50%;
        color: #00ff41;
        font-size: 24px;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 999;
        box-shadow: 0 0 20px rgba(138, 43, 226, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .back-to-top.visible {
        opacity: 1;
        visibility: visible;
    }

    .back-to-top:hover {
        transform: scale(1.1) translateY(-5px);
        box-shadow: 0 0 30px rgba(0, 255, 65, 0.6);
        background: linear-gradient(135deg, #00ff41 0%, #00cc33 100%);
        color: #0a0e27;
    }

    @media (max-width: 768px) {
        .page-container {
            padding: 0 20px;
        }

        .page-header {
            padding: 40px 20px;
        }

        .page-title {
            font-size: 2.5rem;
        }

        .page-content-wrapper {
            padding: 30px 20px;
        }

        .page-content {
            font-size: 16px;
        }

        .page-breadcrumbs {
            padding: 0 20px;
        }
    }
</style>

<!-- Breadcrumbs -->
<div class="page-breadcrumbs">
    <a href="<?php echo esc_url(home_url('/')); ?>">🏠 Home</a> / <?php the_title(); ?>
</div>

<!-- Page Container -->
<div class="page-container">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        
        <!-- Page Header -->
        <header class="page-header">
            <div class="page-header-content">
                <h1 class="page-title"><?php the_title(); ?></h1>
                
                <?php if (get_the_modified_date() !== get_the_date()) : ?>
                    <div class="page-meta">
                        📅 Publicado em <?php echo get_the_date('d/m/Y'); ?> | 
                        ✏️ Atualizado em <?php echo get_the_modified_date('d/m/Y'); ?>
                    </div>
                <?php else : ?>
                    <div class="page-meta">
                        📅 Publicado em <?php echo get_the_date('d/m/Y'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <!-- Page Content -->
        <article id="post-<?php the_ID(); ?>" <?php post_class('page-content-wrapper'); ?>>
            <div class="page-content">
                <?php
                // Featured Image (if exists)
                if (has_post_thumbnail()) :
                    the_post_thumbnail('large', array('class' => 'page-featured-image'));
                endif;

                // Page Content
                the_content();

                // Page Links (for multi-page content)
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Páginas:', 'rock-brazil'),
                    'after'  => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                ));
                ?>
            </div>
        </article>

        <?php
        // Comments (if enabled for pages)
        if (comments_open() || get_comments_number()) :
            ?>
            <div class="page-comments">
                <?php comments_template(); ?>
            </div>
            <?php
        endif;
        ?>

    <?php
    endwhile;
    ?>
</div>

<!-- Back to Top Button -->
<button id="page-back-to-top" class="back-to-top" aria-label="Voltar ao topo">
    <span>↑</span>
</button>

<script>
(function() {
    // Back to Top Button
    const backToTopBtn = document.getElementById('page-back-to-top');
    
    if (backToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });

        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('.page-content a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add target="_blank" to external links
    document.querySelectorAll('.page-content a[href^="http"]').forEach(link => {
        if (!link.href.includes(window.location.hostname)) {
            link.setAttribute('target', '_blank');
            link.setAttribute('rel', 'noopener noreferrer');
        }
    });
})();
</script>

<?php get_footer(); ?>