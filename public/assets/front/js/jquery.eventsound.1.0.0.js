/*
 * Event sound plugin - JQuery version 1.8+
 * 
 * skurrilewelt new media
 * info@skurrilewelt.de
 * http://www.skurrilewelt.de
 * 
 * (c)2012 Olaf Sweekhorst - skurrilewelt
 * 
 * 
 */

(function($) {
	
	var EventSound = function(element, options){
		
		var obj = $(element);
		var instance = this;
		var version = "1.0.0";
		var internVersion = "01";

		// ================  private functions  ============================
		// make an audio element, bound it to parent and return the object reference
		var makeAudio = function (audioId, type, parent) {
			$("<audio>", {
				id: audioId + "_" + type
			}).appendTo(parent);
			return $('#' + audioId + '_' + type).get(0);
		};

		/**
		 * @param targetValue float 0...1
		 * @param audioElement the reference to the audio element that should be faded
		 * @param onComplete function called after finishing fading
		 * fade in or out the audio.
		 */
		var fade = function (targetValue, audioElement, onComplete) {
			var change = (audioElement.volume > targetValue) ? -0.10 : 0.10;
			var newValue = audioElement.volume + change;
			audioElement.volume = newValue.toFixed(2);
			if(audioElement.volume != targetValue) {
				setTimeout( function(){
					fade(targetValue,audioElement,onComplete);
				}, 100);
			} else {
				log("finish");
				if(onComplete != null) onComplete(audioElement);
			};
		};
		
		var pauseSound = function(audioElement) {
			log("pause");
	   		audioElement.pause();
	   	};
	   	
	   	/**
	   	 * timer callback method for the dragging sound. If object don't moves
	   	 * for more than 50ms the sound will be muted 
	   	 * 
	   	 */
	   	var timer = function(audio){
	   		clearInterval(instance.dragInterval);
	   		audio.volume = 0;
	   	};

		var log = function(message) {
			console.log("logged: " + message);
		};
	   	// ====================  work  =============================================
		
		// lookup the possible audio type
		$("<audio>", {
			id: "_1"
		}).appendTo("body");
		var canPlayType = $('#_1').get(0).canPlayType("audio/ogg");
		var extension = (canPlayType.match(/maybe|probably/i)) ?'.ogg' : '.mp3';
		$('#_1').remove();
		/*
		 * possible options are:
		 * click, hover, drag, dropSuccess and dropError, scroll
		 */
		// iterate through all registered elements
		        
		// make the audio tag
		//log(obj.attr('id'));
		var selector = (obj.attr('class') == undefined) ? 'id' : 'class';
		var audioId = obj.attr(selector) + new Date().getTime();
		audioId = audioId.replace(/ /g,'');
		
		for(var type in options) {
			var audio = makeAudio (audioId, type, obj);
			audio.src = options[type] + extension;
			//log(obj.attr('id') + " " + type + "  ; " + options[type] + extension);
			switch(type) {
				case "click":
					obj.click(function(){
						$('#' + audioId + '_click')[0].play();
					});
				break;
				case "hover":
					obj.mouseenter(function(){$('#' + audioId + '_hover')[0].play();});
				break;
				case "scroll":
					obj.scroll(function(){$('#' + audioId + '_scroll')[0].play();});
				break;
				case "drag":
					// add the interval variable for later use
					// save a reference of the timeout object to check periodically
					// if the mouse moves while dragging an object
					instance.dragInterval = null;
				break;
			};
		}
		
		//  =====================  public functions  ===============================
		/**
		 * Two functions to use as callbacks for the drag and stop event of draggable ui
		 */

		this.startDragging = function(element) {
			var audio = $(element).find("audio").get(0);
			audio.loop = "loop";
			audio.play();
		};
		this.dragging = function(element) {
			var audio = $(element).find("audio").get(0);
			clearInterval($(element).data('pluginInstance').dragInterval);
			$(element).data('pluginInstance').dragInterval = setTimeout(function(){timer(audio); }, 50);
			audio.volume = 1;
		};
		this.stopDragging = function(element) {
			clearInterval(instance.dragInterval);
			$(element).find("audio").get(0).pause();
		};
		/**
		 * Two functions to use as callbacks for the drop event of draggable ui
		*/ 
		this.playDropSuccessSound = function(element) {
			$(element).find("audio").get(0).play();
		};
		this.playDropErrorSound = function(element) {
			$(element).find("audio").get(0).play();
		};
		
		this.getVersion = function () {return version;};


	}; // end eventsound class
	
	$.fn.eventsound = function(options)
	{
		return this.each(function(){
			var element = $(this);

			// Return early if this element already has a plugin instance
			if (element.data('pluginInstance')) return;

			// Pass options to plugin constructor
			var pluginInstance = new EventSound(this,options);

			// Store plugin object in this element's data
			element.data('pluginInstance', pluginInstance);
		});
	};
	
})(jQuery); // end jquery plugin



	
	





