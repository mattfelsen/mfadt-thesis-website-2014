var $ = jQuery;

window.onload = function() {
    console.log('OH YEAH');
    var global = {
        w: window.innerWidth,
        h: window.innerHeight,
        scrollAt: null
    };
    var mfadt = {
        isSearching: false,
        init: function() {
            // 
            $('body').css('opacity', 1);
            // check location
            // if homepage, then hide nav, show later
            if (location.pathname == '/mfadt/' && window.innerWidth >= 767) {
                console.log('this is homepage');
                // hide nav
                $('nav').css({
                    position: 'absolute',
                    zIndex: 9,
                    bottom: 0
                });
                // deploy svg
                // shift below-hero
                $('.below-hero').css({
                    'margin-top': window.innerHeight
                });
                this.hero();
            } else {
                // deactivate canvas
                // $('#hero-background').remove();
                $('.menu-logo').css({
                    'margin-left': 0,
                    opacity: 1
                });
            }
            $('#s').attr({
                placeholder: 'SEARCH MFADT \'14'
            });
            // sticky controls
            $('nav').stick_in_parent({
                inner_scrolling: false
            }).on('sticky_kit:stick', function() {
                console.log('insert logo');
                $('.menu-logo').css({
                    'margin-left': 0,
                    opacity: 1
                });
            }).on('sticky_kit:unstick', function() {
                // only if on homepage
                if (location.pathname == '/mfadt/') {
                    $('.menu-logo').css({
                        'margin-left': -500,
                        opacity: 0
                    });
                    $('nav').css({
                        position: 'absolute',
                        bottom: 0
                    });
                }

            });
            $('#students').stick_in_parent({
                inner_scrolling: false,
                offset_top: $('nav').outerHeight(true) // get el height + margin
            })
                .on('sticky_kit:stick', function() {
                    // collapse #student
                    console.log('student stick!');
                    $('.student .student-bio, .student-links, .student-headshot').slideUp();
                }).on('sticky_kit:unstick', function() {
                    // collapse #student
                    console.log('student unstick!');
                    $('.student .student-bio, .student-links, .student-headshot').slideDown();
                });
            $('#project .six').stick_in_parent({
                inner_scrolling: true,
                offset_top: $('#students').outerHeight(true)
            });
        },
        hero: function() {},
        search: function(e) {
            var SField = $('#s');
            // if not enter or backspace?
            if (e.keyCode == 27 ||
                e.keyCode == 9 ||
                e.keyCode == 91) {
                e.preventDefault();
                mfadt.isSearching = false;
                SField.removeClass('isSearching').removeClass('placeWhite');
                SField.val('').blur();
                $('#blurPanel').removeClass('blurOnFront');
                $('body').removeClass('bodyZoom');
            } else {
                if (!mfadt.isSearching) {
                    mfadt.isSearching = true;
                    // start searching
                    SField.addClass('isSearching').addClass('placeWhite');
                    SField.val(String.fromCharCode(e.keyCode).toLowerCase());
                    SField.attr({
                        placeholder: 'SEARCH MFADT \'14'
                    });
                    // blur body
                    $('#blurPanel').addClass('blurOnFront')
                        .css({
                            background: getRandBg()
                        });
                    $('body').addClass('bodyZoom');
                    // blur js does not work now
                }
                mfadt.isSearching = true;
                SField.focus();
            }
        }
    };

    // listeners
    // detect typing
    $('#s').on('focus', function() {
        if (!mfadt.isSearching) {
            $('#s').val('').blur();
            $('#s').attr({
                placeholder: 'SEARCH MFADT \'14'
            });
            // blur body
            $('#blurPanel').addClass('blurOnFront')
                .css({
                    background: getRandBg()
                });
            $('body').addClass('bodyZoom');
            // blur js does not work now
            // center search bar
            $('#s').addClass('isSearching').addClass('placeWhite');
        }
        mfadt.isSearching = true;
        $('#s').focus();
    });
    $(document).keyup(function(e) {
        // check if firefox
        if (!mfadt.isSearching) {
            // mfadt.search(e);
        }
    });

    // detect any clicks
    $(document).on('click', function() {
        if (mfadt.isSearching) {
            $('#s').removeClass('isSearching');
            $('#blurPanel').removeClass('blurOnFront').removeClass('placeWhite');
            $('body').removeClass('bodyZoom');
            $('#s').val('').blur();
            mfadt.isSearching = false;
        }
    });

    // detect submit
    $('form').on('submit', function(e) {
        if ($('#s').val().length === 0) {
            // do nothing
            e.preventDefault();
        }
    });

    // listeners
    window.addEventListener('resize', function() {
        // shift below-hero
        $('.below-hero').css({
            'margin-top': window.innerHeight
        });
        $('nav').css({
            bottom: 0
        });
    });
    window.onscroll = function() {
        global.scrollAt = window.pageYOffset;
        // when scroll
        if (global.scrollAt < window.innerHeight) {
            $('nav').css({
                bottom: 0
            });
        }
    };

    // INITIALIZE
    mfadt.init();

    // HELPERS
    function getRandBg() {
        var h = _.random(0, 360);
        return 'hsla(' + h + ',75%,50%,0.90)';
    }
};