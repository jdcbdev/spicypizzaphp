$(document).ready(function(){
    // When a user hovers over an element with the class "add-to-cart"
    $('.add-to-cart').hover(function(){
        // Find the child element with the class "btn-add-to-cart" inside the hovered element
        $(this).find('.btn-add-to-cart').show(); // Show the "btn-add-to-cart" element
    },
    function(){
        // When the user's mouse pointer moves away from the element
        // Find the child element with the class "btn-add-to-cart" inside the hovered element
        $(this).find('.btn-add-to-cart').hide(); // Hide the "btn-add-to-cart" element
    });
})