<?php
/**
 * Apply Samovar Boilerplate settings on front-end.
 *
 * @package Samovar Boilerplate
 * @author Alexander Goncharov (http://websanya.ru)
 * @copyright Copyright (c) 2015, Alexander Goncharov
 * @license GNU Public License (http://opensource.org/licenses/gpl-2.0.php)
 */
 
//* Add color scheme body class.
add_filter( 'body_class', 'samovar_layout_body_class' );
function samovar_layout_body_class( $classes ) {
	
	switch ( genesis_get_option( 'layout_option', SAMOVAR_SETTINGS_FIELD ) ) {
		case 'default':
			break;
		case 'boxed':
			$classes[] = 'samovar-boxed-layout';
			break;
	}
	
	return $classes;
	
} 
 
//* Add color scheme body class.
add_filter( 'body_class', 'samovar_color_scheme_body_class' );
function samovar_color_scheme_body_class( $classes ) {
	
	switch ( genesis_get_option( 'color_scheme', SAMOVAR_SETTINGS_FIELD ) ) {
		case 'red':
			$classes[] = 'samovar-red-color-scheme';
			break;
		case 'green':
			$classes[] = 'samovar-green-color-scheme';
			break;
		case 'gold':
			$classes[] = 'samovar-gold-color-scheme';
			break;
		case 'blue':
			$classes[] = 'samovar-blue-color-scheme';
			break;
	}
	
	switch ( genesis_get_option( 'color_scheme_header', SAMOVAR_SETTINGS_FIELD ) ) {
		case 'light':
			$classes[] = 'samovar-light-header-color-scheme';
			break;
		case 'dark':
			$classes[] = 'samovar-dark-header-color-scheme';
			break;
	}
	
	switch ( genesis_get_option( 'color_scheme_footer', SAMOVAR_SETTINGS_FIELD ) ) {
		case 'light':
			$classes[] = 'samovar-light-footer-color-scheme';
			break;
		case 'dark':
			$classes[] = 'samovar-dark-footer-color-scheme';
			break;
	}
	
	return $classes;
	
}
 
//* Show Yandex Share Module
if ( genesis_get_option( 'share_active', SAMOVAR_SETTINGS_FIELD ) ) {
	add_action( 'genesis_entry_footer', 'samovar_share_markup', 6 );
	function samovar_share_markup() {
		?>
		<div class="entry-share"><span id="ya_share<?php echo get_the_ID(); ?>"></span></div>
		<script>
			window.setInterval(function() {
				new Ya.share({
					element: 'ya_share<?php echo get_the_ID(); ?>',
					theme: 'counter',
          elementStyle: {
            'quickServices': [
            	<?php if ( genesis_get_option( 'share_facebook', SAMOVAR_SETTINGS_FIELD ) ) echo "'facebook'," ?>
            	<?php if ( genesis_get_option( 'share_twitter', SAMOVAR_SETTINGS_FIELD ) )  echo "'twitter'," ?>
            	<?php if ( genesis_get_option( 'share_gplus', SAMOVAR_SETTINGS_FIELD ) )  echo "'gplus'," ?>
            	<?php if ( genesis_get_option( 'share_vkontakte', SAMOVAR_SETTINGS_FIELD ) )  echo "'vkontakte'," ?>
            	<?php if ( genesis_get_option( 'share_pinterest', SAMOVAR_SETTINGS_FIELD ) )  echo "'pinterest'," ?>
            ]
          },
          description: '<?php echo trim( get_the_excerpt() ); ?>',
          image: '<?php if ( wp_get_attachment_url( get_post_thumbnail_id() ) ) { echo wp_get_attachment_url( get_post_thumbnail_id() ); } ?>',
				});
			}, 2000);
		</script>
		<?php
	}
}

//* Add footer text markup.
if ( genesis_get_option( 'footer_text', SAMOVAR_SETTINGS_FIELD ) ) {
	add_filter( 'genesis_footer_creds_text', 'samovar_footer_creds_text_markup' );
	function samovar_footer_creds_text_markup() {
		?>
		<div class="footer-credits">
			<?php echo genesis_get_option( 'footer_text', SAMOVAR_SETTINGS_FIELD ); ?>
		</div>
		<?php
	}
}

//* Add menu body class for alignment.
add_filter( 'body_class', 'samovar_menu_body_class' );
function samovar_menu_body_class( $classes ) {
	
	switch ( genesis_get_option( 'header_menu', SAMOVAR_SETTINGS_FIELD ) ) {
		case 'left':
			$classes[] = 'samovar-left-header-menu';
			break;
		case 'right':
			$classes[] = 'samovar-right-header-menu';
			break;
	}
	return $classes;
	
}

//* Add sticky header body class.
add_filter( 'body_class', 'samovar_sticky_header_body_class' );
function samovar_sticky_header_body_class( $classes ) {
	
	if ( genesis_get_option( 'sticky_header', SAMOVAR_SETTINGS_FIELD ) == 1 ) {
		$classes[] = 'samovar-sticky-header';
	} else {
		$classes[] = '';
	}
	return $classes;

}

//* Add always mobile header body class.
add_filter( 'body_class', 'samovar_always_mobile_header_body_class' );
function samovar_always_mobile_header_body_class( $classes ) {
	
	if ( genesis_get_option( 'always_mobile_header', SAMOVAR_SETTINGS_FIELD ) == 1 ) {
		$classes[] = 'samovar-always-mobile-header';
	} else {
		$classes[] = '';
	}
	return $classes;

}

if ( genesis_get_option( 'header_search', SAMOVAR_SETTINGS_FIELD ) == 1 ) {
	
	//* Add header search markup.
	add_action( 'genesis_header', 'samovar_header_search_markup' );
	function samovar_header_search_markup() {
		echo '<div class="samovar-header-search"><i id="search-trigger" class="fa fa-search"></i></div>';
	}
	
	//* Move menu markup after search.
	remove_action( 'genesis_header', 'samovar_show_header_menu' );
	add_action( 'genesis_header', 'samovar_show_header_menu' );
	
	//* Add header search overlay markup.
	add_action( 'genesis_after', 'samovar_header_search_overlay_markup' );
	function samovar_header_search_overlay_markup() {
		echo '<div class="overlay overlay-hugeinc overlay-search">
						<svg class="overlay-close" viewBox="0 0 32 32"><path d="M6.1,8.9l17,17c0.8,0.8,2,0.8,2.8,0c0.8-0.8,0.8-2,0-2.8l-17-17c-0.8-0.8-2-0.8-2.8,0S5.3,8.1,6.1,8.9z"/><path d="M23.1,6.1l-17,17c-0.8,0.8-0.8,2,0,2.8c0.8,0.8,2,0.8,2.8,0l17-17c0.8-0.8,0.8-2,0-2.8 C25.1,5.3,23.9,5.3,23.1,6.1z"/></svg>
						' . get_search_form( false ) . '
					</div>';
	}

}

//* Add favicon & touch icon markup.
add_filter( 'wp_head', 'samovar_icons_markup' );
function samovar_icons_markup() {
	
	if ( genesis_get_option( 'favicon', SAMOVAR_SETTINGS_FIELD ) ) {
		echo '<link rel="Shortcut Icon" href="' . esc_url( genesis_get_option( 'favicon', SAMOVAR_SETTINGS_FIELD ) ) . '" type="image/x-icon" />';
	}
	
	if ( genesis_get_option( 'touch_icon', SAMOVAR_SETTINGS_FIELD ) ) {
		echo '<link rel="apple-touch-icon" href="' . esc_url( genesis_get_option( 'touch_icon', SAMOVAR_SETTINGS_FIELD ) ) . '" sizes="144x144" />';
	}

}

//* Add social menu markup in footer.
if ( genesis_get_option( 'footer_menu', SAMOVAR_SETTINGS_FIELD ) ) {
	add_action( 'genesis_footer', 'samovar_footer_menu_markup' );
	function samovar_footer_menu_markup() {
		?>
		<div class="footer-social">
		<?php
		if ( genesis_get_option( 'footer_facebook', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_facebook', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-facebook"></i>				</a>
			<?php
		}
		if ( genesis_get_option( 'footer_twitter', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_twitter', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-twitter"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_gplus', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_gplus', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-google-plus"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_vk', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_vk', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-vk"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_instagram', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_instagram', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-instagram"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_youtube', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_youtube', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-youtube"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_vimeo', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_vimeo', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-vimeo-square"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_dribbble', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_dribbble', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-dribbble"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_behance', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_behance', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-behance"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_skype', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_skype', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-skype"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_tumblr', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_tumblr', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-tumblr"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_pinterest', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_pinterest', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-pinterest-p"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_soundcloud', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_soundcloud', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-soundcloud"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_flickr', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_flickr', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-flickr"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_foursquare', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_foursquare', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-foursquare"></i></a>
			<?php
		}
		if ( genesis_get_option( 'footer_rss', SAMOVAR_SETTINGS_FIELD ) ) {
			?>
			<a href="<?php echo esc_url( genesis_get_option( 'footer_rss', SAMOVAR_SETTINGS_FIELD ) ); ?>"><i class="fa fa-rss"></i></a>
			<?php
		}
	}
}

//* Initialize Google Fonts.
if ( genesis_get_option( 'fonts_google', SAMOVAR_SETTINGS_FIELD ) ) {
	add_action( 'wp_enqueue_scripts', 'samovar_google_fonts_enqueue' );
	function samovar_google_fonts_enqueue() {
		wp_enqueue_style( 'samovar-google-fonts', esc_attr( genesis_get_option( 'fonts_google', SAMOVAR_SETTINGS_FIELD ) ) );
	}
}

//* Initialize Typekit.
if ( genesis_get_option( 'fonts_typekit', SAMOVAR_SETTINGS_FIELD ) ) {
	add_action( 'genesis_after', 'samovar_typekit_init' );
	function samovar_typekit_init() {
		?>
		<script>
		  (function(d) {
		    var config = {
		      kitId: '<?php echo esc_html( genesis_get_option( 'fonts_typekit', SAMOVAR_SETTINGS_FIELD ) ); ?>',
		      scriptTimeout: 3000
		    },
		    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
		  })(document);
		</script>
		<?php
	}
}

//* Add some Custom CSS.
if ( genesis_get_option( 'custom_css_markup', SAMOVAR_SETTINGS_FIELD ) ) {
	add_action( 'wp_head', 'custom_css_markup_init' );
	function custom_css_markup_init() {
		?>
		<!-- custom css from settings -->
		<style type="text/css">
<?php echo strip_tags( genesis_get_option( 'custom_css_markup', SAMOVAR_SETTINGS_FIELD ) ); ?>
		</style>
		<?php
	}
}