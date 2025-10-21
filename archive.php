<?php
/**
 * Archive Template (Categories, Tags, Author, Date)
 * Rock Brazil WordPress Theme
 * 
 * @package RockBrazil
 */

get_header();
?>

<style>
    /* Archive Page Styles */
    .archive-header {
        position: relative;
        max-width: 1400px;
        margin: 40px auto;
        padding: 60px 40px;
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 0 40px rgba(138, 43, 226, 0.3);
        overflow: hidden;
    }

    .archive-header::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(138, 43, 226, 0.2) 0%, transparent 70%);
        animation: pulse-glow 3s ease-in-out infinite;
    }

    @keyframes pulse-glow {
        0%, 100% { 
            transform: scale(1);
            opacity: 0.5;
        }
        50% { 
            transform: scale(1.1);
            opacity: 1;
        }
    }

    .archive-header-content {
        position: relative;
        z-index: 2;
    }

    .archive-icon {
        font-size: 80px;
        margin-bottom: 20px;
        display: inline-block;
        animation: float-icon 3s ease-in-out infinite;
    }

    @keyframes float-icon {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .archive-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 3.5rem;
        color: #00ff41;
        text-shadow: 0 0 30px rgba(0, 255, 65, 0.8);
        margin-bottom: 15px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 3px;
    }

    .archive-description {
        color: #b0b0b0;
        font-size: 18px;
        line-height: 1.6;
        max-width: 800px;
        margin: 0 auto 20px;
    }

    .archive-meta {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        font-size: 14px;
        color: #8a2be2;
        margin-top: 20px;
    }

    .archive-meta span {
        display: flex;
        align-items: center;
        gap: 8px;
        background: rgba(138, 43, 226, 0.2);
        padding: 8px 20px;
        border-radius: 25px;
        border: 1px solid #8a2be2;
    }

    .archive-container {
        max-width: 1400px;
        margin: 0 auto 80px;
        padding: 0 40px;
    }

    .archive-filters {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
        padding: 20px;
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 10px;
    }

    .filter-section {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .filter-label {
        font-family: 'Orbitron', sans-serif;
        color: #00ff41;
        font-size: 14px;
        text-transform: uppercase;
    }

    .filter-select {
        background: rgba(0, 0, 0, 0.5);
        border: 1px solid #8a2be2;
        color: #00ff41;
        padding: 10px 20px;
        border-radius: 5px;
        font-family: 'Orbitron', sans-serif;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-select:focus {
        outline: none;
        border-color: #00ff41;
        box-shadow: 0 0 15px rgba(0, 255, 65, 0.3);
    }

    .view-toggle {
        display: flex;
        gap: 10px;
    }

    .view-btn {
        background: transparent;
        border: 2px solid #8a2be2;
        color: #00ff41;
        width: 40px;
        height: 40px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .view-btn.active,
    .view-btn:hover {
        background: #8a2be2;
        box-shadow: 0 0 15px rgba(138, 43, 226, 0.6);
    }

    .archive-posts-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-bottom: 60px;
    }

    .archive-posts-grid.list-view {
        grid-template-columns: 1fr;
    }

    .archive-posts-grid.list-view .news-card {
        display: grid;
        grid-template-columns: 350px 1fr;
        gap: 30px;
    }

    .archive-posts-grid.list-view .card-image {
        height: 100%;
        min-height: 250px;
    }

    .news-card {
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
    }

    .news-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(138, 43, 226, 0.1) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .news-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 40px rgba(0, 255, 65, 0.3);
        border-color: #00ff41;
    }

    .news-card:hover::before {
        opacity: 1;
    }

    .card-image {
        width: 100%;
        height: 250px;
        background: linear-gradient(135deg, #1a1534 0%, #2d1b47 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 60px;
        position: relative;
        overflow: hidden;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .news-card:hover .card-image img {
        transform: scale(1.1);
    }

    .card-image::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, 
            transparent 30%, 
            rgba(0, 255, 65, 0.1) 50%, 
            transparent 70%);
        transform: rotate(45deg);
        animation: shine 3s infinite;
    }

    @keyframes shine {
        0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }

    .card-content {
        padding: 25px;
        position: relative;
    }

    .card-category {
        display: inline-block;
        background: #8a2be2;
        color: #fff;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .card-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 20px;
        color: #00ff41;
        margin-bottom: 12px;
        font-weight: 700;
        line-height: 1.4;
    }

    .card-title a {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .card-title a:hover {
        text-shadow: 0 0 15px rgba(0, 255, 65, 1);
    }

    .card-excerpt {
        color: #b0b0b0;
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .card-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        color: #8a2be2;
        border-top: 1px solid rgba(138, 43, 226, 0.3);
        padding-top: 15px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .archive-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin: 60px 0;
    }

    .archive-pagination a,
    .archive-pagination span {
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        color: #00ff41;
        padding: 12px 20px;
        border-radius: 8px;
        font-family: 'Orbitron', sans-serif;
        font-weight: bold;
        transition: all 0.3s ease;
        text-decoration: none;
        min-width: 50px;
        text-align: center;
    }

    .archive-pagination a:hover,
    .archive-pagination .current {
        background: #8a2be2;
        box-shadow: 0 0 20px rgba(138, 43, 226, 0.6);
        transform: scale(1.1);
    }

    .archive-pagination .current {
        border-color: #00ff41;
        box-shadow: 0 0 20px rgba(0, 255, 65, 0.6);
    }

    .no-posts-found {
        text-align: center;
        padding: 80px 20px;
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
    }

    .no-posts-icon {
        font-size: 100px;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .no-posts-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 2.5rem;
        color: #00ff41;
        margin-bottom: 15px;
    }

    .no-posts-text {
        color: #b0b0b0;
        font-size: 18px;
        margin-bottom: 30px;
    }

    .back-home-btn {
        display: inline-block;
        background: linear-gradient(135deg, #8a2be2 0%, #6a1bb2 100%);
        border: 2px solid #00ff41;
        color: #00ff41;
        padding: 15px 40px;
        border-radius: 30px;
        font-family: 'Orbitron', sans-serif;
        font-weight: bold;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .back-home-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 0 30px rgba(0, 255, 65, 0.6);
        background: linear-gradient(135deg, #00ff41 0%, #00cc33 100%);
        color: #0a0e27;
    }

    @media (max-width: 1200px) {
        .archive-posts-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 968px) {
        .archive-title {
            font-size: 2.5rem;
        }

        .archive-filters {
            flex-direction: column;
            gap: 20px;
        }

        .archive-posts-grid.list-view .news-card {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .archive-header {
            padding: 40px 20px;
        }

        .archive-container {
            padding: 0 20px;
        }

        .archive-title {
            font-size: 2rem;
        }

        .archive-icon {
            font-size: 60px;
        }

        .archive-posts-grid {
            grid-template-columns: 1fr;
        }

        .card-title {
            font-size: 18px;
        }

        .archive-pagination {
            flex-wrap: wrap;
        }
    }
</style>

<!-- Archive Header -->
<header class="archive-header">
    <div class="archive-header-content">
        <div class="archive-icon">
            <?php
            if (is_category()) {
                echo '📁';
            } elseif (is_tag()) {
                echo '🏷️';
            } elseif (is_author()) {
                echo '👤';
            } elseif (is_date()) {
                echo '📅';
            } else {
                echo '📰';
            }
            ?>
        </div>

        <h1 class="archive-title">
            <?php
            if (is_category()) {
                single_cat_title();
            } elseif (is_tag()) {
                single_tag_title();
            } elseif (is_author()) {
                echo 'Posts de ' . get_the_author();
            } elseif (is_day()) {
                echo 'Arquivo: ' . get_the_date();
            } elseif (is_month()) {
                echo 'Arquivo: ' . get_the_date('F Y');
            } elseif (is_year()) {
                echo 'Arquivo: ' . get_the_date('Y');
            } else {
                echo 'Arquivo';
            }
            ?>
        </h1>

        <?php
        $description = '';
        if (is_category()) {
            $description = category_description();
        } elseif (is_tag()) {
            $description = tag_description();
        } elseif (is_author()) {
            $description = get_the_author_meta('description');
        }

        if ($description) :
            ?>
            <div class="archive-description">
                <?php echo wp_kses_post($description); ?>
            </div>
        <?php endif; ?>

        <div class="archive-meta">
            <span>
                📊 <?php
                global $wp_query;
                echo $wp_query->found_posts . ' ' . ($wp_query->found_posts == 1 ? 'post encontrado' : 'posts encontrados');
                ?>
            </span>
            <?php if (is_category()) : ?>
                <span>
                    📁 Categoria
                </span>
            <?php endif; ?>
        </div>
    </div>
</header>

<!-- Archive Content -->
<div class="archive-container">
    <?php if (have_posts()) : ?>
        
        <!-- Filters -->
        <div class="archive-filters">
            <div class="filter-section">
                <span class="filter-label">Ordenar por:</span>
                <select class="filter-select" id="archive-sort">
                    <option value="date">Mais Recentes</option>
                    <option value="views">Mais Vistos</option>
                    <option value="comments">Mais Comentados</option>
                    <option value="title">Ordem Alfabética</option>
                </select>
            </div>
            <div class="view-toggle">
                <button class="view-btn active" data-view="grid" title="Visualização em grade">
                    📊
                </button>
                <button class="view-btn" data-view="list" title="Visualização em lista">
                    📋
                </button>
            </div>
        </div>

        <!-- Posts Grid -->
        <div class="archive-posts-grid" id="posts-container">
            <?php
            while (have_posts()) :
                the_post();
                $post_id = get_the_ID();
                $categories = get_the_category();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('news-card'); ?>>
                    <div class="card-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        <?php else : ?>
                            🎸
                        <?php endif; ?>
                    </div>
                    <div class="card-content">
                        <?php if (!empty($categories)) : ?>
                            <span class="card-category">
                                <?php echo esc_html($categories[0]->name); ?>
                            </span>
                        <?php endif; ?>
                        
                        <h2 class="card-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        
                        <div class="card-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </div>
                        
                        <div class="card-meta">
                            <span>
                                👤 <?php the_author_posts_link(); ?>
                            </span>
                            <span>
                                📅 <?php echo get_the_date('d/m/Y'); ?>
                            </span>
                            <span>
                                👁️ <?php echo rock_brazil_get_post_views($post_id); ?> views
                            </span>
                            <span>
                                💬 <?php comments_number('0', '1', '%'); ?>
                            </span>
                        </div>
                    </div>
                </article>
                <?php
            endwhile;
            ?>
        </div>

        <!-- Pagination -->
        <div class="archive-pagination">
            <?php
            echo paginate_links(array(
                'prev_text' => '← Anterior',
                'next_text' => 'Próxima →',
                'type'      => 'list',
                'end_size'  => 2,
                'mid_size'  => 2,
            ));
            ?>
        </div>

    <?php else : ?>
        
        <!-- No Posts Found -->
        <div class="no-posts-found">
            <div class="no-posts-icon">😢</div>
            <h2 class="no-posts-title">Nenhum Post Encontrado</h2>
            <p class="no-posts-text">
                Desculpe, não encontramos nenhum post nesta categoria/arquivo.<br>
                Que tal explorar outras seções do site?
            </p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="back-home-btn">
                🏠 Voltar para Home
            </a>
        </div>

    <?php endif; ?>
</div>

<script>
(function() {
    // View Toggle (Grid/List)
    const viewButtons = document.querySelectorAll('.view-btn');
    const postsContainer = document.getElementById('posts-container');

    viewButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const view = this.getAttribute('data-view');
            
            viewButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            if (view === 'list') {
                postsContainer.classList.add('list-view');
            } else {
                postsContainer.classList.remove('list-view');
            }
        });
    });

    // Sort functionality (would need AJAX in production)
    const sortSelect = document.getElementById('archive-sort');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            const sortBy = this.value;
            
            // Em produção, você faria uma requisição AJAX aqui
            // Por enquanto, apenas mostra um alerta
            if (sortBy !== 'date') {
                alert('Ordenação por "' + this.options[this.selectedIndex].text + '" será implementada via AJAX!');
            }
        });
    }

    // Animate cards on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });

    document.querySelectorAll('.news-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });
})();
</script>

<?php get_footer(); ?>