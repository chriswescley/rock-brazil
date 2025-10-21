<?php
/**
 * Header Template
 * Rock Brazil WordPress Theme
 * 
 * @package RockBrazil
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Matrix Background Canvas - FIXED -->
<canvas id="matrix-bg" style="position: fixed !important; top: 0 !important; left: 0 !important; width: 100vw !important; height: 100vh !important; z-index: -9999 !important; opacity: 0.05 !important; pointer-events: none !important;"></canvas>
<div class="scanline" style="position: fixed !important; top: 0 !important; left: 0 !important; width: 100vw !important; height: 100vh !important; z-index: -9998 !important; pointer-events: none !important;"></div>

<!-- Header -->
<header id="masthead" class="site-header">
    <div class="header-container">
        <!-- Logo -->
        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" rel="home">
                    <span class="logo-icon">🤘</span>
                    <span class="logo-text"><?php bloginfo('name'); ?></span>
                </a>
            <?php endif; ?>
            
            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) :
            ?>
                <p class="site-description"><?php echo $description; ?></p>
            <?php endif; ?>
        </div>

        <!-- Primary Navigation -->
        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="hamburger-icon"></span>
                <span class="screen-reader-text"><?php esc_html_e('Menu', 'rock-brazil'); ?></span>
            </button>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'fallback_cb'    => 'rock_brazil_default_menu',
            ));
            ?>
        </nav>

        <!-- Search Box -->
        <div class="header-search">
            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <label>
                    <span class="screen-reader-text"><?php echo esc_html_x('Buscar por:', 'label', 'rock-brazil'); ?></span>
                    <input type="search" 
                           class="search-field" 
                           placeholder="<?php echo esc_attr_x('Buscar...', 'placeholder', 'rock-brazil'); ?>" 
                           value="<?php echo get_search_query(); ?>" 
                           name="s" />
                </label>
                <button type="submit" class="search-submit">
                    <span class="search-icon">🔍</span>
                </button>
            </form>
        </div>

        <!-- Mobile Menu Toggle -->
        <div class="mobile-menu-wrapper">
            <button class="mobile-menu-toggle" aria-label="<?php esc_attr_e('Menu Mobile', 'rock-brazil'); ?>">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div><!-- .header-container -->

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay">
        <div class="mobile-menu-content">
            <button class="mobile-menu-close">&times;</button>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'mobile-menu',
                'menu_class'     => 'mobile-nav-menu',
                'container'      => 'nav',
                'container_class'=> 'mobile-navigation',
            ));
            ?>
            
            <!-- Mobile Search -->
            <div class="mobile-search">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" 
                           class="search-field" 
                           placeholder="<?php echo esc_attr_x('Buscar...', 'placeholder', 'rock-brazil'); ?>" 
                           value="<?php echo get_search_query(); ?>" 
                           name="s" />
                    <button type="submit" class="search-submit">🔍</button>
                </form>
            </div>
        </div>
    </div>
</header><!-- #masthead -->

<?php
/**
 * Fallback menu if no menu is set
 */
function rock_brazil_default_menu() {
    echo '<ul id="primary-menu" class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog')) . '">Notícias</a></li>';
    echo '<li><a href="' . esc_url(home_url('/reviews')) . '">Reviews</a></li>';
    echo '<li><a href="' . esc_url(home_url('/entrevistas')) . '">Entrevistas</a></li>';
    echo '<li><a href="' . esc_url(home_url('/shows')) . '">Shows</a></li>';
    echo '<li><a href="' . esc_url(home_url('/sobre')) . '">Sobre</a></li>';
    echo '</ul>';
}
?>

<div id="content" class="site-content">
<?php
/**
 * Hook: rock_brazil_before_content
 * 
 * @hooked rock_brazil_hero_section - 10 (only on front page)
 */
do_action('rock_brazil_before_content');
?>