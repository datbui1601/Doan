$(document).ready(function() {
    "use strict";

    var myScrollFunc = function () {
        var y = window.scrollY;
        if (y > 10) {
            $(".header-page").addClass("hiden-box");
        } else {
            $(".header-page").removeClass("hiden-box");
        }
    };

    window.addEventListener("scroll", myScrollFunc);
    $('.height-logo').height( $(".logo").height() );
    $('.click-show-register').click( function(){
        $(".show-menu-register").toggleClass("opacity-1");
    });
    // Right Slidebar controls
    $('.js-toggle-right-slidebar').on('click', function (event) {
        event.stopPropagation();
        controller.toggle('slidebar-2');
    });
    $('.search-top-index').hover( function(){
        $('.search-top-index input[type="text"]').toggleClass("opacity-1");
    });

    $('.save-money, .box-branches').height( $(".main-menu").height() );
    $("#product-standard-slider").owlCarousel({
        navigation : true,
        pagination : false,
        lazyLoad : true,
        items : 6,
        navigationText : ["<span class='icon-prev'></span>","<span class='icon-next'></span>"],
        itemsDesktop  :  [1199,6],
        itemsDesktopSmall :  [992,4],
        itemsTablet :  [768,3],
        itemsTabletSmall : [600,1]
    });
    $(".slider_ykien").owlCarousel({
        navigation : true,
        pagination : false,
        lazyLoad : true,
        items : 3,
        autoplay: true,
        navigationText : ["<span class='icon-prev'></span>","<span class='icon-next'></span>"],
        itemsDesktop  :  [1199,3],
        itemsDesktopSmall :  [992,3],
        itemsTablet :  [768,3],
        itemsTabletSmall : [600,1]
    });

    $(".title-product-standard h3 a, .title-daily h3 a").each(function(){
        var result = $(this).text();
        var resultArray = result.split(" ");
        if(resultArray.length > 10){
        resultArray = resultArray.slice(0, 10);
        result = resultArray.join(" ") + " ...";
        $(this).text(result);
        }
    });
    $(".tothetop").click(function () {
        $(".logo").toggleClass("ac");
    });
    $( '#example5' ).sliderPro({
        width: '100%',
        height: 350,
        loop: false,
        arrows: true,
        buttons: false,
        thumbnailsPosition: 'left',
        thumbnailWidth: '550',
        thumbnailHeight: 'initial',
        breakpoints: {
            1200: {
                thumbnailsPosition: 'left',
                thumbnailWidth: '450',
                thumbnailHeight: 'initial',
            },
            1000: {
                thumbnailsPosition: 'left',
                thumbnailWidth: '350',
                thumbnailHeight: 'initial',
                height: 250,
            },
            800: {
                thumbnailsPosition: 'left',
                thumbnailWidth: '300',
                thumbnailHeight: 'initial',
                height: 250,
            },
            660: {
                thumbnailsPosition: 'left',
                thumbnailWidth: '200',
                thumbnailHeight: 'initial',
                height: 200,
            },
            480: {
                thumbnailsPosition: 'bottom',
                thumbnailWidth: '100%',
                thumbnailHeight: 'initial'
            }
        }
    });
    $( '#example4' ).sliderPro({
        width: '100%',
        height: 700,
        fade: true,
        arrows: true,
        buttons: false,
        fadeDuration : 1000,
        waitForLayers : true,
        autoplayDelay : 3000,
        breakpoints: {
            560: {
                height: 500,
            }
        }
    });
    $( '#example3' ).sliderPro({
        width: 960,
        height: 500,
        fade: true,
        arrows: true,
        buttons: false,
        shuffle: true,
        smallSize: 500,
        mediumSize: 1000,
        largeSize: 3000,
        autoHeight: true,
        thumbnailArrows: true,
        autoplay: false
    });
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    $('.item-intro-img').height($('.item-intro-img').width());
    $('.flex-height').height($('.flex-height').width());
    $('.width-50-img').height($('.width-50-img').width() - 40);
    $('#color-menu .main-menu ul li').each(function(){
       $(this).click(function(){
            $(this).find('.sub-menu').toggleClass("show-menu");
       });
    });
    $('#submenu-patas').mouseleave(function(){
        $(this).hide();
    });
    if (screen.width < 768) {
        $("#daily-slider").owlCarousel({
            navigation : true,
            pagination : false,
            lazyLoad : true,
            items : 5,
            navigationText : ["<span class='icon-prev'></span>","<span class='icon-next'></span>"],
            itemsDesktop  :  [1199,5],
            itemsDesktopSmall :  [992,4],
            itemsTablet :  [768,3],
            itemsTabletSmall : [600,1]
        });
    }
    $('#scrollup').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
});
