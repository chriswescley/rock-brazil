<?php
/**
 * Index Template (Fallback/Blog Page)
 * Rock Brazil WordPress Theme
 * 
 * @package RockBrazil
 */

get_header();
?>

<style>
    /* Index/Blog Page Styles */
    .blog-header {
        position: relative;
        max-width: 1400px;
        margin: 40px auto;
        padding: 80px 40px;
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 0 40px rgba(138, 43, 226, 0.3);
        overflow: hidden;
    }

    .blog-header::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(138, 43, 226, 0.3) 0%, transparent 70%);
        animation: rotate-glow 10s linear infinite;
    }

    @keyframes rotate-glow {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }

    .blog-header-content {
        position: relative;
        z-index: 2;
    }

    .blog-icon {
        font-size: 100px;
        margin-bottom: 30px;
        display: inline-block;
        animation: rock-hand-shake 2s ease-in-out infinite;
    }

    @keyframes rock-hand-shake {
        0%, 100% { transform: rotate(-15deg); }
        50% { transform: rotate(15deg); }
    }

    .blog-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 4rem;
        color: #00ff41;
        text-shadow: 0 0 30px rgba(0, 255, 65, 0.8);
        margin-bottom: 20px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 5px;
        animation: glitch 3s infinite;
    }

    @keyframes glitch {
        0%, 100% { transform: translate(0); }
        20% { transform: translate(-2px, 2px); }
        40% { transform: translate(-2px, -2px); }
        60% { transform: translate(2px, 2px); }
        80% { transform: translate(2px, -2px); }
    }

    .blog-subtitle {
        color: #8a2be2;
        font-size: 20px;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }

    .blog-description {
        color: #b0b0b0;
        font-size: 18px;
        line-height: 1.6;
        max-width: 700px;
        margin: 0 auto;
    }

    .blog-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 40px;
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 60px;
        margin-bottom: 80px;
    }

    .blog-main-content {
        width: 100%;
    }

    .featured-post {
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 60px;
        transition: all 0.3s ease;
        box-shadow: 0 0 30px rgba(138, 43, 226, 0.2);
    }

    .featured-post:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 50px rgba(0, 255, 65, 0.3);
        border-color: #00ff41;
    }

    .featured-image {
        position: relative;
        width: 100%;
        height: 450px;
        overflow: hidden;
    }

    .featured-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .featured-post:hover .featured-image img {
        transform: scale(1.1);
    }

    .featured-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: linear-gradient(135deg, #8a2be2 0%, #6a1bb2 100%);
        color: #00ff41;
        padding: 10px 20px;
        border-radius: 25px;
        font-family: 'Orbitron', sans-serif;
        font-weight: bold;
        font-size: 12px;
        text-transform: uppercase;
        box-shadow: 0 0 20px rgba(138, 43, 226, 0.8);
        animation: pulse-badge 2s ease-in-out infinite;
    }

    @keyframes pulse-badge {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .featured-content {
        padding: 40px;
    }

    .featured-category {
        display: inline-block;
        background: #8a2be2;
        color: #fff;
        padding: 6px 18px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 15px;
    }

    .featured-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 2.5rem;
        color: #00ff41;
        text-shadow: 0 0 20px rgba(0, 255, 65, 0.8);
        margin-bottom: 15px;
        line-height: 1.2;
    }

    .featured-title a {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .featured-title a:hover {
        text-shadow: 0 0 30px rgba(0, 255, 65, 1);
    }

    .featured-excerpt {
        color: #e0e0e0;
        font-size: 18px;
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .featured-meta {
        display: flex;
        gap: 25px;
        flex-wrap: wrap;
        font-size: 14px;
        color: #8a2be2;
        padding-top: 20px;
        border-top: 1px solid rgba(138, 43, 226, 0.3);
    }

    .featured-meta span {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .posts-section-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 32px;
        color: #00ff41;
        text-shadow: 0 0 15px rgba(0, 255, 65, 0.8);
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #8a2be2;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .blog-posts-list {
        display: flex;
        flex-direction: column;
        gap: 30px;
        margin-bottom: 60px;
    }

    .blog-post-item {
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        overflow: hidden;
        display: grid;
        grid-template-columns: 300px 1fr;
        transition: all 0.3s ease;
    }

    .blog-post-item:hover {
        transform: translateX(10px);
        box-shadow: 0 5px 30px rgba(0, 255, 65, 0.3);
        border-color: #00ff41;
    }

    .post-thumbnail {
        position: relative;
        height: 250px;
        overflow: hidden;
        background: linear-gradient(135deg, #1a1534 0%, #2d1b47 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 60px;
    }

    .post-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .blog-post-item:hover .post-thumbnail img {
        transform: scale(1.1);
    }

    .post-content-area {
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .post-category {
        display: inline-block;
        background: rgba(138, 43, 226, 0.3);
        color: #8a2be2;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 10px;
        border: 1px solid #8a2be2;
    }

    .post-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 24px;
        color: #00ff41;
        margin-bottom: 12px;
        font-weight: 700;
        line-height: 1.3;
    }

    .post-title a {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .post-title a:hover {
        text-shadow: 0 0 15px rgba(0, 255, 65, 1);
    }

    .post-excerpt {
        color: #b0b0b0;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .post-meta {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        font-size: 13px;
        color: #8a2be2;
    }

    .post-meta span {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .blog-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin: 60px 0;
    }

    .blog-pagination a,
    .blog-pagination span {
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

    .blog-pagination a:hover,
    .blog-pagination .current {
        background: #8a2be2;
        box-shadow: 0 0 20px rgba(138, 43, 226, 0.6);
        transform: scale(1.1);
    }

    .blog-pagination .current {
        border-color: #00ff41;
        box-shadow: 0 0 20px rgba(0, 255, 65, 0.6);
    }

    .blog-sidebar {
        position: sticky;
        top: 120px;
    }

    .sidebar-widget {
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 0 20px rgba(138, 43, 226, 0.2);
    }

    .widget-title {
        font-family: 'Orbitron', sans-serif;
        color: #00ff41;
        text-shadow: 0 0 10px rgba(0, 255, 65, 0.6);
        margin-bottom: 20px;
        font-size: 20px;
        border-bottom: 2px solid #8a2be2;
        padding-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .widget-list {
        list-style: none;
        padding: 0;
    }

    .widget-list li {
        padding: 12px 0;
        border-bottom: 1px solid rgba(138, 43, 226, 0.2);
        transition: all 0.3s ease;
    }

    .widget-list li:last-child {
        border-bottom: none;
    }

    .widget-list li:hover {
        padding-left: 10px;
    }

    .widget-list a {
        color: #e0e0e0;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .widget-list a:hover {
        color: #00ff41;
    }

    .widget-list .count {
        background: rgba(138, 43, 226, 0.3);
        color: #8a2be2;
        padding: 2px 8px;
        border-radius: 10px;
        font-size: 11px;
        font-weight: bold;
    }

    .no-posts {
        text-align: center;
        padding: 100px 40px;
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
    }

    .no-posts-icon {
        font-size: 120px;
        margin-bottom: 30px;
        opacity: 0.5;
    }

    .no-posts-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 3rem;
        color: #00ff41;
        margin-bottom: 20px;
    }

    .no-posts-text {
        color: #b0b0b0;
        font-size: 20px;
        margin-bottom: 40px;
    }

    @media (max-width: 1200px) {
        .blog-container {
            grid-template-columns: 1fr;
        }

        .blog-sidebar {
            position: static;
        }
    }

    @media (max-width: 968px) {
        .blog-post-item {
            grid-template-columns: 1fr;
        }

        .post-thumbnail {
            height: 300px;
        }

        .blog-title {
            font-size: 3rem;
        }

        .featured-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 768px) {
        .blog-header,
        .blog-container {
            padding: 40px 20px;
        }

        .blog-title {
            font-size: 2.5rem;
        }

        .blog-icon {
            font-size: 80px;
        }

        .featured-image {
            height: 300px;
        }

        .featured-content {
            padding: 25px;
        }

        .featured-title {
            font-size: 1.75rem;
        }

        .post-content-area {
            padding: 20px;
        }

        .post-title {
            font-size: 20px;
        }
    }
</style>

<!-- Blog Header -->
<header class="blog-header">
    <div class="blog-header-content">
        <div class="blog-icon">🤘</div>
        <h1 class="blog-title">ROCK BRAZIL</h1>
        <p class="blog-subtitle">Portal de Notícias</p>
        <p class="blog-description">
            Seu portal definitivo de rock com as últimas notícias, reviews, entrevistas e tudo sobre o cenário musical nacional e internacional.
        </p>
    </div>
</header>

<!-- Main Blog Content -->
<div class="blog-container">
    <main class="blog-main-content">
        <?php if (have_posts()) : ?>
            
            <?php
            // Featured Post (First Post)
            if (!is_paged()) :
                the_post();
                $post_id = get_the_ID();
                $categories = get_the_category();
                ?>
                <article class="featured-post">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="featured-image">
                            <span class="featured-badge">⭐ Destaque</span>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="featured-content">
                        <?php if (!empty($categories)) : ?>
                            <span class="featured-category">
                                <?php echo esc_html($categories[0]->name); ?>
                            </span>
                        <?php endif; ?>
                        
                        <h2 class="featured-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        
                        <div class="featured-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 40); ?>
                        </div>
                        
                        <div class="featured-meta">
                            <span>👤 <?php the_author_posts_link(); ?></span>
                            <span>📅 <?php echo get_the_date('d/m/Y'); ?></span>
                            <span>👁️ <?php echo rock_brazil_get_post_views($post_id); ?> views</span>
                            <span>💬 <?php comments_number('0 comentários', '1 comentário', '% comentários'); ?></span>
                        </div>
                    </div>
                </article>
            <?php endif; ?>

            <!-- Posts List -->
            <h2 class="posts-section-title">
                <span>📰</span>
                Últimos Posts
            </h2>
            
            <div class="blog-posts-list">
                <?php
                while (have_posts()) :
                    the_post();
                    $post_id = get_the_ID();
                    $categories = get_the_category();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post-item'); ?>>
                        <div class="post-thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            <?php else : ?>
                                🎸
                            <?php endif; ?>
                        </div>
                        
                        <div class="post-content-area">
                            <?php if (!empty($categories)) : ?>
                                <span class="post-category">
                                    <?php echo esc_html($categories[0]->name); ?>
                                </span>
                            <?php endif; ?>
                            
                            <h3 class="post-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            
                            <div class="post-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                            </div>
                            
                            <div class="post-meta">
                                <span>👤 <?php the_author(); ?></span>
                                <span>📅 <?php echo get_the_date('d/m/Y'); ?></span>
                                <span>👁️ <?php echo rock_brazil_get_post_views($post_id); ?></span>
                                <span>💬 <?php comments_number('0', '1', '%'); ?></span>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <!-- Pagination -->
            <div class="blog-pagination">
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
            
            <div class="no-posts">
                <div class="no-posts-icon">😢</div>
                <h2 class="no-posts-title">Nenhum Post Publicado</h2>
                <p class="no-posts-text">
                    Parece que ainda não temos nenhum post publicado.<br>
                    Volte em breve para conferir as novidades do rock!
                </p>
            </div>

        <?php endif; ?>
    </main>

    <!-- Sidebar -->
    <aside class="blog-sidebar">
        <!-- Popular Posts Widget -->
        <div class="sidebar-widget">
            <h3 class="widget-title">
                <span>🔥</span>
                Mais Populares
            </h3>
            <ul class="widget-list">
                <?php
                $popular_posts = new WP_Query(array(
                    'posts_per_page' => 5,
                    'meta_key' => 'post_views_count',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                ));

                if ($popular_posts->have_posts()) :
                    while ($popular_posts->have_posts()) : $popular_posts->the_post();
                        ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <span><?php the_title(); ?></span>
                                <span class="count"><?php echo rock_brazil_get_post_views(get_the_ID()); ?> 👁️</span>
                            </a>
                        </li>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </ul>
        </div>

        <!-- Categories Widget -->
        <div class="sidebar-widget">
            <h3 class="widget-title">
                <span>📁</span>
                Categorias
            </h3>
            <ul class="widget-list">
                <?php
                $categories = get_categories(array('hide_empty' => true));
                foreach ($categories as $category) :
                    ?>
                    <li>
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                            <span><?php echo esc_html($category->name); ?></span>
                            <span class="count"><?php echo $category->count; ?></span>
                        </a>
                    </li>
                    <?php
                endforeach;
                ?>
            </ul>
        </div>

        <!-- Recent Comments Widget -->
        <div class="sidebar-widget">
            <h3 class="widget-title">
                <span>💬</span>
                Comentários Recentes
            </h3>
            <ul class="widget-list">
                <?php
                $recent_comments = get_comments(array(
                    'number' => 5,
                    'status' => 'approve',
                ));

                foreach ($recent_comments as $comment) :
                    ?>
                    <li>
                        <a href="<?php echo esc_url(get_comment_link($comment)); ?>">
                            <span><?php echo esc_html($comment->comment_author); ?> em <?php echo get_the_title($comment->comment_post_ID); ?></span>
                        </a>
                    </li>
                    <?php
                endforeach;
                ?>
            </ul>
        </div>

        <!-- Tags Widget -->
        <div class="sidebar-widget">
            <h3 class="widget-title">
                <span>🏷️</span>
                Tags Populares
            </h3>
            <div class="post-tags-list">
                <?php
                $tags = get_tags(array('number' => 15, 'orderby' => 'count', 'order' => 'DESC'));
                foreach ($tags as $tag) :
                    ?>
                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                        #<?php echo esc_html($tag->name); ?>
                    </a>
                    <?php
                endforeach;
                ?>
            </div>
        </div>
    </aside>
</div>

<script>
(function() {
    // Animate posts on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });

    document.querySelectorAll('.blog-post-item, .featured-post').forEach(post => {
        post.style.opacity = '0';
        post.style.transform = 'translateY(30px)';
        post.style.transition = 'all 0.6s ease';
        observer.observe(post);
    });
})();
</script>

<?php get_footer(); ?>