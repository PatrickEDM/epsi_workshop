/**
 * Created by PatrickEDM on 03/10/2016.
 */

$( "#register_anim" ).click(function() {
    $( ".login" ).slideUp();
    $( ".register").slideDown();
});

$( "#login_anim" ).click(function() {
    $( ".register" ).slideUp();
    $( ".login").slideDown();
});