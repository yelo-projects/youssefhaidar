$('html').addClass('js');

(function(){
	jQuery.fn.mailHider = function(replaceText){
		var mail = jQuery("a[href^=mailto]",this);
		if(!mail || !mail.length){return;}
		return mail.each(function(){
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
			, itemOpenHeight = 670
			, $items = $('.item')
			, $galleries = $('.Images')
			, $w = $(window)
			, $Wrapper = $('#Wrapper')
			, scrollOpts = {verticalGutter:0,hideFocus:true}
			, refreshTimer = null
			, refreshScroll = function(evt,callback){
				if(refreshTimer){clearInterval(refreshTimer);}
				refreshTimer = setTimeout(function(){
					//$Wrapper.jScrollPane(scrollOpts);
					if(callback){callback();}
				},300);
			}
			, onLoadDo=function(el,fn){
				var oldOnLoad;
				if(el.complete || el.readyState === 4){
					fn.call(el);
				}else{
					if(el.onload){
						oldOnLoad = el.onload;
						el.onload = function(){
							fn.call(el);
							oldOnLoad.call(el);
						}
					}else{
						el.onload = function(){fn.call(el);}
					}
				}
				return el;
			}

		if($items.length){
			$items.on('click','a.itemHead,a.close',function(e){
				e.preventDefault();
				var $item = $(this).parent().toggleClass('current')
					, processed = $item.hasClass('processed');
				$items.not($item).removeClass('current');
				if(!processed){
					$item.find('.Image div.image-placeholder').each(function(){
						var $placeholder= $(this);
						var img = '<img src="'+$placeholder.attr('data-rel')+'" width="'+$placeholder.attr('data-rel-width')+'"  height="'+$placeholder.attr('data-rel-height')+'">';
						$placeholder.append(img);
						onLoadDo($placeholder.children('img').first()[0],function(){
							var $t = $placeholder.parent().parent().parent().parent().children('div.ImagesThumbnails').first().children('a#thumbnail-'+$placeholder.parent().attr('id'))
							if($t.length){$t.removeClass('inactive');}
						})		
					});
					$item.addClass('processed').find('.ImagesThumbnails a:first-child').addClass('current');
				}
				if($item.hasClass('current')){	
					refreshScroll(null,function(){
						//$Wrapper.children('div.jspContainer').first().scrollTo($item,{duration:400,easing:'easeOutQuad'});
						$Wrapper.scrollTo($item,{duration:400,easing:'easeOutQuad'});
					})
				}
				else{refreshScroll();}
				return false;
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


		var $projectsContainer = $('#ItemsList.projects'), $projects,iLnH, $sorters;
		var groupsHeaders, filter;

		if($projectsContainer.length){
			$projectsContainer.css({position:'relative',height:$projectsContainer.height(),display:'block'});
			$projects =  $('div.item',$projectsContainer).each(function(i,el){
				var iY = $(el).position().top;
				$.data(el,'h',iY);
				if (i===1){iLnH = iY;}
			});
			$sorters = $('#ListHeader a');
			$('#ListHeader').on('click','a',function(e){
				if(groupsHeaders && groupsHeaders.length){
					groupsHeaders.remove();
				}
				e.preventDefault();
				var $l = $(this).addClass('active'), desc = $l.hasClass('desc');
				$sorters.not($l).removeClass('active');
				if(filter){
					$projects.removeClass(filter);
				}	
				filter = 'data-filter-'+$l.attr('data-filter')
				if(!desc){$l.addClass('desc');}else{$l.removeClass('desc');}
				var groups = [];
				$projects.tsort({order:(desc?'desc':'asc'),attr:filter}).each(function(i,el){
					var $El = $(el).addClass(filter)
						, iFr = $.data(el,'h')
						, iTo = i*iLnH
						, val = $El.attr(filter);
					iTo+=(50*groups.length);
					if(filter!=='data-filter-title'){
						if(groups.indexOf(val)<0){
							groups.push(val);
							$El.before('<div class="groupHeader inactive">'+val+'</div>');
							iTo+=50;
						}
					}
					$El.css({position:'absolute',top:iFr}).animate({top:iTo},500,'easeInQuad',function(){
						$El.css({position:'relative',top:0});
					});
					$.data(el,'h',iTo);
				});
				$projects = $('div.item',$projectsContainer);
				if(filter!=='data-filter-title'){
					groupsHeaders  = $('div.groupHeader').slideUp(0).slideDown(500,'easeInQuad');
				}
				refreshScroll();
			});	
		}

		var $body = $("#Wrapper").css("display", "none");

		$("a.pageTransition").click(function(evt){
			evt.preventDefault();
			linkLocation = this.href;
			$body.fadeOut(500, function(){window.location = linkLocation});
		});

		$('html').removeClass('js');		

		refreshScroll();
		$w.resize(refreshScroll);
});
jQuery(window).load(function(){
	jQuery('#Wrapper').fadeIn(300);
})
