var link = document.createElement('link');
link.rel = 'stylesheet';
link.type = 'text/css';
link.href = 'https://wishify.test/css/wishify.css';
document.head.appendChild(link);
    
var currentUrl = window.location.href;

// // Check if the current URL matches the desired pattern
if (currentUrl.match(/\/products\/.*$/)) {

    function checkWishlist(shop_id, product_id, customer_id)
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
          if(data.wishlist_exist){
            let wishify_id = document.getElementById("wishify");
            wishify_id.classList.remove("add-to-wishify");
            wishify_id.classList.add("remove-wishlist");
            wishifyButton.innerHTML = "Remove Wishlist";
          }else{
            wishifyButton.innerHTML = "Add to Wishlist";
          }
        })
        .catch(error => {
          
        });

    }

    function addToWishlist(shop_id, product_id, customer_id) 
    {
      const url = 'https://wishify.test/api/add-to-wishlist';

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
          wishifyButton.innerHTML = "Added to Wishlist";
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }

    function removeFromWishlist(shop_id ,product_id, customer_id) 
    {
     
      const url = 'https://wishify.test/api/remove-wishlist';

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
          wishifyButton.innerHTML = "Added to Wishlist";
        })
        .catch(error => {
          console.error('Error:', error);
        });

    }

    let wishifyButton = document.querySelector('.add-to-wishify');
    let removeWishlist = document.querySelector('.remove-wishlist')
    let shop_id = window.location.hostname.replace(/^https?:\/\//, '');
    let product_id = wishifyButton.getAttribute('data-product');
    let customer_id = wishifyButton.getAttribute('data-customer');

    checkWishlist(shop_id, product_id, customer_id);
    // add to wishlist
    wishifyButton.addEventListener('click', function() {
      addToWishlist(shop_id, product_id, customer_id);
    });

    // remove wishlist
    removeWishlist.addEventListener('click', function() {
      removeFromWishlist(shop_id, product_id, customer_id);
    });
    
}
  