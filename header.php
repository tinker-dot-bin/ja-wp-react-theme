<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
    <div id="page" class="site">
      <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'reacttheme' ); ?></a>

        <header id="masthead" class="<?php echo is_singular() ? 'site-header featured-image' : 'site-header'; ?>">

          <div class="site-branding-container">
            <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
          </div><!-- .site-branding-container -->

          <?php if ( is_singular() ) : ?>
            <div class="site-featured-image">
              <?php
                reacttheme_post_thumbnail();
                the_post();
                $discussion = ! is_page() ? reacttheme_get_discussion_data() : null;

                $classes = 'entry-header';
              if ( ! empty( $discussion ) && absint( $discussion->responses ) > 0 ) {
                $classes = 'entry-header has-discussion';
              }
              ?>
              <div class="<?php echo $classes; ?>">
                <?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
              </div><!-- .entry-header -->
              <?php rewind_posts(); ?>
            </div>
          <?php endif; ?>
        </header><!-- #masthead -->

      <div id="content" class="site-content">