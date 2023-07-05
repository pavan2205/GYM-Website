
<?php
include "../db_conn.php";

// $sql="SELECT * FROM products";
// $all_product=$conn->query($sql);
session_start(); 
if (!isset($_SESSION['admin_id'])) {
  header("Location: ../index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body onload="fetchProducts()";>
<nav id="header" style="color:var(--white)">
      <span>CAMP<span style="color: var(--green);">FIT</span></span>
      <div class="navbaroptions">
        <ul> 
                <li><a href="#">Dashboard</a></li>
              
               <li class="logout"><a href="../logout.php" style="color:var(--green)">Logout</a></li>
                
               
        </ul>
      </div>
    </nav>

    <div class="bg-modal">
  <div class="modal-content">
    <h1 style="text-align:center;padding-bottom:20px;color:var(--lightblack)">Insert</h1>
    <div class="close" onclick=closeModal()>+</div>

  <form action="" id="products">
          <input type="text" name="title" class="input_form" id="title" placeholder="Title" required >
            <input type="text" class="input_form" name="caption" id="caption" placeholder="caption" required >
            <input type="text" name="price" class="input_form" id="price" placeholder="price" required >
            <input type="text" name="img" class="input_form" id="imageurl" placeholder="imageurl" required >
            <button type="submit" id="updatebtn">INSERT</button>
            </form>
  </div>

  
</div>

<div class="bg-modalupdate">
  <div class="modal-content">
    <h1 style="text-align:center;padding-bottom:20px;color:var(--lightblack)">Edit</h1>
    <div class="close" onclick=closeUpdateModal()>+</div>

  <form action="" id="Updateproducts">
          <input type="text" name="title" class="input_form" id="id_update" style="display:none">
          <input type="text" name="title" class="input_form" id="title_update" placeholder="Title" required >
            <input type="text" class="input_form" name="caption" id="caption_update" placeholder="caption" required >
            <input type="text" name="price" class="input_form" id="price_update" placeholder="price" required >
            <input type="text" name="img" class="input_form" id="imageurl_update" placeholder="imageurl" required >
            <button type="submit" id="updatebtn">UPDATE</button>
            </form>
  </div>

  
</div>

<section id="products-items" class="swiper mySwiper products-items">
    <p class="gallery-title title" style="color: var(--white);margin-bottom: 30px;"> Our <span
      style="color: var(--green);">Products</span></p>
      <div class="insertproduct" onclick=insertFunc()>+</div>
      <div class="card_section" id="card_section">

      
  
  </div>
</section>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script>

    <script src="../services/firebase.js" type="text/javascript"></script>

<script>


    function insertFunc(){
      showDialogBox();
    }

    function showDialogBox(){
      document.querySelector(".bg-modal").style.display = 'flex';
      
    }
    function showUpdateDialogBox(){
      document.querySelector(".bg-modalupdate").style.display = 'flex';
      
    }
    
    function closeModal(){
      document.querySelector(".bg-modal").style.display = 'none';

    }
    function closeUpdateModal(){
      document.querySelector(".bg-modalupdate").style.display = 'none';

    }
</script>
</body>
</html>