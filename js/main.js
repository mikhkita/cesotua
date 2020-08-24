$(document).ready(function(){	

    var isDesktop = false,
        isTablet = false,
        isMobile = false;

    function resize(){
       if( typeof( window.innerWidth ) == 'number' ) {
            myWidth = window.innerWidth;
            myHeight = window.innerHeight;
        } else if( document.documentElement && ( document.documentElement.clientWidth || 
        document.documentElement.clientHeight ) ) {
            myWidth = document.documentElement.clientWidth;
            myHeight = document.documentElement.clientHeight;
        } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
            myWidth = document.body.clientWidth;
            myHeight = document.body.clientHeight;
        }

        if( myWidth > 1024 ){
            isDesktop = true;
            isTablet = false;
            isMobile = false;
        }else if( myWidth > 767 && myWidth <= 1024 ){
            isDesktop = false;
            isTablet = true;
            isMobile = false;
        }else{
            isDesktop = false;
            isTablet = false;
            isMobile = true;
        }

        $(".b-review-list .b-review-item").each(function() {
            var heightTextMax = parseInt($(this).find(".b-review-item-text").css("max-height"), 10),
                heightText = $(this).find(".b-review-item-text p").height();
            if (heightText <= heightTextMax) {
                $(this).find(".read-more").addClass("hide");
            }else{
                $(this).find(".read-more").removeClass("hide");
            }
        });

        if($(".b-review-list").hasClass("slick-initialized")) {
            var slick = $(".b-review-list").slick("getSlick"),
                slidesToShow = $(".b-review-list").slick('slickGetOption', 'slidesToShow');
            console.log([slick.slideCount, slidesToShow]);
            if(slick.slideCount <= slidesToShow){
                $(".b-review-nav").addClass("hide");
            }else{
                $(".b-review-nav").removeClass("hide");
            }
        }
        
    }

    $.fn.placeholder = function() {
        if(typeof document.createElement("input").placeholder == 'undefined') {
            $('[placeholder]').focus(function() {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                    input.removeClass('placeholder');
                }
            }).blur(function() {
                var input = $(this);
                if (input.val() == '' || input.val() == input.attr('placeholder')) {
                    input.addClass('placeholder');
                    input.val(input.attr('placeholder'));
                }
            }).blur().parents('form').submit(function() {
                $(this).find('[placeholder]').each(function() {
                    var input = $(this);
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                });
            });
        }
    };
    $.fn.placeholder();

    $(".b-review-list").on("init", function(event, slick){
        if(slick.slideCount > 0){
            $(".b-review-nav-slides .count").text(slick.slideCount);
            var widthDot = (100 / slick.slideCount).toFixed(2);
            $(".b-review-nav-dots .slick-dots li").css("width", widthDot+"%");
        }
    });
    $(".b-review-list").slick({
        dots: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        cssEase: 'ease', 
        speed: 600,
        arrows: true,
        appendArrows: $(".b-review-nav"),
        appendDots: $(".b-review-nav-dots"),
        prevArrow: '<div class="slick-arrow icon-arrow-left"></div>',
        nextArrow: '<div class="slick-arrow icon-arrow-right"></div>',
        responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1
              }
            },
        ]
    });
    $(".b-review-list").on('beforeChange', function(event, slick, currentSlide, nextSlide){
        $(".b-review-nav-slides .current").text(nextSlide+1);
    });

    $(window).resize(resize);
    resize();

    $(window).on("scroll", function() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > 480){
            $(".b-btn-credit").addClass("orange");
        }else{
            $(".b-btn-credit").removeClass("orange");
        }
    });
    $(window).scroll();

});