(function ($, undefined) {
	$(document).ready(function() {
		$('#myflipper').flipper({
			'width' : 1140,
			"arrows" : true,
			pager : true,
                        auto : true

		});
		$('#myflipper2').flipper({
			'width' : 1140,
			"arrows" : true,
			pager : true
		});
	});
}(jQuery));