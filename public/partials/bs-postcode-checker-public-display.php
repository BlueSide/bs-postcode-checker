<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.blueside.nl/
 * @since      1.0.0
 *
 * @package    Bs_Postcode_Checker
 * @subpackage Bs_Postcode_Checker/public/partials
 */
?>
<div class="bs-postcode-form">
    <div id="pc-not-valid" style="display:none">Dit is geen geldige postcode.</div>
    <div id="pc-not-found" style="display:none">Uw postcode is niet aangesloten op ons warmtenet. </div>
    <div id="pc-error" style="display:none">Helaas, er lijkt iets niet helemaal goed te gaan in het controleren van uw postcode. U kunt eventueel contact opnemen met onze klantenservice via <a href="mailto:klantenservice@warmte-eindhoven.nl">klantenservice@warmte-eindhoven.nl</a> of <a href="tel:+31852734500">085 273 45 00</a>.</div>
    <div id="pc-found" style="display:none"></div>
    <div uk-spinner id="sc-spinner"  style="display:none"></div>
    <div class="bs-form-div">
        <form class="uk-grid-small">
            <div class="uk-width-1-2">
                <input type="text" id="postcode" class="uk-input" placeholder="Postcode"/>
            </div>
            <div class="uk-width-1-2">
                <button type="button" class="check-button uk-button uk-button-primary">Check</button>
            </div>
        </form>
    </div>
</div>
