(function( $ ) {
    'use strict';

    $( window ).load(function() {

        
        var regexpCheckPostcodeNL = /^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i;

        jQuery("#pc-error").hide();
        jQuery("#pc-not-found").hide();
        jQuery("#pc-found").hide();

        jQuery( document ).on( 'click', '.check-button', function() {

            jQuery("#pc-error").hide();
            jQuery("#pc-not-found").hide();
            jQuery("#pc-found").hide();

            // Normalize and validate
            var normalizedInput = jQuery('#postcode').val().replace(/ /g,'').toUpperCase();
            if(!isValidPostcode(normalizedInput))
            {
                jQuery("#pc-error").show();
                return;
            }
            
            jQuery.ajax({
                url : postcode_checker.ajax_url,
                type : 'post',
                data : {
                    action : 'postcodecheck',
                    postcode : normalizedInput
                },
                success : function( response ) {
                    if(response === "")
                    {
                        jQuery("#pc-not-found").show();                
                    }
                    else
                    {
                        jQuery("#pc-found").html("Jouw postcode matcht met Warmtenet " + response + "!");
                        jQuery("#pc-found").show();
                    }
                }
            });
            
        });

        function isValidPostcode(input)
        {
            return regexpCheckPostcodeNL.test(input);
        }
    });
})( jQuery );
