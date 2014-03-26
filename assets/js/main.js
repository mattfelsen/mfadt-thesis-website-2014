var $ = jQuery;

window.onload = function() {
    console.log('OH YEAH');
    var mfadt = {
        isSearching: false,
        init: function() {
            $('#s').attr({
                placeholder: 'SEARCH MFADT \'14'
            });
        },
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
            mfadt.search(e);
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

    // INITIALIZE
    mfadt.init();

    // HELPERS
    function getRandBg() {
        var h = _.random(0, 360);
        return 'hsla(' + h + ',75%,50%,0.90)';
    }
};