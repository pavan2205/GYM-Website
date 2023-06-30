
<?php
include "../db_conn.php";

$sql="SELECT * FROM products";
$all_product=$conn->query($sql);
session_start(); 
if (!isset($_SESSION['admin_id'])) {
  header("Location: ../index.php");
  exit();
}

echo '<script>var totalPageCount=0; var editid = 0;</script>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = ($_POST["id"]);
  $imageURL = ($_POST["img"]);
  $text1 = ($_POST["title"]);
  $text2 = ($_POST["caption"]);
  $text3 = ($_POST["price"]);
  $editid1 = '<script>editid</script>';
  if (!empty($editid1)) {
      $sql = "UPDATE products SET img='$imageURL', title='$text1', caption='$text2', price='$text3' WHERE id=$id";
  } else {
      $sql = "INSERT INTO products (img, title, caption, price) VALUES ('$imageURL', '$text1', '$text2', '$text3')";
  }

  if ($conn->query($sql) === TRUE) {
      echo '<script>alert("Record saved");</script>';
      header("Location: dashboard.php");
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


if (isset($_GET["delete"])) {
  $id = ($_GET["delete"]);

  $sql = "DELETE FROM products WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
      echo '<script>alert("Record saved");</script>';
      header("Location: dashboard.php");
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


if (isset($_GET["edit"])) {

  

  $script = "<script>var totalPageCount; totalPageCount = 1;</script>";
  echo $script;
  $id = ($_GET["edit"]);
  $_editmode="true";

  $sql = "SELECT * FROM products WHERE id=$id";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();

      $img = $row['img'];
      $title = $row['title'];
      $caption = $row['caption'];
      $price = $row['price'];
  }
}


if (isset($_GET["insert"])) {

  

  $script = "<script>var totalPageCount; totalPageCount = 2;</script>";
  echo $script;
  // $id = ($_GET["edit"]);
  $_insertmode="true";

  // $sql = "SELECT * FROM products WHERE id=$id";
  // $result = $conn->query($sql);

  // if ($result->num_rows == 1) {
  //     $row = $result->fetch_assoc();

  //     $img = $row['img'];
  //     $title = $row['title'];
  //     $caption = $row['caption'];
  //     $price = $row['price'];
  // }
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
<body>
<nav id="header" style="color:var(--white)">
      <span>CAMP<span style="color: var(--green);">FIT</span></span>
      <div class="navbaroptions">
        <ul> 
                            <li><a href="#">Dashboard</a></li>
                            
                        
          <?php   
                // if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
                // ?>
                <ul class="logout"><li><a href="../logout.php" style="color:var(--green)">Logout</a></li></ul>
                
               
        </ul>
      </div>
    </nav>
    <div class="bg-modal">
  <div class="modal-content">
    <h1 style="text-align:center;padding-bottom:20px;color:var(--lightblack)">Edit</h1>
    <div class="close" onclick=closeModal()>+</div>
  <form method="post" action="dashboard.php">
          <input type="text" name="title" class="input_form" id="title" placeholder="Title" required value="<?php echo isset($_GET['edit'])? $row['title']:'';?>">
            <input type="text" class="input_form" name="caption" id="caption" placeholder="caption" required value="<?php echo isset($_GET['edit'])?$row['caption']:'';?>">
            <input type="text" name="price" class="input_form" id="price" placeholder="price" required value="<?php echo isset($_GET['edit'])?$row['price']:'';?>">
            <input type="text" name="img" class="input_form" id="imageurl" placeholder="imageurl" required value="<?php echo isset($_GET['edit'])?$row['img']:'';?>">
            <button type="submit" id="updatebtn">UPDATE</button>
            </form>
  </div>
</div>

<div class="bg-modalInsert">
  <div class="modal-content">
    <h1 style="text-align:center;padding-bottom:20px;color:var(--lightblack)">Insert</h1>
    <div class="close" onclick=closeModal()>+</div>
  <form method="post" action="dashboard.php">
          <input type="text" name="title" class="input_form" id="title" placeholder="Title" required value="">
            <input type="text" class="input_form" name="caption" id="caption" placeholder="caption" required value="">
            <input type="text" name="price" class="input_form" id="price" placeholder="price" required value="">
            <input type="text" name="img" class="input_form" id="imageurl" placeholder="imageurl" required value="">
            <button type="submit" id="updatebtn">UPDATE</button>
            </form>
  </div>
</div>

<section id="products-items" class="swiper mySwiper products-items" style="position:relative;">
    <p class="gallery-title title" style="color: var(--white);margin-bottom: 30px;"> Our <span
      style="color: var(--green);">Products</span></p>
      <div class="insertproduct" onclick=insertFunc()>+</div>
      <div class="card_section">
    <?php
  while($row = mysqli_fetch_assoc($all_product)){
    ?>  
      <div class="carCard" >
      <div class="img-card">
        <img class="products-image" src="<?php echo $row["img"];?>" alt="protien">
      </div>
      <p class="product-title"><?php echo $row["title"];?></p>
      <p class="product-caption"><?php echo $row["caption"];?></p>
      <div class="product-details">
        <span class="price">$<?php echo $row["price"];?></span>
      <button class="add-btn subscribe_btn" id="add-btn" style="color:cyan" onclick="editFunc(<?php echo $row['id'];?>)">Edit</button>
      <button class="add-btn subscribe_btn" id="add-btn" style="color:red" onclick="deleteFunc(<?php echo $row['id'];?>)">Delete</button>
      </div>
    </div>
    <?php
     }
     ?>
  </div>
</section>


<script>
  
  if(totalPageCount===1){
       showDialogBox();
     }
     else if(totalPageCount==2){
      showDialogBox();
     }
   function editFunc(id) {
    if(id!=undefined)
    editid = id;
     window.location.href = "dashboard.php?edit=" + id;
    }
    function insertFunc(){
      window.location.href = "dashboard.php?insert=1";
    }

    function deleteFunc(id) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = "dashboard.php?delete=" + id;
        }
    }

    function showDialogBox(){
      document.querySelector(".bg-modal").style.display = 'flex';
      
    }
    
    function closeModal(){
      totalPageCount=0;
      document.querySelector(".bg-modal").style.display = 'none';

    }
</script>
</body>
</html>