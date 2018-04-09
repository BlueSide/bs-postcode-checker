(function( $ ) {
    'use strict';

    $( window ).load(function() {

        
        var regexpCheckPostcodeNL = /^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i;

        $("#pc-error").hide();
        $("#pc-not-found").hide();
        $("#pc-found").hide();

        $( document ).on( 'click', '.check-button', function() {

            $("#pc-error").hide();
            $("#pc-not-found").hide();
            $("#pc-found").hide();

            // Normalize and validate
            var normalizedInput = $('#postcode').val().replace(/ /g,'').toUpperCase();
            if(!isValidPostcode(normalizedInput))
            {
                $("#pc-error").show();
                return;
            }
            
            $.ajax({
                url : postcode_checker.ajax_url,
                type : 'post',
                data : {
                    action : 'postcodecheck',
                    postcode : normalizedInput
                },
                success : function( response ) {
                    if(response === "")
                    {
                        $("#pc-not-found").show();                
                    }
                    else
                    {
                        $("#pc-found").html("Jouw postcode matcht met Warmtenet " + response + "!");
                        $("#pc-found").show();
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
