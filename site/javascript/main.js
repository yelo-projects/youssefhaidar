(function($){
	jQuery.fn.mailHider = function(replaceText){
		return $("a[href^=mailto]",this).each(function(){
			var token = this.rel;
			this.onmouseover = this.oncontextmenu = function(){
				this.href = this.href.split("?")[0].replace(token, "");
				this.onmouseover = this.oncontextmenu = null;
			}
			if(replaceText!==0){this.innerHTML = this.innerHTML.replace(token, '<b style="display:none">'+token+'</b>');}
		});
	};
})(jQuery);

jQuery(function($){


		var imagesMargin = 200
			, itemOpenHeight = 600
			, $items = $('.item')
			, $galleries = $('.Images');

		
		if($items.length){
			$items.on('click','a.itemHead,a.close',function(e){
				e.preventDefault();
				var $item = $(this).parent()
					, processed = $item.hasClass('processed');
				$items.not($item.toggleClass('current')).removeClass('current');
				if(!processed){
					$item.find('.Image div.image-placeholder').each(function(){
						var $placeholder= $(this);
						var img = '<img src="'+$placeholder.attr('data-rel')+'">';
						$placeholder.parent().append(img);
						$placeholder.remove();
					});
					$item.addClass('processed').find('.ImagesThumbnails a:first-child').addClass('current');
				}
				if($item.hasClass('current')){
					var	s = $(window).scrollTop()
						, o = $item.offset().top
						, d = o - s
						, w = $(window).height()
						, bottom = w - o;
					if(bottom<itemOpenHeight/2){
						$(window).scrollTop(o);
					}		
				}
			})	
		}

		if($galleries.length){
			$galleries.on('click','.ImagesThumbnails a',function(e){
				e.preventDefault();
				var $link = $(this)
					, pos = $($link.attr('data-rel')).position().left
					, $slider = $link.parent().parent().children('.ImagesContainer').first().children('.ImagesRow').first()
					, sliderPos = $slider.scrollLeft();
				$link.addClass('current').siblings('a').removeClass('current');
				$slider.css('left',-pos + imagesMargin);
			})
		}
	
		$(document).mailHider();
});
