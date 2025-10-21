<?php
/**
 * Rock Brazil Theme Functions
 * 
 * @package RockBrazil
 * @version 1.0.0
 */

// Evita acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Define constantes do tema
 */
define('ROCK_BRAZIL_VERSION', '1.0.0');
define('ROCK_BRAZIL_THEME_DIR', get_template_directory());
define('ROCK_BRAZIL_THEME_URI', get_template_directory_uri());

/**
 * Configuração inicial do tema
 */
function rock_brazil_setup() {
    // Adiciona suporte a título dinâmico
    add_theme_support('title-tag');

    // Adiciona suporte a imagens destacadas
    add_theme_support('post-thumbnails');

    // Define tamanhos de imagem personalizados
    add_image_size('rock-brazil-slider', 1200, 600, true);
    add_image_size('rock-brazil-card', 600, 400, true);
    add_image_size('rock-brazil-thumb', 300, 200, true);

    // Adiciona suporte a logo personalizado
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Adiciona suporte a HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Adiciona suporte a feeds automáticos
    add_theme_support('automatic-feed-links');

    // Adiciona suporte a refresh seletivo de widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Adiciona suporte a estilos de blocos do editor
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');

    // Registra menus de navegação
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'rock-brazil'),
        'footer-links' => __('Footer - Links Rápidos', 'rock-brazil'),
        'footer-categories' => __('Footer - Categorias', 'rock-brazil'),
    ));

    // Adiciona suporte a idiomas
    load_theme_textdomain('rock-brazil', ROCK_BRAZIL_THEME_DIR . '/languages');
}
add_action('after_setup_theme', 'rock_brazil_setup');

/**
 * Define content width
 */
function rock_brazil_content_width() {
    $GLOBALS['content_width'] = apply_filters('rock_brazil_content_width', 1200);
}
add_action('after_setup_theme', 'rock_brazil_content_width', 0);

/**
 * Registra áreas de widgets
 */
function rock_brazil_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Principal', 'rock-brazil'),
        'id'            => 'sidebar-1',
        'description'   => __('Adicione widgets aqui.', 'rock-brazil'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer - Newsletter', 'rock-brazil'),
        'id'            => 'footer-newsletter',
        'description'   => __('Widget de newsletter no footer.', 'rock-brazil'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'rock_brazil_widgets_init');

/**
 * Enfileira scripts e estilos
 */
function rock_brazil_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'rock-brazil-fonts',
        'https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Roboto:wght@300;400;700&display=swap',
        array(),
        null
    );

    // Estilo principal do tema
    wp_enqueue_style(
        'rock-brazil-style',
        get_stylesheet_uri(),
        array(),
        ROCK_BRAZIL_VERSION
    );

    // JavaScript principal
    wp_enqueue_script(
        'rock-brazil-scripts',
        ROCK_BRAZIL_THEME_URI . '/js/scripts.js',
        array('jquery'),
        ROCK_BRAZIL_VERSION,
        true
    );

    // Adiciona variáveis JavaScript
    wp_localize_script('rock-brazil-scripts', 'rockBrazilVars', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('rock-brazil-nonce'),
    ));

    // Script de comentários apenas se necessário
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'rock_brazil_scripts');

/**
 * Adiciona classes customizadas ao body
 */
function rock_brazil_body_classes($classes) {
    // Adiciona classe se não tiver sidebar
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    // Adiciona classe para home customizada
    if (is_page_template('template-rock-brazil-home.php')) {
        $classes[] = 'rock-brazil-home';
    }

    return $classes;
}
add_filter('body_class', 'rock_brazil_body_classes');

/**
 * Contador de visualizações de posts
 */
function rock_brazil_set_post_views($post_id) {
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}

function rock_brazil_track_post_views($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    rock_brazil_set_post_views($post_id);
}
add_action('wp_head', 'rock_brazil_track_post_views');

/**
 * Função para pegar contagem de views
 */
function rock_brazil_get_post_views($post_id) {
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    
    if ($count == '') {
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        return "0";
    }
    
    return $count;
}

/**
 * Adiciona meta box para marcar post como destaque no slider
 */
function rock_brazil_add_slider_meta_box() {
    add_meta_box(
        'rock_brazil_slider_featured',
        __('Destaque no Slider', 'rock-brazil'),
        'rock_brazil_slider_meta_box_callback',
        'post',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'rock_brazil_add_slider_meta_box');

function rock_brazil_slider_meta_box_callback($post) {
    wp_nonce_field('rock_brazil_slider_meta_box', 'rock_brazil_slider_meta_box_nonce');
    
    $value = get_post_meta($post->ID, '_featured_slider', true);
    ?>
    <label>
        <input type="checkbox" name="featured_slider" value="1" <?php checked($value, '1'); ?>>
        <?php _e('Exibir este post no slider da home', 'rock-brazil'); ?>
    </label>
    <?php
}

function rock_brazil_save_slider_meta_box($post_id) {
    if (!isset($_POST['rock_brazil_slider_meta_box_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['rock_brazil_slider_meta_box_nonce'], 'rock_brazil_slider_meta_box')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['featured_slider'])) {
        update_post_meta($post_id, '_featured_slider', '1');
    } else {
        delete_post_meta($post_id, '_featured_slider');
    }
}
add_action('save_post', 'rock_brazil_save_slider_meta_box');

/**
 * Customiza excerpt length
 */
function rock_brazil_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'rock_brazil_excerpt_length', 999);

/**
 * Customiza excerpt more
 */
function rock_brazil_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'rock_brazil_excerpt_more');

/**
 * Adiciona suporte a categorias personalizadas
 */
function rock_brazil_create_default_categories() {
    $categories = array(
        'noticias' => 'Notícias',
        'reviews' => 'Reviews',
        'entrevistas' => 'Entrevistas',
        'shows' => 'Shows',
        'lancamentos' => 'Lançamentos',
        'tv-series-cinema' => 'TV, Séries e Cinema',
		'games' => 'Games'
    );
    
    foreach ($categories as $slug => $name) {
        if (!term_exists($slug, 'category')) {
            wp_insert_term($name, 'category', array('slug' => $slug));
        }
    }
}
add_action('after_switch_theme', 'rock_brazil_create_default_categories');

/**
 * Adiciona opções ao Customizer
 */
function rock_brazil_customize_register($wp_customize) {
    // Seção de Redes Sociais
    $wp_customize->add_section('rock_brazil_social_media', array(
        'title'    => __('Redes Sociais', 'rock-brazil'),
        'priority' => 30,
    ));

    // Social Media URLs
    $social_networks = array(
        'facebook' => 'Facebook',
        'instagram' => 'Instagram',
        'twitter' => 'Twitter',
        'youtube' => 'YouTube',
        'tiktok' => 'TikTok',
        'discord' => 'Discord',
    );

    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting('rock_brazil_' . $network . '_url', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('rock_brazil_' . $network . '_url', array(
            'label'    => sprintf(__('URL do %s', 'rock-brazil'), $label),
            'section'  => 'rock_brazil_social_media',
            'type'     => 'url',
        ));
    }

    // Seção Footer
    $wp_customize->add_section('rock_brazil_footer', array(
        'title'    => __('Configurações do Footer', 'rock-brazil'),
        'priority' => 31,
    ));

    $wp_customize->add_setting('rock_brazil_footer_about', array(
        'default'           => 'Seu portal definitivo de notícias, reviews e tudo sobre rock nacional e internacional. Cobertura completa da cena musical com conteúdo exclusivo e de qualidade.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('rock_brazil_footer_about', array(
        'label'    => __('Texto Sobre o Site', 'rock-brazil'),
        'section'  => 'rock_brazil_footer',
        'type'     => 'textarea',
    ));
}
add_action('customize_register', 'rock_brazil_customize_register');

/**
 * Adiciona estilos ao admin
 */
function rock_brazil_admin_styles() {
    echo '<style>
        .rock-brazil-admin-notice {
            background: linear-gradient(135deg, #8a2be2 0%, #6a1bb2 100%);
            border-left: 4px solid #00ff41;
            color: #fff;
            padding: 15px;
            margin: 15px 0;
        }
        .rock-brazil-admin-notice h2 {
            color: #00ff41;
            margin-top: 0;
        }
    </style>';
}
add_action('admin_head', 'rock_brazil_admin_styles');

/**
 * Aviso de boas-vindas no admin
 */
function rock_brazil_welcome_notice() {
    global $pagenow;
    
    if ($pagenow == 'themes.php' && isset($_GET['activated'])) {
        ?>
        <div class="notice rock-brazil-admin-notice is-dismissible">
            <h2>🤘 Bem-vindo ao Rock Brazil Theme!</h2>
            <p>Obrigado por ativar o tema Rock Brazil. Para começar:</p>
            <ol>
                <li>Crie uma nova página e selecione o template "Rock Brazil - Home Page"</li>
                <li>Configure suas redes sociais em <strong>Aparência > Personalizar > Redes Sociais</strong></li>
                <li>Crie posts e marque como "Destaque no Slider" para aparecerem na home</li>
                <li>As categorias padrão foram criadas automaticamente</li>
            </ol>
            <p><strong>Categorias disponíveis:</strong> Notícias, Reviews, Entrevistas, Shows, Lançamentos, TV Séries e Cinema</p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'rock_brazil_welcome_notice');

/**
 * Adiciona suporte a AJAX para carregar mais posts
 */
function rock_brazil_load_more_posts() {
    check_ajax_referer('rock-brazil-nonce', 'nonce');
    
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'paged'          => $page,
        'post_status'    => 'publish',
    );
    
    if (!empty($category)) {
        $args['category_name'] = $category;
    }
    
    $query = new WP_Query($args);
    
    $response = array(
        'posts' => array(),
        'has_more' => $query->max_num_pages > $page
    );
    
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            
            $categories = get_the_category();
            $category_name = !empty($categories) ? $categories[0]->name : '';
            
            $response['posts'][] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'excerpt' => wp_trim_words(get_the_excerpt(), 15),
                'permalink' => get_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'medium'),
                'category' => $category_name,
                'date' => get_the_date('d M Y'),
                'views' => get_post_meta(get_the_ID(), 'post_views_count', true) ?: '0',
            );
        }
        wp_reset_postdata();
    }
    
    wp_send_json_success($response);
}
add_action('wp_ajax_load_more_posts', 'rock_brazil_load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'rock_brazil_load_more_posts');

/**
 * Adiciona coluna de views no admin
 */
function rock_brazil_posts_column_views($columns) {
    $columns['post_views'] = __('Views', 'rock-brazil');
    return $columns;
}
add_filter('manage_posts_columns', 'rock_brazil_posts_column_views');

function rock_brazil_posts_custom_column_views($column_name, $post_id) {
    if ($column_name === 'post_views') {
        echo rock_brazil_get_post_views($post_id);
    }
}
add_action('manage_posts_custom_column', 'rock_brazil_posts_custom_column_views', 10, 2);

/**
 * Torna a coluna de views ordenável
 */
function rock_brazil_posts_sortable_columns($columns) {
    $columns['post_views'] = 'post_views';
    return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'rock_brazil_posts_sortable_columns');

function rock_brazil_posts_orderby_views($query) {
    if (!is_admin()) {
        return;
    }
    
    $orderby = $query->get('orderby');
    
    if ('post_views' == $orderby) {
        $query->set('meta_key', 'post_views_count');
        $query->set('orderby', 'meta_value_num');
    }
}
add_action('pre_get_posts', 'rock_brazil_posts_orderby_views');

/**
 * Remove versão do WordPress do head (segurança)
 */
remove_action('wp_head', 'wp_generator');

/**
 * Desabilita emojis (performance)
 */
function rock_brazil_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'rock_brazil_disable_emojis');

/**
 * Otimiza jQuery (carrega do footer)
 */
function rock_brazil_jquery_footer() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), false, null, true);
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'rock_brazil_jquery_footer');

/**
 * Adiciona shortcode para exibir posts por categoria
 */
function rock_brazil_posts_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => '',
        'posts_per_page' => 6,
        'columns' => 3,
    ), $atts);
    
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => intval($atts['posts_per_page']),
        'post_status'    => 'publish',
    );
    
    if (!empty($atts['category'])) {
        $args['category_name'] = sanitize_text_field($atts['category']);
    }
    
    $query = new WP_Query($args);
    
    if (!$query->have_posts()) {
        return '<p>' . __('Nenhum post encontrado.', 'rock-brazil') . '</p>';
    }
    
    $columns_class = 'repeat(' . intval($atts['columns']) . ', 1fr)';
    
    ob_start();
    ?>
    <div class="rock-brazil-posts-grid" style="display: grid; grid-template-columns: <?php echo esc_attr($columns_class); ?>; gap: 30px;">
        <?php
        while ($query->have_posts()) {
            $query->the_post();
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
                        <span>👁️ <?php echo rock_brazil_get_post_views(get_the_ID()); ?> views</span>
                    </div>
                </div>
            </article>
            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('rock_posts', 'rock_brazil_posts_shortcode');

/**
 * Adiciona suporte a busca por categoria
 */
function rock_brazil_search_filter($query) {
    if ($query->is_search && !is_admin()) {
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $query->set('cat', intval($_GET['category']));
        }
    }
    return $query;
}
add_filter('pre_get_posts', 'rock_brazil_search_filter');

/**
 * Função helper para pegar posts relacionados
 */
function rock_brazil_get_related_posts($post_id, $limit = 3) {
    $categories = wp_get_post_categories($post_id);
    
    if (empty($categories)) {
        return array();
    }
    
    $args = array(
        'category__in'   => $categories,
        'post__not_in'   => array($post_id),
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
    );
    
    return get_posts($args);
}

/**
 * Adiciona classe active no menu atual
 */
function rock_brazil_active_nav_class($classes, $item) {
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'rock_brazil_active_nav_class', 10, 2);

/**
 * Remove itens desnecessários do admin bar
 */
function rock_brazil_remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'rock_brazil_remove_admin_bar_links');

/**
 * Adiciona meta tags Open Graph
 */
function rock_brazil_add_og_tags() {
    if (is_single()) {
        global $post;
        
        $og_title = get_the_title();
        $og_description = wp_trim_words(get_the_excerpt(), 20);
        $og_url = get_permalink();
        $og_image = get_the_post_thumbnail_url($post->ID, 'large');
        
        echo '<meta property="og:title" content="' . esc_attr($og_title) . '" />' . "\n";
        echo '<meta property="og:description" content="' . esc_attr($og_description) . '" />' . "\n";
        echo '<meta property="og:url" content="' . esc_url($og_url) . '" />' . "\n";
        echo '<meta property="og:type" content="article" />' . "\n";
        
        if ($og_image) {
            echo '<meta property="og:image" content="' . esc_url($og_image) . '" />' . "\n";
        }
        
        echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    }
}
add_action('wp_head', 'rock_brazil_add_og_tags');

/**
 * Adiciona suporte a Breadcrumbs
 */
function rock_brazil_breadcrumbs() {
    if (is_front_page()) {
        return;
    }
    
    echo '<nav class="breadcrumbs">';
    echo '<a href="' . esc_url(home_url('/')) . '">Home</a>';
    
    if (is_category() || is_single()) {
        echo ' / ';
        the_category(' / ');
        
        if (is_single()) {
            echo ' / ';
            the_title();
        }
    } elseif (is_page()) {
        echo ' / ';
        the_title();
    } elseif (is_search()) {
        echo ' / Busca: ' . get_search_query();
    } elseif (is_404()) {
        echo ' / Erro 404';
    }
    
    echo '</nav>';
}

/**
 * Limita tentativas de login (segurança básica)
 */
function rock_brazil_check_attempted_login($user, $username, $password) {
    if (get_transient('attempted_login')) {
        $datas = get_transient('attempted_login');
        
        if ($datas['tried'] >= 3) {
            $until = get_option('_transient_timeout_attempted_login');
            $time = time_to_go($until);
            
            return new WP_Error('too_many_tries', sprintf(__('Muitas tentativas de login. Tente novamente em %s.', 'rock-brazil'), $time));
        }
    }
    
    return $user;
}
add_filter('authenticate', 'rock_brazil_check_attempted_login', 30, 3);

function rock_brazil_login_failed($username) {
    if (get_transient('attempted_login')) {
        $datas = get_transient('attempted_login');
        $datas['tried']++;
        
        if ($datas['tried'] <= 3) {
            set_transient('attempted_login', $datas, 300);
        }
    } else {
        $datas = array(
            'tried' => 1
        );
        set_transient('attempted_login', $datas, 300);
    }
}
add_action('wp_login_failed', 'rock_brazil_login_failed', 10, 1);

/**
 * Registra opções do tema
 */
function rock_brazil_register_settings() {
    register_setting('rock_brazil_options', 'rock_brazil_analytics_code');
    register_setting('rock_brazil_options', 'rock_brazil_custom_css');
}
add_action('admin_init', 'rock_brazil_register_settings');

/**
 * Debug mode info (apenas para admins)
 */
if (current_user_can('administrator') && WP_DEBUG) {
    function rock_brazil_debug_info() {
        echo '<!-- Rock Brazil Theme v' . ROCK_BRAZIL_VERSION . ' -->';
    }
    add_action('wp_head', 'rock_brazil_debug_info');
}

/**
 * Adiciona Schema.org NewsArticle
 */
function rock_brazil_add_news_schema() {
    if (is_single()) {
        global $post;
        
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'NewsArticle',
            'headline' => get_the_title(),
            'image' => get_the_post_thumbnail_url($post->ID, 'full'),
            'datePublished' => get_the_date('c'),
            'dateModified' => get_the_modified_date('c'),
            'author' => array(
                '@type' => 'Person',
                'name' => get_the_author()
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => get_bloginfo('name'),
                'logo' => array(
                    '@type' => 'ImageObject',
                    'url' => get_site_icon_url()
                )
            ),
            'description' => get_the_excerpt(),
            'mainEntityOfPage' => get_permalink()
        );
        
        echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
    }
}
add_action('wp_head', 'rock_brazil_add_news_schema');

/**
 * FIM DO ARQUIVO
 * Rock Brazil Theme - Desenvolvido com 🤘 e muito ☕
 */