(function($) {

	'use strict';

		$(document).ready(function() {

			/* Tabs in welcome page */
			function magzma_welcome_page_tabs(event) {
				$(event).parent().addClass("active");
		        $(event).parent().siblings().removeClass("active");
		        var tab = $(event).attr("href");
		        $(".magzma-tab-pane").not(tab).css("display", "none");
		        $(tab).fadeIn();
			}

			var magzma_actions_anchor = location.hash;

			if( (typeof magzma_actions_anchor !== 'undefined') && (magzma_actions_anchor != '') ) {
				magzma_welcome_page_tabs('a[href="'+ magzma_actions_anchor +'"]');
			}

		    $(".magzma-nav-tabs a").click(function(event) {
		        event.preventDefault();
				magzma_welcome_page_tabs(this);
		    });

				/* Tab Content height matches admin menu height for scrolling purpouses */
			 $tab = $('.magzma-tab-content > div');
			 $admin_menu_height = $('#adminmenu').height();
			 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
			 {
				 $newheight = $admin_menu_height - 200;
				 $tab.css('min-height',$newheight);
			 }

		});
		
})( jQuery );