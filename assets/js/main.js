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
            this.svg = d3.select('#mfadt-hero').append('svg');
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
    window.onscroll = function() {
        global.scrollAt = window.pageYOffset;
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
};