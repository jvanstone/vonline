jQuery( document ).ready(function($) {
	"use strict";

	$('.customize-control-vonline-multiple-select').each(function(){
		$('.customize-control-vonline-multiple-select select').select2({
			allowClear: false
		});
	});

	$(".customize-control-vonline-multiple-select select").on("change", function() {
		var select2Val = $(this).val();
		$(this).parent().find('.customize-control-dropdown-select2').val(select2Val).trigger('change');
	});

});