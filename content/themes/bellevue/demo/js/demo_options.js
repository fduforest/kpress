jQuery(document).ready(function($){

	$('#dynamic_select').bind('change', function () {
		var url = $(this).val(); // get selected value
		if (url) { // require a URL
			window.location = url; // redirect
		}
		return false;
	});
	
	$.easing.themoEasing = function (x, t, b, c, d) {
        return c*((t=t/d-1)*t*t + 1) + b;
    }
	

$('a#toggle-section').click(function(){
			
		//open
		if(!$('#style-selection').hasClass('open')){
			$('#style-selection').addClass('open');
			$('#style-selection').stop().animate({
				'right' : '0'
			},600,'themoEasing');
		}
		
		//close  
		else {
			$('#style-selection').removeClass('open');
			$('#style-selection').stop().animate({
				'right' : '-190px'
			},500,'themoEasing');
		}

		return false;
	});
	
	//layout style select
	$('.section-options select[name=layout-style]').change(function(){
		if($(this).val() == 'boxed' && $('#boxed').length == 0) {
			// Switched to Boxed Style
			$('body').wrapInner('<div id="boxed"></div>');
			$( "body" ).addClass( "boxed-mode" );
			console.log('go boxed');
		}
		if($(this).val() == 'wide' && $('#boxed').length == 1) {
			// Switched to Full Width
			$('body').find('#boxed').replaceWith( $('body #boxed').contents() );
			$( "body" ).removeClass( "boxed-mode" );
			console.log('go full width');
		}
	});
	
	$('.section-options .patterns li').click(function(){
		$('.section-options li').removeClass('active-bg');
		$(this).addClass('active-bg');
		
		$('body').css({
			'background-image':'url('+$(this).attr('data-full')+')',
			'background-repeat': 'repeat',
			'background-attachment': 'fixed',
			'background-size': 'auto'
		});
		$('body').wrapInner('<div id="boxed"></div>');
		$( "body" ).addClass( "boxed-mode" );
		$('.section-options select[name=layout-style]').val('boxed');
		return false;
	});
	
	$('.section-options .bg-images li').click(function(){
		$('.section-options li').removeClass('active-bg');
		$(this).addClass('active-bg');
		$('body').css({
			'background-image':'url('+$(this).attr('data-full')+')',
			'background-repeat': 'no-repeat',
			'background-attachment': 'fixed',
			'background-size': 'cover'
		});
		$('body').wrapInner('<div id="boxed"></div>');
		$( "body" ).addClass( "boxed-mode" );
		$('.section-options select[name=layout-style]').val('boxed');
		return false;
	});
	
	
	$('.section-options .colors li').click(function(){

		var color_primary = $(this).attr('data-color-primary');
		var color_accent = $(this).attr('data-color-accent');
		var color_combo = $(this).attr('data-color-combo');
		
		//console.log('Primary '+color_primary);
		//console.log('Accent '+color_accent);
		
		var css_file = "/bellevue/wp-content/themes/bellevue/demo/css/combo_"+color_combo+".css";
		
		$.ajax({
            url:css_file,
            success:function(data){
                 $("<style scoped></style>").appendTo("head").html(data);
            }
        })


		return false;
	});

});
