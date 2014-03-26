var $ = jQuery;

window.onload = function() {
    console.log('OH YEAH');
    var mfadt = {
        isSeaching: false,
        init: function() {
            $('#s').attr({
                placeholder: 'SEARCH MFADT \'14'
            });
        },
        search: function(e) {
            var SField = $('#s');
            // e.preventDefault();
            // if not enter or backspace?
            if (e.keyCode == 27 ||
                e.keyCode == 9 ||
                e.keyCode == 91) {
                mfadt.isSeaching = false;
                SField.removeClass('isSearching').removeClass('placeWhite');
                SField.val('').blur();
                $('#blurPanel').removeClass('blurOnFront');
                $('body').removeClass('bodyZoom');
            } else {
                if (!mfadt.isSeaching) {
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
                    // center search bar
                    SField.val(String.fromCharCode(e.keyCode).toLowerCase());
                    SField.addClass('isSearching').addClass('placeWhite');
                }
                mfadt.isSeaching = true;
                SField.focus();
            }
        }
    };
    // detect typing
    $(document).keyup(function(e) {
        // check if firefox
        mfadt.search(e);
    });

    // detect any clicks
    $(window).on('click', function() {
        mfadt.isSeaching = false;
        $('#s').removeClass('isSearching');
        $('#s').val('').blur();
        $('#blurPanel').removeClass('blurOnFront').removeClass('placeWhite');
        $('body').removeClass('bodyZoom');
    });

    // INITIALIZE
    mfadt.init();

    // HELPERS
    function getRandBg() {
        var h = _.random(0, 360);
        return 'hsla(' + h + ',75%,50%,0.90)';
    }
};