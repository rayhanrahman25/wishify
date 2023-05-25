var link = document.createElement('link');
link.rel = 'stylesheet';
link.type = 'text/css';
link.href = 'https://wishify.test/css/wishify.css';
document.head.appendChild(link);
    
var currentUrl = window.location.href;

// Check if the current URL matches the desired pattern
if (currentUrl.match(/\/products\/.*$/)) {

    function addToWishlist(product_id, customer_id) {
    // Your code for adding to wishlist
    }

    function removeFromWishlist(product_id, customer_id) {
    // Your code for removing from wishlist
    }

    var wishifyButton = document.querySelector('.add-to-whislist');
    var product_id = wishifyButton.getAttribute('data-product');
    var customer_id = wishifyButton.getAttribute('data-customer');

    wishifyButton.addEventListener('click', function() {
    // Your code for handling the click event
      console.log(product_id+"sakfj"+customer_id);
    });
}
  