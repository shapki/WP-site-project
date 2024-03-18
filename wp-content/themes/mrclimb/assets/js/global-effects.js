jQuery(document).ready(function($) {

    // Scroll to top on page load to manage reloads on already scrolled pages
    if ($(this).scrollTop() < 100) {
        $('.totopbutton').fadeOut(500);
    } else {
        $('.totopbutton').fadeIn(500);
    }
    // Sticky Header on page load to manage reloads on already scrolled pages
    if (wpseObject.sticky_header_on) {
        if($(window).width() >= 782) {
            $('header').after('<div id="mrclimb-filler" style="height:' + $('header').outerHeight() + 'px"></div>');
        }

        if ($(this).scrollTop() > 50) {
            $('header').addClass('mrclimb-sticky-active');
        } else {
            $('header').removeClass('mrclimb-sticky-active');
        }
    }
    // Sticky Header management on page resize
    $(window).on("resize", function() {
        if (wpseObject.sticky_header_on) {
            if($(window).width() >= 782) {
                if(!$('#mrclimb-filler').length) {
                    $('header').after('<div id="mrclimb-filler" style="height:' + $('header').outerHeight() + 'px"></div>');
                } else {
                    $('#mrclimb-filler').remove();
                    $('header').after('<div id="mrclimb-filler" style="height:' + $('header').outerHeight() + 'px"></div>');
                }
            } else {
                if($('#mrclimb-filler').length) {
                    $('#mrclimb-filler').remove();
                }
            }
        }
    });

    /**
     * Sticky Header scroll effect / Scroll to top button visibility on scrolling
     */
    $(window).on("scroll", function() {
        // Sticky Header
        if (wpseObject.sticky_header_on) {
            if ($(this).scrollTop() > 50) {
                $('header').addClass('mrclimb-sticky-active');
            } else {
                if($('#mrclimb-filler').length && $(this).scrollTop() == 0) {
                    $('#mrclimb-filler').remove();
                    $('header').after('<div id="mrclimb-filler" style="height:' + $('header').outerHeight() + 'px"></div>');
                }
                $('header').removeClass('mrclimb-sticky-active');
            }
        }

        // Scroll to top
        if ($(this).scrollTop() < 100) {
            $('.totopbutton').fadeOut(500);
        } else {
            $('.totopbutton').fadeIn(500);
        }
    });

    /**
     * Scroll to top effect
     */
    $('.totopbutton').on('click', function() {
        $('html, body').animate({scrollTop:0}, 500);
        return false;
    });
    
});