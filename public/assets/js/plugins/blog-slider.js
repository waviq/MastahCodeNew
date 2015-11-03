var BlogSlider = function () {

    return {

        //Revolution Slider - Full Width
        initWaviqBlog: function () {
            var revapi;
            jQuery(document).ready(function() {
                revapi = jQuery('.tp-banner2').revolution(
                    {
                        delay:9000,
                        startwidth:1170,
                        startheight:500,
                        hideThumbs:10,
                        navigationStyle:"preview4"
                    });
            });
        },

        //Revolution Slider - Full Screen Offset Container
        initRSfullScreenOffset: function () {
            var revapi;
            jQuery(document).ready(function() {
                revapi = jQuery('.tp-banner2').revolution(
                    {
                        delay:15000,
                        startwidth:1170,
                        startheight:400,
                        hideThumbs:10,
                        fullWidth:"off",
                        fullScreen:"on",
                        hideCaptionAtLimit: "",
                        dottedOverlay:"twoxtwo",
                        navigationStyle:"preview4",
                        fullScreenOffsetContainer: ".header"
                    });
            });
        }

    };
}();
