<!DOCTYPE html>
<html lang="en">

<?php
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "userdata";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
session_start(); 
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}

?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link rel="stylesheet" href="./cart.css">
  <script src="./cart.js" defer></script>
</head>
<body>
  <div class="cart-container">
    <p class="cart-title" style="color: white;">Your <span style="color: var(--green);"> Cart</span></p>
    <div class="cart-contents" style="overflow: hidden;">
      <div class="cart-leftproducts"  >
        <table >
          <thead>
            <tr >
              <th >product</th>
              <th >price</th>
              <th >quantity</th>
              <th >total</th>
              <th ></th>
            </tr>
          </thead>
          
          <tr><td colspan="4"><hr style="background-color: var(--grey);"></td></tr>
         <tbody id="cart-itemstable">

         </tbody>
          
          
        </table>
        
      </div>
      <div class="cart-invoice">
        <table>
          <tr>
            <td><h1 class="invoice-title">Order Summary</h1></td>
          </tr>
          <tr>
            <td>Subtotal</td>
            <td>$418</td>
          </tr>
          <tr>
            <td>Shipping</td>
            <td>Free</td>
          </tr>
          <tr>
            <td>Total</td>
            <td>$418</td>
          </tr>
          <tr>
             <td colspan="2"><button style="background-color: var(--green);color: var(--white);height: 50px;
             width:100%;">Checkout</button></td>
          </tr>
        </table>
      </div>
    </div>
  </div>


</body>
</html>