console.log("Welcome to campFit");

const carousel = document.getElementById("products");

const products = [
  {
    img: "./images/product1.png",
    title: "CombatXL Mass Gainer",
    caption: "musclepharm",
    price: "$40",
  },
  {
    img: "./images/product2.png",
    title: "Assault Pre Workout",
    caption: "musclepharm",
    price: "$40",
  },
  {
    img: "./images/product4.png",
    title: "CombatXL Muscle Gainer",
    caption: "musclepharm",
    price: "$40",
  },
  {
    img: "./images/product3.png",
    title: "CombatXL Muscle Gainer",
    caption: "musclepharm",
    price: "$40",
  },
  {
    img: "./images/product5.png",
    title: "CombatXL Muscle Gainer",
    caption: "musclepharm",
    price: "$40",
  },
  {
    img: "./images/product6.png",
    title: "CombatXL Muscle Gainer",
    caption: "musclepharm",
    price: "$40",
  },
  {
    img: "./images/product7.png",
    title: "CombatXL Muscle Gainer",
    caption: "musclepharm",
    price: "$40",
  },
  {
    img: "./images/product8.png",
    title: "CombatXL Muscle Gainer",
    caption: "musclepharm",
    price: "$40",
  },
  {
    img: "./images/product9.png",
    title: "CombatXL Muscle Gainer",
    caption: "musclepharm",
    price: "$40",
  },
  {
    img: "./images/product10.png",
    title: "CombatXL Muscle Gainer",
    caption: "musclepharm",
    price: "$40",
  },
  {
    img: "./images/product11.png",
    title: "CombatXL Muscle Gainer",
    caption: "musclepharm",
    price: "$40",
  },
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
  if (cartItems[key] == null) {
    cartItems[key] == products[key];
  }
}

console.log(cartItems);

carousel.innerHTML = mapProducts;
