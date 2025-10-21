<?php
/**
 * Template Name: Rock Brazil - Home Page
 * Template Post Type: page
 * 
 * @package RockBrazil
 */

get_header(); ?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Roboto:wght@300;400;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto', sans-serif;
        background: #0a0e27;
        color: #e0e0e0;
        overflow-x: hidden;
    }

    #matrix-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.05;
        z-index: 0;
        pointer-events: none;
    }

    .scanline {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, transparent 50%, rgba(0, 255, 65, 0.02) 51%);
        background-size: 100% 4px;
        pointer-events: none;
        animation: scanlines 8s linear infinite;
        z-index: 1;
    }

    @keyframes scanlines {
        0% { transform: translateY(0); }
        100% { transform: translateY(4px); }
    }

    .hero {
        position: relative;
        z-index: 2;
        max-width: 1400px;
        margin: 40px auto;
        padding: 0 40px;
    }

    .hero-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
    }

    .slider-container {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        border: 2px solid #8a2be2;
        box-shadow: 0 0 40px rgba(138, 43, 226, 0.3);
        height: 500px;
    }

    .slide {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 0.5s ease;
        background-size: cover;
        background-position: center;
    }

    .slide.active {
        opacity: 1;
    }

    .slide-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 40px;
        background: linear-gradient(to top, rgba(10, 14, 39, 0.95), transparent);
    }

    .slide-category {
        display: inline-block;
        background: #8a2be2;
        color: #fff;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .slide-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 32px;
        color: #00ff41;
        text-shadow: 0 0 15px rgba(0, 255, 65, 0.8);
        margin-bottom: 10px;
        font-weight: 900;
    }

    .slide-title a {
        color: inherit;
        text-decoration: none;
    }

    .slide-excerpt {
        color: #e0e0e0;
        font-size: 16px;
        line-height: 1.6;
    }

    .slider-controls {
        position: absolute;
        bottom: 20px;
        right: 20px;
        display: flex;
        gap: 10px;
        z-index: 10;
    }

    .slider-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        border: 2px solid #8a2be2;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .slider-dot.active {
        background: #00ff41;
        box-shadow: 0 0 10px rgba(0, 255, 65, 0.8);
    }

    .quick-news {
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 0 30px rgba(138, 43, 226, 0.2);
        height: 500px;
        overflow-y: auto;
    }

    .quick-news::-webkit-scrollbar {
        width: 8px;
    }

    .quick-news::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.3);
        border-radius: 10px;
    }

    .quick-news::-webkit-scrollbar-thumb {
        background: #8a2be2;
        border-radius: 10px;
    }

    .quick-news h3 {
        font-family: 'Orbitron', sans-serif;
        color: #00ff41;
        text-shadow: 0 0 10px rgba(0, 255, 65, 0.6);
        margin-bottom: 20px;
        font-size: 20px;
        border-bottom: 2px solid #8a2be2;
        padding-bottom: 10px;
    }

    .quick-news-item {
        padding: 15px;
        margin-bottom: 15px;
        background: rgba(138, 43, 226, 0.05);
        border-left: 3px solid #8a2be2;
        border-radius: 5px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .quick-news-item:hover {
        background: rgba(138, 43, 226, 0.1);
        border-left-color: #00ff41;
        transform: translateX(5px);
    }

    .quick-news-item a {
        text-decoration: none;
        color: inherit;
    }

    .quick-news-time {
        color: #8a2be2;
        font-size: 12px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .quick-news-title {
        color: #e0e0e0;
        font-size: 14px;
        line-height: 1.4;
    }

    main {
        position: relative;
        z-index: 2;
        max-width: 1400px;
        margin: 60px auto;
        padding: 0 40px;
    }

    .category-section {
        margin-bottom: 80px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #8a2be2;
    }

    .section-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 32px;
        color: #00ff41;
        text-shadow: 0 0 15px rgba(0, 255, 65, 0.8);
        font-weight: 900;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .section-icon {
        font-size: 36px;
    }

    .view-all-btn {
        background: transparent;
        border: 2px solid #8a2be2;
        color: #00ff41;
        padding: 10px 25px;
        border-radius: 5px;
        font-family: 'Orbitron', sans-serif;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 1px;
        text-decoration: none;
    }

    .view-all-btn:hover {
        background: #8a2be2;
        box-shadow: 0 0 20px rgba(138, 43, 226, 0.6);
        transform: scale(1.05);
    }

    .cards-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
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

    .news-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 40px rgba(0, 255, 65, 0.3);
        border-color: #00ff41;
    }

    .card-image {
        width: 100%;
        height: 200px;
        background: linear-gradient(135deg, #1a1534 0%, #2d1b47 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        position: relative;
        overflow: hidden;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-content {
        padding: 20px;
        position: relative;
    }

    .card-category {
        display: inline-block;
        background: #8a2be2;
        color: #fff;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .card-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 18px;
        color: #00ff41;
        margin-bottom: 10px;
        font-weight: 700;
        line-height: 1.4;
    }

    .card-title a {
        color: inherit;
        text-decoration: none;
    }

    .card-title a:hover {
        text-shadow: 0 0 15px rgba(0, 255, 65, 1);
    }

    .card-excerpt {
        color: #b0b0b0;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .card-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 12px;
        color: #8a2be2;
        border-top: 1px solid rgba(138, 43, 226, 0.3);
        padding-top: 10px;
    }

    /* Últimas Notícias Section */
    .latest-news-section {
        margin: 80px auto;
        max-width: 1400px;
        padding: 0 40px;
    }

    .latest-news-wrapper {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 60px;
    }

    .latest-news-main {
        width: 100%;
    }

    .latest-news-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-bottom: 60px;
    }

    .latest-news-sidebar {
        position: sticky;
        top: 120px;
        height: fit-content;
    }

    .sidebar-widget {
        background: rgba(13, 17, 38, 0.8);
        border: 2px solid #8a2be2;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 0 20px rgba(138, 43, 226, 0.2);
    }
	
	.sidebar-widget:first-child {
    margin-top: 75px !important;
	}

    .sidebar-widget-title {
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
        margin: 0;
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
        font-size: 14px;
        line-height: 1.4;
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
        font-family: 'Orbitron', sans-serif;
    }

    .tags-cloud {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .tag-item {
        background: rgba(138, 43, 226, 0.2);
        border: 1px solid #8a2be2;
        padding: 6px 12px;
        border-radius: 15px;
        font-size: 12px;
        color: #00ff41;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .tag-item:hover {
        background: #8a2be2;
        transform: scale(1.1);
        box-shadow: 0 0 10px rgba(138, 43, 226, 0.6);
    }

    .load-more-container {
        text-align: center;
        margin: 60px 0;
    }

    .load-more-btn {
        background: linear-gradient(135deg, #8a2be2 0%, #6a1bb2 100%);
        border: 2px solid #00ff41;
        color: #00ff41;
        padding: 15px 50px;
        border-radius: 30px;
        font-family: 'Orbitron', sans-serif;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 2px;
        box-shadow: 0 0 30px rgba(138, 43, 226, 0.4);
    }

    .load-more-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 0 50px rgba(0, 255, 65, 0.6);
        background: linear-gradient(135deg, #00ff41 0%, #00cc33 100%);
        color: #0a0e27;
        border-color: #8a2be2;
    }

    .load-more-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }

    .load-more-btn.loading {
        opacity: 0.7;
        pointer-events: none;
    }

    @media (max-width: 1200px) {
        .cards-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .latest-news-wrapper {
            grid-template-columns: 1fr;
        }

        .latest-news-sidebar {
            position: static;
        }

        .latest-news-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .hero-grid {
            grid-template-columns: 1fr;
        }

        .cards-grid {
            grid-template-columns: 1fr;
        }

        .slider-container {
            height: 400px;
        }

        .slide-title {
            font-size: 24px;
        }

        .latest-news-section {
            padding: 0 20px;
        }

        .latest-news-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-grid">
        <!-- Slider -->
        <div class="slider-container">
            <?php
            $slider_posts = new WP_Query(array(
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'meta_key' => '_featured_slider',
                'meta_value' => '1',
                'orderby' => 'date',
                'order' => 'DESC'
            ));

            if (!$slider_posts->have_posts()) {
                $slider_posts = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
            }

            $slide_count = 0;
            if ($slider_posts->have_posts()) :
                while ($slider_posts->have_posts()) : $slider_posts->the_post();
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $bg_style = $thumbnail ? "background-image: url('" . esc_url($thumbnail) . "');" : "";
                    $active_class = $slide_count === 0 ? 'active' : '';
                    ?>
                    <div class="slide <?php echo $active_class; ?>" style="<?php echo $bg_style; ?> background: linear-gradient(rgba(10,14,39,0.3), rgba(10,14,39,0.8)), <?php echo $bg_style; ?> center/cover;">
                        <div class="slide-content">
                            <span class="slide-category">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[0]->name);
                                }
                                ?>
                            </span>
                            <h2 class="slide-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p class="slide-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </div>
                    </div>
                    <?php
                    $slide_count++;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
            
            <div class="slider-controls">
                <?php for ($i = 0; $i < $slide_count; $i++) : ?>
                    <span class="slider-dot <?php echo $i === 0 ? 'active' : ''; ?>" data-slide="<?php echo $i; ?>"></span>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Quick News -->
        <div class="quick-news">
            <h3>⚡ Notícias Rápidas</h3>
            <?php
            $quick_news = new WP_Query(array(
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC'
            ));

            if ($quick_news->have_posts()) :
                while ($quick_news->have_posts()) : $quick_news->the_post();
                    ?>
                    <div class="quick-news-item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="quick-news-time">🕐 <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' atrás'; ?></div>
                            <div class="quick-news-title"><?php the_title(); ?></div>
                        </a>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Main Content -->
<main>
    <?php
    // Categorias para exibir
    $categories_to_display = array(
        array('slug' => 'noticias', 'icon' => '📰', 'title' => 'Últimas Notícias'),
        array('slug' => 'reviews', 'icon' => '⭐', 'title' => 'Reviews & Análises'),
        array('slug' => 'entrevistas', 'icon' => '🎙️', 'title' => 'Entrevistas Exclusivas'),
        array('slug' => 'shows', 'icon' => '🎪', 'title' => 'Shows & Eventos'),
        array('slug' => 'lancamentos', 'icon' => '🆕', 'title' => 'Lançamentos'),
        array('slug' => 'tv-series-cinema', 'icon' => '🎥', 'title' => 'TV, Séries e Cinema'),
        array('slug' => 'games', 'icon' => '🎮', 'title' => 'Games & Tecnologia')
    );

    foreach ($categories_to_display as $cat_info) :
        $category = get_category_by_slug($cat_info['slug']);
        
        if ($category) :
            $cat_posts = new WP_Query(array(
                'cat' => $category->term_id,
                'posts_per_page' => 6,
                'post_status' => 'publish'
            ));
        else :
            $cat_posts = new WP_Query(array(
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'orderby' => 'rand'
            ));
        endif;

        if ($cat_posts->have_posts()) :
            ?>
            <section class="category-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <span class="section-icon"><?php echo $cat_info['icon']; ?></span>
                        <?php echo esc_html($cat_info['title']); ?>
                    </h2>
                    <?php if ($category) : ?>
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="view-all-btn">Ver Todas</a>
                    <?php endif; ?>
                </div>
                
                <div class="cards-grid">
                    <?php
                    while ($cat_posts->have_posts()) : $cat_posts->the_post();
                        ?>
                        <article class="news-card">
                            <div class="card-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    🎸
                                <?php endif; ?>
                            </div>
                            <div class="card-content">
                                <span class="card-category">
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>
                                </span>
                                <h3 class="card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="card-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                <div class="card-meta">
                                    <span>📅 <?php echo get_the_date('d M Y'); ?></span>
                                    <span>👁️ <?php echo get_post_meta(get_the_ID(), 'post_views_count', true) ?: '0'; ?> views</span>
                                </div>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    ?>
                </div>
            </section>
            <?php
            wp_reset_postdata();
        endif;
    endforeach;
    ?>
</main>

<!-- Últimas Notícias Section com Sidebar -->
<section class="latest-news-section">
    <div class="latest-news-wrapper">
        <!-- Main Content -->
        <div class="latest-news-main">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="section-icon">📰</span>
                    Todas as Notícias
                </h2>
            </div>

            <div class="latest-news-grid" id="latest-news-container">
                <?php
                $all_posts = new WP_Query(array(
                    'posts_per_page' => 12,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'paged' => 1
                ));

                if ($all_posts->have_posts()) :
                    while ($all_posts->have_posts()) : $all_posts->the_post();
                        $post_id = get_the_ID();
                        $categories = get_the_category();
                        ?>
                        <article class="news-card">
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
                                
                                <h3 class="card-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                
                                <p class="card-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                
                                <div class="card-meta">
                                    <span>📅 <?php echo get_the_date('d M Y'); ?></span>
                                    <span>👁️ <?php echo rock_brazil_get_post_views($post_id); ?> views</span>
                                </div>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <?php if ($all_posts->max_num_pages > 1) : ?>
                <div class="load-more-container">
                    <button class="load-more-btn" data-page="2" data-max="<?php echo $all_posts->max_num_pages; ?>">
                        ⚡ Ver Mais Notícias ⚡
                    </button>
                </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar -->
        <aside class="latest-news-sidebar">
            <!-- Popular Posts Widget -->
            <div class="sidebar-widget">
                <h3 class="sidebar-widget-title">
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
                <h3 class="sidebar-widget-title">
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
                <h3 class="sidebar-widget-title">
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
                                <span><?php echo esc_html($comment->comment_author); ?> em "<?php echo get_the_title($comment->comment_post_ID); ?>"</span>
                            </a>
                        </li>
                        <?php
                    endforeach;
                    ?>
                </ul>
            </div>

            <!-- Tags Widget -->
            <div class="sidebar-widget">
                <h3 class="sidebar-widget-title">
                    <span>🏷️</span>
                    Tags Populares
                </h3>
                <div class="tags-cloud">
                    <?php
                    $tags = get_tags(array('number' => 15, 'orderby' => 'count', 'order' => 'DESC'));
                    foreach ($tags as $tag) :
                        ?>
                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="tag-item">
                            #<?php echo esc_html($tag->name); ?>
                        </a>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </aside>
    </div>
</section>

<script>
// Slider functionality
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.slider-dot');
const totalSlides = slides.length;

if (totalSlides > 0) {
    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        if (slides[index]) {
            slides[index].classList.add('active');
        }
        if (dots[index]) {
            dots[index].classList.add('active');
        }
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }

    // Auto advance slider
    setInterval(nextSlide, 5000);

    // Dot click handlers
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });
}

// Load More Functionality
document.addEventListener('DOMContentLoaded', function() {
    const loadMoreBtn = document.querySelector('.load-more-btn');
    
    if (!loadMoreBtn) return;
    
    loadMoreBtn.addEventListener('click', function() {
        const button = this;
        const currentPage = parseInt(button.getAttribute('data-page'));
        const maxPages = parseInt(button.getAttribute('data-max'));
        const container = document.getElementById('latest-news-container');
        
        if (currentPage > maxPages) return;
        
        // Disable button
        button.classList.add('loading');
        button.textContent = '⚡ Carregando... ⚡';
        
        // AJAX Request
        fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'load_more_posts',
                page: currentPage,
                nonce: '<?php echo wp_create_nonce("rock-brazil-nonce"); ?>'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.data.posts.length > 0) {
                // Add new posts
                data.data.posts.forEach(post => {
                    const card = `
                        <article class="news-card" style="opacity: 0; transform: translateY(30px);">
                            <div class="card-image">
                                ${post.thumbnail ? 
                                    `<a href="${post.permalink}"><img src="${post.thumbnail}" alt="${post.title}"></a>` : 
                                    '🎸'
                                }
                            </div>
                            <div class="card-content">
                                <span class="card-category">${post.category}</span>
                                <h3 class="card-title">
                                    <a href="${post.permalink}">${post.title}</a>
                                </h3>
                                <p class="card-excerpt">${post.excerpt}</p>
                                <div class="card-meta">
                                    <span>📅 ${post.date}</span>
                                    <span>👁️ ${post.views} views</span>
                                </div>
                            </div>
                        </article>
                    `;
                    container.insertAdjacentHTML('beforeend', card);
                });
                
                // Animate new cards
                setTimeout(() => {
                    const newCards = container.querySelectorAll('.news-card[style*="opacity: 0"]');
                    newCards.forEach((card, index) => {
                        setTimeout(() => {
                            card.style.transition = 'all 0.6s ease';
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, index * 100);
                    });
                }, 100);
                
                // Update button
                button.setAttribute('data-page', currentPage + 1);
                button.textContent = '⚡ Ver Mais Notícias ⚡';
                button.classList.remove('loading');
                
                // Check if we reached the end
                if (!data.data.has_more) {
                    button.textContent = '🎸 Não há mais posts 🎸';
                    button.disabled = true;
                }
            } else {
                button.textContent = '🎸 Não há mais posts 🎸';
                button.disabled = true;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            button.textContent = '❌ Erro ao carregar';
            button.classList.remove('loading');
            setTimeout(() => {
                button.textContent = '⚡ Ver Mais Notícias ⚡';
            }, 3000);
        });
    });
});

// Add entrance animations
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
});

document.querySelectorAll('.news-card').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'all 0.6s ease';
    observer.observe(el);
});
</script>

<?php get_footer(); ?>