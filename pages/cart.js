var incriBtn = document.getElementById("increment-button");
var decriBtn = document.getElementById("decrement-button");
var proQuantity = document.getElementById("quantity");

function manipulateQnt() {
  var qnt = 0;
  proQuantity.innerText = qnt;
  decriBtn.addEventListener("click", () => {
    if (qnt > 0) {
      qnt--;
    }
    proQuantity.innerText = qnt;
  });
  incriBtn.addEventListener("click", () => {
    qnt++;
    proQuantity.innerText = qnt;
  });
}
manipulateQnt();
var addedCartItems = [];

export function addedtoCart(cartItems){
  addedCartItems = cartItems;
}

addedCartItems.forEach((val)=>console.log(val));


