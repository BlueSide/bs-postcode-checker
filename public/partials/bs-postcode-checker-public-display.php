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
    <div id="pc-error">Geen geldige postcode!</div>
    <div id="pc-not-found">De postcode is niet gevonden!</div>
    <div id="pc-found">De postcode is niet gevonden!</div>
    <!-- <form> -->
    <input type="text" id="postcode" class="uk-input"/>
    <button type="button" class="check-button uk-button uk-button-primary">Check!</button>
    <!-- </form> -->
</div>
