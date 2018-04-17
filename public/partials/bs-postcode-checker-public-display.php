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
    <div id="pc-error" style="display:none">Geen geldige postcode!</div>
    <div id="pc-not-found" style="display:none">Uw postcode is niet aangesloten aan ons warmtenet. </div>
    <div id="pc-found" style="display:none"></div>
    <form class="uk-grid-small">
            <div class="uk-width-1-2">
                <input type="text" id="postcode" class="uk-input" placeholder="Postcode"/>
            </div>
            <div class="uk-width-1-2">
                <button type="button" class="check-button uk-button uk-button-primary">Check</button>
            </div>
    </form>
</div>
