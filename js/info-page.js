
;(function($) {

	$('.vonline-tab-nav a').on('click',function (e) {
		e.preventDefault();
		$(this).addClass('active').siblings().removeClass('active');
	});

	$('.vonline-tab-nav .begin').on('click',function (e) {		
		$('.vonline-tab-wrapper .begin').addClass('show').siblings().removeClass('show');
	});	
	$('.vonline-tab-nav .actions, .vonline-tab .actions').on('click',function (e) {		
		e.preventDefault();
		$('.vonline-tab-wrapper .actions').addClass('show').siblings().removeClass('show');

		$('.vonline-tab-nav a.actions').addClass('active').siblings().removeClass('active');

	});	
	$('.vonline-tab-nav .support').on('click',function (e) {		
		$('.vonline-tab-wrapper .support').addClass('show').siblings().removeClass('show');
	});	
	$('.vonline-tab-nav .table').on('click',function (e) {		
		$('.vonline-tab-wrapper .table').addClass('show').siblings().removeClass('show');
	});	


	$('.vonline-tab-wrapper .install-now').on('click',function (e) {	
		$(this).replaceWith('<p style="color:#23d423;font-style:italic;font-size:14px;">Plugin installed and active!</p>');
	});	
	$('.vonline-tab-wrapper .install-now.importer-install').on('click',function (e) {	
		$('.importer-button').show();
	});	


})(jQuery);
