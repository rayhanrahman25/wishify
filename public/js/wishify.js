var link = document.createElement('link');
link.rel = 'stylesheet';
link.type = 'text/css';
link.href = 'https://wishify.test/css/wishify.css';
document.head.appendChild(link);
    
var currentUrl = window.location.href;

// Check if the current URL matches the desired pattern
if (currentUrl.match(/\/products\/.*$/)) {

    function addToWishlist(shop_id, product_id, customer_id) 
    {
      const url = 'https://wishify.test/api/check-wishlist';
      const requestOptions = {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({shop_id: shop_id, customer_id: customer_id, product_id: product_id }),
      };
      
      fetch(url, requestOptions)
        .then(response => response.json())
        .then(data => {
          wishifyButton.innerHTML = "Added to Wishlist"
        })
        .catch(error => {
          console.error('Error:', error);
          // Handle any errors here
          console.log("error");
        });
    }

    function removeFromWishlist(product_id, customer_id) {
    // Your code for removing from wishlist
    }

    let wishifyButton = document.querySelector('.add-to-whislist');
    let shop_id = window.location.hostname.replace(/^https?:\/\//, '');
    let product_id = wishifyButton.getAttribute('data-product');
    let customer_id = wishifyButton.getAttribute('data-customer');
    
    wishifyButton.addEventListener('click', function() {
      addToWishlist(shop_id, product_id, customer_id)
    });
    
}
  