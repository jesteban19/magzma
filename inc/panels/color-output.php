<?php
function magzma_customizer_header_output() {	

	//header styling
	$bg_top										=	get_option('bg_top', '#ffffff');
	$border_top_bar		   						=	get_option('border_top_bar', '#e7e7e7');
	$top_menu									=	get_option('top_menu', '#000000');
	$top_menu_hover		   						=	get_option('top_menu_hover', '#999999');
	$top_social	   								=	get_option('top_social', '#000000');
	$top_social_hover	   						=	get_option('top_social_hover', '#999999');

	$main_header	   							=	get_option('main_header', '#000000');
	$main_header_menu	   						=	get_option('main_header_menu', '#ffffff');
	$mh_menu_hover	   							=	get_option('mh_menu_hover', '#999999');
	$sub_menu_bg	   							=	get_option('sub_menu_bg', '#ffffff');


	//content styling
	$breadcrumbs_color							=	get_option('breadcrumbs_color', '#000000');
	$bc_hover									=	get_option('bc_hover', '#61c436');
	$bc_bg										=	get_option('bc_bg', '#ffffff');
	$bc_border									=	get_option('bc_border', '#e7e7e7');

	$categories_blog							=	get_option('categories_blog', '#ffffff');
	$categories_hov_blog						=	get_option('categories_hov_blog', '#ffffff');
	$categories_bg								=	get_option('categories_bg', '#61c436');
	$categories_hov_bg							=	get_option('categories_hov_bg', '#111111');

	$title_blog									=	get_option('title_blog', '#000000');
	$title_hov_blog								=	get_option('title_hov_blog', '#61c436');
	$author_name								=	get_option('author_name', '#000000');
	$author_hov_name							=	get_option('author_hov_name', '#61c436');
	$post_meta_detail_color						=	get_option('post_meta_detail_color', '#999999');
	$post_meta_hover							=	get_option('post_meta_hover', '#61c436');
	$excerpt_blog								=	get_option('excerpt_blog', '#777777');
	$btn_readmore								=	get_option('btn_readmore', '#000000');
	$btn_hov_readmore							=	get_option('btn_hov_readmore', '#111111');

	$meta_right									=	get_option('meta_right', '#333333');
	$meta_icon									=	get_option('meta_icon', '#111111');
	$bg_quote									=	get_option('bg_quote', '#e5e5e5');
	$icon_quote									=	get_option('icon_quote', '#000000');
	$text_quote									=	get_option('text_quote', '#777777');
	$tag_post									=	get_option('tag_post', '#777777');
	$tag_hov_post								=	get_option('tag_hov_post', '#000000');
	$tag_bg										=	get_option('tag_bg', '#f3f3f3');
	$tag_hov_bg									=	get_option('tag_hov_bg', '#e6e6e6');
	$next_previous								=	get_option('next_previous', '#777777');
	$arrow_next_previous						=	get_option('arrow_next_previous', '#61c436');
	$author_name_info							=	get_option('author_name_info', '#61c436');
	$author_span_info							=	get_option('author_span_info', '#000000');
	$author_desc_info							=	get_option('author_desc_info', '#777777');
	$author_bg_info								=	get_option('author_bg_info', '#ffffff');
	$btn_comment								=	get_option('btn_comment', '#61c436');
	$link_comment								=	get_option('link_comment', '#999999');
	$link_hov_comment							=	get_option('link_hov_comment', '#000000');

	$btn_up										=	get_option('btn_up', '#61c436');
	$btn_up_icon								=	get_option('btn_up_icon', '#ffffff');

	$post_title									=	get_option('post_title', '#ffffff');
	$post_title_hov								=	get_option('post_title_hov', '#555555');

	$btn_loadmore_bg							=	get_option('btn_loadmore_bg', '#61c436');
	$btn_loadmore_text							=	get_option('btn_loadmore_text', '#ffffff');

	//widget styling
	$tag_widget_bg								=	get_option('tag_widget_bg', '#000000');
	$tag_widget_hov_bg							=	get_option('tag_widget_hov_bg', '#999999');
	$tag_widget_text							=	get_option('tag_widget_text', '#ffffff');
	$tag_widget_hov_text						=	get_option('tag_widget_hov_text', '#ffffff');
	$magzma_news_bg							=	get_option('magzma_news_bg', '#61c436');
	$magzma_news_text_active					=	get_option('magzma_news_text_active', '#ffffff');
	$hov_news_text_active						=	get_option('hov_news_text_active', '#61c436');
	$magzma_news_text_deactive					=	get_option('magzma_news_text_deactive', '#000000');
	$hov_news_text_deactive						=	get_option('hov_news_text_deactive', '#61c436');
	$bg_newsletter								=	get_option('bg_newsletter', '#111111');
	$bg_newsletter_circle						=	get_option('bg_newsletter_circle', '#111111');
	$newsletter_icon							=	get_option('newsletter_icon', '#ffffff');
	$newsletter_desc							=	get_option('newsletter_desc', '#ffffff');
	$newsletter_input							=	get_option('newsletter_input', '#f2f2f7');
	$sign_btn_bg								=	get_option('sign_btn_bg', '#61c436');
	$sign_btn_text								=	get_option('sign_btn_text', '#ffffff');

	//sidebar styling
	$title_sidebar								=	get_option('title_sidebar', '#000000');
	$title_recent								=	get_option('title_recent', '#000000');
	$title_hov_recent							=	get_option('title_hov_recent', '#61c436');
	$icon_recent								=	get_option('icon_recent', '#000000');

	//footer styling
	$bg_footer1									=	get_option('bg_footer1', '#ffffff');
	$bg_footer2									=	get_option('bg_footer2', '#ffffff');
	$text_footer								=	get_option('text_footer', '#777777');
	$footer_sosmed								=	get_option('footer_sosmed', '#000000');
	$footer_hov_sosmed							=	get_option('footer_hov_sosmed', '#61c436');
	$footer_border_sosmed						=	get_option('footer_border_sosmed', '#d8d8d8');
	$footer_menu								=	get_option('footer_menu', '#000000');
	$footer_hov_menu							=	get_option('footer_hov_menu', '#61c436');
	$footer_bord_menu							=	get_option('footer_bord_menu', '#cccccc');
	


	echo '<style type="text/css">';

	//=========HEADER STYLING======//

	echo '.top-bar{background-color:'.$bg_top.'}' ;
	echo '.top-bar{border-bottom-color:'.$border_top_bar.'}' ;
	echo '.top-menu ul.sm-clean > li > a{color:'.$top_menu.'}' ;
	echo '.top-menu ul.sm-clean > li > a span.sub-arrow{border-top-color:'.$top_menu.'}' ;
	echo '.top-menu ul.sm-clean > li:hover > a{color:'.$top_menu_hover.'}' ;
	echo '.top-menu ul.sm-clean > li:hover > a span.sub-arrow{border-top-color:'.$top_menu_hover.'}' ;

	echo '#top-social ul li a{color:'.$top_social.'}' ;
	echo '#top-social ul li a:hover{color:'.$top_social_hover.'}' ;

	echo '.header-wrap{background-color:'.$main_header.'}' ;
	echo '.main-menu ul > li > a{color:'.$main_header_menu.'}' ;
	echo '.main-menu ul > li > a span.sub-arrow{border-top-color:'.$main_header_menu.'}' ;
	echo '.main-menu ul > li:hover > a{color:'.$mh_menu_hover.'}' ;
	echo '.main-menu ul > li:hover > a span.sub-arrow{border-top-color:'.$mh_menu_hover.'}' ;

	echo '.sm-clean ul{background-color:'.$sub_menu_bg.'}' ;
	echo '.sm-clean > li > ul:before, .sm-clean > li > ul:after{border-bottom-color:'.$sub_menu_bg.'}' ;


	//=========CONTENT STYLING======//

	echo '.breadcrumbs a, .breadcrumbs, #breadcrumbs .separator{color:'.$breadcrumbs_color.'}' ;
	echo '.breadcrumbs a:hover{color:'.$bc_hover.'}' ;
	echo '.breadcrumbs-wrapper{background-color:'.$bc_bg.'}' ;
	echo '.breadcrumbs-wrapper{border-bottom-color:'.$bc_border.'}' ;

	echo '.standard-post-categories .post-categories a{color:'.$categories_blog.'}' ;
	echo '.standard-post-categories .post-categories a:hover{color:'.$categories_hov_blog.'}' ;
	echo '.standard-post-categories .post-categories a{background-color:'.$categories_bg.'}' ;
	echo '.standard-post-categories .post-categories a:hover{background-color:'.$categories_hov_bg.'}' ;

	echo 'h3.post-title a, h1.post-title a, .prev-post h4.title a, .next-post h4.title a, .related-content h3, .related-title h4 a, h3.comment-reply-title{color:'.$title_blog.'}' ;
	echo 'h3.post-title a:hover, h1.post-title a:hover, .prev-post h4.title a:hover, .next-post h4.title a:hover, .related-title h4 a:hover{color:'.$title_hov_blog.'}' ;
	echo '.post-meta span.vcard, .related-content .post-meta span.author-name{color:'.$author_name.'}' ;
	echo '.post-meta span.vcard:hover, .related-content .post-meta span.author-name:hover{color:'.$author_hov_name.'}' ;
	echo '.date a, .comments a, .post-meta span.author-separator, .blog-single p.date, .blog-single span.eta:before, .related-content .post-meta span.author-name span{color:'.$post_meta_detail_color.'}' ;
	echo '.post-meta a:hover{color:'.$post_meta_hover.'}' ;
	echo '.post-text p{color:'.$excerpt_blog.'}' ;

	echo 'a.read-more{color:'.$btn_readmore.'}' ;
	echo 'a.read-more{border-bottom-color:'.$btn_readmore.'}' ;
	echo 'a.read-more:hover{color:'.$btn_hov_readmore.'}' ;
	echo 'a.read-more:hover{border-bottom-color:'.$btn_hov_readmore.'}' ;

	echo '.blog-single .post-meta span.right-section span{color:'.$meta_right.'}' ;
	echo '.blog-single .post-meta i, .love-it-wrapper a:before{color:'.$meta_icon.'}' ;

	echo 'blockquote{background-color:'.$bg_quote.'}' ;
	echo 'blockquote{color:'.$icon_quote.'}' ;
	echo 'blockquote p{color:'.$text_quote.'}' ;

	echo '.tag-wrapper a{color:'.$tag_post.'}' ;
	echo '.tag-wrapper a:hover{color:'.$tag_hov_post.'}' ;
	echo '.tag-wrapper a{background-color:'.$tag_bg.'}' ;
	echo '.tag-wrapper a:hover{background-color:'.$tag_hov_bg.'}' ;

	//echo '.share-section{background-color:'.$share_section.'}' ;

	echo '.next-prev-post .column p{color:'.$next_previous.'}' ;
	echo '.next-prev-post .column p i{color:'.$arrow_next_previous.'}' ;

	echo '.author-desc a{color:'.$author_name_info.'}' ;
	echo '.author-desc span{color:'.$author_span_info.'}' ;
	echo '.author-desc p{color:'.$author_desc_info.'}' ;
	echo '.post-author{background-color:'.$author_bg_info.'}' ;

	echo '.comment-respond form p.form-submit input{background-color:'.$btn_comment.'}' ;
	echo '.comment-respond form p.logged-in-as a, p.logged-in-as{color:'.$link_comment.'}' ;
	echo '.comment-respond form p.logged-in-as a:hover{color:'.$link_hov_comment.'}' ;

	echo '.scroll-top a, input[type="submit"]{background-color:'.$btn_up.'}' ;
	echo '.scroll-top a, input[type="submit"]{color:'.$btn_up_icon.'}' ;

	echo '.single-post-style-4-inner-content h1.post-title a, .single-post-style-2-inner-content h1.post-title a, .single-post-style-3-inner-content h1.post-title a, .single-post-style-4-inner-content .post-meta span.author-separator, .single-post-style-4-inner-content .post-meta span.vcard, .blog-single .single-post-style-4-inner-content p.date, .blog-single .single-post-style-4-inner-content .post-meta i, .single-post-style-4-inner-content .love-it-wrapper a:before, .blog-single .single-post-style-4-inner-content .post-meta span.right-section span{color:'.$post_title.'}' ;
	echo 'h3.post-title a:hover, h1.post-title a:hover, .prev-post h4.title a:hover, .next-post h4.title a:hover, .related-title h4 a:hover, .post-meta span.vcard:hover, .related-content .post-meta span.author-name:hover{color:'.$post_title_hov.'}' ;

	echo '.infinite-wrap button{background-color:'.$btn_loadmore_bg.'}' ;
	echo '.infinite-wrap button{color:'.$btn_loadmore_text.'}' ;

	//=========WIDGET STYLING======//

	echo '.tagcloud a{background-color:'.$tag_widget_bg.'}' ;
	echo '.tagcloud a:hover{background-color:'.$tag_widget_hov_bg.'}' ;
	echo '.tagcloud a{color:'.$tag_widget_text.'}' ;
	echo '.tagcloud a:hover{color:'.$tag_widget_hov_text.'}' ;
	echo '.widget.widget_magzma_news .nav-tabs li.active a, .widget.widget_magzma_news .post-item:before{background-color:'.$magzma_news_bg.'}' ;
	echo '.widget.widget_magzma_news .nav-tabs{border-bottom-color:'.$magzma_news_bg.'}' ;
	echo '.widget.widget_magzma_news .nav-tabs li.active a, .widget.widget_magzma_news .post-item:before{color:'.$magzma_news_text_active.'}' ;
	echo '.widget.widget_magzma_news .nav-tabs li.active a:hover{color:'.$hov_news_text_active.'}' ;
	echo '.widget.widget_magzma_news .nav-tabs li a{color:'.$magzma_news_text_deactive.'}' ;
	echo '.widget.widget_magzma_news .nav-tabs li a:hover{color:'.$hov_news_text_deactive.'}' ;
	echo '.newsletter-wrap{background-color:'.$bg_newsletter.'}' ;
	echo '.icon-newsletter i{background-color:'.$bg_newsletter_circle.'}' ;
	echo '.icon-newsletter i{color:'.$newsletter_icon.'}' ;
	echo '.newsletter-head{color:'.$newsletter_desc.'}' ;
	echo 'input{background-color:'.$newsletter_input.'}' ;
	echo '.newsletter-input .newsletter-button{background-color:'.$sign_btn_bg.'}' ;
	echo '.newsletter-input .newsletter-button{color:'.$sign_btn_text.'}' ;

	//=========SIDEBAR STYLING======//

	echo '.widget .widget-title{color:'.$title_sidebar.'}' ;
	echo '.widget_recent_entries ul li > a, .recentcomments, .recentcomments a, .widget_archive ul li a, .widget_categories ul li a, .widget_categories ul li a, .post-content h5 a{color:'.$title_recent.'}' ;
	echo '.widget_recent_entries ul li > a:hover, .recentcomments a:hover, .widget_archive ul li a:hover, .widget_categories ul li a:hover, .widget_categories ul li a:hover, .post-content h5 a:hover{color:'.$title_hov_recent.'}' ;
	echo '.widget_recent_entries ul li:before, .widget_archive ul li:before, .widget_categories ul li:before{color:'.$icon_recent.'}' ;

	//=========FOOTER STYLING======//

	echo '.footer-bottom{background-color:'.$bg_footer1.'}' ;
	echo '.footer{background-color:'.$bg_footer2.'}' ;
	echo '.footer-bottom .copyright-text{color:'.$text_footer.'}' ;
	echo '.social-footer ul li a{color:'.$footer_sosmed.'}' ;
	echo '.social-footer ul li a:hover{color:'.$footer_hov_sosmed.'}' ;
	echo '.social-footer ul li a{border-color:'.$footer_border_sosmed.'}' ;
	echo 'ul.footer-menu li a, .footer-bottom .copyright-text a, .footer-style-2 .footer-bottom .copyright-text a{color:'.$footer_menu.'}' ;
	echo 'ul.footer-menu li a:hover, .footer-bottom .copyright-text a:hover, .footer-style-2 .footer-bottom .copyright-text a:hover{color:'.$footer_hov_menu.'}' ;
	echo 'ul.footer-menu li:before{color:'.$footer_bord_menu.'}' ;



	echo '</style> ';

	}

	add_action( 'wp_head', 'magzma_customizer_header_output');