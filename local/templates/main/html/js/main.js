$(document).ready(function(){	

    var isDesktop = false,
        isTablet = false,
        isMobile = false,
        myWidth,
        myHeight;

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

        $(".slider-cont").each(function () {
            if($(this).hasClass("slick-initialized")) {
                var slick = $(this).slick("getSlick"),
                    slidesToShow = $(this).slick('slickGetOption', 'slidesToShow');
                console.log([slick.slideCount, slidesToShow]);
                if(slick.slideCount <= slidesToShow){
                    $(this).parent().find(".b-slider-custom-nav").addClass("hide");
                }else{
                    $(this).parent().find(".b-slider-custom-nav").removeClass("hide");
                }
            }
        });

        footerToBottom();

        if($(".b-sale-list, .b-advantage-list").length){
            $.fn.matchHeight._update();
        }

        // ===== Мобильные слайдеры =====

        if(isMobile){
            $(".mobile-slider").each(function(){
                if(!$(this).hasClass("slick-initialized")){
                    var slidesToShow = ($(this).hasClass("b-useful-info-list")) ? 2 : 1;
                    var $this = $(this);
                    $this.on("init", function(event, slick){
                        initCustomNav($this.parent(), slick);
                    });
                    $this.slick({
                        dots: true,
                        slidesToShow: slidesToShow,
                        slidesToScroll: 1,
                        infinite: true,
                        cssEase: 'ease', 
                        speed: 600,
                        arrows: true,
                        appendArrows: $this.parent().find(".b-slider-custom-nav"),
                        appendDots: $this.parent().find(".b-slider-custom-nav-dots"),
                        prevArrow: '<div class="slick-arrow icon-arrow-left"></div>',
                        nextArrow: '<div class="slick-arrow icon-arrow-right"></div>',
                        adaptiveHeight: true,
                        responsive: [
                            {
                              breakpoint: 520,
                              settings: {
                                slidesToShow: 1
                              }
                            },
                        ]
                    });
                    $this.on('beforeChange', function(event, slick, currentSlide, nextSlide){
                        $this.parent().find(".b-slider-custom-nav-slides .current").text(nextSlide+1);
                    });
                }
            });
        }else{
            $(".mobile-slider").each(function() {
                if($(this).hasClass("slick-initialized")){
                    $(this).slick('unslick');
                }
            });
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

    $(window).resize(resize);
    resize();

    function fancyBind() {
        $(".fancy:not(.fancy-binded)").each(function(){
            var $popup = $($(this).attr("href")),
                $this = $(this);
            $this.fancybox({
                padding : 0,
                content : $popup,
                touch: false,
                helpers: {
                    overlay: {
                        locked: true 
                    }
                },
                btnTpl : {
                    smallBtn   : '<button data-fancybox-close class="fancybox-close-small" title="Закрыть"></button>',
                },
                beforeShow: function(){
                    $(".fancybox-wrap").addClass("beforeShow");
                    $popup.find(".custom-field").remove();
                    if( $this.attr("data-value") ){
                        var name = getNextField($popup.find("form"));
                        $popup.find("form").append("<input type='hidden' class='custom-field' name='"+name+"' value='"+$this.attr("data-value")+"'/><input type='hidden' class='custom-field' name='"+name+"-name' value='"+$this.attr("data-name")+"'/>");
                    }
                    if( $popup.attr("data-beforeShow") && customHandlers[$popup.attr("data-beforeShow")] ){
                        customHandlers[$popup.attr("data-beforeShow")]($popup);
                    }
                },
                afterShow: function(){
                    $(".fancybox-wrap").removeClass("beforeShow");
                    $(".fancybox-wrap").addClass("afterShow");
                    if( $popup.attr("data-afterShow") && customHandlers[$popup.attr("data-afterShow")] ){
                        customHandlers[$popup.attr("data-afterShow")]($popup);
                    }
                    $popup.find("input[type='text'],input[type='number'],textarea").eq(0).focus();
                },
                beforeClose: function(){
                    $(".fancybox-wrap").removeClass("afterShow");
                    $(".fancybox-wrap").addClass("beforeClose");
                    if( $popup.attr("data-beforeClose") && customHandlers[$popup.attr("data-beforeClose")] ){
                        customHandlers[$popup.attr("data-beforeClose")]($popup);
                    }
                },
                afterClose: function(){
                    $(".fancybox-wrap").removeClass("beforeClose");
                    $(".fancybox-wrap").addClass("afterClose");
                    if( $popup.attr("data-afterClose") && customHandlers[$popup.attr("data-afterClose")] ){
                        customHandlers[$popup.attr("data-afterClose")]($popup);
                    }
                }
            });
            $this.addClass("fancy-binded");
        });    
    }
    fancyBind();

    // ===== Slideout =====

    var slideoutRight = new Slideout({
        'panel': document.getElementById('panel-page'),
        'menu': document.getElementById('panel-menu'),
        'side': 'right',
        'padding': 300,
        'tolerance': 70
    });

    $('.b-menu-mobile').click(function() {
        slideoutRight.open();
        $('#panel-menu').removeClass("hide");
        $('.b-menu-overlay').show();
        return false;
    });

    slideoutRight.disableTouch();

    slideoutRight.on('beforeopen', function() {
        slideoutRight.enableTouch();
    }).on('beforeclose', function() {
        slideoutRight.disableTouch();
        $(".b-menu-overlay").hide();
    }).on('close', function() {
        var $target = $(".slide-cont");
        $target.removeClass("open");
        $(".slide-cont-overlay").removeClass("show");
        setTimeout(function () {
            $target.remove();
        }, 200);
        $(window).scroll();
    });

    $('.b-menu-overlay').on('click', function() {
        if(slideoutRight.isOpen())
            slideoutRight.close();
        $(".b-menu-overlay").hide();
        return false;
    });

    // ===== Мобильное меню =====

    //сгенерить id
    var curID = 1;
    $(".b-menu-desktop a").each(function () {
        $(this).attr("data-id", "m-ref-"+curID);
        if($(this).next("ul").length){
            $(this).next("ul").attr("data-id", "m-ref-"+curID);
        }
        curID++;
    });
    //генерим первый уровень
    $(".b-menu-desktop > li > a").each(function () {
        var $link = $(this)[0].outerHTML;
        $(".b-menu-mobile-list").append("<li>"+$link+"</li>");
        $(".b-menu-mobile-list a[data-id="+$(this).attr("data-id")+"]").click(function(){
            if(openMobileSubmenu($(this).attr("data-id"), $(this).text())){
                return false;
            }
        });
    });

    function openMobileSubmenu(id, textItem) {
        if($(".b-menu-desktop ul[data-id="+id+"]").length){
            //генерим контейнер (будет последним)
            $(".slide-cont-list").append("<div class='slide-cont'></div>");
            var $cont = $(".slide-cont-list .slide-cont").last();
            $cont.append("<h3 class='mobile-window-back'>Назад</h3>");
            $cont.append("<ul class='slideout-gray'></ul>");
            var $ul = $cont.children("ul");
            $(".b-menu-desktop a[data-id="+id+"]").addClass('menu-inner');
            var parentItem = $(".b-menu-desktop a[data-id="+id+"]")[0].outerHTML;
            $ul.append("<li>"+$(parentItem).removeClass("active")[0].outerHTML+"</li>");
            $(".b-menu-desktop a[data-id="+id+"]").removeClass('menu-inner');
            $(".b-menu-desktop ul[data-id="+id+"] > li > a").each(function() {
                $ul.append("<li>"+$(this)[0].outerHTML+"</li>");
                $ul.find("a[data-id="+$(this).attr("data-id")+"]").click(function(){
                    if(openMobileSubmenu($(this).attr("data-id"), $(this).text())){
                        return false;
                    }
                });
            });
            setTimeout(function () {
                $cont.addClass("open");
            }, 10);

            $(".mobile-window-back").click(function(){
                var $target = $(this).parent();
                $target.removeClass("open");
                setTimeout(function () {
                    $target.remove();
                }, 200);
            });
            return true;
        }else{
            return false;
        }
    }

    // =====

    if(!isMobile){
        if($(".b-sale-list").length){
            $(".b-sale-item h3").matchHeight({
                byRow: true
            });
        }
        if($(".b-advantage-list").length){
            $(".b-advantage-item h3").matchHeight({
                byRow: true
            });
        }
    }

    function footerToBottom(){
        var browserHeight = window.innerHeight,
            footerOuterHeight = $('.b-footer').outerHeight(true),
            headerHeight = $('.b-header').outerHeight(true);
        var minHeight = browserHeight - footerOuterHeight - headerHeight;
        if(minHeight >= 0){
            $('.b-content').css({
                'min-height': minHeight
            });
        }  
    };

    function declOfNum(number, titles) {  
        cases = [2, 0, 1, 1, 1, 2];  
        return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];  
    }

    if(!isMobile){
        $(".b-logo-cont").hover(
            function(){
                if(!$(this).hasClass("run")){
                    var $this = $(this);
                    setTimeout(function () {
                        $this.removeClass("run");
                    }, 1200);
                    $(this).addClass("run");
                }
            },
            function(){}
        );
    }

    function initCustomNav($slider, slick) {
        if(slick.slideCount > 0){
            $slider.find(".b-slider-custom-nav-slides .count").text(slick.slideCount);
            var widthDot = (100 / slick.slideCount).toFixed(2);
            $slider.find(".b-slider-custom-nav-dots .slick-dots li").css("width", widthDot+"%");
        }
    }

    $(".b-review-list").on("init", function(event, slick){
        initCustomNav($(".b-review-main-page"), slick);
    });
    $(".b-review-list").slick({
        dots: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        cssEase: 'ease', 
        speed: 600,
        arrows: true,
        appendArrows: $(".b-review-main-page .b-slider-custom-nav"),
        appendDots: $(".b-review-main-page .b-slider-custom-nav-dots"),
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
        $(".b-review-main-page .b-slider-custom-nav-slides .current").text(nextSlide+1);
    });
    $(".b-review-item .read-more").on('click', function(){
        $("#b-popup-review-content").html("");
        $(this).parent().find(".b-review-item-top").clone().appendTo("#b-popup-review-content");
        $(this).parent().find(".b-review-item-text").clone().appendTo("#b-popup-review-content");
    });

    $(document).on("click", ".b-btn-inspection", function(){
        $(".b-popup-inspection-auto").html("");
        var $content;
        if($(this).parents(".b-detail-right").length){
            if($(this).hasClass("specify")){
                $(".inspection-text").addClass("hide");
                $(".specify-text").removeClass("hide");
            }else{
                $(".inspection-text").removeClass("hide");
                $(".specify-text").addClass("hide");
            }
            $content = $(".b-detail-inspection-info").html();
        }else{
            $content = $(this).parents(".b-catalog-item").find(".b-catalog-item-info").html();
        }
        $(".b-popup-inspection-auto").append($content);
    });

    $(document).on("click", ".b-detail-credit-btn", function(){
        var $carInfo = $(".b-detail-inspection-info").html();
        $(".b-popup-inspection-auto").html( $carInfo );
    });

    if ($('.b-slider-range').length) {
        $(".b-slider-range").each(function() {

            var $this = $(this),
                to = Number($(this).attr("data-range-to").replace(/\s/g, '')),
                from = $(this).attr("data-range-from") ? Number($(this).attr("data-range-from").replace(/\s/g, '')) : 0 ,
                input = $this.parent().find('input'),
                val = Number(input.val().replace(/\s/g, '')),
                step = 1;
    
            if ($this.attr('data-input-id') == 'sum') {
                step = 1000;

                to = Number($('.current-price').eq(0).text().replace(/\s/g, ''))*0.9;
                from = 0;

                val = Math.round((from + to) / 2);
                input.val(new Intl.NumberFormat('ru-RU').format(val));
            }
    
            if ($this.attr('data-input-id') == 'date') {
                var sliderValue = [6, 12, 24, 36, 60];
                input.val(new Intl.NumberFormat('ru-RU').format(sliderValue[val]));
                $('#calc-month-text').text(declOfNum(sliderValue[val], ["месяц", "месяца", "месяцев"]));
            }
    
            $this.slider({
                range: 'min',
                min: from,
                max: to,
                value: val,
                step: step,
                slide: function( event, ui ) {
                    if ($this.attr('data-input-id') == 'date') {
                        input.val(sliderValue[ui.value]);
                        $('#calc-month-text').text(declOfNum(sliderValue[ui.value], ["месяц", "месяца", "месяцев"]));
                    } else {
                        input.val(new Intl.NumberFormat('ru-RU').format(ui.value));
                    }
                    input.trigger('change');
                }
            });
        });
    }

    function calcCreditSum(first = false){
        var firstSum = $('.b-popup-credit #sum').val().replace(/\s/g, '') * 1;
        var creditDuration = $('.b-popup-credit #date').val().replace(/\s/g, '') * 1;
        var creditRate = $('.b-popup-credit .b-radio-item input:checked').attr('rate');
        var carPrice = $('.current-price').eq(0).text().replace(/\s/g, '') * 1;

        var creditSum = (carPrice - firstSum) / creditDuration;
        var calcSum = creditSum + (creditSum * parseFloat(creditRate)/100);

        calcSum = Math.round(calcSum * 1);

        $('#calc-sum').text(new Intl.NumberFormat('ru-RU').format(calcSum));

        if (first){
            $('#start-credit-sum').text(new Intl.NumberFormat('ru-RU').format(calcSum));
        }
        
    }

    calcCreditSum(true);

    $(document).on("change", ".b-popup-credit input", function(){
        calcCreditSum();
    });

    $('.b-popup-credit input').first().trigger('change');

    if($(".b-header-main").length){
        $(window).on("scroll", function() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > 270){
                $(".b-btn-credit").addClass("orange");
            }else{
                $(".b-btn-credit").removeClass("orange");
            }
        });
    }
    $(window).scroll();

    $(document).on("input", ".input-number", function(){
        this.value = this.value.replace(/[^\d]/,'');
    });

    $(document).on("input", ".input-number-volume", function(){
        this.value = this.value.replace(/[^\d.]/,'');
    });

    $(document).on("change", ".input-interval", function(){
        var $select = $(this).parents(".b-select").find(".b-select-div");
        var $from = $(this).parents(".b-select-drop").find(".input-interval-from");
        var $to = $(this).parents(".b-select-drop").find(".input-interval-to");
        if($from.val() && $to.val()){
            if(parseFloat($from.val()) > parseFloat($to.val())){
                //$from.val($to.val());
                $to.val("").focus();
            }
        }else{
            $select.find(".b-select-div-name").removeClass("hide");
            $select.find(".b-select-div-values, .b-select-div-values .values-from-cont, .b-select-div-values .values-to-cont").addClass("hide");
        }
        if($from.val()){
            $select.find(".b-select-div-name").addClass("hide");
            $select.find(".b-select-div-values .values-from").text($from.val());
            $select.find(".b-select-div-values, .b-select-div-values .values-from-cont").removeClass("hide");
            if(!$to.val()){
                $select.find(".b-select-div-values .values-to-cont").addClass("hide");
            }
        }
        if($to.val()){
            $select.find(".b-select-div-name").addClass("hide");
            $select.find(".b-select-div-values .values-to").text($to.val());
            $select.find(".b-select-div-values, .b-select-div-values .values-to-cont").removeClass("hide");
            if(!$from.val()){
                $select.find(".b-select-div-values .values-from-cont").addClass("hide");
            }
        }
    });
    $(".input-interval").change();

    // ===== Подгрузка каталога по скролу =====

    var ajaxCatalogLoading = false;
    $(window).on("scroll", function() {
        if($("#b-btn-ajax-load").length){
            var $btn = $("#b-btn-ajax-load").offset().top;
            if($btn - ($(document).scrollTop() + myHeight) < 700 && !ajaxCatalogLoading){
                $("#b-btn-ajax-load").click(); 
            }
        }
    });

    $(document).on("click", "#b-btn-ajax-load", function(){
        var $this = $(this);
        var $form = $(".b-pickup-form-catalog");
        ajaxCatalogLoading = true;
        $.ajax({
            type: "GET",
            url: $this.attr('data-href'),
            data: $(".b-pickup-form").serialize()+"&is_ajax=Y",
            success: function(msg){
                $this.remove();
                $(".catalog-preloader").remove();
                var $elements = $(msg).find('.b-catalog-item'),
                    $pagination = $(msg).find('#b-btn-ajax-load'),
                    $preloader = $(msg).find('.catalog-preloader');
                $(".b-catalog-items").append($elements);
                $(".b-catalog-list").append($preloader);
                $(".b-catalog-list").append($pagination);
                if($form.length && $form.find("input[name='animation']").length){
                    ajaxCatalogAnimation();
                }
            },
            complete: function() {
                ajaxCatalogLoading = false;
            }
        });
        return false;
    });

    // ===== Форма подбора авто =====

    var ajaxPickupLoading = false;
    $(document).on("click", ".b-btn-pickup", function(){
        $(this).parents("form").submit();
        return false;
    });

    $(document).on("click", ".b-btn-reset", function(){
        var $form = $(this).parents("form"),
            $this = $(this);
        $form.find("input[type=text], textarea, select").val("").change();
        if($(this).parents("form").hasClass("b-pickup-form-catalog")){
            $form.submit();
        }
        $this.addClass("rotate");
        setTimeout(function() {
            $this.removeClass("rotate");
        }, 600);
        return false;
    });

    $(document).on("change", ".b-catalog-sort select", function(){
        var $form = $(".b-pickup-form");
        $form.find('input[name=sort]').val($(this).val());
        $form.submit();
        return false;
    });

    $(".b-btn-pickup-catalog").parents("form").submit(function() {
        $(".b-pickup-form .b-select").removeClass("show");
        if(!ajaxPickupLoading){
            var $this = $(this);
            ajaxPickupLoading = true;
            $.ajax({
                type: $this.attr("method"),
                url: $this.attr("action"),
                data: $this.serialize(),
                success: function(msg){
                    var $items = $(msg).find('.b-catalog-items'),
                        $pagination = $(msg).find('#b-btn-ajax-load'),
                        $preloader = $(msg).find('.catalog-preloader');
                    $(".b-catalog-list").html($items);
                    $(".b-catalog-list").append($preloader);
                    $(".b-catalog-list").append($pagination);
                    var number = parseInt($items.attr("data-count"));
                    $(".pickup-found-count").text(number);
                    $(".pickup-found-text").text(declOfNum(number, ["вариант", "варианта", "вариантов"]));
                    if($this.find("input[name='animation']").length){
                        ajaxCatalogAnimation();
                    }
                    fancyBind();
                },
                complete: function() {
                    ajaxPickupLoading = false;
                }
            });
        }
        return false;
    });

    function ajaxCatalogAnimation() {
        var delay = 1;
        $(".b-catalog-item:not(.show)").each(function(){
            var el = this;
            setTimeout(function(){
                $(el).addClass("show");
            }, 100 * delay);
            delay++;
        });
    }

    $(document).on("click", ".b-select-div", function(){
        $(".b-pickup .b-select").removeClass("show");
        var $cont = $(this).parent();
        if($cont.hasClass("show")){
            $cont.removeClass("show");
        }else{
            $cont.addClass("show");
            setTimeout(function(){
                $cont.find(".input-interval-from").focus();
            }, 100);
            
        }
        return false;
    });

    $(".b-input.b-select-drop-input input").focus(function(){
        $(this).addClass("focused");
    });
    $(".b-input.b-select-drop-input input").blur(function(){
        $(this).removeClass("focused");
    });

    $(document).click(function(event) {
        if ($(event.target).closest(".b-select-drop").length ||
            $(".b-input.b-select-drop-input input.focused").length) return;
        $(".b-pickup-form .b-select").removeClass("show");
        event.stopPropagation();
    });

    // ===== Мобильный фильтр ===== 

    $(document).on("click", ".b-btn-mobile-filter", function(){
        var $form = $(this).parents("form");
        var $header = $(this).parents(".b-header");
        if($form.hasClass("open")){
            $form.removeClass("open");
            $header.removeClass("filter-open");
            $(this).find(".filter-text-detail").removeClass("hide");
            $(this).find(".filter-text-turn").addClass("hide");
        }else{
            $form.addClass("open");
            $header.addClass("filter-open");
            $(this).find(".filter-text-detail").addClass("hide");
            $(this).find(".filter-text-turn").removeClass("hide");
        }
        return false;
    });

    // ===== Детальная =====

    var speedAnimation = 600;
    $(".b-detail-photo-main").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        cssEase: 'ease', 
        speed: speedAnimation,
        arrows: true,
        dots: false,
        prevArrow: '<div class="icon-arrow-left-cont"><div class="slick-arrow icon-arrow-left"></div></div>',
        nextArrow: '<div class="icon-arrow-right-cont"><div class="slick-arrow icon-arrow-right"></div></div>',
    });

    var nowAnimate = false;
    $(".b-detail-photo-main").on('beforeChange', function(event, slick, currentSlide, nextSlide){
        $(".b-detail-photo-list-item.active").removeClass("active");
        var $nextSlide = $(".b-detail-photo-main-item[data-slick-index='"+nextSlide+"']");
        $(".b-detail-photo-list-item[data-id='"+$nextSlide.attr("data-id")+"']").addClass("active");
        nowAnimate = true;
        setTimeout(function () {
            nowAnimate = false;
        }, speedAnimation);
    });

    $(document).on("click", ".b-detail-photo-list-item", function(){
        if(!nowAnimate){
            $(".b-detail-photo-list-item.active").removeClass("active");
            $(this).addClass("active");
            var slickID = $(".b-detail-photo-main-item[data-id='"+$(this).attr("data-id")+"']").attr("data-slick-index");
            $(".b-detail-photo-main").slick('slickGoTo', slickID);
            nowAnimate = true;
            setTimeout(function () {
                nowAnimate = false;
            }, speedAnimation);
        }
    });

    $(document).on("click", ".ownership-btn", function(){
        $(".ownership-list").toggleClass("show");
        return false;
    });

    // ===== picker =====

    if(myWidth < 665){
        var app = new Framework7({

        });
        
        var years = [];
        var curYear = (new Date()).getFullYear();
        for (var i = 1940; i <= curYear; i++) {
            years.push(i);
        }
        var pickerYear = app.picker.create({
            inputEl: 'input[name="year"]',
            cols: [
                //from
                {
                    values: years
                },
                //to
                {
                    values: years
                }
            ]
        });
    }

});