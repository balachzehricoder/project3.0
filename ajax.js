// script.js

document.addEventListener("DOMContentLoaded", function () {
    const categoryLinks = document.querySelectorAll(".nav-link");
  
    categoryLinks.forEach((link) => {
      link.addEventListener("click", function (event) {
        event.preventDefault();
  
        const categoryId = this.getAttribute("data-category-id");
        loadProducts(categoryId);
      });
    });
  
    const addToCartButtons = document.querySelectorAll(".btn-add-to-cart");
  
    addToCartButtons.forEach((button) => {
      button.addEventListener("click", function (event) {
        event.preventDefault();
  
        const productId = this.getAttribute("data-product-id");
        addToCart(productId);
      });
    });
  });
  
  function loadProducts(categoryId) {
    const container = document.querySelector(".row");
  
    fetch("load_products.php?category_id=" + categoryId)
      .then((response) => response.text())
      .then((data) => {
        container.innerHTML = data;
      })
      .catch((error) => {
        console.error("Error fetching products:", error);
      });
  }
  
  function addToCart(productId) {
    fetch("add_to_cart.php?id=" + productId)
      .then((response) => response.text())
      .then((message) => {
        // Show the success message or handle the response as needed
        alert(message);
      })
      .catch((error) => {
        console.error("Error adding to cart:", error);
      });
  }
  