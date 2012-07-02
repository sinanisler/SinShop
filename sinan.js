// 	Coded By Sinanisler.com
//	My Mini Tiny .js Framework
// 	OpenSource


jQuery(document).ready(function() {
	
	aciklamaGoster();
	jQuery(".dpsc_price").remove();
	jQuery(".dpsc_paypal_form_453").remove();
	jQuery(".dpsc_main_image").remove();

 });





function aciklamaGoster(){	
	jQuery(".urunAciklama").show();	jQuery(".urunVideo").hide();	jQuery(".urunYorum").hide();
	jQuery(".a-aciklama").addClass("aktif").removeClass("pasif");
	jQuery(".a-video").addClass("pasif").removeClass("aktif");
	jQuery(".a-yorum").addClass("pasif").removeClass("aktif"); 
}

function videoGoster(){	
	jQuery(".urunAciklama").hide();	jQuery(".urunVideo").show();	jQuery(".urunYorum").hide();
	jQuery(".a-aciklama").addClass("aktif").removeClass("aktif");
	jQuery(".a-video").addClass("aktif").removeClass("pasif");
	jQuery(".a-yorum").addClass("pasif").removeClass("aktif"); 
}

function yorumGoster(){	
	jQuery(".urunAciklama").hide();	jQuery(".urunVideo").hide();	jQuery(".urunYorum").show(); 
	jQuery(".a-aciklama").addClass("aktif").removeClass("aktif");
	jQuery(".a-video").addClass("aktif").removeClass("aktif");
	jQuery(".a-yorum").addClass("aktif").removeClass("pasif"); 
}












/* List Ticker by Alex Fish 
// www.alexefish.com
//
// options:
//
// effect: fade/slide
// speed: milliseconds
*/

(function(jQuery){
  jQuery.fn.list_ticker = function(options){
    
    var defaults = {
      speed:4000,
	  effect:'slide'
    };
    
    var options = jQuery.extend(defaults, options);
    
    return this.each(function(){
      
      var obj = jQuery(this);
      var list = obj.children();
      list.not(':first').hide();
      
      setInterval(function(){
        
        list = obj.children();
        list.not(':first').hide();
        
        var first_li = list.eq(0)
        var second_li = list.eq(1)
		
		if(options.effect == 'slide'){
			first_li.slideUp();
			second_li.slideDown(function(){
				first_li.remove().appendTo(obj);
			});
		} else if(options.effect == 'fade'){
			first_li.fadeOut(function(){
				obj.css('height',second_li.height());
				second_li.fadeIn();
				first_li.remove().appendTo(obj);
			});
		}
      }, options.speed)
    });
  };
})(jQuery);


jQuery(document).ready(function(){
		/*jQuery('.indirimli-urun-dondur').list_ticker({
			speed:3000,
			effect:'fade'
		});
		
		
		jQuery('.gecisler').list_ticker({
			speed:5500,
			effect:'fade'
		});
		*/
		
})

















	/*




$.fn.infiniteCarousel = function () {

    function repeat(str, num) {
        return new Array( num + 1 ).join( str );
    }
  
    return this.each(function () {
        var $wrapper = $('> div', this).css('overflow', 'hidden'),
            $slider = $wrapper.find('> ul'),
            $items = $slider.find('> li'),
            $single = $items.filter(':first'),
            
            singleWidth = $single.outerWidth(), 
            visible = Math.ceil($wrapper.innerWidth() / singleWidth), // note: doesn't include padding or border
            currentPage = 1,
            pages = Math.ceil($items.length / visible);            


        // 1. Pad so that 'visible' number will always be seen, otherwise create empty items
        if (($items.length % visible) != 0) {
            $slider.append(repeat('<li class="empty" />', visible - ($items.length % visible)));
            $items = $slider.find('> li');
        }

        // 2. Top and tail the list with 'visible' number of items, top has the last section, and tail has the first
        $items.filter(':first').before($items.slice(- visible).clone().addClass('cloned'));
        $items.filter(':last').after($items.slice(0, visible).clone().addClass('cloned'));
        $items = $slider.find('> li'); // reselect
        
        // 3. Set the left position to the first 'real' item
        $wrapper.scrollLeft(singleWidth * visible);
        
        // 4. paging function
        function gotoPage(page) {
            var dir = page < currentPage ? -1 : 1,
                n = Math.abs(currentPage - page),
                left = singleWidth * dir * visible * n;
            
            $wrapper.filter(':not(:animated)').animate({
                scrollLeft : '+=' + left
            }, 500, function () {
                if (page == 0) {
                    $wrapper.scrollLeft(singleWidth * visible * pages);
                    page = pages;
                } else if (page > pages) {
                    $wrapper.scrollLeft(singleWidth * visible);
                    // reset back to start position
                    page = 1;
                } 

                currentPage = page;
            });                
            
            return false;
        }
        
        $wrapper.after('<a class="arrow back">&lt;</a><a class="arrow forward">&gt;</a>');
        
        // 5. Bind to the forward and back buttons
        $('a.back', this).click(function () {
            return gotoPage(currentPage - 1);                
        });
        
        $('a.forward', this).click(function () {
            return gotoPage(currentPage + 1);
        });
        
        // create a public interface to move to a specific page
        $(this).bind('goto', function (event, page) {
            gotoPage(page);
        });
    });  
};

$(document).ready(function () {
						
  $('.infiniteCarousel').infiniteCarousel();
  		
});

*/
