var $ = jQuery;

window.onload = function() {
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
            }
            // check page width
            if (global.w <= 767) { // ********** IF MOBILE **********
                this.isMobile = true;
                // remove magic
                $('svg').remove();
                // collapse nav-list
                $('.nav-list').slideUp();
                var top = 0,
                    allow = false;
                setInterval(function() {
                    // $('.img-hero').css({
                    //     top: top
                    // });


                    // if (top == 75) {
                    //     clearInterval(this);
                    //     top = 75;
                    // } else {
                    //     top++;
                    // }

                }, 1000 / 30);
            } else { // ********** IF DESKTOP **********
                this.isMobile = false;
                // init magic
                if ($('svg').length !== 1) {
                    this.magic();
                }
                $('.nav-list').show();
            }
        },
        magic: function() {
            var svgFileArray = [];
            // this.svg = d3.select('#mfadt-hero').append('svg');
            // load svg
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
                    console.log(scrolled);
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
    // END OF LISTENER –––––––––––––––––––––––––––––––––––––––––––––––––––

    // INITIALIZE –––––––––––––––––––––––––––––––––––––––––––––––––––
    mfadt.init();

    // INIT MASONRY
    // selecting the .mainContainer class from the projects page
    var container = document.querySelector('section#projects');
    var msnry = new Masonry(container, {
        // options...
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
};