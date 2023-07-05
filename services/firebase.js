//configuration of this firebase project
const firebaseConfig = {
  apiKey: "AIzaSyAHb9IpExmJA7uZPQYlffK7EiA2mEeBDS4",
  authDomain: "campfit-96db6.firebaseapp.com",
  databaseURL: "https://campfit-96db6-default-rtdb.firebaseio.com",
  projectId: "campfit-96db6",
  storageBucket: "campfit-96db6.appspot.com",
  messagingSenderId: "746159221542",
  appId: "1:746159221542:web:300f41f274e2a886efafe7",
  measurementId: "G-NGKX2NWRPC",
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

//initialize firebase firestore
// const db = getFirestore();
// console.log(db);

//initialize ddatabase
var productDb = firebase.database();

const productCard = document.getElementById("card_section");
const homeproductCard = document.getElementById("products");

//access 2 forms for editing and inserting
document.getElementById("products").addEventListener("submit", insertProduct);
document
  .getElementById("Updateproducts")
  .addEventListener("submit", updateProduct);

//fetch the products in home page
function fetchHomeproducts() {
  homeproductCard.innerHTML = "";
  productDb.ref("products").once("value", function (snapshot) {
    snapshot.forEach(function (element) {
      var prodid = element.key;
      homeproductCard.innerHTML += `<div class="carCard" >
      <div class="img-card">
        <img class="products-image" src="${element.val().img}" alt="protien">
      </div>
      <p class="product-title">${element.val().title}</p>
      <p class="product-caption">${element.val().caption}</p>
      <div class="product-details">
        <span class="price">$${element.val().price}</span>
      <button class="add-btn subscribe_btn" id="add-btn" style="color:white" onclick="AddToCart('${
        element.key
      }')">Add</button>
      </div>
    </div>`;
    });
  });
}

//fetch the products in dashboard page
function fetchProducts() {
  productCard.innerHTML = "";
  productDb.ref("products").once("value", function (snapshot) {
    snapshot.forEach(function (element) {
      var prodid = element.key;
      productCard.innerHTML += `<div class="carCard" >
      <div class="img-card">
        <img class="products-image" src="${element.val().img}" alt="protien">
      </div>
      <p class="product-title">${element.val().title}</p>
      <p class="product-caption">${element.val().caption}</p>
      <div class="product-details">
        <span class="price">$${element.val().price}</span>
      <button class="add-btn subscribe_btn" id="add-btn" style="color:cyan" onclick="Edit('${
        element.key
      }','${element.val().title}','${element.val().caption}','${
        element.val().img
      }','${element.val().price}',)">Edit</button>
      <button class="add-btn subscribe_btn" id="add-btn" style="color:red" onclick="deleteFunc('${
        element.key
      }')">Delete</button>
      </div>
    </div>`;
    });
  });
}

//open edit form with stored values in the field
function Edit(id, title, caption, img, price) {
  setElementVal("id_update", id);
  setElementVal("title_update", title);
  setElementVal("caption_update", caption);
  setElementVal("imageurl_update", img);
  setElementVal("price_update", price);
  showUpdateDialogBox();
}

function AddToCart(id) {
  console.log(id);
}

//update the data of the products
function updateProduct(e) {
  e.preventDefault();
  var id = getElementVal("id_update");
  var title = getElementVal("title_update");
  var caption = getElementVal("caption_update");
  var img = getElementVal("imageurl_update");
  var price = getElementVal("price_update");
  update(id, title, caption, img, price);
}

const update = async (id, title, caption, img, price) => {
  console.log(id, title, caption, img, price);
  productDb.ref("products/" + id).update({
    title: title,
    caption: caption,
    img: img,
    price: price,
  });
  closeUpdateModal();
  await fetchProducts();
};

//delete the product by using its id
async function deleteFunc(id) {
  productDb.ref("products/" + id).remove();
  await fetchProducts();
}

//insert the product in the db
function insertProduct(e) {
  e.preventDefault();
  var title = getElementVal("title");
  var caption = getElementVal("caption");
  var img = getElementVal("imageurl");
  var price = getElementVal("price");

  console.log(title, caption, img, price);
  saveProducts(title, caption, img, price);
}

const saveProducts = async (title, caption, img, price) => {
  var product = productDb.ref("products").push();
  product.set({
    title: title,
    caption: caption,
    img: img,
    price: price,
  });
  closeModal();
  await fetchProducts();
};

//function to get the element value
function getElementVal(id) {
  return document.getElementById(id).value;
}

// function to set the element value
function setElementVal(id, val) {
  document.getElementById(id).value = val;
}
