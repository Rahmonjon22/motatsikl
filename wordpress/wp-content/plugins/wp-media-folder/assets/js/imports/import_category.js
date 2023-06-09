(function ($) {
    if (typeof ajaxurl === "undefined") {
        ajaxurl = wpmfimport.vars.ajaxurl;
    }

    $(document).ready(function () {
        /**
         * Import category
         * @param doit true or false
         * @param button
         */
        var importWpmfTaxonomy = function (doit, button) {
            jQuery(button).find(".spinner").show().css({"visibility": "visible"});
            jQuery.post(
                ajaxurl,
                {
                    action: "wpmf",
                    task: "import",
                    doit: doit,
                    wpmf_nonce: wpmfimport.vars.wpmf_nonce
                },
                function (response) {
                    jQuery(button).closest("div#wpmf_error").hide();
                    if (doit === true) {
                        jQuery("#wpmf_error").after("<div class='updated'> <p><strong>Categories imported into WP Media Folder. Enjoy!!!</strong></p></div>");
                    }
                });
        };

        /* Click import button */
        $('.wmpf_import_category').on('click', function () {
            var $this = $(this);
            importWpmfTaxonomy(true, $this);
        });

        /* Click no import button */
        $('.wmpfNoImportBtn').on('click', function () {
            var $this = $(this);
            importWpmfTaxonomy(false, $this);
        });
    });
}(jQuery));