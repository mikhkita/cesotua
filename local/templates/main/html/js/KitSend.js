function getNextField($form){
	var j = 1;
	while( $form.find("input[name="+j+"]").length ){
		j++;
	}
	return j;
}

function fancyOpen(el){
    $.fancybox(el,{
    	padding:0,
    	fitToView: false,
        scrolling: 'no',
        beforeShow: function(){
			$(".fancybox-wrap").addClass("beforeShow");
			if( !device.mobile() ){
		    	$('html').addClass('fancybox-lock'); 
		    	$('.fancybox-overlay').html($('.fancybox-wrap')); 
		    }
		},
		afterShow: function(){
			$(".fancybox-wrap").removeClass("beforeShow");
			$(".fancybox-wrap").addClass("afterShow");
			setTimeout(function(){
                $('.fancybox-wrap').css({
                    'position':'absolute'
                });
                $('.fancybox-inner').css('height','auto');
            },200);
		},
		beforeClose: function(){
			$(".fancybox-wrap").removeClass("afterShow");
			$(".fancybox-wrap").addClass("beforeClose");
		},
		afterClose: function(){
			$(".fancybox-wrap").removeClass("beforeClose");
			$(".fancybox-wrap").addClass("afterClose");
		},
    }); 
    return false;
}

var customHandlers = [];

$(document).ready(function(){	
	var rePhone = /^\+\d \(\d{3}\) \d{3}-\d{2}-\d{2}$/,
		tePhone = '+7 (999) 999-99-99';

	$.validator.addMethod('customPhone', function (value) {
		return rePhone.test(value);
	});

	$(".ajax").parents("form").each(function(){
		$(this).validate({
			rules: {
				email: 'email',
				phone: 'customPhone'
			}
		});
		if( $(this).find("input[name=phone]").length ){
			$(this).find("input[name=phone]").each(function(){
				if (typeof IMask == 'function') {
					var phoneMask = new IMask($(this)[0], {
			        	mask: '+{7} (000) 000-00-00',
			        	prepare: function(value, masked){
					    	if( value == 8 && masked._value.length == 0 ){
					    		return "+7 (";
					    	}

					    	tmp = value.match(/[\d\+]*/g);
					    	if( tmp && tmp.length ){
					    		value = tmp.join("");
					    	}else{
					    		value = "";
					    	}
					    	return value;
					    }
			        });
			    } else {
					$(this).mask("+7 (999) 999-99-99");
				}
			});
		}
	});

	function whenScroll(){
		var scroll = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
		if( customHandlers["onScroll"] ){
			customHandlers["onScroll"](scroll);
		}
	}
	$(window).scroll(whenScroll);
	whenScroll();

	var mousedownPopup = false;
    $("body").on("mousedown", ".b-popup", function(){
        mousedownPopup = true;
    });
    $("body").on("mouseup", ".fancybox-slide", function(){
        if( !mousedownPopup ){
            $.fancybox.close();
        }
        mousedownPopup = false;
    });

	$(".b-go").click(function(){
		var block = $( $(this).attr("data-block") ),
			off = $(this).attr("data-offset")||0,
			duration = $(this).attr("data-duration")||800;
		$("body, html").animate({
			scrollTop : block.offset().top-off
		},duration);
		return false;
	});

	var clickDrag;
	var offsetX = 0,
		offsetY = 0;
	$("body").on("mousedown", ".b-detail-photo-main-item.fancy-img", function(e){
		offsetX = e.clientX;
		offsetY = e.clientY;
    });
    $("body").on("mouseup", ".b-detail-photo-main-item.fancy-img", function(e) {
    	//console.log([e, offsetX, offsetY, e.clientX, e.clientY]);
    	if(Math.abs(offsetX - e.clientX) > 10 || Math.abs(offsetY - e.clientY) > 10){
    		$(this).addClass("hovered");
			clickDrag = $(this);
    	}
    });

    $(".fancy-img").fancybox({
		padding : 0,
		hash : false,
		clickContent : false,
		backFocus: false,
		buttons : [
	        'fullScreen',
	        'close'
	    ],
	    beforeShow: function(){
			if (($(clickDrag).hasClass("hovered"))) {
			    $.fancybox.close();
			    $(clickDrag).removeClass("hovered");
			    return;
			}
		},
	});

	$(".goal-click").click(function(){
		if( $(this).attr("data-goal") )
			yaCounter12345678.reachGoal($(this).attr("data-goal"));
	});

	$(".ajax").parents("form").submit(function(){
		
		// if( $(this).find("#attach-photo").length ){
		// 	if ($(this).find('#b-attach-preview .b-attach-preview-item').length == 0){
		// 		$('#attach-photo').addClass('error');
		// 		$('#attach-photo input').addClass('error');
		// 	}
		// }

  		if( $(this).find("input.error,select.error,textarea.error").length == 0 ){
  			var $this = $(this),
				  $thanks = $($this.attr("data-block"));
			
			$this.find(".ajax-wrap").addClass('loading');
  			//$this.find(".ajax").attr("onclick", "return false;");

  			if( $this.attr("data-beforeAjax") && customHandlers[$this.attr("data-beforeAjax")] ){
				customHandlers[$this.attr("data-beforeAjax")]($this);
			}

			if( $this.attr("data-goal") ){
				yaCounter12345678.reachGoal($this.attr("data-goal"));
			}

  			$.ajax({
			  	type: $(this).attr("method"),
			  	url: $(this).attr("action"),
			  	data:  $this.serialize(),
				success: function(msg){
					var $form;
					if( msg == "1" ){
						$link = $this.find(".b-thanks-link");
					}else{
						$link = $(".b-error-link");
					}

					if( $this.attr("data-afterAjax") && customHandlers[$this.attr("data-afterAjax")] ){
						customHandlers[$this.attr("data-afterAjax")]($this);
					}

					$.fancybox.close();
					$link.click();
				},
				error: function(){
					$.fancybox.close();
					$(".b-error-link").click();
				},
				complete: function(){
					$this.find(".ajax-wrap").removeClass('loading');
					// $this.find(".ajax").removeAttr("onclick");
					// $this.find(".ajax").removeClass('preloader');
					$this.find("input[type=text]:not(.slider-input),textarea").val("");
					$this.find('.b-attach-preview-item').remove();
				}
			});
  		}else{
  			$(this).find("input.error,select.error,textarea.error").eq(0).focus();
  		}
  		return false;
  	});

	$("body").on("click", ".ajax", function(){
		$(this).parents("form").submit();
		return false;
	});
});