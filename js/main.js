(function($) {

	'use strict';

	new WOW().init();

	/*-----------------------------------------------------------------------------------*/
	/* Document Ready
	/*-----------------------------------------------------------------------------------*/

	$(document).ready(function() {
		//Smart Menus
		$('.sm.sm-clean').smartmenus({
			mainMenuSubOffsetX: -1,
			mainMenuSubOffsetY: 4,
			subMenusSubOffsetX: 6,
			subMenusSubOffsetY: -6
		});

		//fitVids
		$(".post-content").fitVids();

		// main-news selector
		$('.main-news-post-selector').each(function() {
			$(this).readingTime({
				readingTimeTarget: $(this).find('.eta'),
				remotePath: $(this).attr('data-file'),
				remoteTarget: $(this).attr('data-target')
			});
		});

		// post-list selector
		$('.post-list-post-selector').each(function() {
			$(this).readingTime({
				readingTimeTarget: $(this).find('.eta'),
				remotePath: $(this).attr('data-file'),
				remoteTarget: $(this).attr('data-target')
			});
		});

		//scroll to top
		$('a.scroll-to-top').bind('click', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
	});

	$(".mobile-menu").click(function() {
		$("#primary-menu ul.sm-clean").toggleClass( "menu-active" );
	});

	/*-----------------------------------------------------------------------------------*/
    /*  Header Style 4
    /*-----------------------------------------------------------------------------------*/

    $('.search-bar-button').on('click', function () {
        $('.search-bar-header-style-4').toggleClass('show');
    });
    $('.search-bar-close').on('click', function () {
        $('.search-bar-header-style-4').removeClass('show');
    });

	/*-----------------------------------------------------------------------------------*/
	/*  Overlay Post Style 3
	/*-----------------------------------------------------------------------------------*/

	var postThumbHeight;
	var postThumbWidth;

	postThumbHeight = $(".post-block").height();
	postThumbWidth = $(".post-block").width();

	function magzmaoverlayHeight() {
		$('.post-block').each(function(){
				var $width = $(this).width();
				var $height = $(this).height();
				var overlaySize = $(this).find('.overlay');
				
				overlaySize.css({
					height: $height - 30,
					width: $width - 30
				})
		});
	};

	window.onload = function() {
	  magzmaoverlayHeight();
	};

	window.onresize = function() {
	  magzmaoverlayHeight();
	};

	/*-----------------------------------------------------------------------------------*/
	/*  Reading Time
	/*-----------------------------------------------------------------------------------*/

	$('.blog-item').readingTime();

	/*-----------------------------------------------------------------------------------*/
	/*  Swiper Slider & Gallery Slider
	/*-----------------------------------------------------------------------------------*/

	var swiper = new Swiper('.standard-swiper-slider', {
		nextButton: '.running-news-prev',
		prevButton: '.running-news-next',
		slidesPerView: 1,
		spaceBetween: 0,
		loop: true,
		autoplay: 7000,
		effect: 'slide'
	});

	/*-----------------------------------------------------------------------------------*/
	/*  Footer Height
	/*-----------------------------------------------------------------------------------*/

	var windowWidth = $(window).width();

	function magzmafooterPaddingHeight() {
		var mainWrapper = $('#main-wrapper');
		var footerHeight = $('#footer').height();

			mainWrapper.css('padding-bottom', footerHeight);
	}

	window.onload = function() {
		magzmafooterPaddingHeight();
	};

	window.onresize = function() {
		magzmafooterPaddingHeight();
	};

	/*-----------------------------------------------------------------------------------*/
	/*  Scroll Top
	/*-----------------------------------------------------------------------------------*/

	$(window).scrollTop();
		$(window).scroll(function() {
			if ($(this).scrollTop() > 320) {
				$('.scroll-top').addClass("show");
			} else {
				$('.scroll-top').removeClass("show");
			}
	});
	
	$('.widget.recent-post .nav-tabs a').on('click', function(e) {
		var currentAttrValue = $(this).attr('href');

		// Show/Hide Tabs
		$('.tab-pane' + currentAttrValue).show().siblings().hide();

		// Change/remove current tab to active
		$(this).parent('li').addClass('active').siblings().removeClass('active');

		e.preventDefault();
	});

	/*-----------------------------------------------------------------------------------*/
	/*  Masonry
	/*-----------------------------------------------------------------------------------*/
	/*$(window).load(function(){

		var $container = $('#grid');
			$container.imagesLoaded(function(){
			$container.masonry({
				itemSelector: 'li.post',
				transitionDuration: '0.3s'
			});			
		});

		$(function(){
			var $container = $('#grid');
				$container.imagesLoaded(function(){
				  $container.masonry({
					itemSelector: 'li.post'
				  });
				});
		});
	});*/

	/*-----------------------------------------------------------------------------------*/
	/*  Same Height & Width
	/*-----------------------------------------------------------------------------------*/
    //var thumbGrid = $('.category-grid-template .post-thumb img').width();
	    $('.cat-post-grid').each(function(){
			var thumbGrid = $(this).find('.post-thumb img').width();
			$(this).find('.post-thumb').css('width', thumbGrid);
		});

	    var contentHeight = $('.cat-post-grid').height();
		$('.cat-post-grid').each(function(){
			$(this).css('height', contentHeight + 40 );
		});

		var contentHeight2 = $('.grid-category-template .post-grid-temp .post-content').height();
		$('.post-grid-temp').each(function(){
			$(this).find('.post-content').css('height', contentHeight2 + 70 );
		});

		$('.post-list-1 .post-list-post-selector').each(function(){
			var thumbGrid2 = $(this).find('.post-thumb img').width();
			$(this).find('.post-thumb').css('color', thumbGrid2);
		});


	/*-----------------------------------------------------------------------------------*/
	/*  Extra
	/*-----------------------------------------------------------------------------------*/

	$(".sticky-widget").stick_in_parent();
	$(".share-section").stick_in_parent();

	$(".elementor-inner-section.sticky-yes").stick_in_parent()
	.on("sticky_kit:stick", function(e) {
    $(".is_stuck").css('left', 'auto');
  	});

})( jQuery );