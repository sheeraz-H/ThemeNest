# ============================================
# WordPress Theme Generator - PowerShell
# ============================================

# SET YOUR THEME NAME HERE
$themeName = "my-custom-theme"
$basePath  = ".\$themeName"

# ============================================
# CREATE ALL FOLDERS
# ============================================
$folders = @(
    "$basePath",
    "$basePath\template-parts",
    "$basePath\templates",
    "$basePath\inc",
    "$basePath\assets\src\scss",
    "$basePath\assets\src\js",
    "$basePath\assets\dist\css",
    "$basePath\assets\dist\js",
    "$basePath\assets\images\icons",
    "$basePath\assets\images\placeholders",
    "$basePath\assets\fonts",
    "$basePath\languages",
    "$basePath\blocks\my-block",
    "$basePath\tests"
)

foreach ($folder in $folders) {
    New-Item -ItemType Directory -Force -Path $folder | Out-Null
    Write-Host "✅ Created folder: $folder" -ForegroundColor Green
}

# ============================================
# CREATE ALL FILES
# ============================================
$files = @(
    # Root Files
    "$basePath\style.css",
    "$basePath\index.php",
    "$basePath\functions.php",
    "$basePath\header.php",
    "$basePath\footer.php",
    "$basePath\sidebar.php",
    "$basePath\single.php",
    "$basePath\page.php",
    "$basePath\archive.php",
    "$basePath\search.php",
    "$basePath\404.php",
    "$basePath\readme.txt",
    "$basePath\.gitignore",
    "$basePath\.editorconfig",
    "$basePath\package.json",
    "$basePath\webpack.config.js",
    "$basePath\composer.json",
    "$basePath\phpcs.xml",
    "$basePath\.env.example",

    # Template Parts
    "$basePath\template-parts\content.php",
    "$basePath\template-parts\content-none.php",
    "$basePath\template-parts\content-single.php",
    "$basePath\template-parts\content-page.php",
    "$basePath\template-parts\content-search.php",

    # Templates
    "$basePath\templates\template-full-width.php",
    "$basePath\templates\template-landing.php",
    "$basePath\templates\template-sidebar-left.php",

    # Inc Files
    "$basePath\inc\class-walker-nav.php",
    "$basePath\inc\custom-post-types.php",
    "$basePath\inc\custom-taxonomies.php",
    "$basePath\inc\enqueue.php",
    "$basePath\inc\theme-setup.php",
    "$basePath\inc\widgets.php",
    "$basePath\inc\meta-boxes.php",
    "$basePath\inc\ajax-handlers.php",
    "$basePath\inc\helpers.php",
    "$basePath\inc\customizer.php",
    "$basePath\inc\shortcodes.php",

    # SCSS Files
    "$basePath\assets\src\scss\style.scss",
    "$basePath\assets\src\scss\_variables.scss",
    "$basePath\assets\src\scss\_mixins.scss",
    "$basePath\assets\src\scss\_reset.scss",
    "$basePath\assets\src\scss\_typography.scss",
    "$basePath\assets\src\scss\_buttons.scss",
    "$basePath\assets\src\scss\_forms.scss",
    "$basePath\assets\src\scss\_header.scss",
    "$basePath\assets\src\scss\_footer.scss",
    "$basePath\assets\src\scss\_sidebar.scss",
    "$basePath\assets\src\scss\_cards.scss",
    "$basePath\assets\src\scss\_responsive.scss",

    # JS Files
    "$basePath\assets\src\js\main.js",
    "$basePath\assets\src\js\navigation.js",
    "$basePath\assets\src\js\customizer.js",

    # Block Files
    "$basePath\blocks\my-block\block.json",
    "$basePath\blocks\my-block\index.js",
    "$basePath\blocks\my-block\edit.js",
    "$basePath\blocks\my-block\save.js",
    "$basePath\blocks\my-block\style.scss",

    # Language Files
    "$basePath\languages\my-custom-theme.pot",

    # Test Files
    "$basePath\tests\bootstrap.php",
    "$basePath\tests\test-functions.php"
)

foreach ($file in $files) {
    New-Item -ItemType File -Force -Path $file | Out-Null
    Write-Host "✅ Created file: $file" -ForegroundColor Cyan
}

# ============================================
# ADD CONTENT TO STYLE.CSS
# ============================================
$styleContent = @"
/*
Theme Name: My Custom Theme
Theme URI: https://yoursite.com
Author: Your Name
Author URI: https://yoursite.com
Description: Industry-grade custom WordPress theme
Version: 1.0.0
Requires at least: 6.0
Tested up to: 6.5
Requires PHP: 8.0
License: GNU General Public License v2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: my-custom-theme
*/
"@
Set-Content -Path "$basePath\style.css" -Value $styleContent
Write-Host "✅ Populated: style.css" -ForegroundColor Yellow

# ============================================
# ADD CONTENT TO INDEX.PHP
# ============================================
$indexContent = @"
<?php get_header(); ?>

<main class="container">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content' ); ?>
        <?php endwhile; ?>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
"@
Set-Content -Path "$basePath\index.php" -Value $indexContent
Write-Host "✅ Populated: index.php" -ForegroundColor Yellow

# ============================================
# ADD CONTENT TO FUNCTIONS.PHP
# ============================================
$functionsContent = @"
<?php
/**
 * Theme Functions
 *
 * @package MyCustomTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define theme constants
define( 'MYTHEME_VERSION', '1.0.0' );
define( 'MYTHEME_DIR', get_template_directory() );
define( 'MYTHEME_URI', get_template_directory_uri() );

// Load all inc files
require_once MYTHEME_DIR . '/inc/theme-setup.php';
require_once MYTHEME_DIR . '/inc/enqueue.php';
require_once MYTHEME_DIR . '/inc/widgets.php';
require_once MYTHEME_DIR . '/inc/custom-post-types.php';
require_once MYTHEME_DIR . '/inc/custom-taxonomies.php';
require_once MYTHEME_DIR . '/inc/meta-boxes.php';
require_once MYTHEME_DIR . '/inc/ajax-handlers.php';
require_once MYTHEME_DIR . '/inc/helpers.php';
require_once MYTHEME_DIR . '/inc/customizer.php';
require_once MYTHEME_DIR . '/inc/shortcodes.php';
require_once MYTHEME_DIR . '/inc/class-walker-nav.php';
"@
Set-Content -Path "$basePath\functions.php" -Value $functionsContent
Write-Host "✅ Populated: functions.php" -ForegroundColor Yellow

# ============================================
# ADD CONTENT TO .GITIGNORE
# ============================================
$gitignoreContent = @"
# Node
node_modules/
npm-debug.log*
yarn-debug.log*
yarn-error.log*
package-lock.json
yarn.lock

# Build Files
assets/dist/
*.min.css
*.min.js
*.map

# Composer
vendor/
composer.lock

# Environment
.env
.env.local
wp-config.php
*.pem
*.key

# OS Files
.DS_Store
Thumbs.db
Desktop.ini
._*

# IDE
.vscode/
.idea/
*.sublime-project
*.sublime-workspace
*.swp
*~

# Logs
*.log
debug.log
/logs/

# WordPress
wp-content/uploads/
wp-content/cache/
wp-content/upgrade/

# Cache
.cache/
.sass-cache/
.parcel-cache/

# Testing
coverage/
.phpunit.result.cache

# Temp
tmp/
temp/
*.tmp
*.bak
*.orig
"@
Set-Content -Path "$basePath\.gitignore" -Value $gitignoreContent
Write-Host "✅ Populated: .gitignore" -ForegroundColor Yellow

# ============================================
# ADD CONTENT TO HEADER.PHP
# ============================================
$headerContent = @"
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container">
        <div class="site-branding">
            <?php the_custom_logo(); ?>
        </div>
        <nav class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary-menu',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'walker'         => new My_Custom_Walker(),
            ) );
            ?>
        </nav>
    </div>
</header>
"@
Set-Content -Path "$basePath\header.php" -Value $headerContent
Write-Host "✅ Populated: header.php" -ForegroundColor Yellow

# ============================================
# ADD CONTENT TO FOOTER.PHP
# ============================================
$footerContent = @"
<footer class="site-footer">
    <div class="container">
        <p><?php bloginfo( 'name' ); ?> &copy; <?php echo esc_html( date( 'Y' ) ); ?></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
"@
Set-Content -Path "$basePath\footer.php" -Value $footerContent
Write-Host "✅ Populated: footer.php" -ForegroundColor Yellow

# ============================================
# ADD CONTENT TO PACKAGE.JSON
# ============================================
$packageContent = @"
{
  "name": "my-custom-theme",
  "version": "1.0.0",
  "description": "Industry-grade custom WordPress theme",
  "license": "GPL-2.0-or-later",
  "scripts": {
    "dev":       "webpack --mode development --watch",
    "build":     "webpack --mode production",
    "lint:js":   "eslint assets/src/js/**/*.js",
    "lint:scss": "stylelint assets/src/scss/**/*.scss",
    "lint":      "npm run lint:js && npm run lint:scss"
  },
  "devDependencies": {
    "@babel/core":             "^7.22.0",
    "@babel/preset-env":       "^7.22.0",
    "babel-loader":            "^9.1.0",
    "css-loader":              "^6.8.0",
    "eslint":                  "^8.42.0",
    "mini-css-extract-plugin": "^2.7.0",
    "sass":                    "^1.63.0",
    "sass-loader":             "^13.3.0",
    "stylelint":               "^15.9.0",
    "webpack":                 "^5.86.0",
    "webpack-cli":             "^5.1.0"
  }
}
"@
Set-Content -Path "$basePath\package.json" -Value $packageContent
Write-Host "✅ Populated: package.json" -ForegroundColor Yellow

# ============================================
# DONE!
# ============================================
Write-Host ""
Write-Host "============================================" -ForegroundColor Magenta
Write-Host " 🎉 Theme '$themeName' Generated Successfully!" -ForegroundColor Magenta
Write-Host "============================================" -ForegroundColor Magenta
Write-Host ""
Write-Host "📂 Next Steps:" -ForegroundColor White
Write-Host "  1. cd $themeName" -ForegroundColor Gray
Write-Host "  2. composer install" -ForegroundColor Gray
Write-Host "  3. npm install" -ForegroundColor Gray
Write-Host "  4. npm run dev" -ForegroundColor Gray
Write-Host ""