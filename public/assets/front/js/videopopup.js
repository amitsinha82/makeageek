/*
 * jQuery Video Popup Plugin Stylesheet
 * Version: 2.3
 *
 * Author: Nick Rivers
 * http://nrivers.com
 *
 *
 * Changelog:
 * Version: 2.3
 *
 */
$(function(){
	var cur = cur;
	var a=$(document).height();
 	var b=$(window).width();
});

function centerS(cur) {
	cur = cur;
    cur.css("position","absolute");
    cur.css("top", ( $(window).height() - cur.height() ) / 2+$(window).scrollTop() + "px");
    cur.css("left", ( $(window).width() - cur.width() ) / 2+$(window).scrollLeft() + "px");
    return this;
}

function getwidthheight() {
	a=$(document).height();
    b=$(window).width();
	$("#dvGlobalMask").css({width:b,height:a});
}

function centervert(cur) {
    cur.stop().animate({"top": ($(window).scrollTop() + 100) + "px"}, "slow" );
    return this;
}

jQuery.fn.videopopup = function (options) {

	var settings = { // Defaults
		'videoid' : '',
		'videoplayer' : 'youtube',
		'width' : '500px',
		'height' : '300px',
		'autoplay' : 'false'
    };

	return this.each(function() {
	   // If options exist, lets merge them
      // with our default settings
      if ( options ) {
        $.extend(settings, options);
      }

	$(this).click(function(event){
		event.preventDefault();
		var a=$(document).height();
	    var b=$(window).width();
		var popuphtml = '<div id="dvGlobalMask"></div><div id="videopopup"><div class="modalnav"></div><div id="videocontent"></div></div>';
		$('body').append(popuphtml);
	    $("#dvGlobalMask").css({width:b,height:a});
	    $("#dvGlobalMask").fadeTo("fast",0.4);

		$('#videopopup').css('width' , settings.width);
		$('#videopopup').css('height' , settings.height);
		centerS($("#videopopup"));

		var autoplay = 0;
		if (settings.autoplay == 'true') {
			autoplay = 1;
		} else {
			autoplay = 0;
		}
		// Checks for the type of video that is being pulled.
		youtubestr = '<iframe width="' + settings.width + '" height="' + settings.height + '" src="https://www.youtube.com/embed/' + settings.videoid + '?autoplay=' + autoplay + '&amp;showinfo=0&amp;rel=0" frameborder="0" allowfullscreen></iframe>';
		vimeostr = '<iframe src="https://player.vimeo.com/video/' + settings.videoid + '?color=00adef&amp;show_title=0&amp;show_portrait=0&amp;autoplay=' + autoplay + '" width="' + settings.width + '" height="' + settings.height + '" frameborder="0" allowfullscreen></iframe>';

		switch (settings.videoplayer) {
			case 'youtube' :
				$("#videocontent").html($(youtubestr));
			break;
			case 'vimeo' :
				$("#videocontent").html($(vimeostr));
			break;
		}

		$("#videopopup").show();
		$('.modalnav').show();
		});

		$("body").on("click", ".modalnav", function(event){
			$('#dvGlobalMask').remove();
			$('#videopopup').remove();
			$('.modalnav').remove();
			$('#videocontent').remove('');
		});


    });


    return this;

}

$(window).resize(function() {
	centerS($("#videopopup"));
	getwidthheight();
});

$(window).scroll(function() {
	centervert($("#videopopup"));
});

