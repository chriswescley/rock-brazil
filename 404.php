<?php
/**
 * 404 Error Page Template
 * Rock Brazil WordPress Theme
 * 
 * @package RockBrazil
 */

get_header();
?>

<style>
    /* 404 Page Styles */
    .error-404-page {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 20px;
        position: relative;
        overflow: hidden;
    }

    .error-404-container {
        max-width: 900px;
        width: 100%;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    /* Glitch Background */
    .error-bg-glitch {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 800px;
        height: 800px;
        background: radial-gradient(circle, rgba(138, 43, 226, 0.3) 0%, transparent 70%);
        animation: pulse-error 3s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes pulse-error {
        0%, 100% { 
            transform: translate(-50%, -50%) scale(1);
            opacity: 0.5;
        }
        50% { 
            transform: translate(-50%, -50%) scale(1.2);
            opacity: 1;
        }
    }

    .error-skull {
        font-size: 150px;
        margin-bottom: 30px;
        display: inline-block;
        animation: skull-shake 1s ease-in-out infinite;
        filter: drop-shadow(0 0 30px rgba(138, 43, 226, 0.8));
    }

    @keyframes skull-shake {
        0%, 100% { 
            transform: rotate(-5deg);
        }
        50% { 
            transform: rotate(5deg);
        }
    }

    .error-404-number {
        font-family: 'Orbitron', sans-serif;
        font-size: 10rem;
        font-weight: 900;
        color: #00ff41;
        text-shadow: 
            0 0 20px rgba(0, 255, 65, 0.8),
            0 0 40px rgba(0, 255, 65, 0.6),
            0 0 60px rgba(0, 255, 65, 0.4);
        margin-bottom: 20px;
        line-height: 1;
        animation: glitch-404 2s infinite;
        position: relative;
    }

    @keyframes glitch-404 {
        0%, 100% {
            transform: translate(0);
            text-shadow: 
                0 0 20px rgba(0, 255, 65, 0.8),
                0 0 40px rgba(0, 255, 65, 0.6);
        }
        25% {
            transform: translate(-3px, 3px);
            text-shadow: 
                3px -3px 0 #8a2be2,
                0 0 20px rgba(0, 255, 65, 0.8);
        }
        50% {
            transform: translate(3px, -3px);
            text-shadow: 
                -3px 3px 0 #8a2be2,
                0 0 20px rgba(0, 255, 65, 0.8);
        }
        75% {
            transform: translate(-3px, -3px);
            text-shadow: 
                3px 3px 0 #8a2be2,
                0 0 20px rgba(0, 255, 65, 0.8);
        }
    }

    .error-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 3rem;
        color: #8a2be2;
        text-transform: uppercase;
        margin-bottom: 20px;
        font-weight: 900;
        letter-spacing: 5px;
        animation: neon-flicker 3s infinite;
    }

    @keyframes neon-flicker {
        0%, 100% {
            text-shadow: 
                0 0 10px rgba(138, 43, 226, 0.8),
                0 0 20px rgba(138, 43, 226, 0.6);
        }
        10%, 30%, 50%, 70%, 90% {
            text-shadow: 
                0 0 5px rgba(138, 43, 226, 0.4),
                0 0 10px rgba(138, 43, 226, 0.3);
        }
        20%, 40%, 60%, 80% {
            text-shadow: 
                0 0 15px rgba(138, 43, 226, 1),
                0 0 30px rgba(138, 43, 226, 0.8);
        }
    }

    .error-message {
        color: #e0e0e0;
        font-size: 1.3rem;
        line-height: 1.8;
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .error-actions {
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
        margin-bottom: 60px;
    }

    .error-search-form {
        width: 100%;
        max-width: 500px;
        display: flex;
        gap: 10px;
    }

    .error-search-input {
        flex: 1;
        background: rgba(0, 0, 0, 0.5);
        border: 2px solid #8a2be2;
        color: #00ff41;
        padding: 15px 20px;
        border-radius: 8px;
        font-family: 'Orbitron', sans-serif;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .error-search-input:focus {
        outline: none;
        border-color: #00ff41;
        box-shadow: 0 0 20px rgba(0, 255, 65, 0.3);
    }

    .error-search-input::placeholder {
        color: rgba(176, 176, 176, 0.5);
    }

    .error-search-button {
        background: linear-gradient(135deg, #8a2be2 0%, #6a1bb2 100%);
        border: 2px solid #00ff41;
        color: #00ff41;
        padding: 15px 30px;
        border-radius: 8px;
        font-family: 'Orbitron', sans-serif;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        font-size: 16px;
    }

    .error-search-button:hover {
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(0, 255, 65, 0.6);
        background: linear-gradient(135deg, #00ff41 0%, #00cc33 100%);
        color: #0a0e27;
    }

    .error-buttons {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .error-btn {
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        color: #00ff41;
        padding: 15px 40px;
        border-radius: 8px;
        font-family: 'Orbitron', sans-serif;
        font-weight: bold;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
    }

    .error-btn:hover {
        background: #8a2be2;
        box-shadow: 0 0 30px rgba(138, 43, 226, 0.6);
        transform: translateY(-5px);
    }

    .error-btn-primary {
        background: linear-gradient(135deg, #00ff41 0%, #00cc33 100%);
        border-color: #8a2be2;
        color: #0a0e27;
    }

    .error-btn-primary:hover {
        box-shadow: 0 0 30px rgba(0, 255, 65, 0.6);
    }

    .error-suggestions {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .suggestions-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 2rem;
        color: #00ff41;
        text-shadow: 0 0 15px rgba(0, 255, 65, 0.8);
        text-align: center;
        margin-bottom: 40px;
        text-transform: uppercase;
    }

    .suggestions-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-bottom: 80px;
    }

    .suggestion-card {
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s ease;
        text-decoration: none;
        display: block;
    }

    .suggestion-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 40px rgba(0, 255, 65, 0.3);
        border-color: #00ff41;
    }

    .suggestion-icon {
        font-size: 60px;
        margin-bottom: 20px;
        display: block;
    }

    .suggestion-title {
        font-family: 'Orbitron', sans-serif;
        color: #00ff41;
        font-size: 20px;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .suggestion-description {
        color: #b0b0b0;
        font-size: 14px;
        line-height: 1.6;
    }

    .error-code-block {
        background: rgba(0, 0, 0, 0.5);
        border: 2px solid #8a2be2;
        border-radius: 10px;
        padding: 20px;
        margin-top: 40px;
        font-family: 'Courier New', monospace;
        color: #00ff41;
        text-align: left;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .code-line {
        margin-bottom: 8px;
    }

    .code-comment {
        color: #8a2be2;
        opacity: 0.7;
    }

    .code-error {
        color: #ff4444;
        font-weight: bold;
    }

    @media (max-width: 968px) {
        .error-404-number {
            font-size: 8rem;
        }

        .error-title {
            font-size: 2.5rem;
        }

        .error-skull {
            font-size: 120px;
        }

        .suggestions-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .error-404-number {
            font-size: 6rem;
        }

        .error-title {
            font-size: 2rem;
            letter-spacing: 3px;
        }

        .error-message {
            font-size: 1.1rem;
        }

        .error-skull {
            font-size: 100px;
        }

        .error-search-form {
            flex-direction: column;
        }

        .error-buttons {
            flex-direction: column;
            align-items: stretch;
        }

        .error-btn {
            justify-content: center;
        }

        .suggestions-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .error-404-number {
            font-size: 5rem;
        }

        .error-title {
            font-size: 1.5rem;
        }

        .error-skull {
            font-size: 80px;
        }
    }
</style>

<div class="error-404-page">
    <div class="error-bg-glitch"></div>
    
    <div class="error-404-container">
        <div class="error-skull">💀</div>
        
        <h1 class="error-404-number">404</h1>
        
        <h2 class="error-title">Página Não Encontrada</h2>
        
        <p class="error-message">
            Desculpe, rockeiro(a)! Parece que esta página foi para o limbo... 🎸<br>
            A URL que você tentou acessar não existe ou foi movida para outro lugar.
        </p>

        <!-- Search Form -->
        <div class="error-actions">
            <form role="search" method="get" class="error-search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="search" 
                       class="error-search-input" 
                       placeholder="Buscar no Rock Brazil..." 
                       value="<?php echo get_search_query(); ?>" 
                       name="s" 
                       required />
                <button type="submit" class="error-search-button">
                    🔍 Buscar
                </button>
            </form>

            <div class="error-buttons">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="error-btn error-btn-primary">
                    🏠 Voltar para Home
                </a>
                <a href="javascript:history.back()" class="error-btn">
                    ← Página Anterior
                </a>
            </div>
        </div>

        <!-- Error Code Block -->
        <div class="error-code-block">
            <div class="code-line"><span class="code-comment">// System Error Log</span></div>
            <div class="code-line">STATUS: <span class="code-error">404 NOT FOUND</span></div>
            <div class="code-line">URL: <?php echo esc_html($_SERVER['REQUEST_URI']); ?></div>
            <div class="code-line">TIME: <?php echo current_time('d/m/Y H:i:s'); ?></div>
            <div class="code-line">SERVER: ROCK-BRAZIL-<?php echo strtoupper(substr(get_locale(), 0, 2)); ?>-01</div>
            <div class="code-line"><span class="code-comment">// End of log</span></div>
        </div>
    </div>
</div>

<!-- Suggestions Section -->
<div class="error-suggestions">
    <h3 class="suggestions-title">🎸 Que tal explorar estas seções?</h3>
    
    <div class="suggestions-grid">
        <a href="<?php echo esc_url(home_url('/category/noticias')); ?>" class="suggestion-card">
            <span class="suggestion-icon">📰</span>
            <h4 class="suggestion-title">Notícias</h4>
            <p class="suggestion-description">
                Fique por dentro das últimas novidades do mundo do rock
            </p>
        </a>

        <a href="<?php echo esc_url(home_url('/category/reviews')); ?>" class="suggestion-card">
            <span class="suggestion-icon">⭐</span>
            <h4 class="suggestion-title">Reviews</h4>
            <p class="suggestion-description">
                Análises completas de álbuns, shows e lançamentos
            </p>
        </a>

        <a href="<?php echo esc_url(home_url('/category/entrevistas')); ?>" class="suggestion-card">
            <span class="suggestion-icon">🎙️</span>
            <h4 class="suggestion-title">Entrevistas</h4>
            <p class="suggestion-description">
                Conversas exclusivas com artistas e bandas
            </p>
        </a>

        <a href="<?php echo esc_url(home_url('/category/shows')); ?>" class="suggestion-card">
            <span class="suggestion-icon">🎪</span>
            <h4 class="suggestion-title">Shows & Eventos</h4>
            <p class="suggestion-description">
                Agenda completa de shows e festivais
            </p>
        </a>

        <a href="<?php echo esc_url(home_url('/category/lancamentos')); ?>" class="suggestion-card">
            <span class="suggestion-icon">🆕</span>
            <h4 class="suggestion-title">Lançamentos</h4>
            <p class="suggestion-description">
                Novos álbuns, singles e videoclipes
            </p>
        </a>

        <a href="<?php echo esc_url(home_url('/category/cultura')); ?>" class="suggestion-card">
            <span class="suggestion-icon">🤘</span>
            <h4 class="suggestion-title">Cultura Pop</h4>
            <p class="suggestion-description">
                Lifestyle e tudo sobre a cultura pop
            </p>
        </a>
		<a href="<?php echo esc_url(home_url('/category/games')); ?>" class="suggestion-card">
    <span class="suggestion-icon">🎮</span>
    <h4 class="suggestion-title">Games & Tech</h4>
    <p class="suggestion-description">
        Jogos de rock, tecnologia e cultura geek
    </p>
</a>
    </div>
</div>

<script>
(function() {
    // Animate suggestions on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });

    document.querySelectorAll('.suggestion-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });

    // Add some fun console messages
    console.log('%c💀 404 ERROR 💀', 'font-size: 40px; color: #00ff41; text-shadow: 0 0 10px rgba(0,255,65,0.8); font-weight: bold;');
    console.log('%cParece que você se perdeu no backstage...', 'font-size: 16px; color: #8a2be2;');
    console.log('%cMas não se preocupe, o show continua! 🎸', 'font-size: 14px; color: #00ff41;');
})();
</script>

<?php get_footer(); ?>