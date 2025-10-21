<?php
/**
 * Single Post Template
 * Rock Brazil WordPress Theme
 * 
 * @package RockBrazil
 */

get_header();
?>

<style>
    /* Fix Matrix Background */
    #matrix-bg {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
        z-index: 0 !important;
        pointer-events: none !important;
    }

    .scanline {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
        z-index: 1 !important;
        pointer-events: none !important;
    }

    /* Single Post Specific Styles */
    .single-post-hero,
    .single-post-container,
    main,
    .site-content {
        position: relative;
        z-index: 2;
    }
    
    .single-post-hero {
        position: relative;
        max-width: 1400px;
        margin: 40px auto;
        padding: 0 40px;
    }

    .post-featured-image {
        position: relative;
        width: 100%;
        height: 500px;
        border-radius: 15px;
        overflow: hidden;
        border: 2px solid #8a2be2;
        box-shadow: 0 0 40px rgba(138, 43, 226, 0.3);
        margin-bottom: 40px;
    }

    .post-featured-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .post-featured-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 40px;
        background: linear-gradient(to top, rgba(10, 14, 39, 0.95), transparent);
    }

    .single-post-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 40px;
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 60px;
    }

    .single-post-content {
        background: rgba(13, 17, 38, 0.6);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        padding: 50px;
        box-shadow: 0 0 30px rgba(138, 43, 226, 0.2);
    }

    .post-category-badge {
        display: inline-block;
        background: #8a2be2;
        color: #fff;
        padding: 8px 20px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 20px;
        box-shadow: 0 0 15px rgba(138, 43, 226, 0.5);
    }

    .single-entry-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 3rem;
        color: #00ff41;
        text-shadow: 0 0 20px rgba(0, 255, 65, 0.8);
        margin-bottom: 25px;
        line-height: 1.2;
    }

    .single-entry-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
        font-size: 14px;
        color: #8a2be2;
        border-bottom: 2px solid rgba(138, 43, 226, 0.3);
        padding-bottom: 20px;
        margin-bottom: 40px;
    }

    .single-entry-meta span {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .meta-icon {
        font-size: 18px;
    }

    .single-entry-content {
        line-height: 1.9;
        color: #e0e0e0;
        font-size: 18px;
    }

    .single-entry-content p {
        margin-bottom: 25px;
    }

    .single-entry-content h2,
    .single-entry-content h3,
    .single-entry-content h4 {
        color: #00ff41;
        text-shadow: 0 0 10px rgba(0, 255, 65, 0.6);
        margin-top: 40px;
        margin-bottom: 20px;
        font-family: 'Orbitron', sans-serif;
    }

    .single-entry-content img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        border: 2px solid #8a2be2;
        margin: 30px 0;
        box-shadow: 0 0 20px rgba(138, 43, 226, 0.3);
    }

    .single-entry-content ul,
    .single-entry-content ol {
        margin: 25px 0;
        padding-left: 30px;
        color: #e0e0e0;
    }

    .single-entry-content li {
        margin-bottom: 12px;
        line-height: 1.8;
    }

    .single-entry-content blockquote {
        background: rgba(138, 43, 226, 0.1);
        border-left: 4px solid #8a2be2;
        padding: 20px 25px;
        margin: 30px 0;
        border-radius: 8px;
        font-style: italic;
        color: #b0b0b0;
    }

    .post-tags-section {
        margin-top: 50px;
        padding-top: 30px;
        border-top: 2px solid #8a2be2;
    }

    .tags-title {
        font-family: 'Orbitron', sans-serif;
        color: #00ff41;
        font-size: 18px;
        margin-bottom: 15px;
    }

    .post-tags-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .post-tags-list a {
        background: rgba(138, 43, 226, 0.2);
        border: 1px solid #8a2be2;
        padding: 8px 18px;
        border-radius: 25px;
        font-size: 13px;
        color: #00ff41;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .post-tags-list a:hover {
        background: #8a2be2;
        transform: scale(1.1);
        box-shadow: 0 0 15px rgba(138, 43, 226, 0.6);
    }

    .author-bio-section {
        margin-top: 50px;
        padding: 30px;
        background: rgba(138, 43, 226, 0.1);
        border: 2px solid #8a2be2;
        border-radius: 15px;
    }

    .author-bio-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .author-avatar img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 3px solid #00ff41;
        box-shadow: 0 0 15px rgba(0, 255, 65, 0.5);
    }

    .author-info h3 {
        font-family: 'Orbitron', sans-serif;
        color: #00ff41;
        font-size: 22px;
        margin-bottom: 5px;
    }

    .author-role {
        color: #8a2be2;
        font-size: 14px;
    }

    .author-bio-text {
        color: #e0e0e0;
        line-height: 1.7;
    }

    .share-section {
        margin-top: 50px;
        padding: 30px;
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        text-align: center;
    }

    .share-title {
        font-family: 'Orbitron', sans-serif;
        color: #00ff41;
        font-size: 20px;
        margin-bottom: 20px;
    }

    .share-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .share-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 2px solid #8a2be2;
        background: rgba(138, 43, 226, 0.2);
        color: #00ff41;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .share-btn:hover {
        background: #8a2be2;
        transform: scale(1.2) rotate(360deg);
        box-shadow: 0 0 20px rgba(138, 43, 226, 0.6);
    }

    .single-post-navigation {
        margin: 60px 0;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    .nav-post {
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        padding: 25px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: block;
    }

    .nav-post:hover {
        border-color: #00ff41;
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 255, 65, 0.2);
    }

    .nav-label {
        font-size: 12px;
        color: #8a2be2;
        text-transform: uppercase;
        margin-bottom: 10px;
        display: block;
    }

    .nav-title {
        font-family: 'Orbitron', sans-serif;
        color: #00ff41;
        font-size: 18px;
        font-weight: 700;
    }

    .related-posts-section {
        margin-top: 80px;
        padding: 50px;
        background: rgba(13, 17, 38, 0.6);
        border: 2px solid #8a2be2;
        border-radius: 15px;
    }

    .related-posts-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 32px;
        color: #00ff41;
        text-shadow: 0 0 15px rgba(0, 255, 65, 0.8);
        text-align: center;
        margin-bottom: 40px;
    }

    .related-posts-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .sidebar-single {
        position: sticky;
        top: 120px;
    }

    .sidebar-widget {
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
    }

    .sidebar-widget-title {
        font-family: 'Orbitron', sans-serif;
        color: #00ff41;
        text-shadow: 0 0 10px rgba(0, 255, 65, 0.6);
        margin-bottom: 20px;
        font-size: 20px;
        border-bottom: 2px solid #8a2be2;
        padding-bottom: 10px;
    }

    .toc-list {
        list-style: none;
        padding: 0;
    }

    .toc-list li {
        padding: 10px 0;
        border-bottom: 1px solid rgba(138, 43, 226, 0.2);
    }

    .toc-list li:last-child {
        border-bottom: none;
    }

    .toc-list a {
        color: #e0e0e0;
        text-decoration: none;
        transition: all 0.3s ease;
        display: block;
    }

    .toc-list a:hover {
        color: #00ff41;
        padding-left: 10px;
    }

    @media (max-width: 1200px) {
        .related-posts-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 968px) {
        .single-post-container {
            grid-template-columns: 1fr;
        }

        .sidebar-single {
            position: static;
        }

        .single-entry-title {
            font-size: 2.5rem;
        }

        .post-featured-image {
            height: 400px;
        }
    }

    @media (max-width: 768px) {
        .single-post-hero,
        .single-post-container {
            padding: 0 20px;
        }

        .single-post-content {
            padding: 30px 20px;
        }

        .single-entry-title {
            font-size: 2rem;
        }

        .single-entry-content {
            font-size: 16px;
        }

        .post-featured-image {
            height: 300px;
        }

        .single-post-navigation {
            grid-template-columns: 1fr;
        }

        .related-posts-grid {
            grid-template-columns: 1fr;
        }

        .author-bio-header {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<?php
while (have_posts()) :
    the_post();
    
    $post_id = get_the_ID();
    $categories = get_the_category();
    $tags = get_the_tags();
    ?>

    <!-- Featured Image Hero -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="single-post-hero">
            <div class="post-featured-image">
                <?php the_post_thumbnail('full'); ?>
                <div class="post-featured-overlay">
                    <?php if (!empty($categories)) : ?>
                        <span class="post-category-badge"><?php echo esc_html($categories[0]->name); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Main Content Container -->
    <div class="single-post-container">
        <!-- Main Article Content -->
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-content'); ?>>
            <header class="entry-header">
                <?php if (!has_post_thumbnail() && !empty($categories)) : ?>
                    <span class="post-category-badge"><?php echo esc_html($categories[0]->name); ?></span>
                <?php endif; ?>

                <h1 class="single-entry-title"><?php the_title(); ?></h1>

                <div class="single-entry-meta">
                    <span>
                        <span class="meta-icon">👤</span>
                        <?php the_author_posts_link(); ?>
                    </span>
                    <span>
                        <span class="meta-icon">📅</span>
                        <?php echo get_the_date('d \d\e F \d\e Y'); ?>
                    </span>
                    <span>
                        <span class="meta-icon">👁️</span>
                        <?php echo rock_brazil_get_post_views($post_id); ?> visualizações
                    </span>
                    <span>
                        <span class="meta-icon">💬</span>
                        <?php comments_number('0 comentários', '1 comentário', '% comentários'); ?>
                    </span>
                    <span>
                        <span class="meta-icon">⏱️</span>
                        <?php echo ceil(str_word_count(get_the_content()) / 200); ?> min de leitura
                    </span>
                </div>
            </header>

            <div class="single-entry-content">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Páginas:', 'rock-brazil'),
                    'after'  => '</div>',
                ));
                ?>
            </div>

            <!-- Tags -->
            <?php if ($tags) : ?>
                <div class="post-tags-section">
                    <h3 class="tags-title">🏷️ Tags:</h3>
                    <div class="post-tags-list">
                        <?php foreach ($tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                                #<?php echo esc_html($tag->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Author Bio -->
            <div class="author-bio-section">
                <div class="author-bio-header">
                    <div class="author-avatar">
                        <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                    </div>
                    <div class="author-info">
                        <h3><?php the_author(); ?></h3>
                        <span class="author-role">✍️ Autor(a)</span>
                    </div>
                </div>
                <div class="author-bio-text">
                    <?php
                    $author_bio = get_the_author_meta('description');
                    if ($author_bio) {
                        echo wpautop($author_bio);
                    } else {
                        echo '<p>Apaixonado(a) por rock e música. Escrevendo sobre as melhores bandas e lançamentos do cenário musical.</p>';
                    }
                    ?>
                </div>
            </div>

            <!-- Share Buttons -->
            <div class="share-section">
                <h3 class="share-title">🤘 Compartilhe este Post</h3>
                <div class="share-buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="share-btn"
                       aria-label="Compartilhar no Facebook">
                        📘
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="share-btn"
                       aria-label="Compartilhar no Twitter">
                        🐦
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="share-btn"
                       aria-label="Compartilhar no LinkedIn">
                        💼
                    </a>
                    <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="share-btn"
                       aria-label="Compartilhar no WhatsApp">
                        💬
                    </a>
                    <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" 
                       class="share-btn"
                       aria-label="Compartilhar por Email">
                        📧
                    </a>
                </div>
            </div>
        </article>

        <!-- Sidebar -->
        <aside class="sidebar-single">
            <!-- Table of Contents -->
            <div class="sidebar-widget">
                <h3 class="sidebar-widget-title">📋 Neste Artigo</h3>
                <ul class="toc-list">
                    <li><a href="#post-<?php the_ID(); ?>">Início do artigo</a></li>
                    <?php if ($tags) : ?>
                        <li><a href="#tags">Tags relacionadas</a></li>
                    <?php endif; ?>
                    <li><a href="#comments">Comentários</a></li>
                </ul>
            </div>

            <!-- Popular Posts -->
            <div class="sidebar-widget">
                <h3 class="sidebar-widget-title">🔥 Posts Populares</h3>
                <?php
                $popular_posts = new WP_Query(array(
                    'posts_per_page' => 5,
                    'meta_key' => 'post_views_count',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'post__not_in' => array($post_id),
                ));

                if ($popular_posts->have_posts()) :
                    echo '<ul class="toc-list">';
                    while ($popular_posts->have_posts()) : $popular_posts->the_post();
                        ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </li>
                        <?php
                    endwhile;
                    echo '</ul>';
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <!-- Categories -->
            <div class="sidebar-widget">
                <h3 class="sidebar-widget-title">📁 Categorias</h3>
                <ul class="toc-list">
                    <?php
                    wp_list_categories(array(
                        'title_li' => '',
                        'show_count' => true,
                    ));
                    ?>
                </ul>
            </div>
        </aside>
    </div>

    <!-- Post Navigation -->
    <div class="single-post-container">
        <div class="single-post-navigation">
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();

            if ($prev_post) :
                ?>
                <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-post nav-previous">
                    <span class="nav-label">← Post Anterior</span>
                    <span class="nav-title"><?php echo esc_html($prev_post->post_title); ?></span>
                </a>
            <?php else : ?>
                <div></div>
            <?php endif; ?>

            <?php if ($next_post) : ?>
                <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-post nav-next" style="text-align: right;">
                    <span class="nav-label">Próximo Post →</span>
                    <span class="nav-title"><?php echo esc_html($next_post->post_title); ?></span>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Related Posts -->
    <?php
    $related_posts = rock_brazil_get_related_posts($post_id, 3);
    
    if ($related_posts) :
        ?>
        <div class="single-post-container">
            <div class="related-posts-section" style="grid-column: 1 / -1;">
                <h2 class="related-posts-title">🎸 Posts Relacionados</h2>
                <div class="related-posts-grid">
                    <?php
                    foreach ($related_posts as $related) :
                        setup_postdata($related);
                        $related_categories = get_the_category($related->ID);
                        ?>
                        <article class="news-card">
                            <div class="card-image">
                                <?php if (has_post_thumbnail($related->ID)) : ?>
                                    <?php echo get_the_post_thumbnail($related->ID, 'medium'); ?>
                                <?php else : ?>
                                    🎸
                                <?php endif; ?>
                            </div>
                            <div class="card-content">
                                <span class="card-category">
                                    <?php
                                    if (!empty($related_categories)) {
                                        echo esc_html($related_categories[0]->name);
                                    }
                                    ?>
                                </span>
                                <h3 class="card-title">
                                    <a href="<?php echo get_permalink($related->ID); ?>">
                                        <?php echo esc_html($related->post_title); ?>
                                    </a>
                                </h3>
                                <p class="card-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt($related->ID), 15); ?>
                                </p>
                                <div class="card-meta">
                                    <span>📅 <?php echo get_the_date('d M Y', $related->ID); ?></span>
                                    <span>👁️ <?php echo get_post_meta($related->ID, 'post_views_count', true) ?: '0'; ?> views</span>
                                </div>
                            </div>
                        </article>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <?php
    endif;
    ?>

    <!-- Comments -->
    <?php
    if (comments_open() || get_comments_number()) :
        ?>
        <div class="single-post-container">
            <div style="grid-column: 1 / -1;">
                <?php comments_template(); ?>
            </div>
        </div>
        <?php
    endif;
    ?>

<?php
endwhile;
?>

<?php get_footer(); ?>