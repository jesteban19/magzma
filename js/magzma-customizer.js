/*
*

*
*/
( function( $ ){		
	
	// HEADER STYLING

	/* Company text logo */
	wp.customize( 'magzma_text_logo', function( value ) {
		value.bind( function( newval ) {
				$( '#header .site-title a' ).html( newval );
		
		} );
	} );

	/* Company image logo */
	wp.customize( 'magzma_img_logo', function( value ) {
		value.bind( function( newval ) {
			if( newval !== '' ) {
				$( '#header .logo-image' ).empty();
				$( '#header .logo-image' ).prepend( '<img src="" alt="'+ wp.customize._value.magzma_text_logo +'" title="'+ wp.customize._value.magzma_text_logo +'" />' );
				$( '#header .logo-image img' ).attr( 'src', newval );
			} else {
				$( '#header .top-header .header-logo' ).text( wp.customize._value.magzma_text_logo() );
			}
		} );
	} );

	/* logo spacing */
	wp.customize( 'magzma_logo_top', function( value ) {
		value.bind( function( newval ) {
			$( '#header .logo-image, #header .logo-title' ).css( 'padding-top', newval +'px' );
		} );
	} );

	wp.customize( 'magzma_logo_bottom', function( value ) {
		value.bind( function( newval ) {
			$( '#header .logo-image, #header .logo-title' ).css( 'padding-bottom', newval +'px' );
		} );
	} );

	/*container*/
	wp.customize( 'magzma_head_container_size', function( value ) {
		value.bind( function( newval ) {
			$( '.top-bar .container, #header .container' ).css( 'width', newval +'px' );
		} );
	} );

	wp.customize( 'magzma_content_container_size', function( value ) {
		value.bind( function( newval ) {
			$( '#content-wrapper .container' ).css( 'width', newval +'px' );
		} );
	} );

	wp.customize( 'magzma_foot_container_size', function( value ) {
		value.bind( function( newval ) {
			$( '#footer .container' ).css( 'width', newval +'px' );
		} );
	} );

	/* Social URL */
	wp.customize( 'magzma_twitter_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Twitter"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_facebook_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Facebook"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_linkedin_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Linkedin"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_google_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Google"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_pinterest_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Pinterest"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_dribble_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Dribbble"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_youtube_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Youtube"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_codepen_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Codepen"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_dropbox_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Dropbox"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_github_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Github"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_instagram_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Instagram"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_skype_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Skype"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_steam_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Steam"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_tumblr_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Tumblr"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_vimeo_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Vimeo"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_wordpress_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="WordPress"]' ).attr( 'href', newval );
		} );
	} );
	wp.customize( 'magzma_yahoo_link', function( value ) {
		value.bind( function( newval ) {
			$( '.soc-icon a[title="Yahoo"]' ).attr( 'href', newval );
		} );
	} );	


} )( jQuery );