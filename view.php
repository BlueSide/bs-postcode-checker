<?php function render_postcode_checker() { return '
<div class="bs-postcode-form">
    <div id="pc-error">Geen geldige postcode!</div>
    <div id="pc-not-found">De postcode is niet gevonden!</div>
    <div id="pc-found">De postcode is niet gevonden!</div>
    <!-- <form> -->
         <input type="text" id="postcode" class="uk-input"/>
         <button type="button" class="check-button uk-button uk-button-primary">Check!</button>
    <!-- </form> -->
</div>
<?php ';}