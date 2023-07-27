var link = document.createElement('link');
link.rel = 'stylesheet';
link.type = 'text/css';
link.href = 'https://wishify.test/css/wishify.css';
document.head.appendChild(link);

var currentUrl = window.location.href;

// Check if the current URL matches the desired pattern
if (currentUrl.match(/\/products\/.*$/)) {
  let wishify_id = document.getElementById("wishify");
  let wishifyButton = document.querySelector('.add-to-wishify');
  let shop_id = window.location.hostname.replace(/^https?:\/\//, '');
  let product_id = wishifyButton.getAttribute('data-product');
  let customer_id = wishifyButton.getAttribute('data-customer');

  // delete remove wishlist if customer_id is not available
  if (!customer_id) {
    wishify_id.classList.remove("remove-wishlist");
  }

  // check wishlist 
  if (customer_id) {
    checkWishlist(shop_id, product_id, customer_id);
  }

  // add to wishlist
  wishifyButton.addEventListener('click', function() {
    if (customer_id) {
      if (wishifyButton.classList.contains("add-to-wishify")) {
        addToWishlist(shop_id, product_id, customer_id);
      } else if (wishifyButton.classList.contains("remove-wishlist")) {
        removeFromWishlist(shop_id, product_id, customer_id);
      }
    }
  });

  function checkWishlist(shop_id, product_id, customer_id) {
    const url = 'https://wishify.test/api/check-wishlist';
    const requestOptions = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ shop_id: shop_id, customer_id: customer_id, product_id: product_id }),
    };

    fetch(url, requestOptions)
      .then(response => response.json())
      .then(data => {
        if (data.wishlist_exist) {
          wishify_id.classList.remove("add-to-wishify");
          wishify_id.classList.add("remove-wishlist");
          wishifyButton.innerHTML = "Remove Wishlist";
        } else {
          wishify_id.classList.remove("remove-wishlist");
          wishify_id.classList.add("add-to-wishify");
          wishifyButton.innerHTML = "Add to Wishlist";
        }
      })
      .catch(error => {
        // Handle error
      });
  }

  function addToWishlist(shop_id, product_id, customer_id) {
    const url = 'https://wishify.test/api/add-to-wishlist';
    const requestOptions = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ shop_id: shop_id, customer_id: customer_id, product_id: product_id }),
    };

    fetch(url, requestOptions)
      .then(response => response.json())
      .then(data => {
        wishify_id.classList.remove("add-to-wishify");
        wishify_id.classList.add("remove-wishlist");
        wishifyButton.innerHTML = "Remove Wishlist";
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }

  function removeFromWishlist(shop_id, product_id, customer_id) {
    const url = 'https://wishify.test/api/remove-wishlist';
    const requestOptions = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ shop_id: shop_id, customer_id: customer_id, product_id: product_id }),
    };

    fetch(url, requestOptions)
      .then(response => response.json())
      .then(data => {
        wishify_id.classList.remove("remove-wishlist");
        wishify_id.classList.add("add-to-wishify");
        wishifyButton.innerHTML = "Add to Wishlist";
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
}

