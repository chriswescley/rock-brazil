<?php
/**
 * Footer Template
 * Rock Brazil WordPress Theme
 * 
 * @package RockBrazil
 */
?>

</div><!-- #content -->

<!-- Footer -->
<footer id="colophon" class="site-footer">
    <div class="footer-container">
        <div class="footer-grid">
            <!-- About -->
            <div class="footer-about">
                <h3 class="footer-title">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        🤘 <?php bloginfo('name'); ?>
                    <?php endif; ?>
                </h3>
                
                <p class="footer-description">
                    <?php
                    $footer_text = get_theme_mod('rock_brazil_footer_about', 'Aqui a gente fala de tudo que move o mundo da tecnologia, dos games e da cultura pop. Notícias, reviews e matérias especiais com a dose certa de opinião e bom humor. De lançamentos a clássicos, cobrimos o que realmente importa no universo geek. Com informação de qualidade e aquele toque de paixão que só quem vive isso entende.');
                    echo esc_html($footer_text);
                    ?>
                </p>
                
                <!-- Social Links -->
                <div class="social-links">
                    <?php
                    $social_links = array(
                        'facebook' => array('icon' => '📘', 'label' => 'Facebook'),
                        'instagram' => array('icon' => '📷', 'label' => 'Instagram'),
                        'twitter' => array('icon' => '🐦', 'label' => 'Twitter'),
                        'youtube' => array('icon' => '▶️', 'label' => 'YouTube'),
                        'tiktok' => array('icon' => '🎵', 'label' => 'TikTok'),
                        'discord' => array('icon' => '💬', 'label' => 'Discord'),
                    );

                    foreach ($social_links as $network => $data) :
                        $url = get_theme_mod('rock_brazil_' . $network . '_url', '');
                        if ($url) :
                            ?>
                            <a href="<?php echo esc_url($url); ?>" 
                               class="social-icon" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               aria-label="<?php echo esc_attr($data['label']); ?>">
                                <?php echo $data['icon']; ?>
                            </a>
                            <?php
                        endif;
                    endforeach;
                    ?>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-links">
                <h4 class="footer-links-title">Links Rápidos</h4>
                <ul class="footer-menu">
                    <li><a href="<?php echo esc_url(home_url('/sobre-nos')); ?>">→ Sobre Nós</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contato')); ?>">→ Contato</a></li>
                    <li><a href="<?php echo esc_url(home_url('/termos-de-uso')); ?>">→ Termos de Uso</a></li>
                    <li><a href="<?php echo esc_url(home_url('/politica-de-privacidade')); ?>">→ Política de Privacidade</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="footer-links">
                <h4 class="footer-links-title">Categorias</h4>
                <ul class="footer-menu">
                    <?php
                    $categories = get_categories(array('number' => 5));
                    foreach ($categories as $category) :
                        echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">→ ' . esc_html($category->name) . '</a></li>';
                    endforeach;
                    ?>
                </ul>
            </div>

            <!-- Newsletter-->
            <div class="footer-links">
                <h4 class="footer-links-title">Newsletter</h4>
                <div class="newsletter-form">
                    <p>Receba as últimas notícias do rock direto no seu email!</p>
                    <form class="footer-newsletter-form" action="#" method="post">
                        <input type="email" 
                               name="newsletter_email" 
                               placeholder="seu@email.com" 
                               required 
                               class="newsletter-input">
                        <button type="submit" class="newsletter-submit">
                            ⚡ Assinar
                        </button>
                    </form>
                </div>
                <ul class="footer-menu">
                    <li><a href="<?php echo esc_url(home_url('/agenda-shows')); ?>">→ Agenda de Shows</a></li>
                    <li><a href="<?php echo esc_url(home_url('/playlists')); ?>">→ Spotify Playlists</a></li>
                    <li><a href="<?php echo esc_url(home_url('/podcast')); ?>">→ Podcast</a></li>
                    <li><a href="<?php echo esc_url(home_url('/loja')); ?>">→ Loja Oficial</a></li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-copyright">
                <p>
                    🎸 © <?php echo date('Y'); ?> 
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                    </a> 
                    - Todos os direitos reservados
                </p>
                <p class="footer-credits">
                    Desenvolvido com 🤘 e muito ☕ por <a href="htts://chriswescley.site">Chris Wescley</a> 
                </p>
            </div>

            <!-- System Status -->
            <div class="footer-system-status">
                <p>
                    Sistema Status: <span class="status-indicator online">● ONLINE</span> | 
                    Server: <span class="server-location">BRAZIL-<?php echo strtoupper(substr(get_locale(), 0, 2)); ?>-01</span> | 
                    Version: <span class="version-number">v4.20</span>
                </p>
            </div>

            <!-- Back to Top -->
            <button id="back-to-top" class="back-to-top" aria-label="Voltar ao topo">
                <span class="arrow-up">↑</span>
            </button>
        </div>
    </div><!-- .footer-container -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

<style>
    /* Footer Styles */
    .site-footer {
        position: relative;
        z-index: 2;
        background: rgba(13, 17, 38, 0.95);
        border-top: 2px solid #8a2be2;
        padding: 60px 40px 30px;
        margin-top: 100px;
    }

    .footer-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 50px;
        margin-bottom: 40px;
    }

    .footer-about h3,
    .footer-links h4,
    .footer-title,
    .footer-links-title {
        font-family: 'Orbitron', sans-serif;
        color: #00ff41;
        text-shadow: 0 0 10px rgba(0, 255, 65, 0.6);
        margin-bottom: 20px;
        font-size: 20px;
    }

    .footer-description {
        color: #b0b0b0;
        line-height: 1.8;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .social-links {
        display: flex;
        gap: 15px;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    .social-icon {
        width: 45px;
        height: 45px;
        background: rgba(138, 43, 226, 0.2);
        border: 2px solid #8a2be2;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: #00ff41;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
    }

    .social-icon:hover {
        background: #8a2be2;
        transform: scale(1.2) rotate(360deg);
        box-shadow: 0 0 20px rgba(138, 43, 226, 0.6);
    }

    .footer-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-menu li {
        margin-bottom: 12px;
    }

    .footer-menu a {
        color: #b0b0b0;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .footer-menu a:hover {
        color: #00ff41;
        padding-left: 5px;
    }

    .newsletter-form p {
        color: #b0b0b0;
        font-size: 14px;
        margin-bottom: 15px;
        line-height: 1.6;
    }

    .footer-newsletter-form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 20px;
    }

    .newsletter-input {
        background: rgba(0, 0, 0, 0.5);
        border: 1px solid #8a2be2;
        color: #00ff41;
        padding: 12px 15px;
        border-radius: 5px;
        font-family: 'Orbitron', sans-serif;
        font-size: 14px;
        width: 100%;
        transition: all 0.3s ease;
    }

    .newsletter-input:focus {
        outline: none;
        border-color: #00ff41;
        box-shadow: 0 0 15px rgba(0, 255, 65, 0.3);
    }

    .newsletter-input::placeholder {
        color: rgba(176, 176, 176, 0.5);
    }

    .newsletter-submit {
        background: linear-gradient(135deg, #8a2be2 0%, #6a1bb2 100%);
        border: 2px solid #00ff41;
        color: #00ff41;
        padding: 12px 20px;
        border-radius: 5px;
        font-family: 'Orbitron', sans-serif;
        font-weight: bold;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
    }

    .newsletter-submit:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(0, 255, 65, 0.6);
        background: linear-gradient(135deg, #00ff41 0%, #00cc33 100%);
        color: #0a0e27;
    }

    .footer-bottom {
        text-align: center;
        padding-top: 30px;
        border-top: 1px solid rgba(138, 43, 226, 0.3);
        color: #8a2be2;
        font-size: 14px;
        position: relative;
    }

    .footer-copyright p {
        margin: 5px 0;
    }

    .footer-copyright a {
        color: #00ff41;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .footer-copyright a:hover {
        text-shadow: 0 0 10px rgba(0, 255, 65, 0.8);
    }

    .footer-credits {
        font-size: 12px;
        opacity: 0.8;
    }

    .footer-system-status {
        margin-top: 15px;
        font-size: 12px;
        font-family: 'Courier New', monospace;
        opacity: 0.7;
    }

    .status-indicator {
        color: #00ff41;
        font-weight: bold;
        text-shadow: 0 0 5px rgba(0, 255, 65, 0.6);
    }

    .server-location {
        color: #8a2be2;
        font-weight: bold;
    }

    .version-number {
        color: #00ff41;
        font-weight: bold;
    }

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

    .arrow-up {
        display: block;
        animation: bounce-up 2s infinite;
    }

    @keyframes bounce-up {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    @media (max-width: 1200px) {
        .footer-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        .site-footer {
            padding: 40px 20px 20px;
        }

        .footer-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .social-links {
            justify-content: center;
        }

        .footer-bottom {
            font-size: 12px;
        }

        .back-to-top {
            bottom: 20px;
            right: 20px;
            width: 45px;
            height: 45px;
            font-size: 20px;
        }
    }
</style>

<script>
(function() {
    // Back to Top Button
    const backToTopBtn = document.getElementById('back-to-top');
    
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

    // Newsletter Form
    const newsletterForm = document.querySelector('.footer-newsletter-form');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[name="newsletter_email"]').value;
            alert('Email cadastrado: ' + email + '\n\nEm produção, isso enviaria para seu serviço de newsletter!');
            this.reset();
        });
    }
})();
</script>

</body>
</html>