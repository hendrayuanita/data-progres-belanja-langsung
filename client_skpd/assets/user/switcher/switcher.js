jQuery(document).ready(function () {
	jQuery.styleSwitcher();
});

(function ($) {
	//main vars
	var switcher;

	// class constructor / "init" function
	$.styleSwitcher = function () {
		isMobile = false;//(Jacked.getMobile() == null) ? false : true;

		//container
		switcher = $('.styleSwitcherWrapper');

		if(isMobile){
			switcher.remove();
		}else{
			initSwitcher();
			initToggle();
		}
	};
	
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//INITIATE STYLE SWITCHER
/////////////////////////////////////////////////////////////////////////////////////////////////////////

	function initSwitcher() {

		// SKIN

		$('.switcherSkin a').click(function (e) {

			setCookie('skin-accent', jQuery(this).attr('data-value') );

			$('.styleSwitcherPanel .skin_color_section span').attr('style', $(this).attr('style') );

			if ($(this).hasClass('selected')) {
				return false;
			}

			// remove orig vals
			orig_val = $('.switcherSkin a.selected').attr('data-value');
			$('.switcherSkin a.selected').removeClass('selected');

			$('#skin-style-css').remove();

			// select
			css_link = $(this).attr('href');
			$(this).addClass('selected');

			$('head').append( "<link rel='stylesheet' id='skin-style-css' href='"+css_link+"' type='text/css' media='all' />" );

			return false;
		});

		// HEADER LAYOUT:  UP / FIXED

		$('.switcherHeaderLayout a').click(function (e) {
			setCookie('header-position', $(this).attr('data-value') );

			if ($(this).hasClass('selected')) {
				return false;
			}

			headerLayout = $(this).attr('data-value');
			if( 'fixed' == headerLayout ){
				$('.header_main_wrapper').attr('data-position','fixed').css('position','fixed');
			}else{
				$('.header_main_wrapper').attr('data-position','').css('position','static');
				$('.top_content').css('padding-top', '0');
			}

			$('.switcherHeaderLayout a.selected').removeClass('selected');
			$(this).addClass('selected');

			$(window).resize();
			$(window).scroll();
			$('body').scroll();
			return false;
		});

		// GLOBAL PAGE LAYOUT:  BOXED / FULLWIDTH

		$('.skin-use-boxed-layout a').click(function (e) {
			setCookie('skin-use-boxed-layout', jQuery(this).attr('data-value') );

			if ($(this).hasClass('selected')) {
				return false;
			}

			pageLayoutBoxed = ('on' == $(this).attr('data-value'));
			if( pageLayoutBoxed ){
				$('body').addClass('boxed');
				$('.page_layout_section span').html('Boxed');
			}else{
				$('body').removeClass('boxed');
				$('.page_layout_section span').html('Fullwidth');
			}

			$('.skin-use-boxed-layout a.selected').removeClass('selected');
			$(this).addClass('selected');

			$(window).resize();

			return false;
		});

		// SKIN LAYOUT: BOXED: BACKGROUND: IMAGE vs COLOR

		$('.skin-use-custom-background-image a').click(function (e) {
			setCookie('skin-use-custom-background-image', $(this).attr('data-value') );
			if( $(this).hasClass('skin-use-custom-background-image-on') ){

				_val = $('.styleSwitcherPanel .skin-boxed-background-color').val();
				$('.styleSwitcherPanel .background_image_section span').attr('style', 'background-color:#'+_val);

				$(this).addClass('selected');
				$('.skin-use-custom-background-image-off').removeClass('selected');

				$('.styleSwitcherPanel .skin-boxed-background-image').show();
				$('.styleSwitcherPanel .skin-boxed-background-color-wrapper').hide();
				$('.styleSwitcherPanel .skin-boxed-background-image a.selected').click();
			}else{
				$(this).addClass('selected');
				$('.styleSwitcherPanel .skin-use-custom-background-image-on').removeClass('selected');

				$('.styleSwitcherPanel .skin-boxed-background-image').hide();
				$('.styleSwitcherPanel .skin-boxed-background-color-wrapper').show();
				$(".styleSwitcherPanel .skin-boxed-background-color").ColorPickerSetColor( "#" + $('.styleSwitcherPanel .skin-boxed-background-color').val() );
				$('body').css('background-image','none');
			}

			return false;

		});

		// SKIN LAYOUT: BOXED: BACKGROUND = IMAGE
		$('.styleSwitcherPanel .skin-boxed-background-image .predefined-background').click(function (e) {
			setCookie('skin-boxed-background-image', $(this).attr('data-value'));

			$('.styleSwitcherPanel .skin-boxed-background-image .predefined-background').removeClass('selected');
			$(this).addClass('selected');

			$('body').attr('style', $(this).attr('style'));
			$('.styleSwitcherPanel .background_image_section span').attr('style', $(this).attr('style'));
			return false;
		});

		// SKIN LAYOUT: BOXED: BACKGROUND = IMAGE
		$('.styleSwitcherPanel .skin-boxed-background-color').change(function (e) {
			_val = $('.styleSwitcherPanel .skin-boxed-background-color').val();
			setCookie('skin-boxed-background-color', _val );
			$('.styleSwitcherPanel .background_image_section span').attr('style', 'background-color:#'+_val);
			$('body').attr('style', 'background-color:#'+_val);
			$('body').css('background-image', 'none');
		});
		
		$('.resetCookies').click(function () {

			setCookie('header-position'                 , $(this).attr('data-header-position'));
			setCookie('skin-accent'                     , $(this).attr('data-skin-accent'));
			setCookie('skin-boxed-background-color'     , $(this).attr('data-skin-boxed-background-color'));
			setCookie('skin-boxed-background-image'     , $(this).attr('data-skin-boxed-background-image'));
			setCookie('skin-use-boxed-layout'           , $(this).attr('data-skin-use-boxed-layout'));
			setCookie('skin-use-custom-background-image', $(this).attr('data-skin-use-custom-background-image'));
		
			location.reload();
		
			return false;
		});
	}

	function initToggle() {

		var switcherOpen = false;
		var btn = $('.styleSwitcherToggle');
		var w = switcher.outerWidth();

		if( getCookie('tmplSwitcherOpened') ) {
			switcher.css('left','0');
			switcherOpen = true;
		}else{
			switcher.css('left',-w);
			switcherOpen = false;
		}

		btn.click(function (e) {
			e.preventDefault();
			switcher.animate({
				left: switcherOpen ? -w : 0
			}, 500);
			switcherOpen = !switcherOpen;
			setCookie('tmplSwitcherOpened',switcherOpen ? '1' : '');
		});
	}
})(jQuery);
