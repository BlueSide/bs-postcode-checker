(function( $ ) {
    'use strict';

    $( window ).load(function() {

        var regexpCheckPostcodeNL = /^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i;

        $('#postcode').keypress(function (e) {
            if (e.which == 13)
            {
                checkPostcode();
                return false;
            }
            return true;
        });
        
        $(document).on( 'click', '.check-button', checkPostcode);

        function checkPostcode() 
        {
            $("#sc-spinner").show();
            $("#pc-error").hide();
            $("#pc-not-found").hide();
            $("#pc-found").hide();

            // Normalize and validate
            var normalizedInput = $('#postcode').val().replace(/ /g,'').toUpperCase();
            if(!isValidPostcode(normalizedInput))
            {
                $("#pc-error").show();
                $("#sc-spinner").hide();
                return;
            }
            
            $.ajax({
                url : postcode_checker.ajax_url,
                type : 'post',
                data : {
                    action : 'postcodecheck',
                    postcode : normalizedInput
                },
                success : function(response) {
                    if(response === "")
                    {
                        $("#pc-not-found").show();                
                    }
                    else
                    {
                        $("#pc-found").html("Mooi, Warmte Eindhoven levert op dit adres!");
                        $("#pc-found").show();
                    }
                    $("#sc-spinner").hide();
            
                },
                error: function(error)
                {
                    console.error(error);
                    $("#sc-spinner").hide();
                }
            });
            
        }
        
        function isValidPostcode(input)
        {
            return regexpCheckPostcodeNL.test(input);
        }
    });
})( jQuery );
