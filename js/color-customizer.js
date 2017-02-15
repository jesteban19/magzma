/*
*

*
*/
( function( $ ){		
	
// HEADER STYLING

	wp.customize('bg_top',function( value ) {
		value.bind(function(to) {
			$('.top-bar').css('background-color', to ? to : '' );
		});
	});	

	wp.customize('border_top_bar',function( value ) {
		value.bind(function(to) {
			$('.top-bar').css('border-bottom-color', to ? to : '' );
		});
	});


	wp.customize('top_menu',function( value ) {
		value.bind(function(to) {
			$('.top-menu ul.sm-clean > li > a').css('color', to ? to : '' );
			$('.top-menu ul.sm-clean > li > a span.sub-arrow').css('border-top-color', to ? to : '' );
		});
	});

	wp.customize('top_menu_hover',function( value ) {
		value.bind(function(to) {
			$('.top-menu ul.sm-clean > li:hover > a').css('color', to ? to : '' );
			$('.top-menu ul.sm-clean > li:hover > a span.sub-arrow').css('border-top-color', to ? to : '' );
		});
	});

	wp.customize('top_social',function( value ) {
		value.bind(function(to) {
			$('#top-social ul li a').css('color', to ? to : '' );
		});
	});

	wp.customize('top_social_hover',function( value ) {
		value.bind(function(to) {
			$('#top-social ul li a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('main_header',function( value ) {
		value.bind(function(to) {
			$('.header-wrap').css('background-color', to ? to : '' );
		});
	});

	wp.customize('main_header_menu',function( value ) {
		value.bind(function(to) {
			$('.main-menu ul > li > a').css('color', to ? to : '' );
		});
	});

	wp.customize('mh_menu_hover',function( value ) {
		value.bind(function(to) {
			$('.main-menu ul > li:hover > a').css('color', to ? to : '' );
		});
	});

	wp.customize('sub_menu_bg',function( value ) {
		value.bind(function(to) {
			$('.sm-clean ul').css('background-color', to ? to : '' );
		});
	});

	wp.customize('sub_menu_bg',function( value ) {
		value.bind(function(to) {
			$('.sm-clean > li > ul:before, .sm-clean > li > ul:after').css('background-bottom-color', to ? to : '' );
		});
	});



	// CONTENT STYLING

	wp.customize('breadcrumbs_color',function( value ) {
		value.bind(function(to) {
			$('.breadcrumbs a, .breadcrumbs, #breadcrumbs .separator').css('color', to ? to : '' );
		});
	});

	wp.customize('bc_hover',function( value ) {
		value.bind(function(to) {
			$('.breadcrumbs a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('bc_bg',function( value ) {
		value.bind(function(to) {
			$('.breadcrumbs-wrapper').css('background-color', to ? to : '' );
		});
	});

	wp.customize('bc_border',function( value ) {
		value.bind(function(to) {
			$('.breadcrumbs-wrapper').css('border-bottom-color', to ? to : '' );
		});
	});

	wp.customize('categories_blog',function( value ) {
		value.bind(function(to) {
			$('.standard-post-categories .post-categories a').css('color', to ? to : '' );
		});
	});

	wp.customize('categories_hov_blog',function( value ) {
		value.bind(function(to) {
			$('.standard-post-categories .post-categories a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('categories_bg',function( value ) {
		value.bind(function(to) {
			$('.standard-post-categories .post-categories a').css('background-color', to ? to : '' );
		});
	});

	wp.customize('categories_hov_bg',function( value ) {
		value.bind(function(to) {
			$('.standard-post-categories .post-categories a:hover').css('background-color', to ? to : '' );
		});
	});

	wp.customize('title_blog',function( value ) {
		value.bind(function(to) {
			$('h3.post-title a, h1.post-title a, .prev-post h4.title a, .next-post h4.title a, .related-content h3, .related-title h4 a, h3.comment-reply-title').css('color', to ? to : '' );
		});
	});

	wp.customize('title_hov_blog',function( value ) {
		value.bind(function(to) {
			$('h3.post-title a:hover, h1.post-title a:hover, .prev-post h4.title a:hover, .next-post h4.title a:hover, .related-title h4 a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('author_name',function( value ) {
		value.bind(function(to) {
			$('.post-meta span.vcard, .related-content .post-meta span.author-name').css('color', to ? to : '' );
		});
	});

	wp.customize('author_hov_name',function( value ) {
		value.bind(function(to) {
			$('.post-meta span.vcard:hover, .related-content .post-meta span.author-name:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('post_meta_detail_color',function( value ) {
		value.bind(function(to) {
			$('.date a, .comments a, .post-meta span.author-separator, .blog-single p.date, .blog-single span.eta:before.related-content .post-meta span.author-name span').css('color', to ? to : '' );
		});
	});

	wp.customize('post_meta_hover',function( value ) {
		value.bind(function(to) {
			$('.post-meta a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('excerpt_blog',function( value ) {
		value.bind(function(to) {
			$('.post-text p').css('color', to ? to : '' );
		});
	});

	wp.customize('btn_readmore',function( value ) {
		value.bind(function(to) {
			$('a.read-more').css('color', to ? to : '' );
			$('a.read-more').css('border-bottom-color', to ? to : '' );
		});
	});

	wp.customize('btn_hov_readmore',function( value ) {
		value.bind(function(to) {
			$('a.read-more:hover').css('color', to ? to : '' );
			$('a.read-more:hover').css('border-bottom-color', to ? to : '' );
		});
	});

	wp.customize('meta_right',function( value ) {
		value.bind(function(to) {
			$('.blog-single .post-meta span.right-section span').css('color', to ? to : '' );
		});
	});

	wp.customize('meta_icon',function( value ) {
		value.bind(function(to) {
			$('.blog-single .post-meta i, .love-it-wrapper a:before').css('color', to ? to : '' );
		});
	});

	wp.customize('bg_quote',function( value ) {
		value.bind(function(to) {
			$('blockquote').css('background-color', to ? to : '' );
		});
	});

	wp.customize('icon_quote',function( value ) {
		value.bind(function(to) {
			$('blockquote').css('color', to ? to : '' );
		});
	});

	wp.customize('text_quote',function( value ) {
		value.bind(function(to) {
			$('blockquote p').css('color', to ? to : '' );
		});
	});

	wp.customize('tag_post',function( value ) {
		value.bind(function(to) {
			$('.tag-wrapper a').css('color', to ? to : '' );
		});
	});

	wp.customize('tag_hov_post',function( value ) {
		value.bind(function(to) {
			$('.tag-wrapper a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('tag_bg',function( value ) {
		value.bind(function(to) {
			$('.tag-wrapper a').css('background-color', to ? to : '' );
		});
	});

	wp.customize('tag_hov_bg',function( value ) {
		value.bind(function(to) {
			$('.tag-wrapper a:hover').css('background-color', to ? to : '' );
		});
	});

	wp.customize('share_section',function( value ) {
		value.bind(function(to) {
			$('.share-section').css('background-color', to ? to : '' );
		});
	});

	wp.customize('next_previous',function( value ) {
		value.bind(function(to) {
			$('.next-prev-post .column p').css('color', to ? to : '' );
		});
	});

	wp.customize('arrow_next_previous',function( value ) {
		value.bind(function(to) {
			$('.next-prev-post .column p i').css('color', to ? to : '' );
		});
	});

	wp.customize('author_name_info',function( value ) {
		value.bind(function(to) {
			$('.author-desc a').css('color', to ? to : '' );
		});
	});

	wp.customize('author_span_info',function( value ) {
		value.bind(function(to) {
			$('.author-desc span').css('color', to ? to : '' );
		});
	});

	wp.customize('author_desc_info',function( value ) {
		value.bind(function(to) {
			$('.author-desc p').css('color', to ? to : '' );
		});
	});

	wp.customize('author_bg_info',function( value ) {
		value.bind(function(to) {
			$('.post-author').css('background-color', to ? to : '' );
		});
	});

	wp.customize('btn_comment',function( value ) {
		value.bind(function(to) {
			$('.comment-respond form p.form-submit input').css('background-color', to ? to : '' );
		});
	});

	wp.customize('link_comment',function( value ) {
		value.bind(function(to) {
			$('.comment-respond form p.logged-in-as a, p.logged-in-as').css('color', to ? to : '' );
		});
	});

	wp.customize('link_hov_comment',function( value ) {
		value.bind(function(to) {
			$('.comment-respond form p.logged-in-as a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('btn_up',function( value ) {
		value.bind(function(to) {
			$('.scroll-top a, input[type="submit"]').css('background-color', to ? to : '' );
		});
	});

	wp.customize('btn_up_icon',function( value ) {
		value.bind(function(to) {
			$('.scroll-top a, input[type="submit"]').css('color', to ? to : '' );
		});
	});

	wp.customize('post_title',function( value ) {
		value.bind(function(to) {
			$('.single-post-style-4-inner-content h1.post-title a, .single-post-style-2-inner-content h1.post-title a, .single-post-style-3-inner-content h1.post-title a, .single-post-style-4-inner-content .post-meta span.author-separator, .single-post-style-4-inner-content .post-meta span.vcard, .blog-single .single-post-style-4-inner-content p.date, .blog-single .single-post-style-4-inner-content .post-meta i, .single-post-style-4-inner-content .love-it-wrapper a:before, .blog-single .single-post-style-4-inner-content .post-meta span.right-section span').css('color', to ? to : '' );
		});
	});

	wp.customize('post_title_hov',function( value ) {
		value.bind(function(to) {
			$('h3.post-title a:hover, h1.post-title a:hover, .prev-post h4.title a:hover, .next-post h4.title a:hover, .related-title h4 a:hover, .post-meta span.vcard:hover, .related-content .post-meta span.author-name:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('btn_loadmore_bg',function( value ) {
		value.bind(function(to) {
			$('.infinite-wrap button').css('background-color', to ? to : '' );
		});
	});

	wp.customize('btn_loadmore_text',function( value ) {
		value.bind(function(to) {
			$('.infinite-wrap button').css('color', to ? to : '' );
		});
	});


	// WIDGET STYLING

	wp.customize('tag_widget_bg',function( value ) {
		value.bind(function(to) {
			$('.tagcloud a').css('background-color', to ? to : '' );
		});
	});

	wp.customize('tag_widget_hov_bg',function( value ) {
		value.bind(function(to) {
			$('.tagcloud a:hover').css('background-color', to ? to : '' );
		});
	});

	wp.customize('tag_widget_text',function( value ) {
		value.bind(function(to) {
			$('.tagcloud a').css('color', to ? to : '' );
		});
	});

	wp.customize('tag_widget_hov_text',function( value ) {
		value.bind(function(to) {
			$('.tagcloud a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('magzma_news_bg',function( value ) {
		value.bind(function(to) {
			$('.widget.widget_magzma_news .nav-tabs li.active a, .widget.widget_magzma_news .post-item:before').css('background-color', to ? to : '' );
			$('.widget.widget_magzma_news .nav-tabs').css('border-bottom-color', to ? to : '' );
		});
	});

	wp.customize('magzma_news_text_active',function( value ) {
		value.bind(function(to) {
			$('.widget.widget_magzma_news .nav-tabs li.active a, .widget.widget_magzma_news .post-item:before').css('color', to ? to : '' );
		});
	});

	wp.customize('hov_news_text_active',function( value ) {
		value.bind(function(to) {
			$('.widget.widget_magzma_news .nav-tabs li.active a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('magzma_news_text_deactive',function( value ) {
		value.bind(function(to) {
			$('.widget.widget_magzma_news .nav-tabs li a').css('color', to ? to : '' );
		});
	});

	wp.customize('hov_news_text_deactive',function( value ) {
		value.bind(function(to) {
			$('.widget.widget_magzma_news .nav-tabs li a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('bg_newsletter',function( value ) {
		value.bind(function(to) {
			$('.newsletter-wrap').css('background-color', to ? to : '' );
		});
	});

	wp.customize('bg_newsletter_circle',function( value ) {
		value.bind(function(to) {
			$('.icon-newsletter i').css('background-color', to ? to : '' );
		});
	});

	wp.customize('newsletter_icon',function( value ) {
		value.bind(function(to) {
			$('.icon-newsletter i').css('color', to ? to : '' );
		});
	});

	wp.customize('newsletter_desc',function( value ) {
		value.bind(function(to) {
			$('.newsletter-head').css('color', to ? to : '' );
		});
	});

	wp.customize('newsletter_input',function( value ) {
		value.bind(function(to) {
			$('input').css('background-color', to ? to : '' );
		});
	});

	wp.customize('sign_btn_bg',function( value ) {
		value.bind(function(to) {
			$('.newsletter-input .newsletter-button').css('background-color', to ? to : '' );
		});
	});

	wp.customize('sign_btn_text',function( value ) {
		value.bind(function(to) {
			$('.newsletter-input .newsletter-button').css('color', to ? to : '' );
		});
	});


	// SIDEBAR STYLING

	wp.customize('title_sidebar',function( value ) {
		value.bind(function(to) {
			$('.widget .widget-title').css('color', to ? to : '' );
		});
	});

	wp.customize('title_recent',function( value ) {
		value.bind(function(to) {
			$('.widget_recent_entries ul li > a, .recentcomments, .recentcomments a, .widget_archive ul li a, .widget_categories ul li a, .widget_categories ul li a, .post-content h5 a').css('color', to ? to : '' );
		});
	});
	
	wp.customize('title_hov_recent',function( value ) {
		value.bind(function(to) {
			$('.widget_recent_entries ul li > a:hover, .recentcomments a:hover, .widget_archive ul li a:hover, .widget_categories ul li a:hover, .widget_categories ul li a:hover, ,post-content h5 a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('icon_recent',function( value ) {
		value.bind(function(to) {
			$('.widget_recent_entries ul li:before, .widget_archive ul li:before, .widget_categories ul li:before').css('color', to ? to : '' );
		});
	});


	// FOOTER STYLING

	wp.customize('bg_footer1',function( value ) {
		value.bind(function(to) {
			$('.footer-bottom').css('background-color', to ? to : '' );
		});
	});

	wp.customize('bg_footer2',function( value ) {
		value.bind(function(to) {
			$('.footer').css('background-color', to ? to : '' );
		});
	});

	wp.customize('text_footer',function( value ) {
		value.bind(function(to) {
			$('.footer-bottom .copyright-text').css('color', to ? to : '' );
		});
	});

	wp.customize('footer_sosmed',function( value ) {
		value.bind(function(to) {
			$('.social-footer ul li a').css('color', to ? to : '' );
		});
	});

	wp.customize('footer_hov_sosmed',function( value ) {
		value.bind(function(to) {
			$('.social-footer ul li a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('footer_border_sosmed',function( value ) {
		value.bind(function(to) {
			$('.social-footer ul li a').css('border-color', to ? to : '' );
		});
	});

	wp.customize('footer_menu',function( value ) {
		value.bind(function(to) {
			$('ul.footer-menu li a, .footer-bottom .copyright-text a, .footer-style-2 .footer-bottom .copyright-text a').css('color', to ? to : '' );
		});
	});

	wp.customize('footer_hov_menu',function( value ) {
		value.bind(function(to) {
			$('ul.footer-menu li a:hover, .footer-bottom .copyright-text a:hover, .footer-style-2 .footer-bottom .copyright-text a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('footer_bord_menu',function( value ) {
		value.bind(function(to) {
			$('ul.footer-menu li:before').css('color', to ? to : '' );
		});
	});


} )( jQuery );