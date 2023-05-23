import {addedCartItems} from './pages/cart';

console.log("Welcome to campFit");

const carousel = document.getElementById("products");
const cart  = document.getElementById('cart');
class Product {
  constructor(img, title, caption, price) {
    this.img = img;
    this.title = title;
    this.caption = caption;
    this.price = price;
  }
}
 const products = [
   new Product(
    "./images/product1.png",
    "CombatXL Mass Gainer",
    "musclepharm",
    "$40",
  ),
  new Product(
     "./images/product2.png",
     "Assault Pre Workout",
     "musclepharm",
      "$40",
  ),
  new Product(
     "./images/product4.png",
     "CombatXL Muscle Gainer",
     "musclepharm",
     "$40",
  ),
  new Product(
     "./images/product3.png",
     "CombatXL Muscle Gainer",
     "musclepharm",
     "$40",
  ),
  new Product(
     "./images/product5.png",
     "CombatXL Muscle Gainer",
     "musclepharm",
     "$40",
  ),
  new Product(
     "./images/product6.png",
     "CombatXL Muscle Gainer",
     "musclepharm",
     "$40",
  ),
  new Product(
     "./images/product7.png",
     "CombatXL Muscle Gainer",
     "musclepharm",
     "$40",
  ),
  new Product(
     "./images/product8.png",
     "CombatXL Muscle Gainer",
     "musclepharm",
     "$40",
  ),
  new Product(
     "./images/product9.png",
     "CombatXL Muscle Gainer",
     "musclepharm",
     "$40",
  ),
  new Product(
     "./images/product10.png",
     "CombatXL Muscle Gainer",
     "musclepharm",
     "$40",
  ),
  new Product(
     "./images/product11.png",
     "CombatXL Muscle Gainer",
     "musclepharm",
     "$40",
  ),
];

const mapProducts = products.map((product, index) => {
  return `<div class=" carCard" key=${index}>
  <div class="img-card">
    <img class="product-image" src=${product.img} alt="protien">
  </div>
  <p class="product-title">${product.title}</p>
  <p class="product-caption">${product.caption}</p>
  <div class="product-details">
    <span class="price">${product.price}</span>
function addToCart(key){
  <button class="add-btn subscribe_btn" id="add-btn" onclick="addToCart(${index})">Add</button>
  </div>
</div>`;
});

let cartItems = [];
function addToCart(key) {
  console.log(key);
  cartItems.push(products[key]);
}
carousel.innerHTML = mapProducts;
cart.addEventListener('click',addedCartItems(cartItems));


