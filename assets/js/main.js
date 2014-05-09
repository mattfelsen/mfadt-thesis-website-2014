var $ = jQuery;

$(document).ready(function() {
    // console.log('OH YEAH');
    var global = {
        w: window.innerWidth,
        h: window.innerHeight,
        scrollAt: null
    };
    var mfadt = {
        svg: null,
        isMobile: false,
        init: function() {
            // console.log('mfadt thesis initialized');
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
                    var z = $(v)[0].outerHTML,
                        y = z.substring(z.lastIndexOf('">') + 2, z.lastIndexOf('</a>')),
                        x = y.toLowerCase();
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

                // scroll to projects section if we're on the homepage and
                // the projects link was clicked
                if (window.location.hash == '#projects') {
                    $('html,body').animate({
                        scrollTop: $('#projects').offset().top - 240
                    }, 1000);
                }
            }
            // check what page it is
            var metaLocation = location.pathname,
                pageLocation = metaLocation.substring(metaLocation.lastIndexOf('/') + 1, metaLocation.length);
            // loop through menu-item
            $.each($('.menu-item > a'), function(i, v) {
                var z = $(v)[0].outerHTML,
                    y = z.substring(z.lastIndexOf('">') + 2, z.lastIndexOf('</a>')),
                    x = y.toLowerCase();
                var a = location.hash;
                if (x == pageLocation || x == a.substring(a.lastIndexOf('#') + 1, a.length)) {
                    $(v).addClass('menu-selected');
                }
            });
            // if project detail page, add background
            if ($('.student-info-social').length) {
                $('body').css({
                    background: 'url("assets/img/hero/bg.jpg")',
                    'background-attachment': 'fixed'
                });
            }
            // check page width
            if (global.w <= 767) {
                // ********** IF MOBILE **********
                this.isMobile = true;
                $('.hero-detail').removeClass('verticalCenter');
                $('.img-hero-container').removeClass('verticalCenter');
                // re-arrange hero and below-hero
                if ($('#mfadt-hero').length) {
                    $('#mfadt-hero').css({
                        height: $('.hero-text-desc-percentage').offset().top + 200
                    });
                    $('.below-hero').css({
                        top: $('.hero-text-desc-percentage').offset().top + 198
                    });
                }
                // remove magic
                $('#flat-shader').hide();
                // collapse nav-list
                $('.nav-list').slideUp();
                $('nav').css({
                    height: 'auto'
                });
                var top = 0;
            } else { // ********** IF DESKTOP **********
                this.isMobile = false;
                // init magic
                $('.hero-detail').addClass('verticalCenter');
                $('.img-hero-container').addClass('verticalCenter');
                $('#flat-shader').hide();
                $('.nav-list').show();
                this.magic();
            }
        },
        magic: function() {
            // load flat shader
            // console.log('Let there be light!');
            initialise();
            $('#flat-shader').fadeIn();
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
    window.onload = function() {
        $('section#projects').masonry();
    };
    window.onscroll = function() {
        global.scrollAt = window.pageYOffset;
        // for homepage
        if ($('#projects').offset() !== undefined && $('#projects').offset().top - global.scrollAt < 350) {
            // add class for project
            $('a[href="#projects"]').addClass('menu-selected');
        } else {
            // remove class for project
            $('a[href="#projects"]').removeClass('menu-selected');
        }

        // when scroll, move nav
        if (!mfadt.isMobile) { // no mobile, has image
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
            if ($('.project-info-image').children('img').attr('src') || $('.project-info-image').children('iframe').attr('src')) {
                var studentNum = $('.student').length;
                if (global.scrollAt >= 280 * studentNum && global.scrollAt <= $('.projectPersonPageContainer').height() - 600) {
                    // console.log('fix desc!');
                    $('.project-info-text').css({
                        position: 'fixed',
                        top: 80,
                        width: init_desc_width
                    });
                } else if (global.scrollAt >= $('.projectPersonPageContainer').height() - $('.project-info-text').height()) {
                    if (isScrolledCollected == false) {
                        isScrolledCollected = true;
                        scrolled = global.scrollAt;
                        // console.log(scrolled);
                    }
                    $('.project-info-text').css({
                        position: 'absolute',
                        top: $('.projectPersonPageContainer').height() - $('.project-info-text').height()
                    });
                } else if (global.scrollAt < 280 * studentNum) {
                    // console.log('release desc!');
                    $('.project-info-text').css({
                        position: 'static'
                    });
                }
            }
        }
    };
    // BUTTONS
    $('.nav-hamburger').click(function() {
        // toggle slide
        $('.nav-list').slideToggle();
    });
    // CATEGORY SELECTOR
    $('.categories-list .cat-item').click(function(evt) {
        // set the background color for the selected category
        $('.categories-list .cat-item').css({
            background: 'none'
        });
        $(this).css({
            background: $(this)[0].style.borderColor
        });

        // parse slug from the end of the category link
        var slug = $(this).children('a').attr('href').split('/').reverse()[0];

        // hide everything, show only 
        // what we want, and re - trigger masonry
        if (slug == '#') {
            $('.masonry.columns').show();
        } else {
            $('.masonry.columns').hide();
            $('.category-' + slug).show();
        }
        $('section#projects').masonry();

        // prevent the link from navigating to the category archive page
        // (even though it totally works and Matt spent time making it nice)
        evt.preventDefault();
    });

    // PROJECTS MENU LINK
    // scroll to projects section when clicking the Projects menu item
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - 240
                }, 1000);
                return false;
            }
        }
    });
    // 404 not found
    if ($('.search-nope').length) {
        console.log('boo');
        var i = 1;
        setInterval(function() {
            if (i == 1) {
                i = 48;
                i--;
            } else if (i == 47) {
                i++;
            } else if (i == 48) {
                i = 1;
                i++;
            } else if (i == 2) {
                i++;
            } else if (i == 3) {
                i = 2;
                i--;
            }
            $('.search-nope').children('img').attr({
                src: 'http://mfadt.parsons.edu/2014/assets/img/students/ricardo-vega-mora/' + i + '.jpg'
            });
        }, 1000 / 12);
    }

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

});