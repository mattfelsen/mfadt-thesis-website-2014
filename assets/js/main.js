var $ = jQuery;

$(document).ready(function() {
    console.log('OH YEAH');
    var global = {
        w: window.innerWidth,
        h: window.innerHeight,
        scrollAt: null
    };
    var mfadt = {
        svg: null,
        isMobile: false,
        init: function() {
            console.log('mfadt thesis initialized');
            // check pathname
            if ((location.pathname !== '/2014/' && location.pathname !== '/mfadt/') || location.search !== "") {
                // if not homepage
                $('nav').css({
                    top: 0,
                    height: 60
                });
            } else {
                // if homepage
                $.each($('.cat-item'), function(i, v) {
                    var x = $(v)[0].outerText.toLowerCase();
                    if (x.match('critical')) {
                        $(v).css('border', '2px solid #f67d11');
                    } else if (x.match('education')) {
                        $(v).css('border', '2px solid #f6d311');
                    } else if (x.match('experiential')) {
                        $(v).css('border', '2px solid #57e0fa');
                    } else if (x.match('information')) {
                        $(v).css('border', '2px solid #ff0837');
                    } else if (x.match('play')) {
                        $(v).css('border', '2px solid #2bff3f');
                    } else if (x.match('really')) {
                        $(v).css('border', '2px solid #ff2bc1');
                    } else if (x.match('social')) {
                        $(v).css('border', '2px solid #4570f9');
                    } else if (x.match('storytelling')) {
                        $(v).css('border', '2px solid #a954fa');
                    }
                });
            }
            // check what page it is
            var metaLocation = location.pathname,
                pageLocation = metaLocation.substring(metaLocation.lastIndexOf('/') + 1, metaLocation.length);
            // loop through menu-item
            $.each($('.menu-item > a'), function(i, v) {
                var x = $(v)[0].outerText.toLowerCase();
                var y = location.hash;
                if (x == pageLocation || x == y.substring(y.lastIndexOf('#') + 1, y.length)) {
                    $(v).addClass('menu-selected');
                }
            });

            // check page width
            if (global.w <= 767) {
                // ********** IF MOBILE **********
                this.isMobile = true;
                // remove magic
                $('#flat-shader').hide();
                // collapse nav-list
                $('.nav-list').slideUp();
                $('nav').css({
                    height: 'auto'
                });
                var top = 0,
                    allow = false;
            } else { // ********** IF DESKTOP **********
                this.isMobile = false;
                // init magic
                $('#flat-shader').show();
                if ($('#flat-shader').length !== 1) {
                    this.magic();
                }
                $('.nav-list').show();
                // hide background
            }
        },
        magic: function() {
            // load flat shader
            console.log('sorry, no magic');
        }
    };

    // listeners –––––––––––––––––––––––––––––––––––––––––––––––––––
    // GLOBAL
    window.addEventListener('resize', function() {
        global.w = window.innerWidth;
        global.h = window.innerHeight;
        mfadt.init();
    });
    var init_desc_width = $('.project-info-text').width();
    var scrolled, isScrolledCollected = false;
    window.onscroll = function() {
        global.scrollAt = window.pageYOffset;

        // for homepage
        if ($('#projects').offset().top - global.scrollAt < 350) {
            // add class for project
            $('a[href="#projects"]').addClass('menu-selected');
        } else {
            // remove class for project
            $('a[href="#projects"]').removeClass('menu-selected');
        }

        if (global.scrollAt >= 75) {
            $('.img-hero').css({
                top: 75
            });
        } else {
            $('.img-hero').css({
                top: global.scrollAt
            });
            $('.mfadt-box-hero-shadow').css({
                width: 50 + global.scrollAt / 2.5 + '%',
                boxShadow: '0 ' + -30 + 'px ' + (26 - global.scrollAt / 5) + 'px black',
            });
        }
        // when scroll, move nav
        if (mfadt.isMobile == false) {
            // console.log(global.scrollAt);
            $('nav').css({
                bottom: global.scrollAt + 'px'
            });
            // if scroll to top
            if (global.scrollAt >= global.h - 60) {
                // stick
                $('nav').css({
                    bottom: global.h - 60
                });
            }
            // Project page fix project description
            if (global.scrollAt >= 280 && global.scrollAt <= $('.projectPersonPageContainer').height() - 600) {
                // console.log('fix desc!');
                $('.project-info-text').css({
                    position: 'fixed',
                    top: 80,
                    width: init_desc_width
                });
            } else if (global.scrollAt >= $('.projectPersonPageContainer').height() - $('.project-info-text').height() - 300) {
                if (isScrolledCollected == false) {
                    isScrolledCollected = true;
                    scrolled = global.scrollAt;
                    // console.log(scrolled);
                }
                $('.project-info-text').css({
                    position: 'absolute',
                    top: $('.projectPersonPageContainer').height() - $('.project-info-text').height()
                });
            } else if (global.scrollAt < 280) {
                // console.log('release desc!');
                $('.project-info-text').css({
                    position: 'static'
                });
            }
        }
    };
    // BUTTONS
    $('.nav-hamburger').click(function() {
        // toggle slide
        $('.nav-list').slideToggle();
    });
    // CATEGORY SELECTOR
    $('.categories-list .cat-item a').click(function(evt) {
        // parse slug from the end of the category link
        var slug = $(this).attr('href').split('/').reverse()[0];

        // hide everything, show only what we want, and re-trigger masonry
        $('.masonry.columns').hide();
        $('.category-' + slug).show();
        $('section#projects').masonry();

        // prevent the link from navigating to the category archive page
        // (even though it totally works and Matt spent time making it nice)
        evt.preventDefault();
    });
    // END OF LISTENER –––––––––––––––––––––––––––––––––––––––––––––––––––

    // INITIALIZE –––––––––––––––––––––––––––––––––––––––––––––––––––
    mfadt.init();

    // INIT MASONRY
    var $container = $('section#projects');
    $container.masonry({
        itemSelector: '.columns',
        columnWidth: 268,
        "gutter": 30
    });
    // END OF INITIALIZE  –––––––––––––––––––––––––––––––––––––––––––––––––––

    // HELPERS
    function getRandBg() {
        var h = _.random(0, 360);
        return 'hsla(' + h + ',75%,50%,0.90)';
    }
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
});