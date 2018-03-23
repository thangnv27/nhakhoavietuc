wow = new WOW({
    mobile: false
});
wow.init();

var viewport_width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
var viewport_height = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
var PPOFixed = {
    mainMenu:function(){
        /*jQuery('.main-menu').scrollToFixed( {
            marginTop: jQuery('#wpadminbar').outerHeight(true),
            limit: jQuery('.fanfacebook').offset().top
        });*/
        var msie6 = jQuery.browser === 'msie' && jQuery.browser.version < 7;
        if (!msie6) {
            var top = jQuery('.top-navigation').offset().top - parseFloat(jQuery('.top-navigation').css('margin-top').replace(/auto/, 0));
            if(jQuery('#wpadminbar').length === 0 && header_style !== 2){
                top = jQuery('.top-navigation').height();
            }
            jQuery(window).scroll(function(event){
                if (jQuery(this).scrollTop() >= top){
                    var wpadminbar_height = 0;
                    if(jQuery(this).width() > 583){
                        wpadminbar_height = jQuery('#wpadminbar').outerHeight(true);
                    }
                    jQuery('.top-navigation').css({
                        'top':wpadminbar_height + 0
                    }).addClass('fixed');
                } else {
                    jQuery('.top-navigation').css({
                        'top':0
                    }).removeClass('fixed');
                }
            });
        }
    },
    columns:function(col){
        var nav_height = jQuery('#wpadminbar').outerHeight(true) + jQuery(".top-navigation").outerHeight(true);
        var summaries = jQuery(col);
        summaries.each(function(i) {
            var summary = jQuery(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: nav_height,
                limit: function() {
                    var limit = 0;
                    if (next) {
                        limit = jQuery(next).offset().top - jQuery(this).outerHeight(true) - 10;
                    }else{
                        limit = jQuery('#footer').offset().top - jQuery(this).outerHeight(true) - 10;
                    }
                    return limit;
                },
                zIndex: 999
            });
        });
    },
    sidebar:function(){
        if(jQuery("#sidebar section.widget").length > 0){
            if(is_fixed_menu){
                jQuery("#sidebar section.widget").eq(jQuery("#sidebar section.widget").length - 1).scrollToFixed( {
                    marginTop: jQuery('#wpadminbar').outerHeight(true) + jQuery(".top-navigation").outerHeight(true),
                    limit: jQuery('#footer').offset().top
                });
            } else {
                jQuery("#sidebar section.widget").eq(jQuery("#sidebar section.widget").length - 1).scrollToFixed( {
                    marginTop: jQuery('#wpadminbar').outerHeight(true),
                    limit: jQuery('#footer').offset().top
                });
            }
        }
    }
};
jQuery(document).ready(function ($) {
    PPOFixed.sidebar();
    if(is_fixed_menu){
        PPOFixed.mainMenu();
    }
    
    // Expand/Collapse menu on sidebar
    jQuery(".st-menu .nav li.menu-item-has-children > ul.sub-menu").hide();
    jQuery(".st-menu .nav li.menu-item-has-children.current-menu-item > ul.sub-menu").show();
    jQuery(".st-menu .nav li.menu-item-has-children.current-menu-parent > ul.sub-menu").show();
    if(viewport_width > 991){
        jQuery(".st-menu .nav > li.menu-item-has-children > ul.sub-menu").show();
        jQuery(".st-menu .nav > li.menu-item-has-children").addClass('dropdown');
        jQuery(".st-menu .nav li.menu-item-has-children.current-menu-parent").addClass('dropdown');
    }
    jQuery(".st-menu .nav > li.menu-item-has-children > a, .st-menu .nav > li.menu-item-has-children > .sub-menu > li.menu-item-has-children > a").click(function (){
        if(jQuery(this).parent().hasClass('dropdown')){
            jQuery(this).parent().removeClass('dropdown');
            jQuery(this).next().slideUp();
        } else {
            jQuery(this).parent().addClass('dropdown');
            jQuery(this).next().slideDown();
        }
        return false;
    });
    
    jQuery(window).load(function (){
        if(header_style !== 2){
            jQuery(".main-menu > nav > .ubermenu-nav > li > a, .main-menu > nav > .ubermenu-nav > li > span").each(function (){
                jQuery(this).css({
                    height: jQuery(".top-navigation").outerHeight(true),
                    'line-height': jQuery(".top-navigation").outerHeight(true) + "px",
                    'padding-top': 0,
                    outline: 'none',
                    cursor: 'pointer'
                });
            });
        }
        
        jQuery(".vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a").each(function (){
            var $title = jQuery(this);
            if($title.is(":hidden")){
                setTimeout(function (){
                    $title.show('fast');
                }, 1000);
            }
            jQuery(this).click(function (){
                setTimeout(function (){
                    $title.show('fast');
                }, 1000);
            });
        });
        
        setTimeout(function (){
            if(jQuery("a[title='Read more']").length > 0){
                jQuery("a[title='Read more']").text("Xem thêm");
            }
        }, 1000);
    });
    
    if(is_home){
        jQuery("#slider ul").show().bxSlider({
            mode: 'fade',
            pager: false,
            auto: true
        });
    }
    
    // Back to top
    jQuery("#back-top").click(function (){
        jQuery("html, body").animate({ scrollTop: 0 }, "slow");
    });

    // Menu mobile
    jQuery('button.left-menu').click(function (){
        var effect = jQuery(this).attr('data-effect');
        if(jQuery(this).parent().parent().hasClass('mobile-clicked')){
            jQuery('.st-menu').animate({
                width: 0
            }).css({
                display: 'none',
                transform: 'translate(0px, 0px)',
                transition: 'transform 400ms ease 0s'
            });
            jQuery(this).parent().parent().addClass('mobile-unclicked').removeClass('mobile-clicked').css({
                transform: 'translate(0px, 0px)',
                transition: 'transform 400ms ease 0s'
            });
            jQuery(this).parent().parent().parent().removeClass('st-menu-open ' + effect);
//            jQuery("#overlay").hide();
        } else {
            jQuery(this).parent().parent().parent().addClass('st-menu-open ' + effect);
            jQuery('.st-menu').animate({
                width: 270
            }).css({
                display: 'block',
                transform: 'translate(270px, 0px)',
                transition: 'transform 400ms ease 0s'
            });
            jQuery(this).parent().parent().addClass('mobile-clicked').removeClass('mobile-unclicked').css({
                transform: 'translate(270px, 0px)',
                transition: 'transform 400ms ease 0s'
            });
//            jQuery("#overlay").show();
        }
    });
    
    jQuery("#search").focusin(function (){
        jQuery(this).prev().hide();
    });
    jQuery("#search").focusout(function (){
        jQuery(this).prev().show();
    });
    jQuery(".right-menu").click(function (){
        if(fan_page_url.length > 0){
            window.open(fan_page_url,'_blank');
        }
    });
    
    var swiper_item = 6, gallery_item = 4;
    if(viewport_width <= 480){
        swiper_item = 1;
        gallery_item = 1;
    } else if(viewport_width < 768){
        swiper_item = 2;
        gallery_item = 2;
    } else if(viewport_width < 992){
        swiper_item = 4;
        gallery_item = 4;
    }
    if(jQuery(".swiper-container").length > 0){
        var swiper = new Swiper('.swiper-container', {
            // If we need pagination
            pagination: '.swiper-pagination',
            // And if we need scrollbar
            scrollbar: '.swiper-scrollbar',
            slidesPerView: swiper_item,
            paginationClickable: true,
            spaceBetween: 30,
            loop: true,
            autoplay: 4000
        });
    }
    
    if(jQuery(".gallery").length > 0){
        jQuery(".gallery br").remove();
        jQuery(".gallery dl").addClass('swiper-slide');
        jQuery(".gallery a").addClass('gallery-pop');
        jQuery(".gallery").addClass('swiper-wrapper').wrap("<div class='gallery-container'></div>");
        jQuery(".gallery").after('<div class="swiper-pagination"></div><div class="swiper-scrollbar"></div>');
        var gallery = new Swiper('.gallery-container', {
            // If we need pagination
            pagination: '.swiper-pagination',
            // And if we need scrollbar
            scrollbar: '.swiper-scrollbar',
            slidesPerView: gallery_item,
            paginationClickable: true,
            spaceBetween: 30,
            loop: true,
            autoplay: 4000,
            effect: 'coverflow'
        });
    }
    /*
    var cbHeight = jQuery(window).height() - jQuery("#wpadminbar").outerHeight(true) * 2;
    if(is_mobile){
        cbHeight = cbHeight - jQuery(".mobile-header").outerHeight(true);
        jQuery('.fancybox, .gallery a').colorbox({
            rel: 'gallery-pop',
            fixed: true,
            height: cbHeight,
            width: '100%'
        });
    } else {
        jQuery('.fancybox, .gallery a').colorbox({
            rel: 'gallery-pop',
            fixed: true,
            height: cbHeight
        });
    }
    */
});
(function ($, undefined) {
    "use strict";

    $(function () {

        if ($.fn.accordion) {
            $('.wpv-accordion', this).accordion({
                heightStyle: 'content'
            }).each(function () {
                if ($(this).attr('data-collapsible') === 'true')
                    $(this).accordion('option', 'collapsible', true).accordion('option', 'active', false);
            });
        }
        
        $(".wpv-accordion p").each(function (){
            if($(this).html().trim().length === 0){
                $(this).remove();
            }
        });
        $(".wpv-accordion .inner > table").each(function (){
            $(this).removeAttr('class');
            $(this).removeAttr('style');
            $(this).removeAttr('width');
            $(this).removeAttr('height');
            $(this).removeAttr('border');
            $(this).addClass('table table-striped');
        });

    });

})(jQuery);