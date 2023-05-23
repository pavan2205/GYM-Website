var incriBtn = document.getElementById("increment-button");
var decriBtn = document.getElementById("decrement-button");
var proQuantity = document.getElementById("quantity");
var itemTable = document.getElementById("cart-itemstable");

var sessionString = sessionStorage.getItem("cartItems");
var addedCartItems = JSON.parse(sessionString);

var cartItems = addedCartItems.map((item, index) => {
  return `<tr>
  <td>
    <div class="cart-info">
      <img src="../${item.img}" alt="" class="product-image" >
    <p>${item.title}</p>
    </div>
  </td>
  <td>$${item.price}</td>
  <td><div class="cart-button">
  <span id="decrement-button">-</span>
  <p type="text" id="quantity">${item.quantity}</p>
  <span id="increment-button">+</span>
 </div></td>
  <td>100$</td>
</tr>
<tr ><td colspan="4" ><hr></td></tr>`;
});

itemTable.innerHTML = cartItems;

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
